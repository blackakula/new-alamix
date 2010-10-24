<?php
  class HomeController extends ApplicationController {
    public function index() {
      $this->set('title','This is main page');
    }
  }
?>
