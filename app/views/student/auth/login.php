<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v7 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    
</head>
<style>
	body {
	margin:  0;
}
html, body {margin: 0; height: 100%; overflow: hidden}

.page-content {
	width: 100%;
	margin:  0 auto;
	background-image: -moz-linear-gradient( 136deg, rgb(254,225,64) 0%, rgb(250,112,154) 100%);
    background-image: -webkit-linear-gradient( 136deg, rgb(254,225,64) 0%, rgb(250,112,154) 100%);
    background-image: -ms-linear-gradient( 136deg, rgb(254,225,64) 0%, rgb(250,112,154) 100%);
	display: flex;
	display: -webkit-flex;
	justify-content: center;
	-o-justify-content: center;
	-ms-justify-content: center;
	-moz-justify-content: center;
	-webkit-justify-content: center;
	align-items: center;
	-o-align-items: center;
	-ms-align-items: center;
	-moz-align-items: center;
	-webkit-align-items: center;
}
.form-v7-content  {
	width: 910px;
	margin: 280px 0;
	font-family: 'Open Sans', sans-serif;
	position: relative;
	display: flex;
	display: -webkit-flex;
}
.form-v7-content .form-left {
	position: relative;
	color: #fff;
	font-weight: 400;
    width: 92.5%;
    margin-top: 32px;
}
.form-v7-content .form-left img {
	width: 100%;
}
.form-v7-content .form-left .text-1,
.form-v7-content .form-left .text-2 {
	position: absolute;
	text-align: center;
	width: 100%;
}
.form-v7-content .form-left .text-1 {
	font-size: 38px;
	top: 1.5%;
}
.form-v7-content .form-left .text-2 {
	font-size: 16px;
	bottom: 11%;
}
.form-v7-content .form-left .text-2::after {
	position: absolute;
	content: "";
	background: #fff;
	height: 1px;
	width: 228px;
	bottom: -50%;
	left: 50%;
	transform: translateX(-50%);
	-o-transform: translateX(-50%);
	-ms-transform: translateX(-50%);
	-moz-transform: translateX(-50%);
	-webkit-transform: translateX(-50%);
	opacity: 0.5;
}
.form-v7-content .form-detail {
    padding: 73px 80px 41px;
	position: relative;
	width: 100%;
	background: #fff;
	box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-o-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-ms-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
	-webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
}
.form-v7-content .form-detail .form-row {
    width: 100%;
    position: relative;
}
.form-v7-content .form-detail .form-row label {
	color: #666;
	font-weight: 600;
	font-size: 13px;
	margin-bottom: 3px;
	font-family: 'Open Sans', sans-serif;
}
.form-v7-content .form-detail .form-row label#valid {
    position: absolute;
    right: 20px;
    top: 35%;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    -o-border-radius: 50%;
    -ms-border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    background: #53c83c;
}
.form-v7-content .form-detail .form-row label#valid::after {
	content: "";
    position: absolute;
    left: 5px;
    top: 1px;
    width: 3px;
    height: 8px;
    border: 1px solid #fff;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    -o-transform: rotate(45deg);
    -moz-transform: rotate(45deg);
    transform: rotate(45deg);
}
.form-v7-content .form-detail .form-row label.error {
	padding-left: 0;
	margin-left: 0;
    display: block;
    position: absolute;
    bottom: 5px;
    width: 100%;
    background: none;
    color: red;
    font-family: 'Open Sans', sans-serif;
    font-weight: 700;
}
.form-v7-content .form-detail .form-row label.error::after {
    content: "\f343";
    font-family: "LineAwesome";
    position: absolute;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    -o-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    right: 10px;
    top: -25px;
    color: red;
    font-size: 18px;
    font-weight: 900;
}
.form-v7-content .form-detail .input-text {
	margin-bottom: 28px;
}
.form-v7-content .form-detail input {
	width: 100%;
    padding: 5px 15px 10px 15px;
    border: 2px solid transparent;
    border-bottom: 2px solid #e5e5e5;
    appearance: unset;
    -moz-appearance: unset;
    -webkit-appearance: unset;
    -o-appearance: unset;
    -ms-appearance: unset;
    outline: none;
    -moz-outline: none;
    -webkit-outline: none;
    -o-outline: none;
    -ms-outline: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: #333;
    box-sizing: border-box;
    -o-box-sizing: border-box;
	-ms-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
}
.form-v7-content .form-detail .form-row input:focus {
	border-bottom: 2px solid #2bb33e;
}
.form-v7-content .form-detail .register {
	background: #373be3;
	border-radius: 4px;
	-o-border-radius: 4px;
	-ms-border-radius: 4px;
	-moz-border-radius: 4px;
	-webkit-border-radius: 4px;
	width: 180px;
	border: none;
	margin: -13px 0 50px 0px;
	cursor: pointer;
	font-family: 'Open Sans', sans-serif;
	color: #fff;
	font-weight: 700;
	font-size: 15px;
	float: left;
}
.form-v7-content .form-detail .register:hover {
	background: #2a2cb0;
}
.form-v7-content .form-detail .form-row-last {
    margin-top: 35px;
}
.form-v7-content .form-detail .form-row-last input {
	padding: 15px;
}
.form-v7-content .form-detail .form-row-last p {
	font-weight: 600;
	font-size: 14px;
	color: #666;
	margin-left: 200px;
}
.form-v7-content .form-detail .form-row-last a {
	font-size: 16px;
	color: #373be3;
	padding-left: 15px;
}

/* Responsive */
@media screen and (max-width: 991px) {
	.form-v7-content {
		margin: 180px 20px;
		flex-direction:  column;
		-o-flex-direction:  column;
		-ms-flex-direction:  column;
		-moz-flex-direction:  column;
		-webkit-flex-direction:  column;
	}
	.form-v7-content .form-left {
		width: 100%;
		margin-bottom: -5px;
	}
	.form-v7-content .form-detail {
		padding: 50px;
	    width: auto;
	}
	.form-v7-content .form-detail .register {
		margin-bottom: 80px;
	}
}
@media screen and (max-width: 767px) {
	
}

@media screen and (max-width: 575px) {
	.form-v7-content .form-detail {
		padding: 30px 20px;
	    width: auto;
	}
	.form-v7-content .form-detail .register {
		float: none;
		margin-bottom: 10px;
	}
	.form-v7-content .form-detail .form-row-last p {
	    margin-left: 0px;
	    margin-bottom: 50px;
	}
}

</style>
<body class="form-v7">
	<div class="page-content">
		<div class="form-v7-content">
			<div class="form-left">
				<img src="https://colorlib.com/etc/regform/colorlib-regform-33/images/form-v7.jpg" alt="form">
				<p class="text-1">Login</p>
			</div>
			<form class="form-detail" method="post" id="login">
				<div class="form-row">
					<label for="your_email">E-MAIL</label>
					<input type="text" name="email" id="your_email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-row">
					<label for="password">WACHTWOORD</label>
					<input type="password" name="wachtwoord" id="password" class="input-text" required>
				</div>
				<br><br><br><br><br><br><br>
				<div class="form-row-last">
					<input type="submit" name="login" class="register" value="Login">
					<p>Of<a href="<?php echo URLROOT; ?>/student/registreer">Maak een account</a></p>
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

</body>
</html>