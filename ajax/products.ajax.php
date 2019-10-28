<?php
  header('Access-Control-Allow-Origin: *');

  
  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  $return               = (object) array();
  $return->error        = false;

  $return->products = array();

  for($i = 0; $i < 5; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 84567;
    $tmp->colors  = 10;
    $tmp->type    = 'product';
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

  for($i = 0; $i < 5; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 84556;
    $tmp->type    = 'product';
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

  for($i = 0; $i < 5; $i++) {
    $tmp = (object) array();
    $tmp->hasData   = true;
    $tmp->id        = 700066;
    $tmp->wishlist  = true;
    $tmp->type      = 'product';
    $tmp->name      = 'Baumwolljersey Bauplatz, hellgrau';
    $tmp->href      = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags     = array(
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

  for($i = 0; $i < 5; $i++) {
    $tmp = (object) array();
    $tmp->hasData   = true;
    $tmp->id        = 85535;
    $tmp->wishlist  = true;
    $tmp->type      = 'product';
    $tmp->name      = 'Nickistoff Flowers, rosa';
    $tmp->href      = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags     = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 14.95;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    
    $return->products[]   = $tmp;
  }

  for($i = 0; $i < 5; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 85417;
    $tmp->type    = 'product';
    $tmp->name    = 'Leichter Wollstoff Melange, grau';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;
    
    $tmp->price = (object) array();
    $tmp->price->original     = 18.95;
    $tmp->price->promotional  = 9.95;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/leichter-wollstoff-melange-grau_P-10709_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/leichter-wollstoff-melange-grau_P-10709_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/leichter-wollstoff-melange-grau_P-10709_2.jpg';

    $return->products[]   = $tmp;
  }

  for($i = 0; $i < 5; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 85468;
    $tmp->colors  = 10;
    $tmp->type    = 'product';
    $tmp->name    = 'Baumwollstoff Cretonne Mini Steuerrad, hellblau';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 8.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/baumwollstoff-cretonne-mini-steuerrad-hellblau_86172-31702_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/baumwollstoff-cretonne-mini-steuerrad-hellblau_86172-31702_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/baumwollstoff-cretonne-mini-steuerrad-hellblau_86172-31702_2.jpg';

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