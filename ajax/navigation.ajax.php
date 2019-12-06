<?php
  header('Access-Control-Allow-Origin: *');

  
  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  $return               = (object) array();
  $return->error        = false;

  $return->navigation           = (object) array();
  $return->navigation->back     = (object) array(
    'link'  => '/category/#',
    'label' => 'Zurück'
  );

  $return->navigation->current  = (object) array(
    'link'  => '/category/dekostoffe.html',
    'label' => 'Dekostoffe'
  );

  $return->navigation->links    = array();
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/bettwaeschestoffe.html',
    'label' => 'Bettwäschestoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/dekostoffe-digitaldruck.html',
    'label' => 'Dekostoffe Digitaldruck'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/extrabreite-und-raumhohe-dekostoffe.html',
    'label' => 'Extrabreite & Raumhohe Dekostoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/gardinen-und-vorhaenge.html',
    'label' => 'Gardinen & Vorhänge'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/#',
    'label' => 'Kissen & Deckenstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/#',
    'label' => 'Landhausstil'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/#',
    'label' => 'Markisenstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/#',
    'label' => 'Möbelstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/#',
    'label' => 'Outdoorstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/#',
    'label' => 'Tischdeckenstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '/category/#',
    'label' => 'Kinder Dekostoffe'
  );

  echo json_encode($return);