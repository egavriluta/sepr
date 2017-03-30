<?php
  include 'core/init.php';
    
    if(isset($_POST['text']) && isset($_POST['name']))
    {
        $text = mysql_real_escape_string($_POST['text']);
        $name = mysql_real_escape_string($_POST['name']);
        $image = mysql_real_escape_string(profile_img($user_data['profileimg']));
         
        
        if(!empty($text) && !empty($name))
        {
            $sql = mysql_query("INSERT INTO imessages VALUES(NULL,'".$name."','".$text."','".$user_data['userid']."','$image',CURRENT_TIMESTAMP)");
            mysql_query($sql);
            
            echo " 
                <div class='messageUser'>
                <img src='$image' alt='user image' height='80' width='80' class='mesageImage'/>
                <a href='http://athena.fhict.nl/users/i324079/ITA/profile.php?username=".htmlspecialchars($name)."'><p class='messageName'>".htmlspecialchars($name)."</p></a>
                <p class='messageText' >
                ".htmlspecialchars($text)."
                </p>
                <p class='timeMessage'>Posted at: ".curenttime()."</p>
                </div>
                ";
        }
        
    }


            

?>
