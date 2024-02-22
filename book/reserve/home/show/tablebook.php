<?php
$objTime = new SetTimeObject;
echo '<table align="center" border="1" width="1280">';
foreach($cal as $row){
echo '<tr>';
echo '<td class="cal">'.$row['calname'].'</td>';
echo '<td>
<div class="td_time"><div>'. implode("</div><div>", $timeArr) .'</div><div style="clear:both"></div></div>
<div id="snaptarget" class="ui-widget-header">';
if(isset($booking[$row['calid']])){
$objTime->leftMin = 0;
foreach($booking[$row['calid']] as $bookData){
$arr = $objTime->getWidthPos($bookData['start_time'], $bookData['end_time']);
$left = $arr['left'];
$width = $arr['width'];
$objTime->leftMin += $arr['width'];
echo '<div class="draggable2" style="left: '.$left.'px;width: '.$width.'px">
'.$bookData['topic'].'
</div>';
}
}
echo '    </div>
</td>';
echo '</tr>';
}
echo ' </table>';
?>