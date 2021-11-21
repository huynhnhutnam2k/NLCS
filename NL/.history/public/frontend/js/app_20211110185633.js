const minus = document.querySelector('.btn-prev')
const plus = document.querySelector('.btn-next')
const count = document.querySelector('.clothes-content-counter')
if(count && minus && plus){

    let value = parseInt(count.textContent)
    minus.addEventListener('click',function(){
        if(value <= 0) return 0
        value--;
        count.textContent = value;
    })
    plus.addEventListener('click', function(){
        value ++;
        count.textContent = value
    })
}


/**-------------- accordion-----------------*/


const accordionHeader = document.querySelectorAll('.clothes-content-accordion-header')
const accordionContent = document.querySelectorAll('.clothes-content-accordion-content')

accordionHeader.forEach(item => item.addEventListener('click',handleClickAccordion));

function handleClickAccordion(e){
    console.log(e.target.nextElementSibling)
    const content = e.target.nextElementSibling;
    content.classList.toggle('is-active')
    content.style.height = `${content.scrollHeight}px`
    if(!content.classList.contains('is-active')){
        content.style.height = "0px"
    }
    const icon = document.querySelector('.icon')
    icon.classList.toggle('bx-chevron-up')
    icon.classList.toggle('bx-chevron-down')
}

//cart 


const accordionHeaderCart = document.querySelectorAll('.accordion-header')
const accordionContentCart = document.querySelectorAll('.accordion-content')


accordionHeaderCart.forEach(item => item.addEventListener('click', function () {
    console.log('yes')
}))

function handleClickAccordionCart(e){
    const contentCart = e.target.nextElementSibling;
//   console.log(content.scrollHeight);
  contentCart.style.height = `${contentCart.scrollHeight}px`;
  contentCart.classList.toggle('is-active');
  if (!contentCart.classList.contains("is-active")) {
    contentCart.style.height = "0px";
  }
}



// alert
const input = document.querySelector('.form-input')
input.addEventListener('input', function (e) {
    const value = e.target.value
    console.log(value)
})
// const template = `<div class="sweet-alert">
// <div class="sweet-icon"></div>
// <div class="sweet-text">Add product success</div>
// </div>`