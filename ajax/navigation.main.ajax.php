<?php
  header('Access-Control-Allow-Origin: *');

  
  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  $return               = (object) array();
  $return->error        = false;

  $return->navigation   = array();
  $return->navigation[] = (object) array(
    'id'    => 1132,
    'label' => 'Stoffe',
    'url'   => '/category/stoffe.html',
    'sub'   => array(
      (object) array(
        'label' => 'Stoffe A-Z',
        'url'   => '/category/stoffe/stoffe-a-z.html'
      ),
      (object) array(
        'label' => 'Bekleidungsstoffe',
        'url'   => '/category/stoffe/bekleidungsstoffe.html'
      ),
      (object) array(
        'label' => 'Dekostoffe',
        'url'   => '/category/stoffe/dekostoffe.html'
      ),
      (object) array(
        'label' => 'Filz & Bastelstoffe',
        'url'   => '/category/stoffe/filz-und-bastelstoffe.html'
      ),
      (object) array(
        'label' => 'Kinderstoffe',
        'url'   => '/category/stoffe/kinderstoffe.html'
      ),
      (object) array(
        'label' => 'Kombistoffe',
        'url'   => '/category/stoffe/kombistoffe.html'
      ),
      (object) array(
        'label' => 'Markenstoffe',
        'url'   => '/category/stoffe/markenstoffe.html'
      ),
      (object) array(
        'label' => 'Musterkarten',
        'url'   => '/category/stoffe/musterkarten.html'
      ),
      (object) array(
        'label' => 'Patchworkstoffe',
        'url'   => '/category/stoffe/patchworkstoffe.html'
      ),
      (object) array(
        'label' => 'Saisonale Stoffe',
        'url'   => '/category/stoffe/saisonale-stoffe.html'
      ),
      (object) array(
        'label' => 'Stoffpakete',
        'url'   => '/category/stoffe/stoffpakete.html'
      ),
      (object) array(
        'label' => 'Weihnachtsstoffe',
        'url'   => '/category/stoffe/weihnachtsstoffe.html'
      )
    )
  );
  $return->navigation[] = (object) array(
    'id'    => 1133,
    'label' => 'Nähzubehör',
    'url'   => '/category/naehzubehoer.html'
  );
  $return->navigation[] = (object) array(
    'id'    => 282,
    'label' => 'Schnittmuster',
    'url'   => '/category/schnittmuster.html'
  );
  $return->navigation[] = (object) array(
    'id'    => 1041,
    'label' => 'Wolle',
    'url'   => '/category/wolle.html'
  );
  $return->navigation[] = (object) array(
    'id'    => 797,
    'label' => 'Inspiration',
    'url'   => '/category/inspiration.html'
  );
  $return->navigation[] = (object) array(
    'id'    => 1235,
    'label' => 'Neuheiten',
    'url'   => '/category/neuheiten.html'
  );
  $return->navigation[] = (object) array(
    'id'    => 794,
    'label' => 'Sale',
    'url'   => '/category/sale.html'
  );
  
  echo json_encode($return);