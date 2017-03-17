<?php

include 'core/init.php';

$sql = mysql_query("SELECT * FROM imessages;");




while ($fetch = mysql_fetch_assoc($sql))
{
    $name = $fetch['name'];
    $message = $fetch['message'];
    $image = $fetch['image'];
    $time = $fetch['time'];
    
    
     echo    " 
                <div class='messageUser'>
                <img src='$image' alt='user image' height='80' width='80' class='mesageImage'/>
                <a href='http://athena.fhict.nl/users/i324079/ITA/profile.php?username=".$name."'><p class='messageName'>".$name."</p></a>
                <p class='messageText' >
                ".$message."
                </p>
                <p class='timeMessage'>Posted at: $time</p>
                </div>
                   ";
    
    
}
?>
