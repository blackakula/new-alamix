<?php
  class LinksController extends ApplicationController {
  	const DELIMITER = '<--->';
  	
    public function index() {
      $this->set('stylesheets', array('links.css'));
      
      $data = get_config('links');
    	$this->set('title',$data['title']);
    	$this->set('h1_title', $data['h1']);
    	
    	$columns = array();
    	$column_index = 0;
    	foreach ($data['content'] as $item) {
    		$this->_newColumn($column_index, $columns);
    		
    		$column_item = &$columns[$column_index];
    		if (count($column_item) > 0) $column_item[] = array('space');
    		$column_item[] = array('icons', $item['icons']);
    		$column_item[] = array('title', $item['title']);
    		
    		foreach (explode(self::DELIMITER, $item['text']) as $part) {
    			$part = trim($part);
    			if (!empty($part)) {
    				$this->_newColumn($column_index, $columns);
    				$columns[$column_index][] = array('text', $part);
    			}
    			++$column_index;
    		}
    		--$column_index;
    	}
    	
    	$this->set('COLUMNS', $columns);
    }
    
    private function _newColumn($column_index, &$columns) {
    	if (!array_key_exists($column_index, $columns))
    		$columns[$column_index] = array();
    }
  }
?>