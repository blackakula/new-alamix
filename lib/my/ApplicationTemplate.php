<?php
  class ApplicationTemplate extends Template {
    protected $h;

    public function __construct($controller,$action,$params) {
      parent::__construct($controller,$action,$params);
      $this->extentions = array('php','haml');
      $this->h = new Haml(array($this,'_var'),array($this,'_eval'));
    }

    public function render($filename, $ext = 'php') {
      if ($ext !== 'haml') return parent::render($filename,$ext);
      $php_file_name = substr($filename,0,strlen($filename)-4).'php';
      file_put_contents($php_file_name,$this->h->parse(file_get_contents($filename)));
      include($php_file_name);
    }

    public function _var($var) { return 'isset($'.$var.') ? $'.$var.' : $this->get(\''.$var.'\')'; }
    public function _eval($str) {
      $func = $this->parse_function($str);
      return call_user_func_array(array($this,$func[0]),array($func[1]));
    }

    protected function parse_function($str) {
      if (preg_match('/^\s*([\w_][\w_0-9]*)\((.*)\)\s*$/',$str,$params) == 0) return false;
      $array = eval('return array('.$params[2].');');
      if (is_null($array) || $array === false) return false;
      return array($params[1],$array);
    }

    public function setMenu() {
      $r = get_routes();
      $menu = array(
          array('новини', 'news', true, '#'),
          array('медіа', 'media', false, '#'),
          array('лінки', 'links', true, $r->build_path('links')),
          array('фото', 'photo', false, $r->build_path('photo')),
          array('аля про', 'contacts', true, '#')
      );
      if ($this->get('menu-replace')) {
      	$replace = $this->get('menu-replace');
        foreach ($menu as $k => $item)
      	  if ($item[1] == $replace) {
      	    $menu[$k][0] = 'головна';
      	    $menu[$k][3] = $r->build_path('root');
          }
      }
      $this->set('menu', $menu);
    }
    
    public function _includeSquares($colors = null) {
    	if (empty($colors)) $colors = array('media','photo','contacts');
    	$this->set('squares-colors', $colors);
    	$this->_include('square_icons');
    }
    
    public function _includeColumn($number) {
    	$columns = $this->get('COLUMNS');
    	$this->set('column-item', $columns[$number]);
    	$this->_include('column');
    }
  }
?>
