<?php
  $trustedID      = 'XD79DE42EADA5EA5D1DE8FB75903B7B4F';
  $return         = (object) array();
  $return->error  = false;
  $return->data   = null;
  $return->schema = null;

  try {
    $ch = curl_init();
          curl_setopt($ch, CURLOPT_HEADER, false);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, false);
          curl_setopt($ch, CURLOPT_URL, 'https://api.trustedshops.com/rest/public/v2/shops/'.$trustedID.'/reviews');
          curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',                                                                          
            'Content-Type: application/json'                                                                                
          ));

    $output = curl_exec($ch); curl_close($ch);

    if($jsonObject = json_decode($output,true)) {
      if($jsonObject['response']['code'] == 200) {
        $reviews = array();

        foreach($jsonObject['response']['data']['shop']['reviews'] as $tmp) {
          $review           = (object) array();
          $review->date     = date('d.m.Y',strtotime($tmp['creationDate']));
          $review->mark     = $tmp['mark'];
          $review->max      = '5.00';
          $review->comment  = $tmp['comment'];
          $review->percent  = round((100 / '5.00') * $tmp['mark']);
          
          $threshold        = 1000;

          if(strlen($review->comment) > $threshold) {
            $excerpt   = mb_substr($review->comment,0,($threshold - 4),'UTF-8');
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = mb_substr($review->comment,0,$lastSpace,'UTF-8');

            $review->excerpt = $excerpt.' ...';
          } else {
            $review->excerpt = $review->comment;
          }

          if($review->mark >= 4) {
            $reviews[] = $review;
          }
        }

        if(count($reviews) > 0) {
          if(count($reviews) > 4) {
            $return->data = array_slice($reviews,0,4);
          } else {
            $return->data = $reviews;
          }
        } else {
          throw new Exception('Keine Daten bekommen');
        }
      } else {
        return false;
      }
    } else {
      throw new Exception('Keine Daten bekommen');
    }

    $ch = curl_init();
          curl_setopt($ch, CURLOPT_HEADER, false);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($ch, CURLOPT_POST, false);
          curl_setopt($ch, CURLOPT_URL, 'https://api.trustedshops.com/rest/public/v2/shops/'.$trustedID.'/quality/reviews.json');
    
    $output = curl_exec($ch); curl_close($ch);

    if($jsonObject = json_decode($output,true)) {
      if($jsonObject['response']['code'] == 200) {
        $cache              = (object) array();
        $cache->shop        = $jsonObject['response']['data']['shop']['name'];
        $cache->result      = $jsonObject['response']['data']['shop']['qualityIndicators']['reviewIndicator']['overallMark'];
        $cache->count       = $jsonObject['response']['data'] ['shop']['qualityIndicators']['reviewIndicator']['totalReviewCount'];
        $cache->max         = '5.00';
        $cache->activeCount = $jsonObject['response']['data'] ['shop']['qualityIndicators']['reviewIndicator']['activeReviewCount'];
        $cache->overallMark = $jsonObject['response']['data'] ['shop']['qualityIndicators']['reviewIndicator']['overallMark'];

        $return->schema     = $cache;
        $return->url        = 'https://www.trustedshops.de/bewertung/info_'.$trustedID.'.html';
      } else {
        throw new Exception('Keine Daten bekommen');
      }
    }
  } catch(Exception $e) {
    $return->error    = true;
    $return->message  = $e->getMessage();
  }

  echo json_encode($return);