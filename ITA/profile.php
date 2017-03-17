
<?php
include 'core/init.php';

if(isset($_GET['username']) === true && empty($_GET['username']) === false)
{
    $username = $_GET['username'];
    if(user_exists($username) === true)    {
            $userid = user_id_form_username($username);
             $profile_data = user_data($userid,'firstname','lastname','category','profileimg','wallpaperimg');
                                             }
       else 
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
    

    
        
        
    <div id="UserAcc" class="Wallpaper" style="background-image: 
         url('<?php echo wallpaper_img($profile_data['wallpaperimg'])?>')">
        
        <style>
.Wallpaper {
  display: block;
  margin-right: auto;
  margin-left: auto;
  width: 1350px;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  
  border-bottom-width: 4px;
	border-bottom-style: solid;
	border-bottom-color: #E11C2A; 
        border-right-width: 4px;
	border-right-style: solid;
	border-right-color: #E11C2A; 
   border-left-width: 4px;
	border-left-style: solid;
	border-left-color: #E11C2A; 
}
#UserAcc
{  height: 309px;
  position: relative;
  display: block;
  
 
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;

}



</style>
 
        <div id="UserAccContent" >
            <a href=<?php echo profile_img($profile_data['profileimg'])?> class="fancybox" rel="group"><img src=<?php echo profile_img($profile_data['profileimg'])?> alt="" height="300" width="300" id="userImg"/></a>
            <p id="pusername"><?php echo $profile_data['firstname']?> <?php echo $profile_data['lastname']?></p>
  <p id="pcategory"><?php echo $profile_data['category']?> </p>
        </div>
<style>
    #userImg
    {
        float:left;
        margin-left: 50px;
          background-color: #fff;
  border: 4px solid #fff;
  -webkit-border-radius: 2px;
  margin-top: 1px;
    }
    
    
    
    
</style>

<style>
    #pcategory
    {
        color: #fff;
     font-family: helvetica, arial, sans-serif;
float:left;
  font-size: 30px;
 
    text-shadow: 0 0 3px rgba(0,0,0,.8); 
     padding-left: 20px;
      margin-top: 0px;
      width: 800px;
    }
    #pusername{
    color: #fff;
     font-family: helvetica, arial, sans-serif;
float:left;
  font-size: 30px;
 margin-top: 220px;

 padding-left: 20px;
 width: 800px;
    text-shadow: 0 0 3px rgba(0,0,0,.8); 
     margin-bottom: 0px;
    }
</style>
     
     
     
    
    
    </div>
    
    <?php 
        
function repeat_str($str,$nr)
{
  $i = 1;
while ($i <= $nr):
    echo $str;
    $i++;
endwhile;
   
}
        
        ?>
    
    
    
    <div id="pwra">
        <div id="pinfo">
           
        </div>
        <div id="potion">
            <?php
            category_user($profile_data['category']);
            
            ?>
        </div>
   
    </div>
    <style>
        #errorLog
        {  text-decoration: none;
  display: block;
  font-size: 1.1em;
  font-weight: bold;
  color: #E11C2A;
  margin-bottom: 3px;
        margin-left: 20px;
        
        
        }
        
        .imgprog
        {
            padding: 10px;
            float: left;
            margin-left: 100px;
         
        }
        
        .edit
        {
            float:right;  
        } 
        .accordion-section-title
        
        {
            text-decoration: none;
        }
        
    </style>
    <style>
        #pwra
        {margin-right: auto;
  margin-left: auto;
  width: 1350px;
  padding: 0px;
  margin-top: 0px;}
        
    #potion
    {
       
       border: 1px solid;
  border-color: #e5e6e9 #dfe0e4 #d0d1d5;
  -webkit-border-radius: 3px;
       height: 500px;
       width: 1230px;
       
        margin-left: 50px;
        overflow-y: scroll;
         overflow-x: hidden;
    }
    
    
    
    
      
</style>
         
  
   
    

    <!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

        <!-- Add fancyBox -->
<link rel="stylesheet" href="source/jquery.fancybox.css?" type="text/css" media="screen" />
<script type="text/javascript" src="source/jquery.fancybox.pack.js?"></script>

        <script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>
<script type="text/javascript">
 var span1 = document.getElementsByClassName('upload-path');
// Button
var uploader1 = document.getElementsByName('upload');
// On change
for( item in uploader1 ) {
  // Detect changes
  uploader1[item].onchange = function() {
    // Echo filename in span
    span1[0].innerHTML = this.files[0].name;
  }
}
</script>

<script type="text/javascript">
 var span = document.getElementsByClassName('file-path');
// Button
var uploader = document.getElementsByName('file');
// On change
for( item in uploader ) {
  // Detect changes
  uploader[item].onchange = function() {
    // Echo filename in span
    span[0].innerHTML = this.files[0].name;
  }
}
</script>
<style>
    
    
    .styled-button-8 {
	background: #25A6E1;
	background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter: progid DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
	padding:8px 13px;
	color:#fff;
	font-family:'Helvetica Neue',sans-serif;
	font-size:17px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9
     
    
    }
    .styled-button-8
    {
        cursor: pointer;
       margin-left: 20px;
    }
    
    
    
    div.browse-wrap {
        top:0;
        left:0;
        margin:20px;
        cursor:pointer;
        overflow:hidden;
        padding:20px 60px;
        text-align:center;
        position:relative;
        background-color:#f6f7f8;
        border:solid 1px #d2d2d7;}
    div.title {
        color:#3b5998;
        font-size:14px;
        font-weight:bold;
        font-family:tahoma, arial, sans-serif;}
    input.upload {
        right:0;
        margin:0;
        bottom:0;
        padding:0;
        opacity:0;
        height:300px;
        outline:none;
        cursor:inherit;
        position:absolute;
        font-size:1000px !important;}
    span.upload-path {
        text-align: center;
        margin:20px;
        display:block;
        font-size: 80%;
        color:#3b5998;
        font-weight:bold;
        font-family:tahoma, arial, sans-serif;
}
</style>

<style>
    
    
    .styled-button-81 {
	background: #25A6E1;
	background: -moz-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,#25A6E1),color-stop(100%,#188BC0));
	background: -webkit-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -o-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: -ms-linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	background: linear-gradient(top,#25A6E1 0%,#188BC0 100%);
	filter: progid DXImageTransform.Microsoft.gradient( startColorstr='#25A6E1',endColorstr='#188BC0',GradientType=0);
	padding:8px 13px;
	color:#fff;
	font-family:'Helvetica Neue',sans-serif;
	font-size:17px;
	border-radius:4px;
	-moz-border-radius:4px;
	-webkit-border-radius:4px;
	border:1px solid #1A87B9
     
    
    }
    .styled-button-81
    {
        cursor: pointer;
       margin-left: 20px;
    }
    
    
    
    div.browse-wrap1 {
        top:0;
        left:0;
        margin:20px;
        cursor:pointer;
        overflow:hidden;
        padding:20px 60px;
        text-align:center;
        position:relative;
        background-color:#f6f7f8;
        border:solid 1px #d2d2d7;}
    div.title1 {
        color:#3b5998;
        font-size:14px;
        font-weight:bold;
        font-family:tahoma, arial, sans-serif;}
    input.upload1 {
        right:0;
        margin:0;
        bottom:0;
        padding:0;
        opacity:0;
        height:300px;
        outline:none;
        cursor:inherit;
        position:absolute;
        font-size:1000px !important;}
    span.file-path {
        text-align: center;
        margin:20px;
        display:block;
        font-size: 80%;
        color:#3b5998;
        font-weight:bold;
        font-family:tahoma, arial, sans-serif;
}
</style>

      <?php 
include 'includes/footer.php';
   ?>
    
    </body>
</html>
