function autreChose(){
    var checkbox = document.getElementById('roles')
    checkbox.style.display = "none"
    var input = document.createElement('input')
    var parent = document.getElementsByClassName('form_two')[0];
    var div = document.getElementsByClassName('roles')[0];
    div.firstElementChild.style.display = "none"
    input.name = "etat"
    input.type = "text"
    input.id = "etat"
    input.placeholder = "Etat"
    parent.appendChild(input)
}
function checkbox(){
    var checkbox = document.getElementById('roles')
    checkbox.style.display = "block"
    var input = document.getElementById('etat')
    input.style.display = "none"
}