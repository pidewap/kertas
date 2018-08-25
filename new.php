<?php
    $mypix = simplexml_load_file('http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=100/xml');
    foreach ($mypix->entry as $pixinfo):
        $title=$pixinfo->title;
        $image=$pixinfo->im:image[0];
        echo 'Name: '.$title.'<br><img src="'.$image.'"><br>';
    endforeach;
?>
