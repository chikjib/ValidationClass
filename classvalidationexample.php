<?php
//This is just an example of the usage, not really a working application
$rules = array(
'email' => 'email|required',
'username' => 'name_user|required',
'password' => 'required',
'firstname' => 'name|required',
'lastname' => 'name|required'
);

$validation = new Validation();

if($validation->validate($_POST, $rules) == TRUE) {
$email = trim($_POST['email']);
$username = trim($_POST['username']);
$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$password = hash('sha1', trim($_POST['password']));
$cf_password = hash('sha1',trim($_POST['cf_password']));

}
foreach ($validation->errors as $error) {
		echo "<div class = 'alert alert-danger'>" . $error . "</div>";

	}
