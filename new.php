<?php
$xml = simplexml_load_file('http://api.flickr.com/services/feeds/photoset.gne?set=72157627229375826&nsid=73845487@N00&lang=en-us');
$xml = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
foreach ($xml->entry as $val):
echo '<a href="'.$val->id.'" title="'.$val->title.'"><img src="'.$val->imimage[2].'" alt="'.$val->title.'"></a>

        
        <div><a href="">Preview</div>

        <div><strong><a href="'.$val->id.'" title="'.$val->title.'">'.$val->title.'</a></strong></div>
        <div> from '.$val->imcollection->imname.'';
endforeach;
?>
