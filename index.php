<?php

include 'database_connection.php';
include 'function.php';

if(is_user_login())
{
	header('location:index.php');
}

include 'header.php';
?>
 
<div class="p-5 mb-4 bg-dark text-white">

	<div class="container-fluid py-5">
		<h1 class="display-5 fw-bold">Library Management System</h1>
		<p class="fs-4">Welcome to our online library!</p>
	</div>

</div>

<div class="row align-items-md-stretch">

	<div class="col-md-6">

		<div class="h-100 p-5 bg-success bg-opacity-75 text-white rounded-3">

			<h2>Admin Login</h2>
			<p></p>
			<a href="admin_login.php" class="btn btn-outline-light">Admin Login</a>

		</div>

	</div>

	<div class="col-md-6">
		<div class="h-100 p-5 bg-danger bg-opacity-75 text-white border rounded-3">
			<h2>User Login</h2>
			<p></p>
			<a href="user_login.php" class="btn btn-outline-light text-white">User Login</a>
			<a href="user_registration.php" class="btn btn-outline-light text-white ">User Sign Up</a>
		</div>
	</div>
</div>