<?php
  header('Access-Control-Allow-Origin: *');

  // -> https://lib.shcdn.de/videos/videohive-8EYpYB17-interior-design.mp4
  // -> https://lib.shcdn.de/videos/nuxt__cherry_blossom.mp4
  // -> https://lib.shcdn.de/videos/nuxt__sewing_teaching.mp4
  // -> https://lib.shcdn.de/videos/nuxt__strawberry-falling.mp4
  // -> https://images.shcdn.de/resized/w1920/wpi/nuxt__living-room-modern.jpg
  // -> https://images.shcdn.de/resized/w1920/wpi/nuxt__comfortable-room.jpg

  $return                 = (object) array();
  $return->error          = false;
  $return->hasHeroContent = true;

  $return->background         = (object) array();
  $return->background->image  = 'https://images.shcdn.de/resized/w1920/wpi/nuxt__living-room-modern.jpg';

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

  echo json_encode($return);