<?php
  $r = get_routes();
  $r->named('root', '/',array('controller' => 'home'));
  $r->named('links', '/links', array('controller' => 'links'));
  $r->named('photo', '/photo', array('controller' => 'photo'));
?>
