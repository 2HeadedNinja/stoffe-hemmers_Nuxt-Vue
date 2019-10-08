<?php
  header('Access-Control-Allow-Origin: *');

  
  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  $return               = (object) array();
  $return->error        = false;

  $return->products = array();

  for($i = 0; $i < 10; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->name    = 'Baumwollstoff Cretonne Palmenblätter, beere';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = array(
      (object) array(
        'label' => 'Neu',
        'type'  => 'default'
      )
    );

    $tmp->price = (object) array();
    $tmp->price->original     = 7.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/baumwollstoff-cretonne-palmenblaetter-beere_LGA379001_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/baumwollstoff-cretonne-palmenblaetter-beere_LGA379001_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/baumwollstoff-cretonne-palmenblaetter-beere_LGA379001_2.jpg';

    $return->products[]   = $tmp;
  }

  for($i = 0; $i < 10; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->name    = 'Baumwolljersey Malomi Panel kleine Monsterbande 150 x 70 cm';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;
    
    $tmp->price = (object) array();
    $tmp->price->original     = 12.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'Stk';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-malomi-panel-kleine-monsterbande_MAL-MON1_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-malomi-panel-kleine-monsterbande_MAL-MON1_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-malomi-panel-kleine-monsterbande_MAL-MON1_2.jpg';

    $return->products[]   = $tmp;
  }

  for($i = 0; $i < 10; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->name    = 'Baumwolljersey Bauplatz, hellgrau';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = array(
      (object) array(
        'label' => '-25%',
        'type'  => 'sale'
      ),
      (object) array(
        'label' => 'Neu',
        'type'  => 'default'
      ),
      (object) array(
        'label' => 'Exklusiv',
        'type'  => 'default'
      )
    );

    $tmp->price = (object) array();
    $tmp->price->original     = 11.95;
    $tmp->price->promotional  = 8.95;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    
    $return->products[]   = $tmp;
  }

  if(count($return->products) < 1) {
    $return->error    = true;
    unset($return->products);
  } else {
    shuffle($return->products);

    if(count($return->products) > $post->quantity) {
      $return->products = array_slice($return->products,0,$post->quantity);
    }

    $return->productcount = 210;
  }

  echo json_encode($return);