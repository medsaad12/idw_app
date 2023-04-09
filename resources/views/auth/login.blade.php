<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IDW</title>
  <script>
    function toggle(){
      let mdp = document.querySelector('.mdp')
      let eye = document.querySelector('.toggle')
      if(!mdp.classList.contains('on')){
        mdp.classList.add('on')
        mdp.type = 'text'
        eye.src = "{{ asset('svgs/eye-slash.svg') }}"
      } 
      else{
        mdp.classList.remove('on')
        mdp.type = 'password'
        eye.src = "{{ asset('svgs/eye.svg') }}"
      }
    }
  </script>
</head>
<body>
  <div class="login">
    <h1>Login</h1>
    <form class="login_form" action="{{ route('login') }}" method="post">
      @csrf
      <div class="form">
        <label for="email">Email:</label>
        <input type="email" id="email" class="email" name="email">
      </div>
      <div class="form">
        <label for="mdp">Mot de passe:</label>
        <div class="password">
          <input type="password" name="password" id="mdp" class="mdp">
          <img src="{{ asset('svgs/eye.svg') }}" class="toggle" onclick=toggle()>
        </div>
      </div>
      <input type="submit" value="Login" class="form_submit"/>
    </form>
  </div> 
</body>

<style>
  html{
    height: 100%;
  }
  
  body{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    background-image: url("{{ asset('images/bg_img.png') }}");
    background-size: cover;
    background-color: #D9D9D9;
    background-repeat: no-repeat;
    margin: 0;
  }

  h1{
    margin: 0px 0px 10px 0px;
  }

  .login{
    padding: 20px;
    border-radius: 5px;
    background-color: white;
    display: flex;
    align-items: center;
    flex-direction: column;
    width: 30%;
  }

  .login_form{
    display: flex;
    flex-direction: column;
    width: 100%;
    align-items: center;
  }

  .form{
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    width: 100%;
  }

  .form label{
    padding: 5px 0px 5px 0px;
  }

  .password{
    position: relative;
    width: 100%;
  }

  .toggle{
    font-size: medium;
    padding: 2px;
    position: absolute;
    top: 9px;
    right: 10px;
    z-index: 2;
    cursor: pointer;
  }

  .form input, .password input{
    padding: 10px;
    margin-bottom: 5px;
    border-radius: 5px;
    width: calc(100% - 22px);
    border: 1px solid #463ae7;
  }

  .form_submit{
    width: 60%;
    background-color: #463ae7;
    color:white;
    border-radius: 5px;
    border: 1px solid #463ae7;
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
  } 
</style>
</html>