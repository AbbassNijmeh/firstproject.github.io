<?php
 include 'connection.php';
 if(isset($_POST['username'])&& isset($_POST['password'])){

    function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
    }
  
  $usr=validate($_POST['username']);
  $pass=validate($_POST['password']);

  if (empty($usr)||empty($pass)){
        header("Location: login.php?error= Username and password required!");
        exit();
}
    else { 
    $sqlpass="SELECT * FROM users WHERE UserName ='$usr' AND password ='$pass'";
    $match_pass=mysqli_query($con, $sqlpass);
    if (mysqli_num_rows($match_pass) === 1) {
        $row = mysqli_fetch_assoc($match_pass);
        if ($row['UserName'] === $usr && $row['password'] === $pass && $row['Type']=== '1') {
            $_SESSION['UserName'] = $row['UserName'];
            header("Location: admin.php");
            exit();
        }else if ($row['UserName'] === $usr && $row['password'] === $pass && $row['Type']=== '0') {
            header("Location: login.php?error= you are not an admin!");
            exit();   
        }
    }
        else
            header("Location: login.php");
            exit();

}
}

?>