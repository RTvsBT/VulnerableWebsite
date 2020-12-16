<?php

$config = parse_ini_file(__DIR__ . '/../config.ini', true);

$minutes_left = $config["main"]["encryption_duration_minutes"];
$seconds_left = 00;
if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(!empty($_REQUEST['key']) && !empty($_REQUEST['timer_value'])) {
		$time = explode(':', $_REQUEST['timer_value']);
		$minutes_left = (int)$time[0];
		$seconds_left = (int)$time[1];
		if (($minutes_left + $seconds_left) >= 0)
		{
			$notif = "Too late, your files are gone."; 
		}
		else if($_REQUEST['key'] === $config["main"]["encryption_key"])
		{
			$notif = "You successfully thwarted this ransomware attack.";
			$config["main"]["ransomware"] = "off";
			write_ini_file('../config.ini', $config);
		}
		else
		{
			$notif = "Wrong key, try again. But hurry you don\'t have much time.";
		}
	}
}


if($config["main"]["ransomware"] == "on"){ ?>

<!doctype html>
<!--[if lt IE 7 ]> <html class="ie ie6 ie-lt10 ie-lt9 ie-lt8 ie-lt7 no-js" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 ie-lt10 ie-lt9 ie-lt8 no-js" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 ie-lt10 ie-lt9 no-js" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 ie-lt10 no-js" lang="en"> <![endif]-->
<!--[if gt IE 9]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Fake Virus Screen - Files encrypted</title>
	<meta name="description"
		content="Fake virus screen demanding money for file decryption. Prank your friends opening this in their machine! " />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:title" content="Fake Virus Screen" />
	<meta property="og:type" content="website" />
	<meta property="og:description"
		content="Fake virus screen demanding money for file decryption. Prank your friends opening this in their machine!" />
	<meta property="og:url" content="https://geekprank.com/fake-virus/" />
	<meta property="og:image" content="https://geekprank.com/fake-virus/og.jpg" />
	<link rel="canonical" href="index.html" />
	<link rel="stylesheet" href="style.css" />
	<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="script.js"></script>
</head>

<body>

	<img src="background.jpg" alt="bckgound" class="bg" />
	<div class="content">
		<div class="headline">
			NOTPETYA
		</div>
		<div class="sidebar">
			<img src="fake-virus.png" alt="fake computer virus" class="lock" />
			<h3>Hurry! <br />Your files will be permanently&nbsp;deleted&nbsp;in:</h3>
			<div class="wraptimer"><span id="timer"><?php echo $minutes_left . ":".$seconds_left ?></span></div>
			<img src="fake-virus-prank.png" alt="online computer virus prank" class="sale" />
			<h3>Please read the instructions</h3>
		</div>
		<div class="maincont">
			<h1>Bad&nbsp;news, your files have been&nbsp;encrypted!</h1>
			<div class="description">
				<h2>What Happened To This Computer?</h2>
				<p><strong>All your personal data, photos, videos, work files, including your operating system have been
						encrypted and can be accessed again if you pay a ransome. You can't access anything on this
						machine but this screen.</strong></p>
				<p>You have <strong>30 minutes</strong> to pay the prize, otherwise you will no longer be able to
					decrypt
					them. Powering off or restarting your computer will also destroy your files. </p>
				<h2>What Can You Do?</h2>
				<p>You might be looking for a way to recover your files but don't waste your time. We use an unbreakable
					encryption so nobody can restore your files without a decryption key. </p>
				<p>You can purchase your key using one of the payment methods listed below. You will get a code to paste
					in the input field and click <strong>Decrypt</strong>. After this you should be restored in a couple
					of minutes.</p>
				<h2>Is This Legal?</h2>
				<p>Someone who has access to this computer has recently installed one of our free applications and
					agreed for the files to be encrypted by accepting the terms and conditions. This procedure is
					absolutely legal, we are a certified and awarded company specialized in computer viruses and digital
					identity theft. We will send you an invoice for your payment.</p>
				<h2>How Do You Pay?</h2>
				<p>We offer many payment methods to make the transaction smooth and easy to make you a satisfied but not
					a returning customer: </p>
				<ol type="1">
					<li>Send <strong>$399 + Tax</strong> worth of <strong>Monopoly Money</strong> to this address:
						<br />42 wallaby way sydney </li>
					<li>Send the fee with <strong>PayDude</strong>:
						<br />sendMoney@me-pls.com</li>
					<li>We now accept <strong>kidneys</strong>! <br />Call now to request kidney transplant:
						+1&nbsp;804&nbsp;TAKE MY KIDNEY</li>
				</ol>
			</div>
			<div class="payment">
				<div class="steps">
					Send $399 <strong>&rArr;</strong> Get a key <strong>&rArr;</strong> Paste your key below
					<strong>&rArr;</strong> Click Decrypt
				</div>


				<form action="index.php" method="post" class="input" name="decrypt">
					<input type="hidden" id="timer_value" name="timer_value"/>
					Your key: <input type="text" name="key"><span id="decrypt"
						onclick="document.forms['decrypt'].submit();">Decrypt</span>
				</form>
				<div class="methods">
					<img src="fake-hacked-computer.png" alt="fake hacked computer" /> <img
						src="files-encrypted-prank.png" alt="files encrypted online prank" /> <img
						src="pay-with-kidneys.png" alt="pay with your kidney" />

				</div>
			</div>
		</div>
		<div class="clearboth">
		</div>

	</div>
</body>

</html>

<?php 
	if (isset($notif)){
		echo '<script>alert("'.$notif.'  -> '.$minutes_left.':'.$seconds_left.'")</script>'; 
	}

	exit;
 }


?>
