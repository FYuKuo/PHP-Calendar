var formBn = document.getElementById('formBn');
var noteFormBG = document.getElementsByClassName('noteFormBG');
var noteClose = document.getElementsByClassName('noteClose');
function myFn(){
    noteFormBG[0].style.display="block";

}

function myClose(){
    noteFormBG[0].style.display="none";

}

formBn.addEventListener('click',function(){
    noteFormBG[0].style.display="none";

})