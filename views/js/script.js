let item = document.querySelector('.done');
if (item.textContent === '1'){
  // console.log('done');
  item.textContent='Product Added Successfully';
  item.style.display = 'block';
  setTimeout(function(){
    item.style.display = 'none'; // Fix: Replace item.display with item.style.display
    // console.log('done2');
  }, 5000);
}
