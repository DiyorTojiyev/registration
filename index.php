<?php

declare(strict_types=1);

ini_set('display_erors','1');
error_reporting(E_ALL);

$host = 'localhost';
$user = 'root';
$password = '';
$dbName = 'registratsiya';

$dsn = "mysql:dbname=$dbName;host=$host";
$pdo = new PDO($dsn, $user, $password);



if(!empty($_POST['btn'])){

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $birthday = $_POST['birthday'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $pnumber = $_POST['pnumber'];
  $address = $_POST['address']; 

if(!(empty($fname)&&empty($lname)&&empty($birthday)&&empty($gender)&&empty($email)
&&empty($pnumber)&&empty($address))){
  $pdoStatement = $pdo ->prepare("
  INSERT INTO `registratsiya`
  (`fname`, `lname`, `birthday`, `password`,`gender`,`email`,`pnumber`, `address`)
  VALUES
  (:fname, :lname, :birthday, :password,:gender,:email,:pnumber, :address)
  ");

  $pdoStatement -> bindParam(':fname',$fname);
  $pdoStatement -> bindParam(':lname',$lname);
  $pdoStatement -> bindParam(':birthday',$birthday);
  $pdoStatement -> bindParam(':password',$password);
  $pdoStatement -> bindParam(':gender',$gender);
  $pdoStatement -> bindParam(':email',$email);
  $pdoStatement -> bindParam(':pnumber',$pnumber);
  $pdoStatement -> bindParam(':address',$address);

  if(!$pdoStatement -> execute()){
    print 'Qandaydir xatolik mavjud';
    exit;
  }
  /*
  echo '<h1>Xush kelibsiz! ' . $fname .'</h1>';
  echo'<br/>';
  echo'<h2>Siz muvafiqiyatli ravishda ro\'yxatdan o\'tdingiz</h2>';
  echo'<br/>';
  echo'<h3>Davvom ettirish uchun <a href="x">bu yerga bosing </a></h3>';
}else{
  echo '<h1>Xush kelibsiz!</h1>';
  echo'<br/>';
  echo'<h2>Iltimos barcha qatorlarni to\'ldiring</h2>';
  echo'<br/>';
  echo'<h3>Qaytadan urinib kurish uchun<a href = "x">buyerga bosing</h3>';
} */
}
} 
?> 
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>


<div class="wrapper">

<center>
    <?php 
    if(isset($_POST['btn'])){
      print'<h1>Xush kelibsiz! ' . $fname .'</h1>';
      print'<br/>';
      print'<h2>Siz muvafiqiyatli ravishda ro\'yxatdan o\'tdingiz</h2>';
      print'<br/>';
      print'<h3>Davvom ettirish uchun <a href="x">bu yerga bosing </a></h3>';
    }
    ?>
    </center>

  <div id="block" <?php if(isset($_POST['btn'])){echo'style="display:none"';}?>>

    <div class="title">
      Registration Form
    </div>
    <form class="form"  method="post">
       <div class="inputfield">
          <label>First Name</label>
          <input type="text" name="fname" class="input" required>
       </div>  
        <div class="inputfield">
          <label>Last Name</label>
          <input type="text" name="lname"  class="input" required>
       </div>  
       <div class="inputfield">
          <label>birthday</label>
          <input type="date" name="birthday"  class="input" required>
       </div>  
      <div class="inputfield">
          <label>Password</label>
          <input type="password" name="password" class="input" required>
       </div> 
        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select name="gender" required>
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
       </div> 
        <div class="inputfield">
          <label>Email Address</label>
          <input type="text" name="email" class="input" required>
       </div> 
      <div class="inputfield">
          <label>Phone Number</label>
          <input type="number" name="pnumber" class="input" required>
       </div> 
      <div class="inputfield">
          <label>Address</label>
          <textarea name="address" class="textarea" required></textarea>
       </div> 
      <!-- <div class="inputfield">
          <label>Postal Code</label>
          <input type="text" class="input">
       </div> 
      <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
       </div> -->
      <div class="inputfield">
        <input type="submit" value="Register" name="btn" class="btn">
      </div>
</form>
</div>	
	
</body>
</html>