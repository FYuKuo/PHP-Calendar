<html>
  <title>萬年曆作業</title>
  <link rel="stylesheet" href="./style.css">


<body>
<h1>萬年曆</h1>
<?php
/*請在這裹撰寫你的萬年曆程式碼*/  
$month=5; //月份
$firstDay=date("Y-") . $month . "-1"; //月份第一天
$firstDaySecond=strtotime($firstDay); //月份第一天轉秒
$monthDay=date('t',$firstDaySecond); //月份天數
$lastDay=date('Y-') . $month . "-" . $monthDay; //月份最後一天
$lastDaySecond=strtotime($lastDay); //月份最後一天轉秒
$firstDayWeek=date('w',$firstDaySecond); //第一天星期幾
$lasttDayWeek=date('w',$lastDaySecond); //最後一天星期幾
$monthFont=date('F',$firstDaySecond); //月份英文
$yearFont=date('Y',$firstDaySecond); //月份的年

$allDay=[]; //要放所有天數的空陣列

//月份第一天前的空日期
for($i=0 ; $i<$firstDayWeek; $i++){
  $allDay[]="";
}

//月份所有日期
for($i=0 ; $i<$monthDay ; $i++) {
  $date=date('Y-m-d',strtotime("+$i days",$firstDaySecond));
  $allDay[]=$date;
}

//月份最後一天後的空日期
for($i=0 ; $i<6-$lasttDayWeek ;$i++){
  $allDay[]="";
}

// echo "<pre>";
// print_r($allDay);
// echo "</pre>";
$today=date('Y-m-d');
$todayWeek=date('l',strtotime($today));
$todayFont=date('d',strtotime($today));

echo "<div class='calendar'>";

echo "<div class='left'>";

echo "<div class='todayFont'>" . $todayFont . "</div>";
echo "<div class='todayWeek'>" . $todayWeek . "</div>";

echo "</div>";


echo "<div class='center'>";

echo "<div class='table'>";


echo "<div class='table_year'>" . "$yearFont" ."</div>";

echo "<div class='table_month'>" . "$monthFont" ."</div>";


echo "<div class='table_hd'>" . "SUN" ."</div>";
echo "<div class='table_hd'>" . "MON" ."</div>";
echo "<div class='table_hd'>" . "TUE" ."</div>";
echo "<div class='table_hd'>" . "WED" ."</div>";
echo "<div class='table_hd'>" . "THU" ."</div>";
echo "<div class='table_hd'>" . "FRI" ."</div>";
echo "<div class='table_hd'>" . "SAT" ."</div>";


foreach($allDay as $day) {
  $checktoday="";
  if($day == $today) {
    $checktoday="today";
  }

  if(!empty($day)){

    $dateFont=date('d',strtotime($day));
    echo "<div class='$checktoday'>{$dateFont}</div>";

  }else {
    echo "<div></div>";
  }
}


echo "</div>";


echo "</div>";

echo "<div class='right'>";

echo "test";

echo "</div>";

echo "</div>";



  
?>
  
</body>
<html>
