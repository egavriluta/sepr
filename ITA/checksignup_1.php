<?php
session_start();
$host="athena01.fhict.local"; // Host name 
$username="dbi322201"; // Mysql username 
$password="Tav95H76R0"; // Mysql password 
$db_name="dbi322201"; // Database name 
$tbl_name="account"; // Table name 
$alreadyexist = false;
// Connect to server and select databse.

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$firstname=$_POST['firstname']; 
$lastname=$_POST['lastname']; 
$birthdate=$_POST['birthdate'];
$email=$_POST['email'];
$givenpassword=$_POST['password']; 
$firstname = ucfirst(strtolower($firstname));
$lastname = ucfirst(strtolower($lastname));

//To check if the person not already exists

$sql="SELECT * FROM $tbl_name WHERE First_Name='$firstname' and Last_Name='$lastname'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
$_SESSION['error'] = "The person already exist";
header("location:Signup.php");
    $alreadyexist = true;
}
$sql="SELECT * FROM $tbl_name WHERE Email='$email'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
if($count==1){
    if(!isset($_SESSION['error'])){
    $_SESSION['error'] = "The email you tried to enter already exist";}
    
    else{
        $message = $_SESSION['error'];
        $_SESSION['error'] = $message. " AND The email you tried to enter already exist";}

header("location:Signup.php");
    $alreadyExist = true;
}

if($alreadyExist != true){
// To protect MySQL injection (more detail about MySQL injection)
$firstname = stripslashes($firstname);
$givenpassword = stripslashes($givenpassword);
$lastname = stripslashes($lastname);
$firstname = mysql_real_escape_string($firstname);
$lastname = mysql_real_escape_string($lastname);
$givenpassword = mysql_real_escape_string($givenpassword);
$givenpassword = md5($givenpassword);
$sql="INSERT INTO $tbl_name(`First_Name`, `Last_Name`, `Birthday`, `Email`, `Password`) VALUES ('$firstname', '$lastname', '$birthdate', '$email' , '$givenpassword')";
$result= mysql_query($sql);

// Mysql_num_row is counting table row

// Register $myusername, $mypassword and redirect to file "login_success.php"
if($result == true){
$_SESSION['firstname'] = $firstname;
//$_SESSION['password'] = $givenpassword;
$_SESSION['lastname'] = $lastname;
$_SESSION['logedin'] = true;
$_SESSION['birthday'] = $birthdate;
$_SESSION['email']=$email;
header("location:MyAccount.php");


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
        $mail->Username   = "i322201.noreply@gmail.com";  // GMAIL username

        $mail->Password   = "Froftafhef3"; 
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';

        //Set who the message is to be sent from
        $mail->setFrom('i322201.noreply@gmail.com', 'i322201-noreply');

        //Set an alternative reply-to address
        //$mail->addReplyTo('summer.vibes.info@gmail.com', 'First Last');

        //Set who the message is to be sent to
        $mail->addAddress($email, $firstname ." ". $lastname);

        //Set the subject line
        $mail->Subject = 'Registration of your account on my the website';

        //Read an HTML message body from an external file, convert referenced images to embedded,
        //convert HTML into a basic plain-text alternative body
        //$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));

        //Replace the plain text body with one created manually
        $body = 'Hello '.$firstname. ' '.$lastname. "\r\n" .'I am happy to hear that you registerd at my website ' ."\r\n" . 'Dont forget to give me feedback';

        $mail->Body = $body;

        //send the message, check for errors
        if (!$mail->send()) {
           $_SESSION['error']= "Mailer Error: " . $mail->ErrorInfo;
        }



}
else{header("location:Signup.php");
$_SESSION['error'] = $_SESSION['error']." could not create you";
}
mysql_close();
}
?>