var nav_bn = document.querySelector('#nav_bn');
var form_input = document.querySelector('.form_input');

nav_bn.addEventListener('mouseover',function(){
    // alert('點到了')
    // nav_bn.style.color = 'red';
    form_input.style.display = 'block';
})
form_input.addEventListener('mouseover',function(){
    form_input.style.display = 'block';
})
form_input.addEventListener('mouseout',function(){
    form_input.style.display = 'none';
})

// nav_bn.addEventListener('mouseleave',function(){
//     form_input.style.display = 'none';
// })

