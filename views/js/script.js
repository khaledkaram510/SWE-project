item = document.querySelector('.done');
if (item.textContent === '1'){
  console.log('done');
  item.textContent='Product Added Successfully';
  item.style.display = 'block';
  setTimeout(function(){
    item.display = 'none';
    console.log('done2');
  }, 5000);
}
