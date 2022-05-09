<html>
  <title>萬年曆作業</title>
  <style>
   /*請在這裹撰寫你的CSS*/ 
  * {
    box-sizing: border-box;
    
  }

  .calendar {
    display: flex;
    justify-content: center;
  }

  .left {
    width: 300px;
    border: 1px solid lightgray;
  }

  .table {
    width: 700px;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
    text-align: center;
    margin-top: 1px;
  }

  .table>div {
    width: 100px;
    height: 100px;
    border: 1px solid lightgray;
    margin-left: -1px;
    margin-top: -1px;
    line-height: 100px;
  }

  .table>.table_hd {
    height: 50px;
    line-height: 50px;
  }
   

  </style>
<body>
<h1>萬年曆</h1>
<?php
/*請在這裹撰寫你的萬年曆程式碼*/  
$month=6; //月份
$firstDay=date("Y-") . $month . "-1"; //月份第一天
$firstDaySecond=strtotime($firstDay); //月份第一天轉秒
$monthDay=date('t',$firstDaySecond); //月份天數
$lastDay=date('Y-') . $month . "-" . $monthDay; //月份最後一天
$lastDaySecond=strtotime($lastDay); //月份最後一天轉秒
$firstDayWeek=date('w',$firstDaySecond); //第一天星期幾
$lasttDayWeek=date('w',$lastDaySecond); //最後一天星期幾

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

echo "<div class='calendar'>";

echo "<div class='left'>";

echo "test";

echo "</div>";



echo "<div class='table'>";

echo "<div class='table_hd'>" . "SUN" ."</div>";
echo "<div class='table_hd'>" . "MON" ."</div>";
echo "<div class='table_hd'>" . "TUE" ."</div>";
echo "<div class='table_hd'>" . "WED" ."</div>";
echo "<div class='table_hd'>" . "THU" ."</div>";
echo "<div class='table_hd'>" . "FRI" ."</div>";
echo "<div class='table_hd'>" . "SAT" ."</div>";



foreach($allDay as $day) {

  if(!empty($day)){

    $dateFont=date('d',strtotime($day));
    echo "<div>{$dateFont}</div>";

  }else {
    echo "<div></div>";
  }
}

echo "</div>";


echo "</div>";



  
?>
  
</body>
<html>
