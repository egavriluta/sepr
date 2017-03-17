<?php 
include 'ChatPoster.php';

?>



<!DOCTYPE html>
<html>
<head>
<title>MaxFitness</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="css/style.css" rel="stylesheet" type="text/css">


    <script type="text/javascript" src="js/jquery.min.js"></script>

        
<script type="text/javascript" src="js/animate.js"></script>

    
    
<link rel="shortcut icon" type="image/x-icon" href="images/icon/favicon.ico">

<link href="css/ChatStyle.css" rel="stylesheet" type="text/css">  

<link href="http://fonts/googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css"> 

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="js/chat.js"></script>

</head>
<body>

    
    <div id="chatcontent">
    
    
<?php 
            include 'includes/header.php';
?>

    
    <div class="chatContainer">
        <div class="chatHeader">
            <h3>Welcome <?php echo $user_data['username']?>!</h3>
            
        </div>
                
        <div class="chatMessages">

        </div>
        <div class="chatBottom">
            <form action="#" onsubmit="return false;" id="ChatForm">
                
                <input type="hidden" id="name" value="<?php echo $user_data['username']?>"/>
                <input type="text" name="text" id="text" value="" placeholder="Your message"/>
                <input type="submit" name="submit" value="Post"/>
            </form>
            
            
            
        </div>
        
        
        
        
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div>
    

    



        
   <?php 
include 'includes/footer.php';
   ?>



</body>
</html>