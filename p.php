<?php
include './index.php';
$title='Download Video Gratis';
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
echo '<script>document.title="Download Free Music Video Kpop - SatriaMusic";</script><div class="bmenu1" align="center"><h3>Trending Videos</h3></div><div class="list2">';
foreach($json as $item){
$id=$item->id;
$title=$item->title;
$duration=$item->duration;
$channel=$item->channel;
$view=$item->view;
echo '<table width="100%">
  <tbody>
    <tr>
      <td class="mt-a" valign="top">
        <img title="'.$title.'" src="//img.youtube.com/vi/'.$id.'/mqdefault.jpg" width="50" height="50" alt="'.$title.'">
      </td>
      <td align="left" valign="top"> <b> '.$title.'</b>
        <br>Duration : '.$duration.' . View : '.$view.' x
        <br> <span class="laguok"><a class="red2" href="/site_download-video.xhtml?get-v='.$id.'" title="Download '.$title.' VIDEO">Download</a> [<a class="mt-bt" href="http://adserver.adreactor.com/servlet/view/window/url/zone?zid=40&pid=2625" rel="nofollow">FAST DOWNLOAD</a>]</span>
      </td>
    </tr>
  </tbody>
</table>';
}
echo '</div>';

?>
