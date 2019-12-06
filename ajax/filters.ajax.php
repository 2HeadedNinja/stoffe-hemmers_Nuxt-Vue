<?php
  header('Access-Control-Allow-Origin: *');

  $return = array();
  
  $return['colors'] = (object) array(
    'type'    => 'colors',
    'filters' => array(
      'beige',
      'blau',
      'braun',
      'creme',
      'gelb',
      'gold',
      'grau',
      'grün',
      'lila',
      'mint',
      'multicolor',
      'orange',
      'petrol',
      'pink',
      'rosa',
      'rot',
      'schwarz',
      'silber',
      'türkis',
      'violett',
      'weiss',
      'wollweiss / natur'
    )
  );

  $return['motifs'] = (object) array(
    'type'    => 'default',
    'filters' => array(
      'Blumen',
      'Digital Print',
      'Fahrzeuge',
      'Geometrische Muster',
      'Kindermotive',
      'Maritim',
      'meliert',
      'Pflanzen',
      'Retro',
      'Sonstiges',
      'Sport',
      'Streifen',
      'Tiere',
      'Tierfell',
      'Uni',
      'Weihnachten'
    )
  );

  $return['fabric'] = (object) array(
    'type'    => 'default',
    'filters' => array(
      'Batist',
      'Bündchen',
      'Canvas',
      'Chenille',
      'Chiffon',
      'Cord',
      'Cretonne',
      'Fellimitat',
      'Filz',
      'Flanell',
      'Fleece',
      'Folienjersey',
      'Frottee',
      'Gabardine',
      'Georgette',
      'Gobelin',
      'Halbpanama',
      'Jacquard',
      'Jeans',
      'Jersey',
      'Kork',
      'Krepp',
      'Krimmer',
      'Kunstleder',
      'Köper',
      'Lackstoffe',
      'Lederimitat',
      'Leinen',
      'Loden',
      'Mesh',
      'Molton',
      'Musselin',
      'Nicki',
      'Oilskin',
      'Organza',
      'Ottoman',
      'Outdoorstoff',
      'Panama',
      'Panel',
      'Pique',
      'Plüsch',
      'Polsterstoff',
      'Popeline',
      'Rips',
      'Ripstop',
      'Samt',
      'Satin',
      'Seide',
      'SNAPPAP',
      'Softshell',
      'Spitze',
      'Stepper',
      'Stretch',
      'Strick',
      'Sweat',
      'Taft',
      'Tyvek',
      'Tüll',
      'Verdunkelungsstoff',
      'Vlieseline',
      'Voile',
      'Wachstuch',
      'Wollstoff'
    )
  );

  foreach($return as $entry) {
    foreach($entry->filters as $key => $filter) {
      $tmp        = (object) array();
      $tmp->slug  = strtolower(preg_replace('/[^a-zA-Z0-9\-]/', '',preg_replace('/\s+/', '-', $filter)));
      $tmp->label = $filter;

      $entry->filters[$key] = $tmp; 
    }
  }

  echo json_encode($return);