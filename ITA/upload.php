<?php 
 include 'core/init.php';
 protect_page();
 $errors4 = array();
if(empty($_POST) === false)
{
    $required_fields = array('CurrentPassword','NewPassword');
    foreach ($_POST as $key=>$value)
    {
        if(empty($value) && in_array($key, $required_fields) === true)
        {
            $errors4[] = 'Fields are required!';
            break 1;
        }
    }
    
    if(md5($_POST['CurrentPassword']) === $user_data['password'])
    {
        if(strlen($_POST['NewPassword']) < 6)
        {
             $errors4[] = 'Your password must be at least 6 characters';
        }
        
    }
    else 
    {
         $errors4[] = 'Your current password is not correct!';
    }
    
    
}
if(empty($_POST) === false && empty($errors4) === true)  
{
    change_password($session_user_id, $_POST['NewPassword']);
    header('Location: userWebPage.php?successpasschange');
    exit();
    
}
 
 $errors6 = array();
if(empty($_POST) === false)
{
    $required_fields = array('FirstName');
    foreach ($_POST as $key=>$value)
    {
        if(empty($value) && in_array($key, $required_fields) === true)
        {
            $errors6[] = 'Fields are required!';
            break 1;
        }
    }

}
if(empty($_POST) === false && empty($errors6) === true)  
{
    change_FirstName($session_user_id, $_POST['FirstName']);
    header('Location: userWebPage.php?successfirstnamechange');
    exit();
    
}
 $errors5 = array();
if(empty($_POST) === false)
{
    $required_fields = array('LastName');
    foreach ($_POST as $key=>$value)
    {
        if(empty($value) && in_array($key, $required_fields) === true)
        {
            $errors5[] = 'Fields are required!';
            break 1;
        }
    }

}
if(empty($_POST) === false && empty($errors5) === true)  
{
    change_LasttName($session_user_id, $_POST['LastName']);
    header('Location: userWebPage.php?successnamechange');
    exit();
    
}
function output_errors_upload($errors)
{
    $output = array();
    foreach($errors as $error)
    {
        $output[] = '<p id="errorLog">'.$error.'</li>';
    }
    return implode('', $output);
   
}

function wallpaper_errors_upload($errors)
{
    $output = array();
    foreach($errors as $error)
    {
        $output[] = '<p id="errorLog">'.$error.'</li>';
    }
    return implode('', $output);
   
}







$filename = $_FILES['upload']['name'];
$name = $user_data['userid'];
$type = $_FILES['upload']['type'];
$tmp_name = $_FILES['upload']['tmp_name'];

$extension = strtolower(substr($filename, strpos($filename, '.') + 1 ));
if(isset($filename))
{
    if(!empty($filename))
    {
        if($extension=='jpg' && $type='image/jpeg')
        {
            
        $location = '../db/';
        change_profile_image($session_user_id, $tmp_name, $extension);
        image_change($session_user_id,$extension);
         header('Location: userWebPage.php');
             exit();
        }
        else 
        {
            $errors[]='The file extension is not compatible!';
        }
    }
    else 
    {
      $errors[] = 'Please select an image!';
    }  
}




$wallpaperName = $_FILES['file']['name'];
$wtype = $_FILES['file']['type'];
$wtmp_name = $_FILES['file']['tmp_name'];

$wextension = strtolower(substr($wallpaperName, strpos($wallpaperName, '.') + 1 ));
$errors1 = array();
if(isset($wallpaperName))
{
    if (!empty($wallpaperName))
    {
       if($wextension=='jpg' && $wtype='image/jpeg') 
       {
            $wlocation = '../db/wallpaper/';
        change_wallpaper_image($session_user_id, $wtmp_name, $wextension);
        header('Location: userWebPage.php');
             exit();
       }
        else 
        {
            $errors1[]='The file extension is not compatible!';
        }
    }
    else 
    {
      $errors1[] = 'Please select an image!';
    }
    
}







?>
