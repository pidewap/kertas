<?php
include './index.php';
$YouTube=new YouTube;
if(file_exists('./cache/trending.json')){
$time=filemtime('./cache/trending.json')+60*60;
if($time<time()){
$trending=$YouTube->trending();
file_put_contents('./cache/trending.json',$trending);
}else{
$trending=file_get_contents('./cache/trending.json');
}
}else{
$trending=$YouTube->trending();
file_put_contents('./cache/trending.json',$trending);
}
$json=json_decode($trending);
echo '<textarea>{% set nav = {
';
foreach($json as $item){
$img=$item->img;
$title=$item->title;
$artist=$item->artist;
$artist=str_replace('"','`',$artist);
$title=str_replace('"','`',$title);
$n=rand(0,100000);
echo ''.$n.': {title: "'.$title.'", artist: "'.$artist.'", img: "'.$img.'"},
';
}
echo '
} %}</textarea>';
?>
