<?php

Class dbObj{
/* Database connection start */
var $dbhost = "localhost";
var $username = "giddycru_root";
var $password = "giddyhost_01";
var $dbname = "giddycru_gt";
var $conn;
function getConnstring() {
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
return $this->conn;
}
}

?>
