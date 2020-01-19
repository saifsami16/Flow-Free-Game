
<?php
require_once("utils/_init.php");
//require_once("utils/storage.php");
require_once("header.php");

$users=$users_store->findAll();
$current_user = null;
$email = null;
$messages=[];

if (verify_post("email","pass")) {
  $email = $_POST["email"];
    $pass = $_POST["pass"];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)){
    

    foreach($users as $user){
        if($email === $user["email"]){
          if(sha1($pass) === $user["pass"]){
                $current_user = $user;
          }
          else{
             $messages[] = "The password is incorrect!";
             break;
          }
        }
      }
      if($current_user == null){
          if(empty($messages)) $messages[] = "The account does not exist!";
      }
      else{
        session_start();
       // $_SESSION['name'] = $row['username']; 
        $_SESSION['banda'] = $current_user;
        redirect("levels.php");
      }
    }
    else $messages[] = "This is not a valid email address"; 
}

?>
<?php require("messages.php"); ?>
<form method="post">
<form action="<?php echo $_SERVER["PHP_SELF"];?>" style="border:1px solid #ccc" method = "post">
  <div class="container">
    <h1>Log In</h1>
    <p>Please enter your usernmae and password</p>
    <hr>


    <label for="email"><b>Email</b></label>
    <input type="email"  name="email" <?php if(!empty($messages)):?>value="<?= $email;?>"<?php endif;?> required>

    <label for="pass">Password</label>
    <input type="password" name="pass" required>
    
  <br><br>
  <div class="clearfix">
      <button type="submit" class="signupbtn">Log In</button>
    </div>
</form>
<br>
  Dont have an account yet. <a href="sign_up.php">Sign up</a>
