<?php
	require_once('config.php');
	require_once(__DIR__.'\classes\EmailHelper.php');
	require_once(__DIR__.'\libraries\LogManager.php');

	$logManager = new LogManager();
	$result = false;

	if (!empty($_POST)){

		$emailHelper = new EmailHelper();

		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
		{
			$result = $emailHelper->sendEmail($_POST['name'], $_POST['email'], $_POST['message']);
		}

		if (isset($result) && !$result){
			$logManager->appendfile('EmailContact', var_dump($emailHelper->errors));
		}
	}
	else {
		$logManager->appendfile('EmailContact', 'No hay post');
	}

?>