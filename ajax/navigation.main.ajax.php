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
    'url'   => '/category/naehzubehoer.html',
    'sub'   => array(
      (object) array(
        'label' => 'Applikationen',
        'url'   => '/category/naehzubehoer/applikationen.html'
      ),
      (object) array(
        'label' => 'Bänder',
        'url'   => '/category/naehzubehoer/baender.html'
      ),
      (object) array(
        'label' => 'Bastelsets & Nähpakete',
        'url'   => '/category/naehzubehoer/bastelsets-und-naehpakete.html'
      ),
      (object) array(
        'label' => 'Borten',
        'url'   => '/category/naehzubehoer/borten.html'
      ),
      (object) array(
        'label' => 'Bücher & Zeitschriften',
        'url'   => '/category/naehzubehoer/buecher-und-zeitschriften.html'
      ),
      (object) array(
        'label' => 'Gutscheine',
        'url'   => '/category/naehzubehoer/gutscheine.html'
      ),
      (object) array(
        'label' => 'Knöpfe',
        'url'   => '/category/naehzubehoer/knoepfe.html'
      ),
      (object) array(
        'label' => 'Kordeln',
        'url'   => '/category/naehzubehoer/kordeln.html'
      ),
      (object) array(
        'label' => 'Nadeln',
        'url'   => '/category/naehzubehoer/nadeln.html'
      ),
      (object) array(
        'label' => 'Näh - und Markierhilfen',
        'url'   => '/category/naehzubehoer/naeh-und-markierhilfen.html'
      ),
      (object) array(
        'label' => 'Nähgarn',
        'url'   => '/category/naehzubehoer/naehgarn.html'
      ),
      (object) array(
        'label' => 'Nähkästchen',
        'url'   => '/category/naehzubehoer/naehkaestchen.html'
      ),
      (object) array(
        'label' => 'Nähmaschinen & Zubehör',
        'url'   => '/category/naehzubehoer/naehmaschinen-und-zubehoer.html'
      ),
      (object) array(
        'label' => 'Reissverschlüsse',
        'url'   => '/category/naehzubehoer/reissverschluesse.html'
      ),
      (object) array(
        'label' => 'Scheren & Wekzeuge',
        'url'   => '/category/naehzubehoer/scheren-und-werkzeuge.html'
      ),
      (object) array(
        'label' => 'Schneiderpuppen',
        'url'   => '/category/naehzubehoer/schneiderpuppen.html'
      ),
      (object) array(
        'label' => 'Sicherheitsreflektoren',
        'url'   => '/category/naehzubehoer/sicherheitsreflektoren.html'
      ),
      (object) array(
        'label' => 'Verschlusssysteme',
        'url'   => '/category/naehzubehoer/verschlusssysteme.html'
      ),
      (object) array(
        'label' => 'Weiteres Nähzubehör',
        'url'   => '/category/naehzubehoer/weiteres-naehzubehoer.html'
      ),
      (object) array(
        'label' => 'Wolle',
        'url'   => '/category/naehzubehoer/wolle.html'
      ),
    )
  );
  $return->navigation[] = (object) array(
    'id'    => 282,
    'label' => 'Schnittmuster',
    'url'   => '/category/schnittmuster.html',
    'sub'   => array(
      (object) array(
        'label' => 'Accessoires',
        'url'   => '/category/schnittmuster/accessoires.html'
      ),
      (object) array(
        'label' => 'Anlässe',
        'url'   => '/category/schnittmuster/anlaesse.html'
      ),
      (object) array(
        'label' => 'Baby & Kinder',
        'url'   => '/category/schnittmuster/baba-und-kinder.html'
      ),
      (object) array(
        'label' => 'Bekleidung',
        'url'   => '/category/schnittmuster/bekleidung.html'
      ),
      (object) array(
        'label' => 'Cosplay',
        'url'   => '/category/schnittmuster/cosplay.html'
      ),
      (object) array(
        'label' => 'Dekoration',
        'url'   => '/category/schnittmuster/dekoration.html'
      ),
      (object) array(
        'label' => 'Tierbekleidung',
        'url'   => '/category/schnittmuster/tierbekleidung.html'
      ),
      (object) array(
        'label' => 'Herren',
        'url'   => '/category/schnittmuster/herren.html'
      ),
      (object) array(
        'label' => 'Marken',
        'url'   => '/category/schnittmuster/marken.html'
      ),
      (object) array(
        'label' => 'Puppenkleider',
        'url'   => '/category/schnittmuster/puppenkleider.html'
      ),
      (object) array(
        'label' => 'E-Books',
        'url'   => '/category/schnittmuster/e-books.html'
      ),
    )
  );
  $return->navigation[] = (object) array(
    'id'    => 1041,
    'label' => 'Wolle',
    'url'   => '/category/wolle.html',
    'sub'   => array(
      (object) array(
        'label' => 'Wolle A-Z',
        'url'   => '/category/wolle/wolle-a-z-html'
      ),
      (object) array(
        'label' => 'Strick- & Häkelzubehör',
        'url'   => '/category/wolle/strick-und-haekelzubehoer.html'
      )
    )
  );
  $return->navigation[] = (object) array(
    'id'    => 797,
    'label' => 'Inspiration',
    'url'   => '/category/inspiration.html',
  );
  $return->navigation[] = (object) array(
    'id'    => 1235,
    'label' => 'Neuheiten',
    'url'   => '/category/neuheiten.html'
  );
  $return->navigation[] = (object) array(
    'id'    => 794,
    'label' => 'Sale',
    'css'   => 'sale',
    'url'   => '/category/sale.html',
    'sub'   => array(
      (object) array(
        'label' => 'MEGA DEAL',
        'url'   => '/category/sale/mega-deal.html'
      ),
      (object) array(
        'label' => 'Bänder & Borten',
        'url'   => '/category/sale/baender-und-borten.html'
      ),
      (object) array(
        'label' => 'Bekleidungsstoffe',
        'url'   => '/category/sale/bekleidungsstoffe.html'
      ),
      (object) array(
        'label' => 'Dekostoffe',
        'url'   => '/category/sale/dekostoffe.html'
      ),
      (object) array(
        'label' => 'Kinderstoffe',
        'url'   => '/category/sale/kinderstoffe.html'
      ),
      (object) array(
        'label' => 'Polsterstoffe',
        'url'   => '/category/sale/polsterstoffe.html'
      ),
      (object) array(
        'label' => 'Stoffpakete',
        'url'   => '/category/sale/stoffpakete.html'
      ),
      (object) array(
        'label' => 'Nähzubehör',
        'url'   => '/category/sale/naehzubehoer.html'
      ),
      (object) array(
        'label' => 'Stoffreste',
        'url'   => '/category/sale/stoffreste.html'
      )
    )
  );
  
  echo json_encode($return);