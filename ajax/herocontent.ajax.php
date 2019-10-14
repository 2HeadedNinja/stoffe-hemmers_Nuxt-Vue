<?php
  header('Access-Control-Allow-Origin: *');

  $return      	  				= (object) array();
  $return->error  				= false;
  $return->hasHeroContent = true;

  $return->promotext 	= '
  	<h3>Design für deine Heimtextilien</h3>
    <p>
      <strong>Dekoration</strong> ist pure Leidenschaft und verlangt ein Gespür für die schönen Dinge im Leben. <strong>Individuelle Akzente</strong> im Wohnraum setzen, <strong>kreative Farbspiele</strong> in den Alltag integrieren und dabei gekonnt den <strong>eigenen Stil</strong> unterstreichen:
    </p>
    <p>
      <em>Das kannst Du alles mit Hilfe unserer Dekostoffe realisieren.</em>
    </p>
  ';

  echo json_encode($return);