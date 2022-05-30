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
$monthFont = date('M', $firstDaySecond); //月份英文

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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>萬年曆作業</title>
  <!-- goole字體引入 -->
  <!-- 英文字體 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@1,700&display=swap" rel="stylesheet">

  <!-- 思源黑體 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;700&display=swap" rel="stylesheet">

  <!-- 日期數字字體 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
  <!-- goole字體引入結束 -->

  <!-- font awesome 引入 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- font awesome 引入結束 -->

  <?php
  if (isset($_POST['theme'])) {
    $theme = $_POST['theme'];
  }

  ?>
  <!-- css檔案引入 -->
  <link rel="stylesheet" href="./style.css">
  <style>
    @media (max-width:576px) {
      .con_date::before {
        content: "<?= $monthFont ?> ";
      }
    }
  </style>
</head>

<body>
  <!-- 上選單 -->
  <div class="nav">

    <div class="nav_logo">
      <a href="./index.php">
        <img src="./images/logo2.png" alt="logo">
        <!-- <span style="color: #f4acab;">F</span><span style="color: #ffbd91;">Y</span><span style="color: #fff27b;">'s</span> <span style="color: #83e3b5;">C</span><span style="color: #c2eaff;">a</span><span style="color: #83ddfe;">l</span><span style="color: #a093d7;">e</span><span style="color: #f4acab;">n</span><span style="color: #ffbd91;">d</span><span style="color: #fff27b;">a</span><span style="color: #83e3b5;">r</span> -->
      </a>
    </div>

    <div class="nav_right">

      <div class="nav_search">
        <form action="./index.php" method="$_GET" id="form_search">
          <div class="form_bg"></div>
          <div class="form_input">
            <input type="text" name="year" id="nav_year" placeholder="西元年" required>
            <input type="text" name="month" id="nav_month" placeholder="月份" required>
          </div>
          <button type="submit" id="nav_bn"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
      </div>

      <div class="nav_right_humBar_items_bg"></div>

      <div class="nav_right_humBar_items">
        
        <div class="nav_theme">
  
          <select name="theme" id="themeSelect">
            <option value="colorful">繽紛嘉年華</option>
            <option value="BandW">黑白新世界</option>
            <option value="animal">動物遊樂園</option>
          </select>
  
        </div>
  
        <div class="nav_today">
          <a href="./index.php" title="回到今天">TODAY</a>
        </div>

      </div>
      
      <div class="nav_hamBar">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>

  </div>

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
        <!-- 待辦區標題 -->
        <div class="left_note_hd">
          待辦事項
        </div>

        <!-- 待辦區整個框 -->
        <div class="left_note_content">

          <!-- 代辦區的群組 -->
          <!-- <div class="left_note_list">

            <div class="left_note_choose">
              <div class="left_note_check">
              </div>
              <div class="left_note_del">
                ⨂
              </div>
            </div>
            <div class="left_note_group"> 

              <div class="left_note_title_group">
                <div class="left_note_title">
                  買菜
                </div>
                <div class="left_note_time">
                  12:50
                </div>
              </div>
              <div class="left_note_text">
                青椒,洋蔥,奇異果
              </div>

            </div>
          </div> -->
          <!-- 代辦區的群組 -->

        </div>
      </div>
    </div>
    <!-- 月曆的左半邊結束 -->

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
  <!-- 月曆的右半邊結束 -->

  <!-- 頁尾區 -->
  <div class="footer">
    &copy; <?= date('Y') ?> FY
  </div>
  <!-- 頁尾區結束 -->

  <!-- 新增待辦清單區 先隱藏起來 -->
  <div class="noteFormBG">
    <div class="noteAddBG">
    </div>
    <div class="noteFormFlex">
      <div class="noteForm">
        <div class="noteClose" onclick="myClose()">
          ⨂
        </div>
        <div class="noteFormHd">
          新增待辦事項
        </div>
        <form action="./index.php" method="post" id="myFrom">
          <div class="formText">
            <input type="text" name="noteTitle" id="noteTitle" placeholder="標題" required>
            <textarea name="noteText" id="noteText" cols="30" rows="10" placeholder="備註"></textarea>
          </div>
          <input type="time" name="noteTime" id="noteTime" value="00:00">
          <button type="submit" id="formBn">儲存</button>
        </form>
      </div>
    </div>
  </div>
  <!-- 新增待辦清單區結束 先隱藏起來 -->

  <!-- 點日期的js -->
  <script src="./js/date.js"></script>

  <!-- 打開新增待辦清單的js -->
  <script src="./js/noteForm.js"></script>

  <!-- 加入&刪除待辦清單的js -->
  <script src="./js/noteAdd.js"></script>

  <!-- 搜尋按鈕的js -->
  <script src="./js/searchForm.js"></script>

  <!-- 側邊選單的js -->
  <script src="./js/nav.js"></script>

  <!-- 關閉重新提交表單 -->
  <script>
    window.history.replaceState(null, null, window.location.href);
  </script>


</body>
<html>