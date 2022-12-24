<?php
  //Create a connection link between php program and MySQL database engine
  $server   = 'localhost';
  $user     = 'root';
  $pass     = '';  
  $database = 'northwind';
  
  $con = new mysqli($server, $user, $pass, $database);
?>