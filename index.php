<html>
<title>萬年曆作業</title>
<link rel="stylesheet" href="./style.css">


<body>
  <h1>萬年曆</h1>
  <?php
  /*請在這裹撰寫你的萬年曆程式碼*/
  $month = 5; //月份
  $firstDay = date("Y-") . $month . "-1"; //月份第一天
  $firstDaySecond = strtotime($firstDay); //月份第一天轉秒
  $monthDay = date('t', $firstDaySecond); //月份天數
  $lastDay = date('Y-') . $month . "-" . $monthDay; //月份最後一天
  $lastDaySecond = strtotime($lastDay); //月份最後一天轉秒
  $firstDayWeek = date('w', $firstDaySecond); //第一天星期幾
  $lasttDayWeek = date('w', $lastDaySecond); //最後一天星期幾
  $monthFont = date('F', $firstDaySecond); //月份英文
  $yearFont = date('Y', $firstDaySecond); //月份的年

  $allDay = []; //要放所有天數的空陣列

  //月份第一天前的空日期
  for ($i = 0; $i < $firstDayWeek; $i++) {
    $allDay[] = "";
  }

  //月份所有日期
  for ($i = 0; $i < $monthDay; $i++) {
    $date = date('Y-m-d', strtotime("+$i days", $firstDaySecond));
    $allDay[] = $date;
  }

  //月份最後一天後的空日期
  for ($i = 0; $i < 6 - $lasttDayWeek; $i++) {
    $allDay[] = "";
  }

  // echo "<pre>";
  // print_r($allDay);
  // echo "</pre>";
  $today = date('Y-m-d');
  $todayWeek = date('l', strtotime($today));
  $todayFont = date('d', strtotime($today));
  ?>

  <!-- 整個月曆外框 -->
  <div class="calendar">

    <!-- 月曆的左半邊 -->
    <div class="left">

      <!-- 左半邊的上半部 -->
      <div class="left_header">

      </div>
      <!-- 左半邊的中間 -->
      <div class="left_content">

        <div class="con_date" id="con_date_id">
          <?= $todayFont ?>
        </div>


        <div class="con_week" id="con_week_id">
          <?= $todayWeek ?>
        </div>

      </div>
      <!-- 左半邊的下半部 -->
      <div class="left_note">

      </div>
    </div>


    <!-- 日期格子區 -->
    <div class="table">

      <div class="weekDay">
        <div class="weekend">SUN</div>
        <div class="workDay">MON</div>
        <div class="workDay">TUE</div>
        <div class="workDay">WED</div>
        <div class="workDay">THU</div>
        <div class="workDay">FRI</div>
        <div class="weekend">SAT</div>
      </div>

      <?php
      //利用foreach迴圈印出所有天數
      foreach ($allDay as $day) {

        //檢查是不是今天
        $checktoday = "";
        if ($day == $today) {
          $checktoday = "today";
        }

        //如果day裡面不是空的就轉換日期格式為'天'
        if (!empty($day)) {

          $dateFont = date('d', strtotime($day));
          echo "<div class='dateTd'><div class='dateBG $checktoday'>{$dateFont}</div></div>";
        } else {
          echo "<div class='dateTd'></div>";
        }
      }
      ?>

    </div>
  </div>

</body>
<html>