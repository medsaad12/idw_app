var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
let option_num = 1
let qst_num = 1

function submitForm(){
  let form = {}
  let qsts = []
  let questions = document.querySelectorAll('.champ')
  let form_name = document.querySelector('.form_name').value

  questions.forEach(qst => {
    let question_name = qst.querySelector('.question').value
    let question_type = qst.querySelector('select[name="inp_type"]').value
    let question = {}

    question.question_name = question_name.split(" ").join("_")
    question.question_type = question_type

    if(question_type=="radio" || question_type=="checkbox"){
      let option_list = []
      let options = qst.querySelectorAll('.option_label')
      options.forEach(opt =>{
        option_list.push(opt.value)
      })
      question.options = option_list
    }

    qsts.push(question)
  })
  form.form_name = form_name
  form.questions = qsts
  console.log(JSON.stringify(form))
  
  var myInput = document.getElementById('data');
  myInput.value = JSON.stringify(form)
  document.querySelector('.form_head').submit()
}

function del_qst(that){
  that.parentNode.remove()
}

function del_opt(that){
  that.parentNode.remove()
}

function add_question(){
  let form = document.querySelector('.create_form')
  let question = document.createElement('div')
  question.setAttribute('id', qst_num)
  question.classList.add('champ')
  question.innerHTML += `
    <img src="../svgs/trash.svg" class="del_qst icons" onclick=del_qst(this)>
    <div class="head">
      <input type="text" class="question" placeholder="Question:">
      <div class="form_config">
        <select name="inp_type" class="form-control" onchange=change_type(this)>
          <option value="text">Réponse Texte</option>
          <option value="number">Réponse Nombre</option>
          <option value="checkbox">Choix Multiple </option>
          <option value="radio">Choix Unique</option>
        </select>
      </div>
    </div>
    <div class="radio_check">
      <div class="options"></div>
      <input type="button" class="add_opt" value="Ajouter option" onclick=add_option(this)>
    </div>
  `
  form.appendChild(question)
  qst_num += 1
}

function change_type(that){
  let selectedValue = that.options[that.selectedIndex].value;

  if(selectedValue=="text" || selectedValue=="number"){
    that.parentNode.parentNode.parentNode.lastElementChild.firstElementChild.innerHTML = ""
    that.parentNode.parentNode.parentNode.querySelector('.add_opt').style.display = "none"
  }
  if(selectedValue=="radio"){
    option_num = 1
    let option = document.createElement('div')
    option.classList.add('option')
    let a = document.createElement('span')
    a.innerHTML = "Option " + option_num + ":   "
    let label = document.createElement('input')
    label.classList.add('option_label')
    icon = `
      <img src="../svgs/trash.svg" class="del_opt icons" id="${option_num}" onclick=del_opt(this) ">
    `
    option.appendChild(a)
    option.appendChild(label)
    option.innerHTML += icon
    that.parentNode.parentNode.parentNode.lastElementChild.firstElementChild.innerHTML = ""
    that.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.style.display = "block"
    that.parentNode.parentNode.parentNode.lastElementChild.firstElementChild.appendChild(option)
    that.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.id = "radio"
  }
  if(selectedValue=="checkbox"){
    option_num = 1
    let option = document.createElement('div')
    option.classList.add('option')
    let a = document.createElement('span')
    a.innerHTML = "Option " + option_num + ":   "
    let label = document.createElement('input')
    label.classList.add('option_label')
    let icon = document.createElement('img')
    icon = `
      <img src="../svgs/trash.svg" class="del_opt icons" id="${option_num}" onclick=del_opt(this) ">
    `
    option.appendChild(a)
    option.appendChild(label)
    option.innerHTML += icon
    that.parentNode.parentNode.parentNode.lastElementChild.firstElementChild.innerHTML = ""
    that.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.style.display = "block"
    that.parentNode.parentNode.parentNode.lastElementChild.firstElementChild.appendChild(option)
    that.parentNode.parentNode.parentNode.lastElementChild.lastElementChild.id = "checkbox"
  }
}

function add_option(that){
  let option = document.createElement('div')
  option.classList.add('option')
  let a = document.createElement('span')
  option_num += 1
  a.innerHTML = "Option " + option_num + ":   "
  let label = document.createElement('input')
  label.classList.add('option_label')
  let icon = document.createElement('img')
  icon = `
    <img src="../svgs/trash.svg" class="del_opt icons" id="${option_num}" onclick=del_opt(this)>
  `
  option.appendChild(a)
  option.appendChild(label)
  option.innerHTML += icon

  if(that.id == "radio") a.type="radio"
  if(that.id == "checkbox") a.type="checkbox"

  that.parentNode.firstElementChild.appendChild(option)
}