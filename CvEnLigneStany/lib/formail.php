<?php

function sec(String $atiny){
	if(isset($atiny)){
		$atiny = trim($atiny);
		$atiny = stripcslashes($atiny);
		$atiny = htmlspecialchars($atiny); 
		return $atiny;
	}else
		header("Location: ../index.php");
	
}
function send(String $at1, String $at2, String $at3, String $at4){
	$mailko = "stanyrazafindrakototo@gmail.com";
	$header = "De la part de ${at1}: \n<${at2}> \nsur: ${at3}";
	mail($mailko, "Un client intéressé par le CV en ligne", $at4,$header);
	return true;
}
if(isset($_SERVER)){
	if ($_SERVER['REQUEST_METHOD'] === "POST"){

		
		extract($_POST);
		$name = sec($name);
		$tel = filter_var($tel,FILTER_SANITIZE_NUMBER_FLOAT);
		$email = sec($email);
		$email = filter_var($email,FILTER_SANITIZE_EMAIL);
		$msg = sec($msg);
		$msg = filter_var($msg,FILTER_SANITIZE_STRING);
		echo($name."<br>".$email."<br>".$tel."<br>".$msg);
		send($name,$email,$tel,$msg);

		if(send($name,$email,$tel,$msg)){
			echo("hita");
			header("Location: ../thkn.php");
			session_start();
			$_SESSION['email']= $email;
			var_dump($_SESSION);
		}
		


	}else{
		
	}
}
?>