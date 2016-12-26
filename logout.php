<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/functions/dbconnect.php'; ?>

<?php

if (isset ( $_SESSION ['ID_User'] )) {
	unset ( $_SESSION ['ID_User'] );
	unset ( $_SESSION ['Username'] );
	unset ( $_SESSION ['Password'] );
	unset ( $_SESSION ['Email'] );	
}
	header ("location:login.php?trang=log");
	exit();
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>      