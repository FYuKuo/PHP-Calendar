var nav_right = document.getElementsByClassName('nav_right');
var nav_hamBar = document.getElementsByClassName('nav_hamBar');
var humBar_items = document.getElementsByClassName('nav_right_humBar_items');
var humBar_items_bg = document.getElementsByClassName('nav_right_humBar_items_bg');


nav_hamBar[0].addEventListener('click',function(){

    if(humBar_items[0].style.display == '' || humBar_items[0].style.display == 'none' ){
        // console.log('點到了');
        humBar_items[0].style.display = 'block';
        humBar_items_bg[0].style.display = 'block';
    }else if (humBar_items[0].style.display == 'block'){        
        // console.log('關掉哩');
        humBar_items[0].style.display = 'none';
        humBar_items_bg[0].style.display = 'none';
    }
})

humBar_items_bg[0].addEventListener('click',function(){
    humBar_items[0].style.display = 'none';
    humBar_items_bg[0].style.display = 'none';
})


