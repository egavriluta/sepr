 
<?php 
function output_errors($errors)
{
    $output = array();
    foreach($errors as $error)
    {
        $output[] = '<p id="errorLog">'.$error.'</p>';
    }
    return implode('', $output);
   
}
?>


<div id="loginmodal" style="display:none;">
    <h1>User Login</h1>
    <form action="index.php" method="post" name="loginform">
      <label for="username" id="iduser">Username:</label>
      <input type="text" name="username" id="username" class="txtfield" tabindex="1">
      
      <label for="password" id="idpass">Password:</label>
      <input type="password" name="password" id="password" class="txtfield" tabindex="2">
      <div id="Registr"><a href="Registration.php">Create Account</a></div>
      
      <div class="center"><input type="submit" id="loginbtn" class="flatbtn-blu hidemodal" value="Log in" tabindex="3"></div>
      
      <?php 
      
      echo output_errors($errors);
      
      ?>
      
      
    </form>
  </div>