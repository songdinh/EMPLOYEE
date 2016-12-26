<!DOCTYPE html>
<?php 
	ob_start();
	session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Employee Directory: Employees</title>
        <link href="/EMPLOYEE/templates/admin/css/favicon.ico-1443606215" tppabs="http://dev.rikkei.org/ed/favicon.ico?1443606215" type="image/x-icon" rel="icon"/><link href="favicon.ico-1443606215" tppabs="http://dev.rikkei.org/ed/favicon.ico?1443606215" type="image/x-icon" rel="shortcut icon"/>
	<link rel="stylesheet" type="text/css" href="/EMPLOYEE/templates/admin/css/bootstrap.min.css-1443606215.css" tppabs="http://dev.rikkei.org/ed/css/bootstrap.min.css?1443606215"/>
	<link rel="stylesheet" type="text/css" href="/EMPLOYEE/templates/admin/css/ed.css-1443606215.css" tppabs="http://dev.rikkei.org/ed/css/ed.css?1443606215"/>
 <script type="text/javascript" src="/EMPLOYEE/templates/admin/css/jquery-2.1.3.min.js"></script>
		<script type="text/javascript" src="/EMPLOYEE/templates/admin/css/jquery.validate.js"></script>
   </head>
    <body>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Employee Directory</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
				<?php 
					$trang="indexem";
					if (isset ( $_GET ['trang'] )) { 	
						$trang 	= $_GET ['trang']; 
					}
					
				
				?>
                    <ul class="nav navbar-nav">
                        <li <?php 
							if($trang=="indexem"){
								echo ' class="active" ';
							}else {
								echo " ";
							}
						
						?> >
							<a href="index.php?trang=indexem" tppabs="http://dev.rikkei.org/ed/employees">Employees</a>
						</li>
						
						<li 
						<?php 
							if($trang=="indexde"){
								echo ' class="active" ';
							}else {
								echo " ";
							}
						
						?>
						>
							<a href="indexDepartment.php?trang=indexde" tppabs="http://dev.rikkei.org/ed/">Departments</a>
						</li>
						
						<?php
						if(isset($_SESSION['ID_User'])){
							
						?>
						<li 
						<?php 
							if($trang=="log"){
								echo ' class="active" ';
							}else {
								echo " ";
							}
						
						?>
						
						>
							<a href="logout.php?trang=log" tppabs="http://dev.rikkei.org/ed/users/login">Log out</a>
						</li>     
						<?php 
							}else {
						
						?>
						<li 
						<?php 
							if($trang=="log"){
								echo ' class="active" ';
							}else {
								echo " ";
							}
						
						?>
						
						>
							<a href="login.php?trang=log" tppabs="http://dev.rikkei.org/ed/users/login">Log in</a>
						</li>  
						<?php 
							}
						?>
					</ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>
