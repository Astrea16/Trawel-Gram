<?php
header("Content-Type: text/html; charset=utf-8");
	function widget_form_1(){

		$mail_to = "7yatan@gmail.com";
		$subjekt = "Feedback letter";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		$headers .= "From: ".$subject." <no-reply@".$_SERVER['HTTP_HOST'].">\r\n";

		mail($mail_to, $subject, $message, $headers);
	}

	$msg_result = "";
	$errors = array();

	$email = $_POST["email"];
	$pattern = "|^([a-z0-9_.-]{1,20})@([a-z0-9.-]{1,20}).([a-z]{2,4})|is";

	if($_POST["name"] == "") {

		$name = "not specified";

	} else {

		$name = $_POST["name"];

	}
	if(!preg_match($pattern, strtolower($email))) {

		$errors[] = "E-mail incorrectly specified."; // Сообщение, если e-mail некорректен

	}

	if($_POST["message"] == "") {

		$errors[] = "No message text specified."; // Сообщение, если поле «сообщение» пусто

	}
	if(empty($errors)) { // Отправляем форму если нет ошибок
	
		$message = "<b>Sender name</b>: ".$name."<br>";
		$message .= "<b>E-mail</b>: ".$_POST['email']."<br><br>";
		$message .= "<b>Text of the letter</b>: " . $_POST['message'];
		
		widget_form_1($message);
		
		$msg_result = "Message sent successfully!
"; // Сообщение об успешной отправке
		} else { // Выводим ошибки

		$msg_result = "";
		
		foreach($errors as $all_error) {

			$msg_result .= $all_error."<br>";

		}
		
	}

	echo json_encode(array(

		"result" => $msg_result

	));
?>