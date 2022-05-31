var nav_bn = document.querySelector('#nav_bn');
var form_input = document.querySelector('.form_input');
var form_bg = document.querySelector('.form_bg');

nav_bn.addEventListener('mouseover',function(){
    form_input.style.display = 'block';
    form_bg.style.display = 'block';
})
form_input.addEventListener('mouseover',function(){
    form_input.style.display = 'block';
    form_bg.style.display = 'block';
})
form_input.addEventListener('mouseout',function(){
    form_input.style.display = 'none';
    form_bg.style.display = 'none';

})

form_bg.addEventListener('click',function(){
    form_input.style.display = 'none';
    form_bg.style.display = 'none';
})


