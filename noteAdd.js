(function(){
    //取得表單元件
    var myFrom = document.getElementById('myFrom');
    //取得表單的標題欄位
    var noteTitle = document.getElementById('noteTitle');
    //取得表單的備註欄位
    var noteText = document.getElementById('noteText');
    //取得表單的時間欄位
    var noteTime = document.getElementById('noteTime');

    //待辦清單欄位
    var left_note_content = document.getElementsByClassName('left_note_content');

    //待辦清單用json格式取得localStorage todolist 剛開始沒有資料 所以也建立一個框的陣列[]
    var todoList = JSON.parse(localStorage.getItem('todoList')) || [] ;

    function updateList(items) {
        str = '';
        var len = items.length;
        
        for(var i =0; len > i; i++){
          str += 
        `<div class="left_note_list">

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
              ${todoList[i].title}
              </div>
              <div class="left_note_time">
              ${todoList[i].time}
              </div>
            </div>
            <div class="left_note_text">
            ${todoList[i].text}
            </div>

          </div>
        </div>
            `;
        }
        left_note_content[0].innerHTML = str;
      };


    updateList(todoList);
    
    
    //from表單建立一個監聽 按下送出時 執行function
    myFrom.addEventListener('submit',function (event) {
    //不要讓表單送出去
    event.preventDefault();


    //取的input的值
    var noteTitleinput = noteTitle.value;
    var noteTextinput = noteText.value;
    var noteTimeinput = noteTime.value;

    //待辦清單的物件
    function newList () {
        return {
            title: `${noteTitleinput}`,
            text: `${noteTextinput}`,
            time: `${noteTimeinput}`,
            }
    }

    todoForm= newList();

    //放回todolist的陣列
    todoList.push(todoForm);
    
    //轉為JSON格式放進localStorage
    localStorage.setItem('todoList', JSON.stringify(todoList));
        
    //執行displayWish的function 
    updateList(todoList);


    //清掉input的值
    noteTitleinput.value = '';
    noteTextinput.value = '';
    noteTimeinput.value = '';
    })

    //取得叉叉的元件
var left_note_del = document.getElementsByClassName('left_note_del');

//取得整個todolist和叉叉的元件
var left_note_list = document.getElementsByClassName('left_note_list');



for(var i = 0; i < left_note_del.length ; i++){
    left_note_del[i].index= i;

    left_note_del[i].onclick = function(e){
    console.log(e.target.nodeName);

    var listnum = e.target.dataset.listnum;  //定義選到的待辦事項

    todoList.splice(listnum, 1); 

    // left_note_list[numThis].remove();

    localStorage.setItem('todoList', JSON.stringify(todoList));
    // }


}
}

    
})()