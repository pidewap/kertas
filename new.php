<?php
$itunes_feed = file_get_contents('https://itunes.apple.com/gb/rss/topsongs/limit=10/explicit=true/xml');
$itunes_feed = preg_replace('/(</?)(w+)[^>]*>)/', '$1$2$3', $itunes_feed);
$itunes_xml = new SimpleXMLElement($itunes_feed);
$itunes_entry = $itunes_xml->entry;
foreach($itunes_entry as $entry){	     
  $entry_id['im'] = $entry->id->attributes('im', TRUE);    
  echo $entry_id['im']['id'];
}
?>
