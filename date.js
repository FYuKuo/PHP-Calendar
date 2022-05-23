//取得每一個日期區塊
var dateBG = document.getElementsByClassName("dateBG");

var weekDay = ["SUN","MON","TUE","WED","THU","FRI","SAT"];

//月份陣列用來比對抓到的月曆當前月份
var month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
//取得今年的欄位
var dateYear = Number(document.getElementById('yearNow').textContent);
//取得本月的欄位
var dateMonth = document.getElementsByClassName('thisMonth')[0].textContent;
//跟陣列比較有沒有這個值
var dateMonthFont = Number((month.indexOf(dateMonth)));

//迴圈把每個按鈕都放上點擊
for(var i = 0; i < dateBG.length ; i++){
    // dateBG[i].addEventListener('click',myDateFn);

    //迴圈的索引是i
    dateBG[i].index= i;

    //點擊到的那個元件執行function
    dateBG[i].onclick = function(){
        //點擊到的元件的索引
        var j = this.index;
        
        //取得點擊到的元件
        var dateAllDay = document.getElementsByClassName('dateBG')[j];

        //按下去的日期格式
        var dateDay = Number((dateAllDay.textContent));
        var clickDay = new Date(dateYear,dateMonthFont,dateDay);
        
        //取得左邊欄位的日期和星期的欄位
        var con_date_id = document.getElementById('con_date_id');
        var con_week_id = document.getElementById('con_week_id');

        //印出日期
        con_date_id.innerHTML = clickDay.getDate();
        con_week_id.innerHTML = weekDay[clickDay.getDay()];

    }
}



