<div class="clearfix">
       
  
			<div class="logo"><a href="index.php"><img src="images/logo.png" alt="LOGO" height="70" width="180"></a></div>
  <div id="wrapper">
    <div id="SocialIcons">
        
        <a href="http://athena.fhict.nl/users/i324079/ITA/profile.php?username=<?php echo $user_data['username']; ?>"><div id="userImgRegi" class="circle" style="background-image: 
       url('<?php echo profile_img($user_data['profileimg'])?>')"><style>
.circle {
  display: block;
  
  
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center center;
  
 
  border: 2px solid #CCC;
   
}
</style></div></a>
      
      <a href="http://athena.fhict.nl/users/i324079/ITA/profile.php?username=<?php echo $user_data['username']; ?>"> <span id="userNameRegi"><?php echo $user_data['firstname']; ?> <?php echo $user_data['lastname']; ?></span> </a>
        <br/>
       <a href="http://athena.fhict.nl/users/i324079/ITA/profile.php?username=<?php echo $user_data['username']; ?>"> <span id="userSportRegi"><?php echo $user_data['category']; ?></span> </a> 	
       <a href="userWebPage.php">
           <img src="images/wrench.png" height="40" width="40" id="fix"> 
           <style>
               #fix{
                   float: right;
                   margin-top: -30px;
                   margin-right: 10px;
               }     
                        </style>
       </a>
    
      </div>
      
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
                							<li class="lastitem"><a href="#PreviousP">News</a></li>
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
                            
                            
								<li><a href="Chat.php">FORUM</a></li>
				
							<li><a href="logout.php" id="lastitem">LOG OUT</a>		</li>
		  </ul>
    </div>
  </div>