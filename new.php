<?php
$itunes_xml = file_get_contents('https://itunes.apple.com/gb/rss/topsongs/limit=10/explicit=true/xml');
  $itunes_xml = preg_replace("/(</?)(w+)[^>]*>)/", "$1$2$3", $itunes_xml);
  $itunes_xml = simplexml_load_string($itunes_xml);
  foreach ($itunes_xml->entry as $entry) {    
  echo $entry->imprice['amount'];
  }

?>
