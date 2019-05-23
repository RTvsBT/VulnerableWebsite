<?php
//ini_set('display_errors',1);
//ini_set('display_startup_errors',1);
error_reporting(E_ALL);
session_start();
require_once 'Errorpage.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Amazing application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css"></link>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$links = array(
                'User Filter' => '/index.php?username=jared',
                'Send Message' => '/sendmessage.php', 
                'View Messages' => '/messages.php', 
                'Edit Profile' => '/editprofile.php',
		'Load Template' => '/template.php?load=loadme'
          );

?>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
<div class="navbar-=header">
<a class="navbar-brand" href="#">Voldexon</a>
</div>
<ul class="nav navbar-nav">
<?php
foreach($links as $title => $link) {
    echo "<li><a href='".$link."'>".$title."</a></li>";
}
?>
</ul>
<ul class="nav navbar-nav navbar-right">
<?php
if(!empty($_SESSION['authed']) && $_SESSION['authed'] === true){
	echo "<li><a href='#'>Welcome ". $_SESSION['username'] . "</a></li>";
	echo "<li><a href='logout.php'>Logout</a></li>";
}else{
	echo "<li><a href='login.php'>Login</a></li>";
}
?>
</ul>
</div>
</nav>
<div class="text-center">

