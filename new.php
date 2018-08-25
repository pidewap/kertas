<?php
$content=file_get_contents("https://itunes.apple.com/us/rss/topalbums/limit=10/json"); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
foreach( $tracks as $track ) {
$image = $track->{'im:image'}[0]->label;
echo $image . '<br />';
}
?>
