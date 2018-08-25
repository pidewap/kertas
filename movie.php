<?php
$content=file_get_contents("http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=100/json"); 
$top_albums=json_decode($content);
$tracks = $top_albums->feed->entry;
echo '<textarea>{% set nav = {
';
foreach( $tracks as $track ) {
$img = $track->{'im:image'}[0]->label;
  $title = $track->{'im:name'}->label;
  $artist = $track->{'im:artist'}->label;
$n=rand(0,100000);
echo ''.$n.': {title: "'.$title.'", artist: "'.$artist.'", img: "'.$img.'"},
';
}
echo '
} %}</textarea>';
?>
