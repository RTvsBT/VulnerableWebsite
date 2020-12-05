<?php
require_once 'common.php';
// require_once 'dbfuncs.php';
include('dbfuncs.php');

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
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">

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
						<li class="nav__item"><a href="#" class="nav__link">Persoonsgegevens soldaten.</a></li>
					</ul>
					<ul tabindex="-1" class="nav--meta" id="nav-meta">
						<li class="nav--meta__item"><a href="#">Secret button</a></li>
						<li class="nav--meta__item"><a href="#">Staatsgeheimen</a></li>
						<li class="nav--meta__item"><a href="#">Bewijs dat er aliens zijn op Area 51.</a></li>
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
								<p> Deze tabel bevat zeer gevoelige persoonsgegevens, zorg daarom dat deze nooit de server verlaat.</p>
								<table class="table table-striped table-bordered">
<thead>
<tr>
<th style='width:50px;'>ID</th>
<th style='width:150px;'>Naam</th>
<th style='width:50px;'>Telefoon nr</th>
<th style='width:150px;'>BSN</th>
<th style='width:150px;'>Credit card nr</th>
</tr>
</thead>
<tbody>
<?php

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 6;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$total_records = getSelect("SELECT COUNT(*) As total_records FROM `pagination_table`");
	// var_dump($total_records[0][0]);
	$total_records = $total_records[0][0];
 	$total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

		$result = getSelect("SELECT * FROM `pagination_table` LIMIT $offset, $total_records_per_page");
    foreach($result as &$row){

		echo "<tr>
			  <td>".$row[0]."</td>
			  <td>".$row[1]."</td>
	 		  <td>".$row[2]."</td>
		   	  <td>".$row[3]."</td>
		   	  <td>".$row[4]."</td>
		   	  </tr>";
        }
    ?>
</tbody>
</table>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>

<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>


<br /><br />


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
