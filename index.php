<html>
  <title>萬年曆作業</title>
  <style>
   /*請在這裹撰寫你的CSS*/ 
  * {
    box-sizing: border-box;

  }

  .table {
    width: 700px;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    margin: 10px auto;
  }

  .table>div {
    width: 100px;
    height: 100px;
    border: 1px solid lightgray;
    margin-left: -1px;
    margin-top: -1px;
  }
   

  </style>
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

$allDay=[]; //要放所有天數的空陣列
for($i=0 ; $i<$monthDay ; $i++) {
  $date=date('Y-m-d',strtotime("+$i days",$firstDaySecond));
  $allDay[]=$date;
}

// echo "<pre>";
// print_r($allDay);
// echo "</pre>";


echo "<div class='table'>";

foreach($allDay as $day) {
  echo "<div>{$day}</div>";
}

echo "</div>";



  
?>
  
</body>
<html>
