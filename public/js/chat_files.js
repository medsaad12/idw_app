function show_files(that){
  let pre = document.querySelector('.file_preview')
  pre.style.display = 'flex'
  console.log(that.files[0])
  pre.innerHTML = that.files[0].name
  let supp = `<button type="button" onclick='clear_files()'>x</button>`
  pre.innerHTML += supp
}

function clear_files(){
  document.querySelector('.fileeee').value = ""
  document.querySelector('.file_preview').innerHTML = ""
  document.querySelector('.file_preview').style.display = "none"
}