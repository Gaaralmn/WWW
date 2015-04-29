<?php  
    if(isset($_POST["submit"]) && $_POST["submit"] == "Register")  
    {  
        $username = $_POST["username"];  
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];  
        $confirm = $_POST["confirm"];
        $location = $_POST["location"];
        if($username == "" || $password == "" || $confirm == "") {  
            echo "<script>alert('Please enter complete information for registeration!'); history.go(-1);</script>";  
        }  
        elseif ($password != $confirm) {
            echo "<script>alert('Passwords are not equal!'); history.go(-1);</script>";
        }
        else {  
            $conn = new mysqli("127.0.0.1","root","root", "myPinterest");    
            if ($conn->connect_error) die("Couldn't connect to database!".$conn->connect_error);
            $query = "select user_name from users where user_name='$_POST[username]' or email='$_POST[email]'"; 
            $result = $conn->query($query);  
            if(!$result) die ($conn->error);  
            $rows = $result->num_rows;
            if ($rows > 0) {
                echo "<script>alert('Username or email already exists!'); history.go(-1);</script>";
            } else {
            	$insert = "insert into users values ('$username', '$password', '$name', '$email', null, '$location', now())";
                $reg_result = $conn->query($insert);
                if ($reg_result) {
                    echo "<script>alert('Successfully registered!');</script>";
                    echo '<script language="JavaScript">window.location.href="index.php";</script>';
                } else {
                    echo "<script>alert('System is busy now, Please try later!'); history.go(-1);</script>";
                }
                $reg_result->close();
                $conn->close();
            } 
        }  
    }  
    else {  
        echo "<script>alert('Please enter username and password to Login！'); history.go(-1);</script>";  
    }  
  
?>  