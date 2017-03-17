
<?php 
include 'core/init.php';
logged_in_redirect();
$errors3 = array();
if(empty($_POST)===false){
$required_fields = array('firstname','lastname','email','username','password','repassword','category','phone');


if(user_exists($_POST['username']) === true)
{
   $errors3[] = 'Sorry, the username \''.htmlentities($_POST['username']).'\' is already taken'; 
}
if(strlen($_POST['password']) <= 6)
{
     $errors3[] = 'Your password must be at least 6 characters!';
}

if(strlen($_POST['password']) >= 33)
{
    $errors3[] = 'Please insert a password less than 32 characters!';
}

if($_POST['password']!==$_POST['repassword'])
{
$errors3[] = 'Your passwords do not match';
}
if(preg_match("/\\s/", $_POST['username']) == true)
{
    $errors3[] = 'Your username must not contaion any spaces!';
}
if(email_exists($_POST['email']) == true)
{
     $errors3[] = 'Sorry, the email \''.htmlentities($_POST['email']).'\' is already in use!'; 
}
function output_errors_reg($errors)
{
    $output = array();
    foreach($errors as $error)
    {
        $output[] = '<p id="errorLog">'.$error.'</p>';
    }
    return implode('', $output);
   
}
   
if(empty($_POST) === false && empty($errors3) === true)  
        {
   
              $register_data = array(
         
                  'username' => $_POST['username'],
                      'password' => $_POST['password'],
                          'firstname' => $_POST['firstname'],
                             'lastname' => $_POST['lastname'],
                                 'email' => $_POST['email'],
                                    'email_code' => "x",
                                      'category' => $_POST['gender'],
                                         'phonenr' => $_POST['phone']
                                           
                                                
         );
              
              $ec = 'x';
    
         register_user($_POST['username'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], $_POST['email'], $ec, $_POST['gender'], $_POST['phone']);
       
       $email = $_POST['email'];
       $lastname = $_POST['firstname'];
       $firstname = $_POST['lastname'];
       $useracc = $_POST['username'];
       $email_code = $register_data['email_code'];
       $email_str = $_POST['email'];
    
   //Mailing
           date_default_timezone_set('Etc/UTC');

        require 'class.phpmailer.php';
        require 'class.smtp.php';


        //Create a new PHPMailer instance
        $mail = new PHPMailer;

        //Tell PHPMailer to use SMTP
        $mail->isSMTP();

        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;

        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';

        //Set the hostname of the mail server
        $mail->Host =   'smtp1.fontys.nl';      //'smtp1.fontys.nl';

        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
       // $mail->Port = 587;
        //login
        $mail->Username   = "maxxxfitnessss@gmail.com";  // GMAIL username

        $mail->Password   = "+37376747573Ge"; 
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Set who the message is to be sent from
        $mail->setFrom('maxxxfitnessss@gmail.com', 'maxxxfitnessss-noreply');

        //Set an alternative reply-to address
        //$mail->addReplyTo('summer.vibes.info@gmail.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($email, $firstname ." ". $lastname);

        //Set the subject line
        $mail->Subject = 'Activate your account';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

        //Replace the plain text body with one created manually
        $body = "Hollo ".$firstname." ".$lastname." \n\nWe are pleased to see you on our website! \n\n**************************************** \n\nYour account is: ".$useracc." \n\nYou need to activate your account, so use the link below: \n\n http://athena.fhict.nl/users/i324079/ITA/activate.php?email=".$email_str."&email_code=x\n\nHave a nice day!";

        $mail->Body = $body;

        //send the message, check for errors
        if (!$mail->send()) {
           $_SESSION['error']= "Mailer Error: " . $mail->ErrorInfo;
        }

        header('Location: Registration.php?success');
        exit();

}
else{
$_SESSION['error'] = $_SESSION['error']." could not create you";
}
mysql_close();
}
        



?>



<!DOCTYPE html>
<html>
<head>
<title>MaxFitness</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
      <link rel="stylesheet" type="text/css" href="css/styleReg.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demoReg.css" media="all" />
    
    <style>
              #SuccessLog
              {
                  text-decoration: none;
  display: block;
  font-size: 18px;
  font-weight: bold;
  color: green;
  margin-bottom: 3px;
              }
              
              
              
          </style>
</head>
<body>
    <?php include 'includes/header.php';
    ?>
<div class="container">
			<!-- freshdesignweb top bar -->
         <header>
				<h1><span>Sing Up</span>Max Fitness is pleased to see you on our website</h1>
                                
                                
                                
                                
                                
                                
            </header>
			      
      <div  class="form">
          <?php 

if(isset($_GET['success']) && empty($_GET['success']))
    {
   
    echo '<p id="SuccessLog">'.'You\'ve been registered successfully!'.'</p>';
    echo '<p id="SuccessLog">Please check your email to activate your account.</p>';
     }
else
{

if(empty($errors3) === false)
{
   
  echo output_errors_reg($errors3); 
  
  
}
}

?>
          
          
          
          
          <form id="contactform" action="" method="post"> 
    			<p class="contact"><label for="name">First Name</label></p> 
    			<input id="name" name="firstname" placeholder="First name" required="" tabindex="1" type="text"> 
                        
                        <p class="contact"><label for="name">Last Name</label></p> 
    			<input id="name" name="lastname" placeholder="Last name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                
                <p class="contact"><label for="username">Create a username</label></p> 
    			<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
    			 
                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" name="password" required=""> 
                <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" name="repassword" required=""> 
        
           
  
            <select class="select-style gender" name="gender">
            <option value="select">In sport I am...</option>
            <option value="Beginner">Beginner</option>
            <option value="Intermediate">Intermediate</option>
            <option value="Professional">Professional</option>
            <option value="others">Other</option>
            </select><br><br>
            
            <p class="contact"><label for="phone">Mobile phone</label></p> 
            <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit"> 	 
   </form> 
          

</div>      
</div>

<?php 
include 'includes/footer.php';
?>
</body>
</html>
