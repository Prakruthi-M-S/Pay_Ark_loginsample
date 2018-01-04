<?php
    session_start();
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
    $bool = true;

    mysql_connect("localhost", "root", "") or die (mysql_error()); 
    mysql_select_db("first_db") or die ("Cannot connect to database"); 
    $query = mysql_query("Select * from users WHERE username='$username'"); 
    $exists = mysql_num_rows($query); 
    $table_users = "":
    $table_password = "";
    if($exists > 0) 
    {
       while($row = mysql_fetch_assoc($query)) 
       {
          $table_users = $row['username']; 
          $table_password = $row['password']; 
       }
       if(($username == $table_users) && ($password == $table_password))
       {
          if($password == $table_password)
          {
             $_SESSION['user'] = $username; 
             header("location: home.php"); 
          }
       }
       else
       {
        Print '&lt;script>alert("Incorrect Password!");&lt;/script>'; 
        Print '&lt;script>window.location.assign("login.php");&lt;/script>'; 
       }
    }
    else
    {
        Print '&lt;script>alert("Incorrect username!");&lt;/script>'; 
        Print '&lt;script>window.location.assign("login.php");&lt;/script>'; 
    }
?>