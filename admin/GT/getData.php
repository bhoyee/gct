<?php
$servername='localhost';
$username="giddycru_root";
$password="giddyhost_01";
try
{
    $con=new PDO("mysql:host=$servername;dbname=giddycru_gt",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo 'connected';
}
catch(PDOException $e)
{
    echo '<br>'.$e->getMessage();
}
?>