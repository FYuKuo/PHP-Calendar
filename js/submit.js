var select = document.getElementsByTagName('select');
var themeForm = document.getElementById('themeForm');

// for(let i = 0 ; i < optionitems.length ; i++){
//     optionitems[i].index= i;

//     optionitems[i].onclick = function(){
//         alert('點到ㄌ');
//     }

// }

select[0].addEventListener('change',function(){
    console.log('點到ㄌ');
    themeForm.submit();
})