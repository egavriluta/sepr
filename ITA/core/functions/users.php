<?php

function activate($email, $email_code)
{
    $email = mysql_real_escape_string($email);
    $email_code = mysql_real_escape_string($email_code);
    if(mysql_result(mysql_query("SELECT COUNT(`userid`) FROM `iusers` WHERE `email` = '$email' and `email_code` = '$email_code' and `active`=0;"),0) == 1)
    {
        mysql_query("UPDATE `iusers` SET `active` = 1 WHERE `email` = '$email'");
        return true;
    }
    else 
    {
        return false;
    }
}




 function change_profile_image($userid, $filetemp, $file_extention)
 {
     $file_name = '../db/'.substr(md5(time()), 0, 10).'.'.$file_extention;
     move_uploaded_file($filetemp, $file_name);
     $filepath = mysql_real_escape_string($file_name);
     mysql_query("UPDATE `iusers` SET `profileimg` = '$filepath' WHERE `iusers`.`userid` = $userid");
     
     
 }
 
 function change_wallpaper_image($userid, $filetemp, $file_extention)
 {
      $file_name = '../db/wallpaper'.substr(md5(time()), 0, 10).'.'.$file_extention;
       move_uploaded_file($filetemp, $file_name);
       $filepath = mysql_real_escape_string($file_name);
       mysql_query("UPDATE `iusers` SET `wallpaperimg` = '$filepath' WHERE `iusers`.`userid` = $userid");
 }


function category_user($category)
{
     
            if($category == 'Beginner')
            {echo "<a href='images/60daystofit/60-days-to-fit-program.pdf' target='_blank'><img src='images/60daystofit/60-days-program-download-pdf.png' class='imgprog' height='136' width='490'></a>";
            }else if ($category == 'Intermediate')
            {
               echo "<a href='images/60daystofit/60-days-to-fit-program.pdf' target='_blank'><img src='images/60daystofit/60-days-program-download-pdf.png' class='imgprog' height='136' width='490'></a>";
                echo "<a href='doc/1.pdf' target='_blank'><img src='doc/1.jpg' class='imgprog' height='200' width='320'></a>";
                  echo "<a href='doc/2.pdf' target='_blank'><img src='doc/2.jpg' class='imgprog' height='220' width='403'></a>";
            }
            else if ($category == 'Professional')
            {
                 echo "<a href='images/60daystofit/60-days-to-fit-program.pdf' target='_blank'><img src='images/60daystofit/60-days-program-download-pdf.png' class='imgprog' height='136' width='490'></a>";
                echo "<a href='doc/1.pdf' target='_blank'><img src='doc/1.jpg' class='imgprog' height='200' width='320'></a>";
                  echo "<a href='doc/2.pdf' target='_blank'><img src='doc/2.jpg' class='imgprog' height='220' width='403'></a>";
                  echo "<a href='doc/3.pdf' target='_blank'><img src='doc/3.jpg' class='imgprog' height='374' width='410'></a>";
                  echo "<a href='doc/4.pdf' target='_blank'><img src='doc/4.png' class='imgprog' height='152' width='327'></a>";
            }
           
}

function change_email($userid, $email)
{
     $userid = (int)$userid;
     $email = sanitize($email);
      mysql_query("UPDATE `iusers` SET `email` = '$email' WHERE `iusers`.`userid` = $userid");
}


function change_FirstName($userid, $FirstName)
{
    $userid = (int)$userid;
    $FirstName = sanitize($FirstName);
    
    mysql_query("UPDATE `iusers` SET `firstname` = '$FirstName' WHERE `iusers`.`userid` = $userid");
    
}
function change_LasttName($userid, $LastName)
{
    $userid = (int)$userid;
    
    $LastName = sanitize($LastName);
    mysql_query("UPDATE `iusers` SET `lastname` = '$LastName' WHERE `iusers`.`userid` = $userid");
    
}


function change_password($userid, $password)
{
    $userid = (int)$userid;
    $password = md5($password);
    mysql_query("UPDATE `iusers` SET `password`='$password' WHERE `userid` = '$userid';");
    
}

function image_change($userid, $file_extention)
{
    
    $userid = sanitize($userid);
     $file_name = '../db/'.substr(md5(time()), 0, 10).'.'.$file_extention;
     $filepath = mysql_real_escape_string($file_name);
    $sql = mysql_query("UPDATE `imessages` SET `image` = '$filepath' WHERE `imessages`.`userid` = $userid;");
    mysql_query($sql);
    
    
}




function register_user($username, $password, $firstname, $lastname, $email, $email_code, $category, $phone )
{
    $username = sanitize($username);
    $password = md5(sanitize($password));
    $firstname = sanitize($firstname);
    $lastname = sanitize($lastname);
    $email = sanitize($email);
    $email_code = sanitize($email_code);
    $active = sanitize($active);
    $category = sanitize($category);
    $phone = sanitize($phone);
    
    
    //array_walk($register_data, 'array_saitize');
    //$register_data['password'] = md5($register_data['password']);
   
  //  $fields = '`'.implode('`, `', array_keys($register_data)).'`';
    
   // $data = '\''.implode('\', \'', $register_data).'\'';
    
    
    mysql_query("INSERT INTO `iusers` (`userid`, `username`, `password`, `firstname`, `lastname`, `email`, `email_code`, `category`, `phonenr`) VALUES (NULL, '$username', '$password', '$firstname', '$lastname', '$email', '$email_code', '$category', '$phone')");
    
    
}




function email_exists($email)
{
    $email = sanitize($email);
    $query = mysql_query("SELECT COUNT('userid') FROM iusers WHERE email = '$email'");
    return (mysql_result($query, 0)==1) ? true : false ;
}


function profile_img($fileData)
{
    if(empty($fileData) === false)
    {
        return $fileData;
    }
    else 
    {
        return "uploads/profile/0.jpg";
    }
        
}



function wallpaper_img($fileData)
{
   
    if(empty($fileData) === false)
    {
        return $fileData;
    }
    else 
    {
        return "uploads/wallpaper/0.jpg";
    }
        
}


function user_data($userid)
{
    $data = array();
    
    $userid = (int)$userid;
    
    $func_num_args = func_num_args();
    
    $func_get_args = func_get_args();
    
    if ($func_num_args > 1)
    {
        unset($func_get_args[0]);
        $fields = '`'.implode('`, `', $func_get_args).'`';
        
        $data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `iusers` WHERE `userid`=$userid"));
        
        return $data;
    }
   
    
}



function logged_in()
{
    return (isset($_SESSION['userid'])) ? true : false;
    
}





function user_exists($username)
{
    $username = sanitize($username);
    $query = mysql_query("SELECT COUNT('userid') FROM iusers WHERE username = '$username'");
    return (mysql_result($query, 0)==1) ? true : false ;
    
    
}






function user_active($username)
{
      $username = sanitize($username);
    $query = mysql_query("SELECT COUNT('userid') FROM iusers WHERE username = '$username' AND active = '1'");
    return (mysql_result($query, 0)==1) ? true : false ;
    
    
}



function curenttime()
{
    return mysql_result(mysql_query("SELECT CURRENT_TIMESTAMP FROM DUAL"), 0, 'CURRENT_TIMESTAMP') ;
}

function user_id_form_username($username)
{
    $username = sanitize($username);
    return mysql_result(mysql_query("SELECT userid FROM iusers WHERE username = '$username' "), 0, 'userid');
    
}


function login($username, $password)
{
    $userid = user_id_form_username($username);
    
    $username = sanitize($username);
    $password = md5($password);
    
    return (mysql_result(mysql_query("Select COUNT(userid) From iusers Where username='$username' and password = '$password';"), 0) == 1) ? $userid : false;
    
  
   
   
}



?>
