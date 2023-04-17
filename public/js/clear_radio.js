function clear_selection(){
  let roles = document.querySelectorAll('input[type="radio"]')
  roles.forEach(a => a.checked = false)
  toggle_perms()
}

function toggle_perms(){
  let perms = document.querySelectorAll('input[type="checkbox"]')
  let roles = document.querySelectorAll('input[type="radio"]')
  let checked = false
  roles.forEach(a=>{
    if(a.checked) checked = true
  })
  if(checked) perms.forEach(a => a.disabled = true)
  else perms.forEach(a => a.disabled = false)
}

function toggle_roles(){
  let perms = document.querySelectorAll('input[type="checkbox"]')
  let roles = document.querySelectorAll('input[type="radio"]')
  let checked = false
  perms.forEach(a => {
    if(a.checked)  checked = true
  })
  if(checked) roles.forEach(a => a.disabled = true)
  else roles.forEach(a => a.disabled = false)
}