 <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <link rel="stylesheet" type="text/css" media="all" href="css/styleLog.css">
  <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
 
 <?php
 include 'UserLog.php';
 ?>

		<div class="clearfix">
       
  
			<div class="logo"><a href="index.php"><img src="images/logo.png" alt="LOGO" height="70" width="180"></a></div>
  <div id="wrapper">
    <div id="SocialIcons">
           <div id="w">
    <div id="content">
     
      
      <center><a href="#loginmodal" class="flatbtn" id="modaltrigger">Modal Login</a></center>
    </div>
  </div>
      <a href="http://www.facebook.com/" target="_blank"><img src="images/facebook.png" width="49" height="49"  alt="facebook" class="trans" /></a>
      
     <a href="http://www.google.com/" target="_blank"> <img src="images/Google.png" width="47" height="47" alt="twitter" class="trans" id="googlee"/></a>
  
    
    
      </div>
       <script type="text/javascript">
$(function(){
  $('#loginform').submit(function(e){
    return false;
  });
  
  $('#modaltrigger').leanModal({ top: 110, overlay: 0.45, closeButton: ".hidemodal" });
});
</script>
    </div>
                        
                        <div id="menu">
						<ul>
							<li i><a href="index.php">ABOUT</a>
                    				<ul>
                    <li><a href="powerlifting.php">Powerlifting</a></li>
              		<li><a href="weightlifting.php">Weightlifting</a></li>
                							<li><a href="gym.php">Gym</a></li>
                                            <li><a href="CrossFit.php">CrossFit</a></li>
                								<li><a href="personal.php">Own experience</a></li>
                							<li class="lastitem"><a href="index.php">News</a></li>
                    			   </ul>
							</li>
							
                            <li><a href="#">WORKOUT</a>
                      				<ul>
                    
                    						
                							<li><a href="workout.php">Custom workout</a></li>
                							<li><a href="60daysfit.php">60 days to fit</a></li>
                							<li><a href="wormup.php">Warmup</a></li>
                						
                
               				  </ul>
						  </li>
				
                			<li><a href="#">HEALTH</a>
                            
                         			<ul>
                                    
                   							 <li><a href="diet.php">Custom diet</a></li>
                							 <li><a href="rest.php">Rest period</a></li>
                							 
                							
           				      </ul>
					      </li>
                            
                            
								<li><a href="Chat.php" id="lastitem">FORUM</a></li>
				
							
		  </ul>
    </div>
                         
                </div>
