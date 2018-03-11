<?php

$connect = mysqli_connect("localhost","root","") or die("conn to db failed!");


mysqli_select_db ($connect,"hotel.bak") or  die ("Db not found" );

?>