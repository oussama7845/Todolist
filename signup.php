<?php



require_once('./class/BDDclass.php'); 

$BDD=new BDD('localhost','todolist','root','root');
if($_SERVER["REQUEST_METHOD"]==="POST"){

	$Firstname=$_POST["Firstname"];
	$password=$_POST["password"];
	$Lastname=$_POST["Lastname"];
	$email=$_POST["email"];
	$Type=$_POST["Type"];

	$result1=$BDD->selectquery("SELECT count(*) as nb FROM users WHERE email =? ",array($email));






//if data already exist

if($result1[0]['nb']){
	
echo "email or password already taken please try another one";


  
  
}else{
   $BDD->nonselectquery('INSERT INTO users (Firstname,Lastname,password,email,Type ) VALUES (?,?,?,?,?)',(array($Firstname,$Lastname,$password,$email,$Type) ));
   $_SESSION["signup"]="you signed up succefully please log in";
   header("location: login.php");
  

}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>SIGN-UP</title>
</head>
<body>
<br><br>
	
		
  
    <!--<form action="#" method="POST">-->
    <div class="container">
	<!-- code here -->
	<div class="card">
		<div class="card-image2">	
			
		</div>
		<form action="#" id="Form1" method="POST">
			<div class="input">
				<input type="text" name="email" class="input-field"  required/>
				<label class="input-label">email</label>
			</div>
			<div class="input">
				<input type="text" name="Firstname" class="input-field"  required/>
				<label class="input-label">Firstname</label>
			</div>
			<div class="input">
				<input type="text" name="Lastname" class="input-field"  required/>
				<label class="input-label">Lastname</label>
			</div>
			
						<div class="input">
				<input type="password" name="password" class="input-field" required/>
				<label class="input-label">Password</label>
			</div>
			<div>
			<select name="Type" id="Type">
   
                  <option value="ADMIN">ADMIN</option>
                  <option value="USER">USER</option>
                  

             </select>
			</div>


            <div class="action">
				<button class="action-button">SIGN-UP</button>
			</div>
			
		</form>
		
	</div>
</div>


<!--</form>-->


<br><br>
</body>
</html>