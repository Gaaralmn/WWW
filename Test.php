<?php
	$username = "Gaara";  
    $name = "gaara";
    $email = "123@gmail.com";
    $password = "123456";  
    $confirm = "123456";
    $location = "Brooklyn";
	$conn = new mysqli("127.0.0.1","root","root", "myPinterest");    
    if ($conn->connect_error) die("Couldn't connect to database!".$conn->connect_error);
    $query = "insert into users values ('Gaara', '123456', 'gaara', '123@gmail.com', null, 'Brooklyn', now())";
    //$query = "insert into users values ($username, $password, $name, $email, null, $location, now())"; 
    $conn->query($query);
?>