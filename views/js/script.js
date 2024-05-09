let item = document.querySelector('.done');
let myNewPathname = "http://localhost/SWE-project/views/admin/index.php";
if (item.textContent === '1'){
  // console.log('done');
  item.textContent='Product Added Successfully';
  item.style.display = 'block';
  setTimeout(function(){
    item.style.display = 'none';
    window.location.href = myNewPathname;
  }, 5000);
}else if(item.textContent === '2'){
  item.textContent='Product Updated Successfully';
  item.style.display = 'block';
  setTimeout(function(){
    item.style.display = 'none'; 
    window.location.href = myNewPathname;
    // console.log('done2');
  }, 5000);
}
