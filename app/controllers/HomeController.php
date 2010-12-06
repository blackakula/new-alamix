<?php
  class HomeController extends ApplicationController {
    public function index() {
      $this->set('stylesheets', array('index.css'));
      
    	$data = get_config('index');
      $this->set('title', $data['title']);
      $this->set('h1_title', $data['h1']);
      
      $this->set('content_items', $data['content']);
    }
  }
?>
