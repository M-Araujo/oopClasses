<!DOCTYPE html>
<?php  require_once 'classes/user.php';?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form method="post" action="">  
  Name: <input type="text" name="name">
  <br><br>
  
  Age: <input type="text" name="age">
  <br><br>

  Mobile: <input type="text" name="mobile">
  <br><br>

  Address: <input type="text" name="address">
  <br><br>

  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <br><br>
  Skills: <input type="text" name="skills">
  <br><br>
  * All the fields are required.
  <br><br>

  <br><br>
  <input type="submit" name="submitBtn" value="Submit">  
</form>
    
</body>
</html>