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
   		if (!isset($_COOKIE['attempts'])
   		{
   			setcookie('attempts', 0, time()+60*10); // initialize cookie to 0 if not present
   		}

      	if (isset($_COOKIE['attempts'])) // cookie is now set or we had it already
      	{	
			if($_COOKIE['attempts'] < 3) // attempts are less than 3 so we continue
			{
				$login = login($username, $password); 	// we try to login
      			if($login === false) 					// failed to login 
			    {
			    	$attempts = $_COOKIE['attempts'] + 1; // increment the cookie
			    	$remaining = 3 - $attempts; // variable for showing remaining attempts in error
			    	setcookie('attempts', $attempts, time()+60*10); //setcookie for 10 min + store attempts
			    	$errors[] = 'That username and password combination is incorrect! Tries remaining: ' + $remaining + '.';
			    }
			    else 
      			{
			    	setcookie('attempts', '1' , time() - 3600); //cookie for 10 min + store attempts      				
         			$_SESSION['userid'] = $login;
         			header('Location: index.php');
         			exit();
      			}
			} 
			else // attempts are more than 3 so we say you are banned and have to wait until cookie expires
			{
		    	$errors[] = 'You have tried to login 3 times! You are now banned for 10 minutes.';
			}
		}    	
      }      
   }  
}


?>


