<?php
$string = file_get_contents('http://ax.itunes.apple.com/WebObjects/MZStoreServices.woa/ws/RSS/topsongs/limit=10/xml');

// Remove the colon ":" in the <xxx:yyy> to be <xxxyyy>
$string = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $string);

if ($f = @fopen($cache_file, 'w')) {
    fwrite ($f, $string, strlen($string));
    fclose($f);
    }
}
$xml = simplexml_load_string($string);

// Output
$rssresults = '';
$count = 1;
$max = 11;

foreach ($xml->entry as $val) {
    if ($count < $max) {

    $rssresults .= '
        <a href="'.$val->id.'" title="'.$val->title.'"><img src="'.$val->imimage[2].'" alt="'.$val->title.'"></a>

        // .m4a preview url?
        <div><a href="'.$val->link[1]['href'].'">Preview</div>

        <div><strong>'.$count.'. <a href="'.$val->id.'" title="'.$val->title.'">'.$val->title.'</a></strong></div>
        <div> from '.$val->imcollection->imname.'</div>;
    }
    $count++;
}
?>
