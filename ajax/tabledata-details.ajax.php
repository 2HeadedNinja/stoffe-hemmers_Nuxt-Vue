<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  
  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  $return          = (object) array();
  $return->error   = false;
  $return->options = (object) array(
    'pagination'   => true, // has pagination (or not)
    'distance'     => 2,    // how many entrys in pagingation before ellipsis i.e.:
                            // Distance 2: 1 … [4 5] 6 [7 8] … 20
                            // Distance 3: 1 … [3 4 5] 6 [7 8 9] … 20
    'searchable'   => true/*,
    'chart'        => (object) array(
      'x'          => 'Monat',
      'y'          => 'Reklamationen'
    )*/
  );
  $return->labels  = (object) array(
    'placeholder'  => 'Suchen',
    'perPage'      => '{select} Einträge pro Seite',
    'noRows'       => 'Keine Einträge vorhanden',
    'info'         => 'Zeige <strong>{start}</strong> bis <strong>{end}</strong> von <strong>{rows}</strong> Einträgen'
  );
  $return->data     = array();
  $return->headings = array(
    (object) array(
      'type'      => 'data',
      'label'     => 'Monat',
      'sortable'  => true,
      'direction' => 'desc'
    ),
    (object) array(
      'type'      => 'data',
      'label'     => 'Bestellnummer'
    ),
    (object) array(
      'type'      => 'data',
      'label'     => 'Mitarbeiter',
      'sortable'  => true
    ),
    (object) array(
      'type'      => 'data',
      'label'     => 'Reklamationen',
      'scope'     => true
    )
  );

  $people = array(
    'Angelika Quandt',
    'Bianca Bergmann',
    'Claudia Meyer',
    'Elke Eberhardt',
    'Elke Gebbe',
    'Helga Rott',
    'Ines Leverman',
    'Jacqueline Eberhard',
    'Janine Dieckow',
    'Jessica Bergardt',
    'Katarina Lassak',
    'Margarita Knol',
    'Maria Sommer',
    'Marion Heinze',
    'Monika Buske',
    'Natalja Sterle',
    'Olga Kolbasina',
    'Petra Mischker',
    'Salim Adil',
    'Sandra Stahlmann',
    'Sandra Wendt',
    'Selina Bartels',
    'Sevda Cankaya',
    'Stefan Pabst',
    'Tatjana Azirovic',
    'Tatjana Orlova',
    'Vera Brouwer'
  );

  $days   = cal_days_in_month(CAL_GREGORIAN,$post->month,$post->year);

  $json   = file_get_contents('https://baconipsum.com/api/?type=meat-and-filler&sentences=6&start-with-lorem=0');
  $json   = json_decode($json);
  $lorem  = explode('. ',$json[0]);
  $pop    = array_pop($lorem);

  for($i=1; $i<=$days; $i++) {
    $rand       = rand(0,10);
    $timestamp  = strtotime($post->year.'-'.$post->month.'-'.$i); 
    for($n=0; $n<$rand; $n++) {
      $sentencecount = rand(1,5);
      $tmp           = '';

      for($m=0; $m<$sentencecount; $m++) {
        if($m !== 0) {
          $tmp .= '. ';
        }
        $tmp .= $lorem[$m];
      }

      $return->data[] = array(
        date('d.m.Y',$timestamp),
        rand(100000,999999),
        $people[array_rand($people,1)],
        $tmp.'.'
      );
    }
  }

  echo json_encode($return);