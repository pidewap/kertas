<?php
$xml = simplexml_load_file('http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=10/xml');
foreach ($xml->entry as $val):
echo '<a href="'.$val->id.'" title="'.$val->title.'"><img src="'.$val->im:image[2].'" alt="'.$val->title.'"></a>';
endforeach;
?>
