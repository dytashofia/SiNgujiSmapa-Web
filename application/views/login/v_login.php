<!DOCTYPE html>
<html>
<head>
	<title>Login guru</title>
</head>
<style>
	@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');
*:focus {
  outline: none;
}
body{
  
background-color: #43b7bf;
   


	
}


#login-box {
  position: relative;
  margin: 10% auto;
  width: 600px;
  height: 400px;
  background: #FFF;
  border-radius: 2px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
}

.left {
  position: absolute;
  top: 0;
  left: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  background: url('gambar/kiri2.png');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
}


h1 {
  margin: 0 0 20px 0;
  font-weight: 600;
  font-size: 30px;
}

input[type="text"],
input[type="password"],
input[type="tel"]{
  display: block;
  box-sizing: border-box;
  margin-bottom: 20px;
  padding: 7px;
  width: 220px;
  height: 15px;
  border: none;
  background:#cde2f4;
  border-bottom: 1.5px solid #195e83;
  font-family: 'Roboto', sans-serif;

  font-weight: 400;
  font-size: 16px;
  transition: 0.2s ease;
}

input[type="text"]:focus,
input[type="password"]:focus{
  border-bottom: 2px solid #00c4cc;
  color: black;
  transition: 0.2s ease;
}

input[type="submit"] {
  margin-top: -3px;
  width: 120px;
  height: 38px;
  background: #195e83;
  border: none;
  border-radius: 12px;
  color:#ffffff;
  font-family: 'Roboto', sans-serif;
  font-weight: 799;
  text-transform: uppercase;
  transition: 0.1s ease;
  cursor: pointer;
}

input[type="submit"]:hover,
input[type="submit"]:focus {
  opacity: 0.8;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

input[type="submit"]:active {
  opacity: 1;
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.1s ease;
}

.or {
  position: absolute;
  top: 180px;
  left: 280px;
  width: 40px;
  height: 40px;
  background: #DDD;
  border-radius: 50%;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  line-height: 40px;
  text-align: center;
}

.right {
  position: absolute;
  top: 0;
  right: 0;
  box-sizing: border-box;
  padding: 40px;
  width: 300px;
  height: 400px;
  line-height: 1;
  text-align: center;
  margin-top: 0px;
  color : black;
  background: url('gambar/kanan.png');
  background-size: cover;
  background-position: center;
  border-radius: 0 2px 2px 0;
  
}

.right .ketlogin {
	font-family: 'Montserrat', sans-serif;
  font-size : 30px;
  line-height: 2cm;
  margin-bottom: 30px;
  font-weight: 600;
  font-weight: 540;
  color: #195e83;
}


.left .loginwith {
  display: block;
  line-height: 1cm;
  margin-bottom: -50px;
  font-weight: 600;
  font-size: 20px;
  color: Black;
  text-align: center;
}

 
button.social-signin {
  margin-bottom: 15px;
  width: 140px;
  height: 38px;
  left :400px;
  border: none;
  border-radius: 12px;
  color:rgb(247, 178,74) ;
  font-family: 'Roboto', sans-serif;
  font-weight: 500;
  font-size: 18px;
  transition: 0.2s ease;
  cursor: pointer;
}

button.social-signin:hover,
button.social-signin:focus {
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}
 
button.social-signin:active {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.4);
  transition: 0.2s ease;
}

button.social-signin.facebook {
  background:#43270f;
  text-decoration: none;
}


</style>
<body>
<form action="<?php echo base_url('login/login/aksi_login'); ?>" method="post" > 
        <div id="login-box">
          <div class="right">
            <!-- <h1>Sign In</h1> -->
           
            <span class="ketlogin"> Masuk </span>
            <br>
            <br>
            <br>
            <!-- <h1>Sign In</h1> -->
            
            <input type="text" name="username" placeholder="Nama pengguna" required autocomplete="off" autofocus />
            <input type="password" name="password" placeholder="kata sandi" required autocomplete="off" />
            <br>
            
            <input type="submit" name="signin_submit" value="LOGIN" />
            <br> <br> <br> <br>
            <hr>
            <span class="lupa"><a href="http://localhost/SiNgujiSmapa-Web/loginAdmin" style="text-decoration:none"> Masuk sebagai admin?</a></span>
          </div>
  
          
        
          <div class="left">
              
             
         </div>
        
        </div>
        <form>
</body>
</html>