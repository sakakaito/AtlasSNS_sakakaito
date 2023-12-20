
jQuery(function($){
    $(".js-accordion-title").on("click",function(){
        $(this).next().slideToggle(300);
        $(this).toggleClass("open",300);
    }).next().hide();
});

const modal = document.querySelector('.js-modal');
const modalButton = document.querySelectorAll('.js-edit-button');


modalButton.forEach(function(modalButton){
    modalButton.addEventListener('click',() =>{
        modal.classList.add('open');
        const modalPost = modalButton.dataset.post;
        const modalPostId = modalButton.dataset.id;
        console.log(modalPostId);
        const inputText = document.getElementById('inputText');
        //valueに要素を追加
        inputText.value = modalPost;
        const inputId =document.getElementById('inputId');
        inputId.value = modalPostId;

    });
});
//背景以外を押したら処理を停止
$('.modal_content').on('click',e =>{
    e.stopPropagation();
});

//モーダル領域をクリックでフェードアウトさせる
modal.addEventListener('click',()=>{
    modal.classList.remove('open');
});
// $(function(){
//     $('.js-modal').click(function(){
//         $(this).classList.remove('open');
//     });
// });


// addEventListener('click', outsideClose);
// function outsideClose(e) {
//   if (e.target == modal) {
//     modal.style.display = 'none';
//   }
// }

// const deleteModal = document.querySelector('.js-delete-modal');
// const deleteButton = document.querySelectorAll('.js-delete-button');

// deleteButton.forEach(function(deleteButton){
//     deleteButton.addEventListener('click',() =>{
//         modal.classList.add('open');
//     })
// })
const buttonOpen = document.querySelector('.js-modal-delete');
const deleteModal = document.querySelectorAll('.js-delete-button');
const buttonClose = document.querySelector('.js-del-button-close');

// buttonOpen.addEventListener('click', modalOpen);
// // function modalOpen() {
// //   modal.style.display = 'block';
// // }

//削除のアイコンボタンを押したらjs-modal-deleteを開く
deleteModal.forEach(function(deleteModal){

    deleteModal.addEventListener('click',() =>{
        buttonOpen.classList.add('open');
        const deleteId = deleteModal.dataset.id;
        console.log(deleteId);
        const inputDeleteId = document.getElementById('inputDeleteId');
        inputDeleteId.value = deleteId;
    });
});
//キャンセルボタンを押したらjs-modal-deleteを閉じる
    buttonClose.addEventListener('click',() =>{
        buttonOpen.classList.remove('open');
    });
//背景（js-modal-delete）を押したらjs-modal-deleteを閉じる
    buttonOpen.addEventListener('click',()=>{
        buttonOpen.classList.remove('open');
    });
    //背景以外を押したら処理を停止
$('.modal-delete-content').on('click',e =>{
    e.stopPropagation();
});





