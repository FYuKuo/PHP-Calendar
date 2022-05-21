//取得叉叉的元件
var left_note_del = document.getElementsByClassName('left_note_del');
//取得todolist的元件
var left_note_group = document.getElementsByClassName('left_note_group');
//取得整個todolist和叉叉的元件
var left_note_list = document.getElementsByClassName('left_note_list');

for(var i = 0; i < left_note_del.length ; i++){
    left_note_list[i].index= i;

    //滑到的那個元件執行function
    left_note_list[i].onmouseover = function(){
    //滑到的元件的索引
    var j = this.index;
            
    //取得目前滑到的元件 改變寬度
    var note_group = left_note_group[j];
    note_group.style.width= "90%";
    
    //取得目前滑到的元件 顯示叉叉
    var note_del = left_note_del[j];
    note_del.style.display="block";
    }

    left_note_list[i].onmouseout = function(){
    //滑到的元件的索引
    var j = this.index;
            
    //取得目前滑到的元件 改變寬度
    var note_group = left_note_group[j];
    note_group.style.width= "95%";
    
    //取得目前滑到的元件 顯示叉叉
    var note_del = left_note_del[j];
    note_del.style.display="none";
    }

    left_note_del[i].onclick = function(e){
    //滑到的元件的索引
    // var j = this.index;
    var del = e.target.parentElement;
    del.remove();

    }


}