<?php
require_once("utils/_init.php");
//require_once("utils/storage.php");
require_once("header.php");
// define variables and set to empty values
//$name = $email = $gender = $comment = $website = "";
$users=$users_store->findAll();


if (verify_post("name","email","psw","psw_repeat")) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $psw = $_POST["psw"];
  $psw_repeat = $_POST["psw_repeat"];



    if($psw != $psw_repeat){
       $messages[] = "Password does not match";
    }
    else {
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
        "pass" => $psw
        ];
    
        $users_store->add($user);
        $msg = "Successful Registration";
        //echo "<script type='text/javascript'>alert('$msg');</script>";
        redirect("log_in.php");
        }
     }
}



    // convert form data to json format
    /*
    function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
        $postArray = array(
          "name" => $_POST['name'],
          "email" => $_POST['email'],
          "psw" => $_POST['psw'],
          
        ); //you might need to process any other post fields you have..
    
    $json = json_encode( $postArray );
    // make sure there were no problems
    //if( json_last_error() != JSON_ERROR_NONE ){
        //exit;  // do your error handling here instead of exiting
    // }
    $file = 'user_data.json';
    // write to file
    //   note: _server_ path, NOT "web address (url)"!
    file_put_contents( $file, $json, FILE_APPEND);
   
    } 
    
    */
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="sign_up.css"/>
    <title>Document</title>
</head>
 <form action="<?php echo $_SERVER["PHP_SELF"];?>" style="border:1px solid #ccc" method = "post">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="someone@example.com" name="email" required>

   
    <label for="psw">Password</label>
    <input type="text" id="psw" name="psw" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <label for="psw_repeat">Repeat Password</label>
    <input type="text"  name="psw_repeat" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn">Sign Up</button>
    </div>
  </div>
</form>

<?php require("messages.php"); ?>