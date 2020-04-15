<?php
  header('Access-Control-Allow-Origin: *');

  $body = trim(file_get_contents("php://input"));
  $post = json_decode($body);

  // -> https://lib.shcdn.de/videos/videohive-8EYpYB17-interior-design.mp4
  // -> https://lib.shcdn.de/videos/nuxt__cherry_blossom.mp4
  // -> https://lib.shcdn.de/videos/nuxt__sewing_teaching.mp4
  // -> https://lib.shcdn.de/videos/nuxt__strawberry-falling.mp4
  // -> https://images.shcdn.de/resized/w1920/wpi/nuxt__living-room-modern.jpg
  // -> https://images.shcdn.de/resized/w1920/wpi/nuxt__comfortable-room.jpg
  // -> https://images.shcdn.de/resized/w1920/wpi/deko_1 - 7.jpg


  $return                       = (object) array();
  $return->error                = false;
  $return->tmp                  = strpos($post->route,'index');

  $return->hasHeroContent     = false;
  
  if(strpos($post->route,'index') === false) {
    if(strpos($post->path,'dekostoffe') !== false) {
      $return->hasHeroContent     = true;

      $return->valign             = 'bottom';

      $return->background         = (object) array();
      $return->background->image  = 'https://images.shcdn.de/resized/w1920/wpi/nuxt__comfortable-room.jpg';

      //$return->background->mp4    = 'https://lib.shcdn.de/videos/videohive-8EYpYB17-interior-design.mp4';
      //$return->background->ogv    = false;

      $return->promotext  = '
        <h3>Design für deine Heimtextilien</h3>
        <p>
          <strong>Dekoration</strong> ist pure Leidenschaft und verlangt ein Gespür für die schönen Dinge im Leben. <strong>Individuelle Akzente</strong> im Wohnraum setzen, <strong>kreative Farbspiele</strong> in den Alltag integrieren und dabei gekonnt den <strong>eigenen Stil</strong> unterstreichen:
        </p>
        <p>
          <em>Das kannst Du alles mit Hilfe unserer Dekostoffe realisieren.</em>
        </p>
      ';
    } else if(strpos($post->path,'markenstoffe') !== false) {
      $return->hasHeroContent     = true;

      $return->valign             = 'top';

      $return->background         = (object) array();
      //$return->background->image  = 'https://images.shcdn.de/resized/w1920/wpi/nuxt__sweatshirt-angeraut-hamburger-liebe-park.jpg';
      $return->background->image  = 'https://images.shcdn.de/resized/w1920/wpi/nuxt__markentstoffe__heroimage.jpg';

      $return->promotext          = false; 
    } else if(strpos($post->path,'kinderstoffe') !== false) {
      $return->hasHeroContent     = true;

      $return->valign             = 'top';

      $return->background         = (object) array();

      //$return->background->image  = 'https://images.shcdn.de/resized/w1920/wpi/nuxt__markentstoffe__heroimage.jpg';
      $return->background->mp4    = 'https://lib.shcdn.de/videos/166_MDEyICAwNTAgMzEg0L7RgXQgMjAxNiBIYW5kIG1hZGUgYXQgaG9tZSBPbA.mp4';
      $return->background->ogv    = 'https://lib.shcdn.de/videos/media.io_166_MDEyICAwNTAgMzEg0L7RgXQgMjAxNiBIYW5kIG1hZGUgYXQgaG9tZSBPbA.ogv';

      $return->promotext          = false; 
    } else {
      $return->hasHeroContent   = false;
    }
  } else {
    $return->hasHeroContent     = true;
    $return->valign             = 'top';

    $return->background         = (object) array();
    $return->background->mp4    = 'https://lib.shcdn.de/videos/video-strawberry-falling.mp4';
    $return->background->ogv    = 'https://lib.shcdn.de/videos/video-strawberry-falling.ogv';

    $return->promotext  = '
      <h3>Frisch in den Frühling</h3>
      <p>
        <strong>Dekoration</strong> ist pure Leidenschaft und verlangt ein Gespür für die schönen Dinge im Leben. <strong>Individuelle Akzente</strong> im Wohnraum setzen, <strong>kreative Farbspiele</strong> in den Alltag integrieren und dabei gekonnt den <strong>eigenen Stil</strong> unterstreichen:
      </p>
      <p>
        <em>Das kannst Du alles mit Hilfe unserer Dekostoffe realisieren.</em>
      </p>
    ';
  }

  echo json_encode($return);