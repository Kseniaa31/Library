<?php

include '../database_connection.php';

include '../function.php';

if(!is_admin_login())
{
	header('location:../admin_login.php');
}
include '../header.php';

?>

<div class="container-fluid py-4">
	<h1 class="mb-5">Dashboard</h1>
	<div class="row">
		
		<div class="col-xl-3 col-md-6">
			<div class="card bg-success text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_book_number($connect); ?></h1>
					<h5 class="text-center">Total Book</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-danger text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_author_number($connect); ?></h1>
					<h5 class="text-center">Total Author</h5>
				</div>
			</div>
		</div>
		<div class="col-xl-3 col-md-6">
			<div class="card bg-warning text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_category_number($connect); ?></h1>
					<h5 class="text-center">Total Category</h5>
				</div>
			</div>
		</div>

		
		
		<div class="col-xl-3 col-md-6">
			<div class="card bg-primary   text-white mb-4">
				<div class="card-body">
					<h1 class="text-center"><?php echo Count_total_user_number($connect); ?></h1>
					<h5 class="text-center">Total Users</h5>
				</div>
			</div>
		</div>


	</div>
</div>