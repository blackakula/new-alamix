<?php
  class PhotoController extends ApplicationController {
    public function index() {
      $this->set('stylesheets', array('photo.css'));
      $data = get_config('photo');
      $this->set('title',$data['title']);
      $this->set('h1_title', $data['h1']);
      $this->set('content_items', $data['content']);
    }
  }
?>