(function(){
    //取得表單送出按鈕的元件
    var formBn = document.getElementById('formBn');
    //取得表單的標題欄位
    var noteTitle = document.getElementById('noteTitle');
    //取得表單的備註欄位
    var noteText = document.getElementById('noteText');
    //取得表單的時間欄位
    var noteTime = document.getElementById('noteTime');

    //願望清單用json格式放入localStorage key值為wishList 剛開始沒有資料 所以也建立一個框的陣列[]
    var todolist = JSON.parse(localStorage.getItem('todolist')) || [] ;

})();