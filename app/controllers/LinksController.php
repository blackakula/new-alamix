<?php
  class LinksController extends ApplicationController {
    public function index() {
      $this->set('title','This is links page');
      $this->set('stylesheets', array('links.css'));
    }
  }
?>