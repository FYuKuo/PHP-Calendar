var nav_right = document.getElementsByClassName('nav_right');

nav_right[0].addEventListener('click',function(event){

    if(event.target.className == 'nav_hamBar'){
        console.log('點到了');

        const humBar_items = event.target.previousSibling;

        humBar_items.style.display = 'block';
    }
})