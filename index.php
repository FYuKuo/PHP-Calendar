<html>
<title>萬年曆作業</title>

<!-- goole字體引入 -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,700&display=swap" rel="stylesheet">
<!-- goole字體引入結束 -->

<!-- css檔案引入 -->
<link rel="stylesheet" href="./style.css">

<body>
  <h1>FY萬年曆</h1>
  <?php
  /*請在這裹撰寫你的萬年曆程式碼*/

  //判斷網址內是否有參數,有的話讓month,year去抓取資料,沒有的話就是目前月份和年
  if (isset($_GET['year']) && isset($_GET['month'])) {
    $year = $_GET['year'];
    $month = $_GET['month'];
  } elseif (isset($_GET['month']) && !isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = date('Y');
  } elseif (isset($_GET['year']) && !isset($_GET['month'])) {
    $year = $_GET['year'];
    $month = date('m');
  } else {
    $month = date('m');
    $year = date('Y');
  }

  //上一年和下一年的變數設定
  $lastYear = $year - 1;
  $nextYear = $year + 1;

  $firstDay = $year . "-" . $month . "-1"; //月份第一天
  $firstDaySecond = strtotime($firstDay); //月份第一天轉秒
  $monthDay = date('t', $firstDaySecond); //月份天數
  $lastDay = $year . "-" . $month . "-" . $monthDay; //月份最後一天
  $lastDaySecond = strtotime($lastDay); //月份最後一天轉秒
  $firstDayWeek = date('w', $firstDaySecond); //第一天星期幾
  $lasttDayWeek = date('w', $lastDaySecond); //最後一天星期幾
  $monthFont = date('F', $firstDaySecond); //月份英文

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

  //所有月份的英文陣列,並設定索引從1開始
  $allMonth = ['1' => 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

  //今天
  $today = date('Y-m-d');
  $todayWeek = date('l', strtotime($today)); //今天星期幾
  $todayFont = date('d', strtotime($today)); //今天的日
  ?>

  <!-- 整個月曆外框 -->
  <div class="calendar">

    <!-- 月曆的左半邊 -->
    <div class="left">

      <!-- 左半邊的上半部 -->
      <div class="left_header">
        <div class="left_header_bn" onclick="myFn()">
          ⨁ 新增
        </div>
      </div>
      <!-- 左半邊的中間 -->
      <div class="left_content">

        <!-- 左半邊顯示日期的區塊 -->
        <div class="con_date" id="con_date_id">
          <?= $todayFont ?>
        </div>


        <!-- 左半邊顯示星期的區塊 -->
        <div class="con_week" id="con_week_id">
          <?= $todayWeek ?>
        </div>

      </div>
      <!-- 左半邊的下半部 -->
      <div class="left_note">

      </div>
    </div>

    <!-- 月曆的右半邊 -->
    <div class="right">

      <!-- 格子區 -->
      <div class="table">

        <!-- 格子區的最上面 選擇年分 -->
        <div class="header_year">

          <!-- 前一年 -->
          <div class="year-page">
            <a href="./index.php?year=<?= $lastYear ?>&month=<?= $month ?>">◀</a>
          </div>

          <!-- 今年 -->
          <div class="year" id="yearNow">
            <?= $year ?>
          </div>

          <!-- 下一年 -->
          <div class="year-page">
            <a href="./index.php?year=<?= $nextYear ?>&month=<?= $month ?>">▶</a>
          </div>
        </div>

        <!-- 格子區選擇月份 -->
        <div class="header_month">
          <?php

          //印出所有月份的英文
          foreach ($allMonth as $monthNumbr => $months) {

            //檢查是不是參數目前月份 是的話就在div放上class改顏色
            $checkmonth = "";
            if ($monthFont == $months) {
              $checkmonth = "thisMonth";
            }

            echo "<div><a class='$checkmonth' href='./index.php?year=$year&month=$monthNumbr'>{$months}</a></div>";
          }
          ?>
        </div>

        <!-- 格子區的星期 -->
        <div class="weekDay">
          <div class="weekend">SUN</div>
          <div class="workDay">MON</div>
          <div class="workDay">TUE</div>
          <div class="workDay">WED</div>
          <div class="workDay">THU</div>
          <div class="workDay">FRI</div>
          <div class="weekend">SAT</div>
        </div>

        <!-- 日期區 -->
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
  </div>

  <div class="noteFormBG">
    <div class="noteFormFlex">
      <div class="noteForm">
        <div class="noteClose" onclick="myClose()">
          ⨂
        </div>
        <div class="noteFormHd">
          新增待辦事項
        </div>
        <form action="./index.php" method="post">
          <div class="formText">
            <input type="text" name="note" id="noteTitle" placeholder="標題" require>
            <input type="text" name="note" id="noteText" placeholder="備註" require>
          </div>
          <input type="time" name="noteTime" id="noteTime">
          <button type="submit">儲存</button>
        </form>
      </div>
    </div>
  </div>

  <script src="./date.js"></script>

</body>
<html>