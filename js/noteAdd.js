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

    //待辦清單用json格式取得localStorage todolist 剛開始沒有資料 所以也建立一個預設值的陣列[]
    var todoList = JSON.parse(localStorage.getItem('todoList')) || [{
      title: `買菜`,
      text: `小黃瓜,青椒,青江菜,醬油`,
      time: `18:00`,
      }] ;

    //顯示待辦清單的function
    function updateList(items) {
        str = '';
        var len = items.length;
        
        for(var i =0; len > i; i++){
          str += 
        `<div class="left_note_list">

          <div class="left_note_choose">
            <div class="left_note_check">
            </div>
            <div class="left_note_del" data-num=${i}>
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

    //呼叫待辦清單
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
    noteTitle.value = '';
    noteText.value = '';
    })

left_note_content[0].addEventListener('click',function(event){

  //如果點擊到的目標元件是叉叉
  if (event.target.className == 'left_note_del') { 

  //取得叉叉父層的父層也就是list層
  const note_list = event.target.parentElement.parentElement;
  
  //刪除點擊到的note_list
  note_list.remove();

  var num = event.target.dataset.num;  //先在叉叉定義一個屬性為data-num 在抓取選到的num
  //刪掉存在localStorage的值
  todoList.splice(num, 1); 
  localStorage.setItem('todoList', JSON.stringify(todoList));
    }
  //如果點擊到的目標元件是框框 
  else if (event.target.className == 'left_note_check') { 

  //目前點到的框框
  const note_check=event.target;
  //清單區的群組
  const note_group = event.target.parentElement.nextSibling.nextSibling;

  //判斷是不是已經打勾過了
  if(note_group.style.textDecorationLine !== 'line-through'){
    note_group.style.textDecorationLine = 'line-through';
    note_check.style.backgroundImage = "url(./images/check.png)";
    note_check.style.backgroundColor = 'pink';
    
    
  }else{
    note_group.style.textDecorationLine = 'none';
    note_check.style.backgroundImage = "";
    note_check.style.backgroundColor = 'white';
  }
  }


  
})


    
})()