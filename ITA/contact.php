<?php 
include 'core/init.php';

?>

<!DOCTYPE html>
<html>
<head>
<title>MaxFitness</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" type="image/x-icon" href="images/icon/favicon.ico">
<link href="css/style.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" type="image/x-icon" href="images/icon/favicon.ico">

<link href="css/contacStyle.css" rel="stylesheet" type="text/css">
    
</head>
<body>


    
<?php 
            include 'includes/header.php';
?>
    
 <div class="ContactInfo">
   <img src="images/logocontact.png" alt="MaxFitness"/>
     
 <div class="ContactBody">
     
     
    <form name="contactform" method="post" action="php/contact.php">
 
<table width="450px">
 
<tr>
 
 <td valign="top">
 
  <label for="first_name">First Name *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="first_name" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top"">
 
  <label for="last_name">Last Name *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="last_name" maxlength="50" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="email">Email Address *</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="email" maxlength="80" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="telephone">Telephone Number</label>
 
 </td>
 
 <td valign="top">
 
  <input  type="text" name="telephone" maxlength="30" size="30">
 
 </td>
 
</tr>
 
<tr>
 
 <td valign="top">
 
  <label for="comments" id="lbComents">Comments *</label>
 
 </td>
 
 <td valign="top">
 
  <textarea  name="comments" maxlength="1000" cols="25" rows="10" id="comentsId"></textarea>
 
 </td>
 
</tr>
 
<tr>
 
 <td colspan="2" style="text-align:center">
 
  <input type="submit" value="Submit" id="submitBt">   
 
 </td>
 
</tr>
 
 
 
 
</table>
 
</form>
                                     
    </div>
                                    
</div>
    
                                     
    

    
  
    
    
    
    
    
    
    
    
    
        
        
      <?php 
include 'includes/footer.php';
   ?>







</body>
</html>