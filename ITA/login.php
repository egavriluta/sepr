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
   else if(user_active($username)=== false)
   {
       $errors[] = 'You haven\'t activated your account!';
       
       
   }
   
 
   else 
   {       
       
      $login = login($username, $password);
      if($login === false)
      {
			if(isset($_COOKIE['attempts'])) 
			{
				if($_COOKIE['attempts'] < 3) 
				{
			    	$attempts = $_COOKIE['attempts'] + 1;
			    	$remaining = 3 - $attempts;
			    	setcookie('attempts', $attempts, time()+60*10); //cookie for 10 min + store attempts
			    	$errors[] = 'That username and password combination is incorrect! Tries remaining: ' + $remaining + '.';
				} 
				else 
				{
			    	$errors[] = 'You have tried to login 3 times! You are now banned for 10 minutes';
				}
			} 
			else 
			{
				setcookie('attempts', 1, time()+60*10); //cookie for 10 min + attempts to 1
				$errors[] = 'That username and password combination is incorrect!';
			}
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


