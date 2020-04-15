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
    'info'         => 'Zeige <strong>{start}</strong> bis <strong>{end}</strong> von <strong>{rows}</strong> Einträgen',
    'caption'      => 'Reef hearties rum black spot tackle pillage bring a spring upon her cable crow\'s nest gabion schooner.'
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
      'label'     => 'Reklamationen',
      'scope'     => true,
      'sortable'  => true
    ),
    (object) array(
      'type'      => 'link',
      'label'     => '',
      'sortable'  => false
    ),
    (object) array(
      'type'      => 'link',
      'label'     => '',
      'sortable'  => false
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

  $now = time();
  for($i = 0; $i < 87; $i++) {
    $return->data[] = array(
      date('m/Y',strtotime('-'.$i.' months', $now)),
      rand(0,25),
      (object) array(
        'label' => 'Drucken',
        'url'   => '/kundenservice/reklamationen/'.date('m/Y',strtotime('-'.$i.' months', $now))
      ),
      (object) array(
        'label' => 'Details',
        'url'   => '/kundenservice/reklamationen/'.date('m/Y',strtotime('-'.$i.' months', $now))
      )
    );
  }
  
  echo json_encode($return);