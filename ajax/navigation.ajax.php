<?php
  header('Access-Control-Allow-Origin: *');

  
  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  $return               = (object) array();
  $return->error        = false;

  $return->navigation           = (object) array();
  $return->navigation->back     = (object) array(
    'link'  => '#',
    'label' => 'Zurück'
  );

  $return->navigation->current  = (object) array(
    'link'  => '#',
    'label' => 'Dekostoffe'
  );

  $return->navigation->links    = array();
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Bettwäschestoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Dekostoffe Digitaldruck'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Extrabreite & Raumhohe Dekostoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Gardinen & Vorhänge'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Kissen & Deckenstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Landhausstil'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Markisenstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Möbelstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Outdoorstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Tischdeckenstoffe'
  );
  $return->navigation->links[]  = (object) array(
    'link'  => '#',
    'label' => 'Kinder Dekostoffe'
  );

  echo json_encode($return);