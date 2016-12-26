<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/header.php';?>
<?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/functions/dbconnect.php'; ?>
<?php
	if(!isset($_SESSION['ID_User'])){
		//chưa đăng nhập
		header("location:login.php?trang=log");
		exit();
	}
?> 
<!-- Begin page content -->





        <div id="container" class="container">
                        <div class="row">
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Add Employee</h3>
            </div>
            <div class="panel-body">
			
			<?php
			
				if(isset($_POST['them'])){
					$tenEmploy = $mysqli->real_escape_string($_POST['tenEmploy']);
					$danhmuc = $mysqli->real_escape_string($_POST['danhmuc']);
					$job = $mysqli->real_escape_string($_POST['job']);
					$phone = $mysqli->real_escape_string($_POST['phone']);
					$email = $mysqli->real_escape_string($_POST['email']);
					
					$name = $_FILES['hinhanh']['name'];
							if($name != null){
								$tach_chuoi = explode(".",$name);
								$count = count($tach_chuoi);
								$duoi_file = $tach_chuoi[$count-1];
								unset($tach_chuoi[$count-1]);
								$ten_file = '';
								foreach($tach_chuoi as $key=>$value){
									if($key==0){
										$ten_file = $value;
									}else{
										$ten_file = $ten_file.'_'.$value;
									}
								}
								$time =time();
								
								$ten_hinh = $ten_file.'_'.$time.'.'.$duoi_file;
								
							
								$tmp_name = $_FILES['hinhanh']['tmp_name'];
								//xu ly file anh
								$type=exif_imagetype($tmp_name);
								if(($type == IMAGETYPE_GIF) || ($type == IMAGETYPE_PNG) || ($type == IMAGETYPE_JPEG)){
								
								$path = $_SERVER['DOCUMENT_ROOT'];
								$path_upload = $path.'/EMPLOYEE/files/'.$ten_hinh;
								$ketqua = move_uploaded_file($tmp_name,$path_upload);
								
								
								}else{
									$ten_hinh = '';
								}
							
							
							}else {
								$ten_hinh = '';
							}
							 
							 
							$lenh1="INSERT INTO employeee(Name_Em,ID_department,Job_title,Cellphone,Email,Photo) VALUES('$tenEmploy','$danhmuc','$job','$phone','$email','$ten_hinh')";
							$result = $mysqli->query($lenh1);
								if($result){
									header("LOCATION: index.php");
									exit();
								}else{
									echo "có lỗi khi thêm";
								}
							
					
				}
			?>
			
			
                <form action="" class="container-fluid" id="EmployeeEditForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
					
					      
					<div class="row">
                    <div class="col-sm-5">
                        <img src="/EMPLOYEE/files/icon-profile.png-1443606215.png" class="img-responsive" alt="Employee Photo"/><input type="file" name="hinhanh" id="EmployeePhoto"/>                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="">Employee Name</label>
                            <input name="tenEmploy" class="form-control" maxlength="100" type="text" id=""/>        
							
							</div>
                        <div class="form-group">
                            <label for="data[Employee][department_id]">Department</label>
                            <select name="danhmuc" class="form-control" id="">

<?php
	$lenh2="SELECT * FROM department";
	$result=$mysqli -> query($lenh2);
	while ($kq=mysqli_fetch_assoc($result)){
		$Name 	= $kq ['Name'];
		$ID_department 	= $kq ['ID_department'];
?>
<option value="<?php echo $ID_department ; ?>"><?php echo $Name; ?></option>
<?php 
	}
?>

</select>                        </div>
                        <div class="form-group">
                            <label for="data[Employee][job_title]">Job Title</label>
                            <input name="job" class="form-control" maxlength="100" type="text" id=""/>                        </div>
                        <div class="form-group">
                            <label for="data[Employee][cellphone]">Cellphone</label>
                            <input name="phone" class="form-control" maxlength="20" type="text" id=""/>                        </div>
                        <div class="form-group">
                            <label for="data[Employee][email]">Email</label>
                            <input name="email" class="form-control" maxlength="256" type="email" id=""/>                        </div>

                        <div>
						 <fieldset>
                            <input class="btn btn-success" type="submit" value="Add" name="them"/>
							<a href="index.php" class="btn btn-default">Back</a>   
						</fieldset>
							</div>
                    </div>
                </div>
                </form>            </div>
        </div>
    </div>
</div>
        </div>
		 
	<script type="text/javascript">
			$(document).ready(function(){
			$("#EmployeeEditForm").validate({
				rules: {
					tenEmploy: {
						required: true,
					},
					job: {
						required: true,
					},
					phone: {
						required: true,
					},
					email: {
						required: true,
					},
					
					
				},
				messages: {
					tenEmploy: {
						required: "<strong><span style = 'color:red'>Chưa nhập tên employee!</span></strong>",
					},
					job: {
						required: "<strong><span style = 'color:red'>Chưa nhập job!</span></strong>",
					},
					phone: {
						required: "<strong><span style = 'color:red'>Chưa nhập phone!</span></strong>",
					},
					email: {
						required: "<strong><span style = 'color:red'>Chưa nhập email !</span></strong>",
					},
				}
			});
		});
</script>
		

 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>  