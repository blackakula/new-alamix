<?php
  class PhotoController extends ApplicationController {
    public function index() {
      $this->set('stylesheets', array('photo.css'));
      $this->set('photo_javascripts', array(
            'jquery-1.4.4.min.js',
            'gallery/eye.js',
            'gallery/utils.js',
            'gallery/spacegallery.js',
            'photo.js'
          ));
      $data = get_config('photo');
      $this->set('title',$data['title']);
      $this->set('h1_title', $data['h1']);
      $this->set('content_items', $data['content']);

      $img_path = 'gallery';
      $gallery_dir = opendir(get_config('ROOT_DIR').'/'.get_config('IMG_PATH').'/'.$img_path);
      $photos = array();
      while ($photo = readdir($gallery_dir)) {
        if ($photo == '.' || $photo == '..') continue;
        $photos[] = $img_path.'/'.$photo;
      }
      $this->set('gallery_photos', $photos);
    }
  }
?>