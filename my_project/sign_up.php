<?php
require_once("utils/_init.php");
require_once("header.php");
$users=$users_store->findAll();

$levels_cur = $levels_store->findAll();

// $users_store = new JSONStorage("${BASE_DIR}/user_data.json");
// $levels_store = new JSONStorage("${BASE_DIR}/about_levels.json");
// $levels_data = new JSONStorage("${BASE_DIR}/levels_data.json");
//$messages = [];
$name = null;
$email = null;
$psw = null;
$psw_repeat = null;

if(verify_post("name","email","psw","psw_repeat")) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $psw = $_POST["psw"];
  $psw_repeat = $_POST["psw_repeat"];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $messages[] = "Invalid email format";
  }

  if($psw != $psw_repeat){
    $messages[] = "Password does not match";
 }

  foreach($users as $user){
   
    if($email===$user["email"]){
      $messages[] = "The account with this email already exists!";
      break;
    }
  }
    
    
      if(empty($messages)){
        
         $user = [
          "id"=>(count($users)+1),
          "name" => $name,
          "email" => $email,
          "pass" =>sha1($psw)
          ];
    // Create another json file which will contain the name of all the solved puzzles by you. OR create amother method which can update the puzzle when you want 
         $users_store->add($user);

          $users = $users_store->findAll();
           $i=0;
         foreach($users as $key => $val){
           if($email === $users[$key]["email"]){
             $i = $key;
             break;
           }
         }
         $j = 0;
         foreach($levels_cur as $k):
             $j = $k["name"];
            $users[$i][$j]= "no";
         
        // // $newJsonString = json_encode($users);
        
         $users_store->update($i, $users[$i]);
        
         endforeach;
          // Another method which comes to mind is this one

          session_start();
          // $_SESSION['name'] = $row['username']; 
          $_SESSION['banda'] = $user;
          redirect("levels.php");
          //redirect("log_in.php"); //Make it redirect to levels.php in future and also start php session with it.
   

        }
     }





?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="sign_up.css"/>
    <title>Document</title>
    
</head>

<?php require_once("messages.php");?> 

 <form action="<?php echo $_SERVER["PHP_SELF"];?>" method = "post">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
<input type="text" placeholder="Enter Name" name="name" <?php if(!empty($messages)):?>value="<?= $name;?>"<?php endif;?> required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="someone@example.com" name="email" <?php if(!empty($messages)):?>value="<?= $email;?>"<?php endif;?> required>

   
    <label for="psw">Password</label>
    <input type="password" id="psw" name="psw" required>
    <label for="psw_repeat">Repeat Password</label>
    <input type="password"  name="psw_repeat" required>

    <p>By creating an account you agree to our Terms & Privacy.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

