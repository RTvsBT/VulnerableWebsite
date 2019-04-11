<?php
require_once 'common.php';
require_once 'dbfuncs.php';
if(empty($_SESSION['authed']) || $_SESSION['authed'] === false){
header("Location: /login.php");
}elseif(!empty($_SESSION['authed']) && $_SESSION['authed'] === true) {
    if(!empty($_SESSION['userid'])) {

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            if(!empty($_REQUEST['firstname']) && !empty($_REQUEST['surname'])
                && !empty($_REQUEST['email'])) {

                $updateSQL = "update users set firstname = '" . $_REQUEST['firstname']
                            . "', surname = '" . $_REQUEST['surname'] . "', email='" .
                            $_REQUEST['email'] . "' where id = " .  $_SESSION['userid'];

                $updated = insertQuery($updateSQL, true);
                if($updated === false) {
                    echo 'Unable to update your profile.';
                }
                else {
                    echo 'Details updated! Excellent.';
                }
            }
        }
        else {
            $userSQL  = "select email, firstname, surname from users where id = " .  $_SESSION['userid'];
            $userList = getSelect($userSQL);

            if(empty($userList) && is_array($userList)) {
                die('Unable to retrieve your settings. Doh!');
            }
            $user = $userList[0];
        ?>

<form class="form-signin" method="POST">


      <h1 class="h3 mb-3 font-weight-normal">Edit your settings</h1>

      <label for="inputFirstname" class="sr-only">Firstname:</label>

      <input type="firstname" id="inputFirstname" name="firstname" class="form-control" placeholder="Firstname" value="<?=$user[1]?>"  required autofocus>

      <label for="inputSurname" class="sr-only">Surname</label>
      <input type="surname" id="inputSurname" name="surname" class="form-control" placeholder="Surname" value="<?=$user[2]?>"  >

      <label for="inputEmail" class="sr-only">Email:</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" value="<?=$user[0]?>"  >

      <button class="btn btn-lg btn-primary btn-block" type="submit">Update profile</button>


    </form>
        <?php
        }
    }
}
require_once 'footer.php';
?>
