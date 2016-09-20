<?php

$submission = new SantaForm($_POST['name'], $_POST['email'], $_POST['santa']);
$submission->send();

class SantaForm {
	protected $name;
	protected $email;
	protected $santa;

	public function __construct($name, $email, $santa) {
		$this->name = $name;
		$this->email = $email;
		$this->santa = $santa;
	}

	public function validate() {
		if(isset($this->name) && isset($this->email) && isset($this->santa)) {
			return true;
		}
	}

	public function send() {
		if($this->validate())
		{
			$recipients = array(
				'kayleigh@teamroboboogie.com',
				'connect@teamroboboogie.com'
			);
			$subject = $this->name . " has picked their present!";
			$body = "Name: " . $this->name . "\n" . "Email: " . $this->email . "\n" . "Desired Sack: " . $this->santa;

			foreach($recipients as $recipient)
			{
				mail($recipient, $subject, $body);
			}

			header("content-type:application/json");
			echo json_encode(array('status' => 'success', 'message' => '<p>Thank you so much for the sack request.<br/>' .
				'We will motivate the misfit mall Santas and get your gift out to you ASAP.</p>' .
				'<p>Happy Holidays to you and and your loved ones. We look forward to doing amazing things with you in the new year.</p>' .
				'<p>Sincerely,<br/>John and the entire roboboogie team</p>'));
		} else {
			header("content-type:application/json");
			return json_encode(array('status' => 'error', 'message' => 'Oh no! We couldn\'t save your Santa selection. Please check your info and try again.'));
		}
	}
}
