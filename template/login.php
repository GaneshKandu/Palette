<?php 

/*
///////////////////////////////////////////////////
Palatte is a PHP Based Site Builder
Developed By : Ganesh Kandu
Contact Mail : kanduganesh@gmail.com
///////////////////////////////////////////////////
*/

class tpl{ function __construct($tpl){
	$ses = new session();
	if($ses->isValidSession()){
		header('Location:'.URL.'/dashboard');
	}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<base href="<?=URL.'/'; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Metro, a sleek, intuitive, and powerful framework for faster and easier web development for Windows Metro Style.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, metro, front-end, frontend, web development">
    <meta name="author" content="Sergey Pimenov and Metro UI CSS contributors">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />

    <title>Palette Login</title>

    <link href="css/metro.css" rel="stylesheet">
    <link href="css/metro-icon.css" rel="stylesheet">
    <link href="css/metro-responsive.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <script src="js/metro.js"></script>
 
    <style>
        .login-form {
            width: 25rem;
            height: 18.75rem;
            position: fixed;
            top: 50%;
            margin-top: -9.375rem;
            left: 50%;
            margin-left: -12.5rem;
            background-color: #ffffff;
            opacity: 0;
            -webkit-transform: scale(.8);
            transform: scale(.8);
        }
    </style>

    <script>
        $(function(){
            var form = $(".login-form");

            form.css({
                opacity: 1,
                "-webkit-transform": "scale(1)",
                "transform": "scale(1)",
                "-webkit-transition": ".5s",
                "transition": ".5s"
            });
        });
    </script>
</head>
<body class="bg-darkTeal">
    <div class="login-form padding20 block-shadow">
            <h1 class="text-light">Palette <?php echo $tpl['lang']['Login']; ?></h1>
            <hr class="thin"/>
            <br />
            <div class="input-control text full-size" data-role="input">
                <label for="user_login"><?php echo $tpl['lang']['User']; ?>:</label>
                <input type="text" name="user_login" autofocus="autofocus" id="user_login">
                <button class="button helper-button clear"><span class="mif-cross"></span></button>
            </div>
            <br />
            <br />
            <div class="input-control password full-size" data-role="input">
                <label for="user_password"><?php echo $tpl['lang']['password']; ?>:</label>
                <input type="password" name="user_password" id="user_password">
                <button class="button helper-button reveal"><span class="mif-looks"></span></button>
            </div>
            <br />
            <br />
            <div class="form-actions">
                <button type="submit" class="button primary" id="Login"><?php echo $tpl['lang']['Login']; ?></button>
            </div>
            <hr class="thin"/>
			<span id="powerby"></span>
    </div>
    <script src="js/palettecms.js"></script>
	<script>
		document.body.addEventListener('keydown', function(e) {
			if(e.keyCode == 13){
				login();
			}
		});
	</script>
</body>
</html>
<?php } } ?>