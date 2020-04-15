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
  }

  for($i = 0; $i < 5; $i++) {
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
  }

  for($i = 0; $i < 5; $i++) {
    $tmp = (object) array();
    $tmp->hasData = true;
    $tmp->id      = 85417;
    $tmp->new     = true;
    $tmp->type    = 'product';
    $tmp->name    = 'Leichter Wollstoff Melange, grau';
    $tmp->href    = 'http://localhost:3010/category/stoffe.html';
    

    $tmp->price = (object) array();
    $tmp->price->original     = 18.95;
    $tmp->price->promotional  = 9.95;
    $tmp->price->savings      = '52%';
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

    if($post->infinite === false) {
      $return->productcount     = 210;
      $return->factsheet        = (object) array();
      $return->factsheet->title = 'Steckbrief Baumwolle';
      $return->factsheet->image = 'https://images.shcdn.de/resized/h320/wpi/factsheet_81f87_de_DE_13.jpg';
      $return->factsheet->characteristics = array(
        'leicht & glatt',
        'nicht dehnbar',
        'pflegeleicht'
      );
      $return->factsheet->applications = array(
        'Wohntextilien',
        'Blusen, Hemden & leichte Sommerkleidung',
        'Taschen & Deko'
      );

      $return->description = '
        <h2>Baumwollstoff: der mit den vielen Talenten</h2>
        <p>Kaum ein Stoff ist so vielseitig einsetzbar wie Baumwollstoff. Das Gewebe aus dem nachwachsenden Rohstoff wird seit Jahrhunderten zur Herstellung von Kleidung genutzt – und nicht nur dafür. Baumwollstoff ist darüber hinaus ein hervorragender Deko-Stoff, lässt sich für Raumtextilien, Accessoires und vieles mehr einsetzen. Entsprechend ist das Angebot an Farben, Mustern und Motiven immens. Da bleiben keine Wünsche offen.</p>
        <p>Für Nähanfänger ist Baumwolle ebenfalls perfekt geeignet. Viele einfache Nähprojekte können mit Baumwolle umgesetzt werden und verschaffen Ihnen schnelle Erfolgserlebnisse. Bereit für erste Schritte an der Nähmaschine? Wenn Sie Baumwollstoff kaufen, kann fast nichts schiefgehen.</p>
        <h3 style="--padding-top: 20px;">Baumwollstoff – was ist das?</h3>
        <h4>Herstellung</h4>
        <p>Baumwollstoffe bestehen zu 100 Prozent aus Baumwollfasern. Der pflanzliche Rohstoff wird zu einem Garn verarbeitet und dann gewebt. Prinzipiell handelt es sich bei der Bezeichnung Baumwollstoff um einen Überbegriff für alle Stoffe, die aus Baumwolle durch Weben hergestellt werden. Die genaue Webart kann variieren, wodurch sich eine verschiedene Dichte und Dicke der Stoffe sowie unterschiedliche Strukturen ergeben kann. Es gibt drei Webarten, auf die Baumwollstoffe hergestellt werden kann: die feste Köperbindung, die einen schräg verlaufenden Grat hat, die Leinwandbindung mit einfach überkreuzter Struktur und die Atlasbindung, bei der der auf der Oberseite dominierende Schussfaden für einen zarten Glanz sorgt.</p>
        <h4>Eigenschaften</h4>
        <p>Grundsätzlich ist allen Baumwollstoffen gemeinsam, dass es sich um fest gewebte Stoffe handelt, die recht widerstandsfähig sind. Sie sind nicht dehnbar und fallen zwar leicht, jedoch weniger anschmiegsam als elastische Stoffe. Baumwollstoffe sind glatt und fühlen sich leicht kühl an – eine Eigenschaft, die sie vor allem für luftige Sommerkleidung sehr beliebt macht.</p>
        <p>Im Angebot von Stoffe Hemmers finden Sie folgende Baumwollstoffe:</p>
        <ul>
          <li><a href="#">Batist</a> ist ein in Leinwandbindung gewebter Stoff, der eine sehr feine und leichte Struktur hat und für leichte Gardinen und Bettwäsche sowie für sommerlich-luftige Kleider ideal ist.</li>
          <li><a href="#">Cretonne</a> ist ein schwerer, robuster Baumwollstoff, der weich im Griff ist und eine matte Oberfläche hat. Er eignet sich bestens als Stoff für Dekorationszwecke und Heimtextilien wie Bettwäsche.</li>
          <li><a href="#">Fahnentuch</a> ist in Leinwandbindung gewebt und verfügt über eine feste Struktur, die gut zu verarbeiten ist und für Taschen, Dekorationsobjekte, ebenso wie für Kleidungsstücke geeignet ist.</li>
          <li><a href="#">Köper</a>, auch als Twill oder <a href="#">Jeansstoff</a> bekannt, ist ein in der sogenannten Köperbindung gewebter Baumwollstoff, der sich durch ausgesprochen hohe Widerstandsfähigkeit auszeichnet und relativ dick und steif ist – perfekt für Arbeitsbekleidung.</li>
          <li><a href="#">Nesselstoff</a> ist ein Baumwollstoff, der in Leinwandbindung gefertigt ist und meist aus ungefärbter Baumwolle besteht. Er nimmt Feuchtigkeit auf und ist grob und fest im Griff. Der perfekte Partner für Sonnensegel und Outdoor-Textilien.</li>
          <li>Die in Leinwandbindung gewebte <a href="#">Popeline</a> besteht aus feinen Fasern und ist glatt und leicht im Griff. Sie fällt schön und kann damit Grundlage für Bekleidungsstücke sein, eignet sich aber auch toll für Dekorationen und Accessoires.</li>
        </ul>
        <h3 style="--padding-top: 20px;">So verarbeiten Sie Baumwollstoff richtig</h3>
        <h4>Zuschnitt</h4>
        <p>Der Zuschnitt von Baumwollstoffen geht gut von der Hand und erleichtert Anfängern den Einstieg in das Hobby enorm. Achten Sie zunächst darauf, dass der Stoff vorher einmal gewaschen wurde, denn Baumwolle geht beim ersten Waschgang häufig ein bisschen ein. Bügeln Sie den Baumwollstoff außerdem vor dem Zuschnitt glatt, damit die Form der Schnittteile nicht verfälscht wird. Das Schnittmuster lässt sich mit Stecknadeln einfach befestigen und die Schneiderkreide gleitet auf dem glatten Stoff hervorragend. So zeichnen Sie den Schnitt mühelos perfekt ab. Schneiden Sie mit einem Rollschneider oder einer Schere und achten Sie auf eine ausreichende Nahtzugabe, denn Baumwollstoff muss versäubert werden.</p>
        <h4>Nähen</h4>
        <p>Um Baumwollstoff zu nähen, genügen eine einfache Nähmaschine, ein Standard-Garn und eine Universal-Nähmaschinennadel. Bei dickeren Baumwollstoffen wie Köper kann es manchmal sinnvoll sein, eine stärkere Nadel zu wählen, hier sind Jeans-Nadeln empfehlenswert. Grundsätzlich gilt: Je feiner der Baumwollstoff, desto feiner sollte die Nadel sein, damit Sie bei der Verarbeitung keine zu großen Löcher in den Stoff stechen.</p>
        <p>Da es sich um einen Stoff handelt, der nicht dehnbar ist, reicht ein Geradstich zum Nähen aus. Selbstverständlich ist jeder andere Stich ebenfalls möglich. Wenn Sie keine Overlock-Maschine besitzen, müssen Sie den Baumwollstoff versäubern, damit er nicht ausfranst. Dafür können Sie einen Overlockstich an der normalen Nähmaschine verwenden oder einfach einen breiten Zick-Zack-Stich einstellen. Beachten Sie vor dem Versäumen, dass sich Baumwolle leichter verarbeiten lässt, wenn Sie die Saumkanten kurz umbügeln.</p>
        <h3 style="--padding-top: 20px;">Wie Sie Baumwollstoffe pflegen</h3>
        <h4>Waschen</h4>
        <p>Baumwollstoffe können Sie einfach in die Waschmaschine geben und bei 40 Grad Celsius reinigen.</p>
        <h4>Trocknen</h4>
        <p>Baumwollstoff verkraftet in aller Regel, in der Maschine getrocknet zu werden. Achten Sie auf die Pflegehinweise zum jeweiligen Produkt.</p>
        <h4>Bügeln</h4>
        <p>Baumwolle knittert leider leicht, deswegen führt am Bügeleisen oft kein Weg vorbei. Sie verträgt hohe Temperaturen gut.</p>
        <h3 style="--padding-top: 20px;">Tolle Nähideen mit Baumwollstoff</h3>
        <p>Wenn es einen Stoff gibt, den man universell einsetzen kann, dann ist das Baumwollstoff. Vom einfachen Stoffbeutel bis zum aufwendigen Sommerkleid oder dem klassischen Trenchcoat können Sie aus Baumwolle so gut wie alles machen.</p>
        <p>Wählen Sie aus verschiedenen Dicken und Qualitäten und erschaffen Sie attraktive Kleidung wie Kleider, Blusen, Hosen und Arbeitsbekleidung sowie Jacken. Bei Stoffe Hemmers finden Sie Baumwollstoffe für sommerlich-leichte Kleidung ebenso wie stabile, dichte Baumwoll-Varianten für robuste Outdoor-Kleidung.</p>
        <p>Neben Bekleidung sind Accessoires wie Schals, Tücher und Taschen sowie hübscher Haarschmuck mit Baumwollstoffen im Nu gemacht. Und nicht nur sich selbst können Sie mit dem Allround-Talent schmücken: Als Dekorationsstoff und für Raumtextilien ist Baumwollstoff ebenfalls ideal geeignet. Daneben können Sie zum Beispiel kleine Helferlein für den Alltag nähen, die das Leben einfach schöner machen, zum Beispiel individuelle Einkaufsbeutel oder Lesezeichen. Ob Baumwollstoff in Grau, Rot, Weiß oder mit Sternen – wir haben den Stoff, der Ihr Herz höherschlagen lässt. Neben klassischen Mustern und Farben führen wir viele Baumwollstoffe mit Kinder-Motiven. Wie wäre es mit einem gemeinsamen Nähprojekt mit Ihrem Nachwuchs?</p>
        <p>Was auch immer Ihrer Kreativität gerade entspringt: Unsere Baumwollstoffe als Meterware warten nur darauf, von Ihnen verarbeitet zu werden.</p>
        <h3 style="--padding-top: 20px;">Steckbrief Baumwollstoff</h3>
        <ul>
          <li>Baumwollstoff ist fest gewebt und nicht dehnbar, hat eine glatte Oberfläche und ist in verschiedenen Dicken und Gewebebindungen erhältlich.</li>
          <li>Er eignet sich für Bekleidungsstücke ebenso gut wie für Accessoires, Dekorationen und Wohntextilien.</li>
          <li>Baumwollstoff lässt sich leicht verarbeiten und verschafft Anfängern schnelle erste Erfolgserlebnisse.</li>
          <li>Baumwollstoff ist maschinenwaschbar und trocknergeeignet und somit ausgesprochen pflegeleicht. Bügeln ist ebenfalls kein Problem.</li>
          <li>Baumwollstoff ist der Allrounder für Ihre Nähprojekte und in vielen tollen Farben und Mustern erhältlich.</li>
        </ul>
      ';
    }
  }

  echo json_encode($return);