<?php
    $mypix = simplexml_load_file('http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=100/xml');
$mypix = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $mypix);
    foreach ($mypix->entry as $pixinfo):
        $title=$pixinfo->title;
        $image=$pixinfo->imimage[2];
        echo 'Name: '.$title.'<br><img src="'.$image.'"><br>';
    endforeach;
?>
