<?php
require_once 'common.php';
require_once 'dbfuncs.php';


if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(!empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
		$apc_key = "{$_SERVER['SERVER_NAME']}~login:{$_SERVER['REMOTE_ADDR']}";
		$tries = (int)apcu_fetch($apc_key);
		var_dump($tries);
		if ($tries >= 4) {
			// log to syslog stuffs
			openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_AUTH);
			// some code
			$access = date("Y/m/d H:i:s");
			syslog(LOG_WARNING, "Login brute force attempt by: $access {$_SERVER['REMOTE_ADDR']} ({$_SERVER['HTTP_USER_AGENT']})");

			closelog();
		}


		$authSQL = "select * from users where username = '" . $_REQUEST['username'] . "' and password = '" . $_REQUEST['password'] . "'"; 

		$SQL_Injection_blacklist = array("drop","/*", "*/","--","union", "if", "concat", "order by", "exec", "cmd", "xp_", "Insert");
		if(contains($authSQL, $SQL_Injection_blacklist)){

			openlog("myScriptLog", LOG_PID | LOG_PERROR, LOG_AUTH);
			// some code
			$access = date("Y/m/d H:i:s");
			syslog(LOG_WARNING, "SQL Injection attempt: $access {$_SERVER['REMOTE_ADDR']} ($authSQL)");

			closelog();

		}


		$authed = getSelect($authSQL);

		if(!$authed) {
			$storage_time = 600;
			apcu_inc($apc_key, $tries+1, $storage_time);


			echo 'Invalid login.<br>';
			die;
		} else {
			apc_delete($apc_key);
			header("Refresh:0; url=/information.php");
		}
    }
}
?>



<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>mijn.defensie.nl - Inloggen</title>
	<meta content="text/html;charset=UTF-8" http-equiv="Content-Type" />
	<meta content="width=device-width" name="viewport" />
	<meta name="_csrf_parameter" content="_csrf" />
	<meta name="_csrf_header" content="X-CSRF-TOKEN" />
	<meta name="_csrf" content="470aa937-adb2-4599-850a-633b9914421e" />
	<link href="/assets/images/apple-touch-icon-57x57.png" sizes="57x57" rel="apple-touch-icon" />
	<link href="/assets/images/apple-touch-icon-114x114.png" sizes="114x114" rel="apple-touch-icon" />
	<link href="/assets/images/apple-touch-icon-72x72.png" sizes="72x72" rel="apple-touch-icon" />
	<link href="/assets/images/apple-touch-icon-144x144.png" sizes="144x144" rel="apple-touch-icon" />
	<link href="/assets/images/apple-touch-icon-60x60.png" sizes="60x60" rel="apple-touch-icon" />
	<link href="/assets/images/apple-touch-icon-120x120.png" sizes="120x120" rel="apple-touch-icon" />
	<link href="/assets/images/apple-touch-icon-76x76.png" sizes="76x76" rel="apple-touch-icon" />
	<link href="/assets/images/apple-touch-icon-152x152.png" sizes="152x152" rel="apple-touch-icon" />
	<link sizes="196x196" href="/assets/images/favicon-196x196.png" type="image/png" rel="icon" />
	<link sizes="160x160" href="/assets/images/favicon-160x160.png" type="image/png" rel="icon" />
	<link sizes="96x96" href="/assets/images/favicon-96x96.png" type="image/png" rel="icon" />
	<link sizes="32x32" href="/assets/images/favicon-32x32.png" type="image/png" rel="icon" />
	<link sizes="16x16" href="/assets/images/favicon-16x16.png" type="image/png" rel="icon" />
	<meta content="mijn.defensie.nl" name="application-name" />
	<meta content="#2b5797" name="msapplication-TileColor" />
	<meta content="/mstile-144x144.png" name="msapplication-TileImage" />.


	<script src="/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="/assets/js/jquery.maskedinput-1.4.1.js" type="text/javascript"></script>
	<link href="/assets/css/jquery-ui-1.8.14.custom.css" type="text/css" rel="stylesheet" />

	<link href="/assets/css/main.css" type="text/css" rel="stylesheet" />
	<link href="/assets/css/additions.css" type="text/css" rel="stylesheet" />
	<link href="/assets/css/print.css" media="print" rel="stylesheet" />
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet" />

	<script src="/assets/js/main.js"></script>
	<script src="/assets/js/datepicker.min.js"></script>
	<script src="/assets/js/doT.js"></script>
	<script src="/assets/js/functions.js?"></script>
	<script src="/assets/js/jquery.validate.min.js" type="text/javascript"></script>
	<script src="/assets/js/additional-methods-1.11.0.min.js" type="text/javascript"></script>
	<script src="/assets/js/wosi-additional-methods-maximum.js" type="text/javascript"></script>
	<script src="/assets/js/tooltip.js" type="text/javascript"></script>
</head>

<body>
	<div class="page-wrapper">
		<div class="page">

			<div role="banner" class="page__header">
				<div role="banner" class="page__branding">
					<h1><a class="page__branding__logo" href="#">
							Ministerie van Defensie
						</a></h1><button class="js-toggle-nav toggle-nav"><span>
							Menu
							<div xmlns="http://www.w3.org/1999/xhtml" id="login"></div></span></button>
				</div>
				<div tabindex="-1" role="navigation" class="page__navigation" id="nav-main">
					<ul class="nav js-nav-focus">
						<li class="nav__item"><a href="#" class="nav__link">Mijn werken bij
								Defensie</a></li>
					</ul>
					<ul tabindex="-1" class="nav--meta" id="nav-meta">
						<li class="nav--meta__item"><a href="#">Contact</a></li>
						<li class="nav--meta__item"><a href="#">Inloggen</a></li>
						<li class="nav--meta__item"><a href="#">Veva.nl</a></li>
					</ul>
					<div class="nav-overlay"></div>
				</div>
				<ul class="breadcrumb">
					<li class="breadcrumb__item"><a href="#">mijn.defensie.nl</a></li>
				</ul>
			</div>
			<div class="equalize orange liquid" id="l-wrapper-main">
				<div class="header l-wapper-main-inner">
					<div class="" id="mainContent">
						<div style="display:none;border:2px solid red" id="js_error_list"><span></span></div>
						<div role="main" class="group l-wrapper-content" id="main-content">
							<div class="section--sec">
								<div class="section__inset--large">
									<h1 class="section__title"><span class="hide-mobile">mijn.defensie.nl</span><span
											class="hide-desktop">mijn defensie</span></h1>
									<p class="section__lede">
										Meld je hier aan om bij je defensie profiel te komen.
									</p>
									<div class="module-login">
										<div class="grid grid--gutter">
											<div class="grid-50 float-right">
												<div class="section--pri js-eq-height">
													<div class="section__inset--medium">
														<h3 class="section__legend">
															Ik wil inloggen
														</h3>
														<form action="" method="post" class="form"><input
																type="hidden" name="_csrf" value="470aa937-adb2-4599-850a-633b9914421e" />
															<div class="form__row">
																<div class="form__field"><label for="email" class="form__label form__label--small">
																		E-mailadres
																	</label><input value="" maxlength="80" name="username" class="form__input "
																		autofocus="autofocus" autocomplete="off" autocapitalize="off" id="email"
																		type="email" /></div>
															</div>
															<div class="form__row">
																<div class="form__field"><label for="password" class="form__label form__label--small">
																		Wachtwoord
																	</label><input maxlength="256" name="password" class="form__input "
																		autocomplete="off" id="password" type="password" /></div>
															</div>
															<p><a href="#">
																	Wachtwoord vergeten?
																</a></p>
															<div class="form__row">
																<div class="form__field"><input class="button--pri" value="Inloggen" id="submit"
																		type="submit" /></div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="grid-50">
												<div class="section--pri js-eq-height">
													<div class="section__inset--medium">
														<h3 class="section__legend">
															Defensie account
														</h3>
														<p>
															Met een Defensie account heb je direct toegang tot alle onderdelen op defensie.nl
															waarvoor jouw gegevens vereist zijn. Zo voorkom je dat je steeds opnieuw al je gegevens
															moet invullen.
														</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<footer class="page__footer">
					<div class="page__footer__links">
						<ul class="page__footer__list">
							<li class="list__item"><a style="display: inline" href="#">Cookiebeleid</a></li>
							<li class="list__item"><a style="display: inline" href="#">Privacyverklaring</a></li>
							<li class="list__item">2.195 ms</li>
						</ul>
					</div>
				</footer>
			</div>
		</div>
	</div>
</body>

</html>
