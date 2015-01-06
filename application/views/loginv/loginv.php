<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>UControl</title>
<link rel="shortcut icon" href="images/uControlIcon.png" type="image/png"/>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="css/style.shinyblue.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/modernizr.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('#login').submit(function(){
            var u = jQuery('#username').val();
            var p = jQuery('#password').val();
            if(u == '' && p == '') {
                jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
</head>
<body class="loginpage">
	<div class="loginpanel">
		<div class="loginpanelinner">
			<div class="logo animate0 bounceIn"><img style="width:240px" src="images/uControlN.png" /></div>
			<form id="login" action="principal" method="post">
				<div class="inputwrapper login-alert">
					<div class="alert alert-error">Invalid Username or Password</div>
				</div>
				<div class="inputwrapper animate1 bounceIn">
					<input type="text" name="username" id="username" placeholder="User" />
				</div>
				<div class="inputwrapper animate2 bounceIn">
					<input type="password" name="password" id="password" placeholder="Password" />
				</div>
				<div class="inputwrapper animate3 bounceIn">
					<button name="submit">Log in</button>
				</div>
				<div class="inputwrapper animate4 bounceIn">
					<label><input type="checkbox" class="remember" name="signin">Remind</label>
				</div>
			</form>
		</div>
	</div>
	<div class="loginfooter">
		<p>&copy; <?= date('Y') ?> All Rights Reserved </p>
		<p>Developed by: <a href="http://www.bisa.com.sv/en/">BISA The Information on your fingertips</a></p>
	</div>
</body>
</html>