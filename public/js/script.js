
jQuery(function($){
    $(".js-accordion-title").on("click",function(){
        $(this).next().slideToggle(300);
        $(this).toggleClass("open",300);
    }).next().hide();
});

const modal = document.querySelector('.js-modal');
const modalButton = document.querySelector('.js-edit-button');

modalButton.addEventListener('click',() =>{
    modal.classList.add('open');
});
