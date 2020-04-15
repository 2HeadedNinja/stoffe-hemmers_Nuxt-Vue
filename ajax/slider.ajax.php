<?php
  header('Access-Control-Allow-Origin: *');

  
  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  $return               = (object) array();
  $return->error        = false;

  if($post->category === 1) {
    $return->products = array();

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 81554;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Polyester Krepp Indian Leopard, dunkelgrün';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 9.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_polyester-krepp-indian-leopard-dunkelgruen_12424-028_7.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_polyester-krepp-indian-leopard-dunkelgruen_12424-028_7.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_polyester-krepp-indian-leopard-dunkelgruen_12424-028_7.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 81288;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Baumwollstoff Cretonne Wilde Pferde, altrosa';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 8.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_baumwollstoff-cretonne-wilde-pferde-altrosa_6467-004_7.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_baumwollstoff-cretonne-wilde-pferde-altrosa_6467-004_7.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_baumwollstoff-cretonne-wilde-pferde-altrosa_6467-004_7.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 87161;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Viskosestoff High Heels, koralle';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 8.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskosestoff-high-heels-koralle_132.331-3006_6.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskosestoff-high-heels-koralle_132.331-3006_6.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskosestoff-high-heels-koralle_132.331-3006_6.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 87161;
    $tmp->colors  = 6;
    $tmp->type    = 'product';
    $tmp->name    = 'Modal Jersey Cherry Blossom, marineblau';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 14.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_modal-jersey-cherry-blossom-marineblau_6773-004_10.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_modal-jersey-cherry-blossom-marineblau_6773-004_10.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_modal-jersey-cherry-blossom-marineblau_6773-004_10.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 83134;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Frottee Jersey Trigon, helloliv';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 18.99;
    $tmp->price->promotional  = 14.99;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_frottee-jersey-trigon-helloliv_991.071-0801_6.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_frottee-jersey-trigon-helloliv_991.071-0801_6.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_frottee-jersey-trigon-helloliv_991.071-0801_6.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 83135;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Jacquard Jersey Ajour Blümchen, rosé';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 18.99;
    $tmp->price->promotional  = 14.99;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_jacquard-jersey-ajour-bluemchen-ros_991.072-3001_8.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_jacquard-jersey-ajour-bluemchen-ros_991.072-3001_8.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_jacquard-jersey-ajour-bluemchen-ros_991.072-3001_8.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 87160;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Viskosestoff Retro Roller, hellblau';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 8.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskosestoff-retro-roller-hellblau_132.335-3008_6.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskosestoff-retro-roller-hellblau_132.335-3008_6.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskosestoff-retro-roller-hellblau_132.335-3008_6.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 83145;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Organic Baumwolljersey Erntezeit, taupe';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 18.99;
    $tmp->price->promotional  = 14.99;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_organic-baumwolljersey-erntezeit-taupe_991.083-3002_7.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_organic-baumwolljersey-erntezeit-taupe_991.083-3002_7.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_organic-baumwolljersey-erntezeit-taupe_991.083-3002_7.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 78803;
    $tmp->colors  = 11;
    $tmp->type    = 'product';
    $tmp->name    = 'Cordjersey schmal, curry';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 12.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_cordjersey-schmal-curry_12501-034_5.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_cordjersey-schmal-curry_12501-034_5.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_cordjersey-schmal-curry_12501-034_5.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 81138;
    $tmp->colors  = null;
    $tmp->type    = 'product';
    $tmp->name    = 'Viskose Twill Blütenwerk, dunkelpetrol';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 9.95;
    $tmp->price->promotional  = 7.95;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskose-twill-bluetenwerk-dunkelpetrol_703.472-3007_6.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskose-twill-bluetenwerk-dunkelpetrol_703.472-3007_6.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_viskose-twill-bluetenwerk-dunkelpetrol_703.472-3007_6.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 75631;
    $tmp->colors  = 4;
    $tmp->type    = 'product';
    $tmp->name    = 'Baumwoll Musselin Double Gauze Federtraum, wollweiss';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 9.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_baumwoll-musselin-double-gauze-federtraum_11253-051_6.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_baumwoll-musselin-double-gauze-federtraum_11253-051_6.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_baumwoll-musselin-double-gauze-federtraum_11253-051_6.jpg';

    $return->products[]   = $tmp;

    $tmp          = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 83706;
    $tmp->colors  = 3;
    $tmp->type    = 'product';
    $tmp->name    = 'Teddy Krimmer bordeaux';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

    $tmp->price = (object) array();
    $tmp->price->original     = 13.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_teddy-krimmer-bordeaux_12307-019_7.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_teddy-krimmer-bordeaux_12307-019_7.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w500/wpi/nuxt_fashion_teddy-krimmer-bordeaux_12307-019_7.jpg';

    $return->products[]   = $tmp;

    if(count($return->products) < 1) {
      $return->error    = true;
      unset($return->products);
    } else {
      shuffle($return->products);

      if(count($return->products) > $post->quantity) {
        $return->products = array_slice($return->products,0,$post->quantity);
      }
    }
  } else {
    $return->products = array();
    
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 84567;
    $tmp->colors  = 10;
    $tmp->type    = 'product';
    $tmp->name    = 'Baumwollstoff Cretonne Palmenblätter, beere';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

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

    $tmp = (object) array();
    $tmp->hasData   = true;
    $tmp->id        = 700066;
    $tmp->type      = 'product';
    $tmp->name      = 'Baumwolljersey Bauplatz, hellgrau';
    $tmp->href      = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags     = array(
      (object) array(
        'label' => 'Exklusiv',
        'type'  => 'default'
      ),
      (object) array(
        'label' => 'Nachhaltigkeit',
        'type'  => 'sustainability'
      )
    );

    $tmp->price = (object) array();
    $tmp->price->original     = 11.95;
    $tmp->price->promotional  = 8.95;
    $tmp->price->savings      = '25 %';
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    
    $return->products[]   = $tmp;

    $tmp = (object) array();
    $tmp->hasData   = true;
    $tmp->id        = 85535;
    $tmp->wishlist  = null;
    $tmp->type      = 'product';
    $tmp->name      = 'Nickistoff Flowers, rosa';
    $tmp->href      = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags     = array(
      (object) array(
        'label' => 'Nachhaltigkeit',
        'type'  => 'sustainability'
      )
    );

    $tmp->price = (object) array();
    $tmp->price->original     = 14.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    
    $return->products[]   = $tmp;

    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 84567;
    $tmp->colors  = 10;
    $tmp->type    = 'product';
    $tmp->name    = 'Baumwollstoff Cretonne Palmenblätter, beere';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags   = null;

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

    $tmp = (object) array();
    $tmp->hasData   = true;
    $tmp->id        = 700066;
    $tmp->type      = 'product';
    $tmp->name      = 'Baumwolljersey Bauplatz, hellgrau';
    $tmp->href      = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags     = array(
      (object) array(
        'label' => 'Exklusiv',
        'type'  => 'default'
      ),
      (object) array(
        'label' => 'Nachhaltigkeit',
        'type'  => 'sustainability'
      )
    );

    $tmp->price = (object) array();
    $tmp->price->original     = 11.95;
    $tmp->price->promotional  = 8.95;
    $tmp->price->savings      = '25 %';
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/baumwolljersey-bauplatz-hellgrau_JYA205001_2.jpg';
    
    $return->products[]   = $tmp;

    $tmp = (object) array();
    $tmp->hasData   = true;
    $tmp->id        = 85535;
    $tmp->wishlist  = null;
    $tmp->type      = 'product';
    $tmp->name      = 'Nickistoff Flowers, rosa';
    $tmp->href      = 'http://localhost:3010/category/stoffe.html';
    $tmp->flags     = array(
      (object) array(
        'label' => 'Nachhaltigkeit',
        'type'  => 'sustainability'
      )
    );

    $tmp->price = (object) array();
    $tmp->price->original     = 14.95;
    $tmp->price->promotional  = null;
    $tmp->price->currency     = '€';
    $tmp->price->unit         = 'm';

    $tmp->image           = (object) array();
    $tmp->image->default  = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    $tmp->image->medium   = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    $tmp->image->small    = 'https://images.shcdn.de/resized/w360/p/nickistoff-flowers-rosa_131.828-3002_2.jpg';
    
    $return->products[]   = $tmp;

    if(count($return->products) < 1) {
      $return->error    = true;
      unset($return->products);
    } else {
      shuffle($return->products);

      if(count($return->products) > $post->quantity) {
        $return->products = array_slice($return->products,0,$post->quantity);
      }
    }
  }

  echo json_encode($return);