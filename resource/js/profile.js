//モーダルエリアのid名「modalArea」の取得
const modalArea = document.getElementById('modalArea');
//ボタンのid名「tweet_button」の取得
const modalOpen = document.getElementById('tweet_button');
//モーダル解除ボタンのクラス名「modalClose」の取得。
const modalClose = document.getElementsByClassName('closeModal')[0];//getElements(複数なので配列の添え字必須)

const modalBg = document.getElementsByClassName('modalBg')[0];

//モーダルエリアのid名「modalArea」の取得
const modalArea2 = document.getElementById('modalArea2');
//ボタンのid名「tweet_button」の取得
const modalOpen2 = document.getElementById('edit_text');

const modalBg2 = document.getElementsByClassName('modalBg2')[0];

//モダールエリアを表示させる。
modalOpen.addEventListener('click',() => {
    modalArea.style.display = 'block';
});
//モーダルエリアを消す。
modalClose.addEventListener('click',() => {
    modalArea.style.display = 'none';
})
const modalClose2 = document.getElementsByClassName('closeModal2')[0];//getElements(複数なので配列の添え字必須)

modalBg.addEventListener('click',() => {
    modalArea.style.display = 'none'; 
});


//モダールエリアを表示させる。
modalOpen2.addEventListener('click',() => {
    modalArea2.style.display = 'block';
});
//モーダルエリアを消す。
modalClose2.addEventListener('click',() => {
    modalArea2.style.display = 'none';
})

modalBg2.addEventListener('click',() => {
    modalArea2.style.display = 'none'; 
});