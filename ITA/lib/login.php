<?php
include 'core/init.php';




    if(empty($_POST)===false)
    {
    $username = $_POST['username'];
    $password = $_POST['password'];
     
   if (empty($username)===true || empty($password)===true)
   {
       $errors[]='You need to enter the username and password!';
   }
   else if(user_exists($username) === false)
   {
        $errors[] = 'We can\'t find the username. Have you registered?';
        
   }
   
 
   else 
   {       
       
      $login = login($username, $password);
      if($login === false)
      {
           
            $errors[] = 'That username and password combination is incorrect!';
      }
      else 
      {
         $_SESSION['userid'] = $login;
         header('Location: index.php');
         exit();
      }
      
   }  
}


?>


