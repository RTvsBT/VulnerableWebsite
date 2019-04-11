<?php
require_once 'common.php';
require_once 'dbfuncs.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(!empty($_REQUEST['username']) && !empty($_REQUEST['password'])) {
        $authSQL = "select * from users where username = '" . $_REQUEST['username'] .
           "' and password = '" . $_REQUEST['password'] . "'"; 
        $authed = getSelect($authSQL);

        if(!$authed) {
            echo 'Invalid login.<br>';
            echo 'SQL Used: ' . $authSQL;
            die;
        }
        else {
            echo 'Success, you authed! <br>';
            echo 'SQL Used: ' . $authSQL;
            $_SESSION['authed'] = true;
            $_SESSION['userid'] = $authed[0][0];
            $_SESSION['username'] = $authed[0][1];
	    header("Refresh:0; url=/index.php?id=1");
        }
    }
}
else {
?>

    <form method="POST" class="form-signin">

      <img class="mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">

      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <label for="username" class="sr-only">Username</label>

      <input type="Username" name="username" id="username" class="form-control" placeholder="Username" required autofocus>

      <label for="password" class="sr-only">Password</label>

      <input type="password" name="password" id="password" class="form-control" placeholder="Password" >


      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

<?php
}
require_once 'footer.php';
?>
