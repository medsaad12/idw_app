function toggle(that){
    let id = that.name.split('-')[0]
    if(that.parentNode.querySelector('input[name="'+ id +'-decharge"]')){
      let input_ret = document.querySelector('input[name="'+ id +'-retard"]')
      input_ret.style.display = 'none'
      document.querySelector('input[name="'+ id +'-decharge"]').style.display = ''
  
    }
    if(that.parentNode.querySelector('input[name="'+ id +'-retard"]')){
      let input_dec = document.querySelector('input[name="'+ id +'-decharge"]')
      input_dec.style.display = 'none'
      document.querySelector('input[name="'+ id +'-retard"]').style.display = ''
    }
  }
  
  function untoggle(that){
    let id = that.name.split('-')[0]
    let input_ret = document.querySelector('input[name="'+ id +'-retard"]')
    let input_dec = document.querySelector('input[name="'+ id +'-decharge"]')
    if(input_ret.style.display == '' || input_dec.style.display == ''){
      input_ret.style.display = 'none'
      input_dec.style.display = 'none'
    }
  }