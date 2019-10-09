<?php
  header('Access-Control-Allow-Origin: *');

  $return      	  = (object) array();
  $return->error  = false;
  $return->hero   = true;

  echo json_encode($return);