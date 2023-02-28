<?php

include 'database_connection.php';
include 'function.php';


if (is_user_login()) {
	header('location:search_book.php');
}

$message = '';

if (isset($_POST["login_button"])) {
	$formdata = array();

	if (empty($_POST["user_email_address"])) {
		$message .= '<li>Email Address is required</li>';
	} 
	else if (filter_var($_POST["user_email_address"], FILTER_VALIDATE_EMAIL)) 
	{
		if (preg_match("^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$^", $_POST["user_email_address"])) {
			$formdata['user_email_address'] = trim($_POST['user_email_address']);
		} else {
			$message .= '<li>Invalid Email Address format</li>';
		}
	} 
	else if (!filter_var($_POST["user_email_address"], FILTER_VALIDATE_EMAIL)) 
	{
		$message .= '<li>Invalid Email Address format</li>';
	}

	if (empty($_POST['user_password'])) {
		$message .= '<li>Password is required</li>';
	} 
	else {
		if (preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $_POST["user_password"])) {
			$formdata['user_password'] = trim($_POST['user_password']);
		} else {
			$message .= '<li>Invalid Password format</li>';
		}
	}

	$pass_hashed = password_hash($_POST['user_password'], PASSWORD_DEFAULT); //hash password 

	if ($message == '') {
		$data = array(
			':user_email_address'	=>	$formdata['user_email_address']
		);

		$query = "
		SELECT * FROM user 
        WHERE user_email_address = :user_email_address";

		$statement = $connect->prepare($query);
		$statement->execute($data);

		if ($statement->rowCount() > 0) {
			foreach ($statement->fetchAll() as $row) {
				if ($row['user_status'] == 'Enable') {
					if (password_verify($_POST['user_password'], $pass_hashed)) {
						$_SESSION['user_id'] = $row['user_id'];
						header('location:search_book.php');
					} else {
						$message = '<li>Wrong Password</li>';
					}
				} else {
					$message = '<li>Your Account has been disabled</li>';
				}
			}
		} else {
			$message = '<li>Wrong Email Address</li>';
		}
	}
}

include 'header.php';
?>

<div class="d-flex align-items-center justify-content-center bg-danger bg-opacity-75" style="height:700px;">
	<div class="col-md-6">
		<?php

		if ($message != '') {
			echo '<div class="alert alert-danger"><ul>' . $message . '</ul></div>';
		}

		?>
		<div class="card bg-light bg-opacity-75">
			<div class="card-header">User Login</div>
			<div class="card-body">
				<form method="POST">
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="text" name="user_email_address" id="user_email_address" class="form-control" required pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" />
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="user_password" id="user_password" class="form-control" required pattern="^S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$"/>
					</div>
					<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
						<input type="submit" name="login_button" class="btn btn-primary" value="Login"/>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>