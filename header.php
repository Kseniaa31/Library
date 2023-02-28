<?php
?>

<html>
    <head>
     
        <title>Library</title>
        <link rel="canonical" href="">
        <link href="<?php echo base_url(); ?>asset/css/styles.css" rel="stylesheet" />
      
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>

    <?php 

    if(is_admin_login())
    {

    ?>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">Library</a>        
            </form> 
           
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="category.php">Category</a>
                            <a class="nav-link" href="author.php">Author</a>
                            <a class="nav-link" href="book.php">Book</a>
                            <a class="nav-link" href="user.php">User</a>
                            <a class="nav-link" href="logout.php">Logout</a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
    <?php 
    }
    else
    {

    ?>
    
    <body>
    	<main>
    		<div class="container py-4 ">

    			<header class="pb-3 mb-4 border-bottom">
                    <div class="row">
        				<div class="col-md-6">
                            <a href="index.php" class="d-flex align-items-center text-dark text-decoration-none">
                                <span class="fs-4">Library Management System</span>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <?php 

                            if(is_user_login())
                            {
                            ?>
                            <ul class="list-inline mt-4 float-end">
                                <li class="list-inline-item"><a href="logout.php">Logout</a></li>
                            </ul>
                            <?php 
                            }
                            ?>
                        </div>
                    </div>
    			</header>
    <?php 
    }
    ?>
    			