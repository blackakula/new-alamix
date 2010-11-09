<?php
  class LinksController extends ApplicationController {
    public function index() {
      $this->set('title','This is links page');
      $this->set('stylesheets', array('links.css'));
      
      $this->set('LINKS', array(
      	array(
      		'title' => 'Для дизайну',
      		'text' => 'Текст для дизайну. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget nisi libero. Cras non nisl eget ligula commodo ullamcorper vitae ac ante. Vestibulum ut ipsum lorem, nec euismod ante. Vestibulum gravida tempus lorem hendrerit rhoncus. Cras ac lectus sed erat bibendum feugiat ut et metus. Maecenas quis tortor nunc, id dapibus est. Sed a sapien nec turpis suscipit interdum sed at sapien. Nam dictum, arcu vitae scelerisque facilisis, neque erat porta felis, a hendrerit ante nulla et libero. Aliquam quis lorem vitae leo malesuada fringilla.'
      	),
      	array(
      		'title' => 'Креативні ідеї',
      		'text' => 'Ідеї, ідеї, ідеї. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget nisi libero. Cras non nisl eget ligula commodo ullamcorper vitae ac ante. Vestibulum ut ipsum lorem, nec euismod ante. Vestibulum gravida tempus lorem hendrerit rhoncus. Cras ac lectus sed erat bibendum feugiat ut et metus. Maecenas quis tortor nunc, id dapibus est. Sed a sapien nec turpis suscipit interdum sed at sapien. Nam dictum, arcu vitae scelerisque facilisis, neque erat porta felis, a hendrerit ante nulla et libero. Aliquam quis lorem vitae leo malesuada fringilla.'
      	)
      ));
    }
  }
?>