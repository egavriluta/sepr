
<?php
include 'core/init.php';
logged_in_redirect();

if(isset($_GET['email'], $_GET['email_code']) === true )
{
    $email = trim($_GET['email']);
    $email_code = trim($_GET['email_code']);
    
    if (email_exists($email) === false)
    {
        header('Location: index.php');
        exit();
    }
    else if(activate($email, $email_code) === false)
    {
            header('Location: index.php');
             exit();
    }
    
    
    
}else 
{
    header('Location: index.php');
    exit();
}



?>
<!DOCTYPE html>
<html>
<head>
<title>MaxFitness</title>
<meta name="viewport" content="initial-scale=1, maximum-scale=1">

	<link rel="stylesheet" type="text/css" href="../assets-2/css/reset.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Abeezee:400|Open+Sans:400,600,700|Source+Sans+Pro:400,600">
	
	<link rel="stylesheet" type="text/css" href="css/demoAcord.css">

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/accordion.js"></script>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="images/icon/favicon.ico">

<link href="css/style.css" rel="stylesheet" type="text/css">
    
<link rel="stylesheet" href="css/styleqwe.css">
</head>
<body>


<?php 
            include 'includes/header.php';
?>
    
    <div id ="accactivdiv">
    <img src="images/ok.png" id="imgacctive"/><p id="accactive">You have successfully activated your account!</p>
    </div>
    <style>
        #imgacctive{
           
            margin-top: 40px;
            margin-left: 80px;
        }
        
       #accactivdiv
       {
           margin-left: auto;
            margin-right: auto;
            width: 600px;
            height: 600px;
       }
       #accactive
       {
           font-weight: bold;
           font-size: 26px;
           color: green;
       }
       
       
       
        
        </style>

      <?php 
include 'includes/footer.php';
   ?>
    
    </body>
</html>
