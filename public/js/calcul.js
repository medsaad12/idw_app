window.onload = ()=>{
  const firstDayOfMonth = 
    new Date(document.querySelector('.dyear').value, document.querySelector('.dmonth').value - 1, 1);
  document.querySelector('.fmonth').value = firstDayOfMonth.toISOString().slice(0, 10)
  document.querySelector('.prime small').innerHTML = document.querySelector('.over').innerHTML * 200
  document.querySelector('input[name="prime"]').value = document.querySelector('.over').innerHTML * 200
}

function calc_sal(){
  if(document.querySelector('.prod').value == 'prod') {
    document.querySelector('.sal').innerHTML = 
      Math.round((document.querySelector('.input_salaire').value*document.querySelector('.nbr').value)/26)+1
    document.querySelector('.salf').value = document.querySelector('.sal').innerHTML
  }
  else{
    document.querySelector('.sal').innerHTML = 
      Math.round((document.querySelector('.input_salaire').value*document.querySelector('.nbr').value)/30)+1
    document.querySelector('.salf').value = document.querySelector('.sal').innerHTML
  }
}

function save(){  
  console.log(document.querySelector('.fmonth').value)
}