<?php
  class HomeController extends ApplicationController {
    public function index() {
      $this->set('title','This is main page');
      $this->set('stylesheets', array('index.css'));
      
      $content_items = array();
      foreach (array('news','media','portfolio') as $v)
      	$content_items[$v] = array(
      			'title' => 'Заголовок новини',
      			'style' => $v,
      			'date' => '30/X',
      			'text' => 'Текст новини. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis venenatis sollicitudin.'
      	);
      $content_items['news']['category'] = 'новини';
      $content_items['news']['icons'] = array('media','portfolio','contacts');
      $content_items['media']['category'] = 'медіа';
      $content_items['media']['icons'] = array('news','contacts','portfolio');
      $content_items['portfolio']['category'] = 'портфоліо';
      $content_items['portfolio']['icons'] = array('contacts','media','news');
      $this->set('content_items', $content_items);
    }
  }
?>
