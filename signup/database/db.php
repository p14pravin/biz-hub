<?php
   //define('DB_SERVER', 'remotemysql.com');
   //define('DB_USERNAME', 'BxQHCxNZs5');
  // define('DB_PASSWORD', 'RBWvf4J3XK');
   //define('DB_DATABASE', 'BxQHCxNZs5');
   
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'ndroid_shop');
   
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>