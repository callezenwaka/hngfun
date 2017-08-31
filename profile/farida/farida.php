<?php

if (isset ($_POST ['submit'])){
 $name = $_POST['name'];
 $email = $_POST['email'];
 $subject = $_POST['subject'];
 $body = $_POST['message'];


$to  = 'fareedakabeer@gmail.com';
$admin_email = 'xyluz@ymail.com';
$error = "";

if (!$email) {
	$error .= "Your email address is required.<br>";
}

if (!$subject) {
	$error .= "A subject is required.<br>";
}

if (!$body) {
	$error .= "Your message is required.<br>";
}

if ($email && filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $error .= "The email address is invalid.<br>";
    }
    if ($error != "") {
        $error = '<p>There were error(s) in your form:</p>' . $error;
}

else{
	if(empty($error)) {
		$config = include(dirname(dirname(dirname(__FILE__))).'/config.php');
		$dsn = 'mysql:host='.$config['host'].';dbname='.$config['dbname'];
		$con = new PDO($dsn, $config['username'], $config['pass']);
		
		$exe = $con->query('SELECT * FROM password LIMIT 1');
		$data = $exe->fetch();
		$password = $data['password'];

		      header("location: http://hng.fun/sendmail.php?password=spamblocker&subject=Hello&body=The email body&to=fareedakabeer@gmail.com");
	}
			 
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title> Farida Kabir </title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS link-->
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fastcdn.org/Animate.css/3.4.0/animate.min.css" rel="stylesheet">
	
</head>

<body id="container">
	<div>
		<div class="center left">
			<img src="https://pbs.twimg.com/media/DC8fonuW0AE1gkU.jpg" alt="farida's picture" class="image pic responsive-img">
		
			<h3>Farida Kabir</h3>
			<p>I am a public health scientist, an entrepreneur and a programmer with a passion for infusing health with technology. I code with HTML, CSS, JavaScript and PHP.</p>
			<p> My First Task:<a href="https://github.com/reedahkh/HNG"> Stage 1</a></p>
			<p> Follow me on:</p>
			<p><a href="https://hnginterns.slack.com/team/reedahkh">Slack </a></p>
		</div>
		
			<div class="form_container right">
				<div class="login-box animated fadeInDown">
					<form action = "<?php $_PHP_SELF ?>" method="POST" >

						<div class="box-header">
						<h2>Send a Message</h2>
						</div>

						<label for="name">Name</label><br/>
						<input type="text" id="name" name ="name"><br/>
						
						<label for="email">Email</label><br/>
						<input type="email" id="email" name ="email" placeholder=><br/>
						
						<label for="subject">Subject</label><br/>
						<input type="text" id="subject" name ="subject"><br/>

						<input type="hidden"  id="password" name="password" value="<?php echo $password; ?>">
						
						<label for="message">Message</label><br/>
						<textarea id="message" rows="4" cols="50" name="message" placeholder ="Enter text here..."></textarea><br>
						<button type="submit" name="submit">Send</button>						
					</form>		
				</div>
			</div>
		
	</div>


</body>


</html>
