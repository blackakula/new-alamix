<?php
  $r = get_routes();
  $r->named('root', '/',array('controller' => 'home'));
  $r->named('links', '/links', array('controller' => 'links'));
?>
