<!DOCTYPE html>
<html>
<head>
	<title>Login guru</title>
</head>
<style>
	body{
	font-family: sans-serif;
	background: 
  	linear-gradient(
          rgba(0, 0, 0, 0.8), 
          rgba(0, 0, 0, 0.8)
        ),

	url(<?php echo base_url("gambar/smajem.jpg");?>) no-repeat  fixed;
}

h1{
	text-align: center;
	/*ketebalan font*/
	font-weight: 300;
}

.caption{
	width: 100%;
	margin: 40px 200PX;
	position: absolute;
	top: 230px;
}

.caption .cap_title{
	font-family: 'LatoBold', arial;
	font-weight: Bold;
	font-size: 50px;
	color: #ffffff;
	letter-spacing: 1.5px;
}

.caption .cap_desc{
	font-family: 'HoneyLight';
	font-size: 24px;
	color: #ffffff;
	margin-top: 5px;
}

.tulisan_login{
	text-align: center;
	/*membuat semua huruf menjadi kapital*/
	text-transform: uppercase;
}
img{

	/*meletakkan form ke tengah*/
	margin: 150px 600px;
	padding: 60px 20px;
}


.kotak_login{
	width: 330px;
	background: black;
	position: absolute;
	/*meletakkan form ke tengah*/
	margin: -637px 711px;
	padding: 13px 52px;
}

label{
	font-size: 11pt;
color: #ffffff;
}

.h2{
	color: #ffffff;
}

.form_login{
	/*membuat lebar form penuh*/
	box-sizing : border-box;
	width: 100%;
	padding: 6px;
	font-size: 11pt;
	margin-bottom: 4px;
}

.tombol_login{
	background: #0000A0;
	color: white;
	font-size: 11pt;
	width: 100%;
	border: none;
	border-radius: 3px;
	padding: 10px 20px;
}

.link{
	color: #232323;
	text-decoration: none;
	font-size: 10pt;
}
</style>
<body>


<img src="gambar/lp3.png" width="650px" height="450px">
	<section class="caption">
			<p class="cap_title">WELCOME TO <br> SINGUJI SMAPA</p>
			<p class="cap_desc">Utuk masuk ke panel guru, silahkan login <br> terlebih dahulu!</p>
		</section>
	
	<!-- aksi form ini diarah ke fungsi aksi_login yang terdapat di controler login -->

	<div class="kotak_login">
	<form action="<?php echo base_url('login/login/aksi_login'); ?>" method="post">		

		<div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <h1 class="h2">Login Guru</h1>
  
            </div>
        </div>

		<label>Username</label>
		<input type="text" name="username" class="form_login" placeholder="Username" required>
 
		<label>Password</label>
		<input type="password" name="password" class="form_login" placeholder="Password .." required>
		<br/>
		<div class="form-group">
                        <div class="d-flex justify-content-between">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="rememberme" id="rememberme" />
                                <label class="custom-control-label" for="rememberme"> Ingat Saya</label>
                            <!-- </div> -->
                            <!-- <a href="<?= site_url('reset_password') ?>">Lupa Password?</a> -->
                        <!-- </div> -->
                    </div>
                    <div class="form-group">
		<br/>

		<input type="submit" class="tombol_login" value="LOGIN">

 
		<br/>
		<br/>
	</form>
	</div>
</body>
</html>