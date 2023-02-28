<?php

include 'database_connection.php';

include 'function.php';

if (is_user_login()) {
	header('location:search_book.php');
}

$message = '';
$success = '';

if (isset($_POST["register_button"])) {
	$formdata = array();

	if (empty($_POST["user_email_address"])) {
		$message .= '<li>Email Address is required</li>';
	} else {
		if (preg_match("^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$^", $_POST["user_email_address"])) {
			$formdata['user_email_address'] = trim($_POST['user_email_address']);
		} else {
			$message .= '<li>Invalid Email Address format</li>';
		}
	}

	if (empty($_POST["user_password"])) {
		$message .= '<li>Password is required</li>';
	} else {
		if (preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $_POST["user_password"])) {
			$formdata['user_password'] = trim($_POST['user_password']);
		} else {
			$message .= '<li>Invalid Password format</li>';
		}
	}

	if (empty($_POST['user_name'])) {
		$message .= '<li>User Name is required</li>';
	} else {
		$formdata['user_name'] = trim($_POST['user_name']);
	}


	if (empty($_POST['user_contact_no'])) {
		$message .= '<li>User Contact Number Detail is required</li>';
	} else {
		if (preg_match_all('^[0-9]{10}$^', $_POST["user_contact_no"])) {
			$formdata['user_contact_no'] = trim($_POST['user_contact_no']);
		} else {
			$message .= '<li>Invalid Contact Number format</li>';
		}
	}

	/////////////hash password///////////
	$pass_hashed = password_hash($_POST['user_password'], PASSWORD_DEFAULT);

	if ($message == '') {
		$success = "User registered succesfully";
		$data = array(
			':user_email_address'		=>	$formdata['user_email_address']
		);

		$query = "
		SELECT * FROM user 
        WHERE user_email_address = :user_email_address
		";

		$statement = $connect->prepare($query);

		$statement->execute($data);

		if ($statement->rowCount() > 0) {
			$message = '<li>Email Already Register</li>';
		} else {

			$data = array(
				':user_name'			=>	$formdata['user_name'],
				':user_contact_no'		=>	$formdata['user_contact_no'],
				':user_email_address'	=>	$formdata['user_email_address'],
				':user_password'        =>  $pass_hashed, //use hashed password to insert to database
				':user_status'			=>	'Enable',
			);

			$query = "
			INSERT INTO user 
            (user_name,  user_contact_no,  user_email_address, user_password, user_status) 
            VALUES (:user_name, :user_contact_no, :user_email_address, :user_password ,  :user_status) 
			";

				$statement = $connect->prepare($query);
				$statement->execute($data);	
		}
	}
}

include 'header.php';
?>

<div class="d-flex align-items-center justify-content-center mt-5 mb-5 bg-primary bg-opacity-75" style="min-height:700px;">
	<div class="col-md-6">
		<?php

		if ($message != '') {
			echo '<div class="alert alert-danger"><ul>' . $message . '</ul></div>';
		}
		if ($success != '') {
			echo '<div class="alert alert-success">' . $success . '</div>';
		}

		?>
		<div class="card bg-light bg-opacity-75">
			<div class="card-header">New User Registration</div>
			<div class="card-body">
				<form  method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label class="form-label">Email address</label>
						<input type="text" name="user_email_address" id="user_email_address" class="form-control" required pattern="^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$" />
					</div>
					<div class="mb-3">
						<label class="form-label">Password</label>
						<input type="password" name="user_password" id="user_password" class="form-control"  required pattern="^S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$" />
					</div>
					<div class="mb-3">
						<label class="form-label">User Name</label>
						<input type="text" name="user_name" class="form-control" id="user_name" value="" required/>
					</div>
					<div class="mb-3">
						<label class="form-label">User Contact No.</label>
						<input type="text" name="user_contact_no" id="user_contact_no" class="form-control" required  pattern="^[0-9]{10}$" />
					</div>

					<div class="text-center mt-4 mb-2">
						<input type="submit" name="register_button" class="btn btn-primary" value="Register" />
					</div>
				</form>
			</div>
		</div>
	</div>
</div>