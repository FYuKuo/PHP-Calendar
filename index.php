<html>
  <title>萬年曆作業</title>
  <style>
   /*請在這裹撰寫你的CSS*/ 
  * {
    box-sizing: border-box;
    overflow: hidden;
  }

  .calendar {
    width: 1400px;
    height: 800px;
    display: flex;
    justify-content: center;
    margin: 0 auto;
    background: url(https://cdn.pixabay.com/photo/2020/07/20/08/04/beach-5422214_960_720.jpg) no-repeat;
    background-size: cover;
    background-position: top;
    border-radius: 25px;
    box-shadow: 5px 5px 30px lightgray;
  }

  .left {
    width: 300px;
    /* border: 1px solid lightgray; */
    background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);
    opacity: 0.3;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .todayFont {
    font-size: 72px;
    margin: 5px auto;
    color: white;
  }

  .todayWeek {
    font-size: 24px;
    margin: 5px auto;
    color: white;
  }

  .right {
    width: 100px;
    /* border: 1px solid lightgray; */
    background-image: linear-gradient(to top, #4481eb 0%, #04befe 100%);
    opacity: 0.3;
    
  }

  .center {
    /* background-image: linear-gradient(to top, #fdcbf1 0%, #fdcbf1 1%, #e6dee9 100%); */
    width: 1000px;
    display: flex;
    align-items: center;
    justify-content: center;

  }

  .table {
    width: 700px;
    display: flex;
    flex-wrap: wrap;
    /* align-items: flex-start; */
    text-align: center;
    margin-top: 1px;
  }

  .table>div {
    width: 100px;
    height: 100px;
    /* border: 1px solid lightgray; */
    margin-left: -1px;
    margin-top: -1px;
    line-height: 100px;
  }

  .table>.table_month {
    width: 100%;
    height: 50px;
    line-height: 50px;
    font-size: 32px;
    margin: 10px auto;
  }

  .table>.table_hd {
    height: 50px;
    line-height: 50px;
  }
  
  .today {
    color: red;
    text-decoration: underline;
    text-underline-offset: 5px;
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
$monthFont=date('F',$firstDaySecond); //月份英文

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
