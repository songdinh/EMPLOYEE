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
                <h3 class="panel-title">edit Employee</h3>
            </div>
            <div class="panel-body">
			<?php
				$id=$_GET['id'];
				$lenh3="SELECT * FROM employeee WHERE ID_Employee=$id";
				$result=$mysqli -> query($lenh3);
				$kq=mysqli_fetch_assoc($result);
				$Name_Em=htmlspecialchars($kq['Name_Em']);
				$ID_department=htmlspecialchars($kq['ID_department']);
				$Job_title=htmlspecialchars($kq['Job_title']);
				$Cellphone=htmlspecialchars($kq['Cellphone']);
				$Email=htmlspecialchars($kq['Email']);
				$Photo=htmlspecialchars($kq['Photo']);
				$daidien=$Photo;
				if($Photo ==""){
					$daidien="icon-profile.png-1443606215.png";
				}
				$path = '/EMPLOYEE/files/'.$Photo;
				
				if(isset($_POST['sua'])){
					$tenEmploy =$mysqli->real_escape_string($_POST['tenEmploy']);
					$phongban = $mysqli->real_escape_string($_POST['phongban']);
					
					$congviec = $mysqli->real_escape_string($_POST['congviec']);
					$dienthoai = $mysqli->real_escape_string($_POST['dienthoai']);
					$thudt = $mysqli->real_escape_string($_POST['thudt']);
					$name = $_FILES['hinhanh']['name'];
					if($name == NULL ){
						$lenh4="UPDATE employeee SET Name_Em='$tenEmploy',ID_department='$phongban',Job_title='$congviec',Cellphone='$dienthoai',Email='$thudt' WHERE ID_Employee='$id' ";
						$kq1 = $mysqli->query($lenh4);
								if($kq1){
									header("LOCATION:index.php");
									exit();
								}else{
									echo "<strong style = 'color:red'>có lỗi khi sửa</strong>";
								}
					
					
					}
					else{//có sửa hình ảnh
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
								//xu ly anh
								
								$type=exif_imagetype($tmp_name);
								if(($type == IMAGETYPE_GIF) || ($type == IMAGETYPE_PNG) || ($type == IMAGETYPE_JPEG)){
									$path = $_SERVER['DOCUMENT_ROOT'];
									$path_upload = $path.'/EMPLOYEE/files/'.$ten_hinh;
									$ketqua = move_uploaded_file($tmp_name,$path_upload);
									
									
									//thực hiện update
								$str = "UPDATE employeee SET Photo='$ten_hinh',Name_Em='$tenEmploy',ID_department='$phongban',Job_title='$congviec',Cellphone='$dienthoai',Email='$thudt' WHERE ID_Employee='$id' ";
								$kq1 = $mysqli->query($str);
								if($kq1){
									header("LOCATION:index.php");
									exit();
								}else{
									echo "<strong style = 'color:red'>có lỗi khi sửa</strong>";
								}
								
								}else{
									echo "<strong style = 'color:red;margin-left:15px;'>ảnh không đúng định dạng</strong>";
								}
								
								
								
								
									
								
						}
				}
				
			?>
			
			
			
			
			
                <form action="" class="container-fluid" id="EmployeeEditForm" enctype="multipart/form-data" method="post" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div><input type="hidden" name="data[Employee][original_photo]" value="" id="EmployeeOriginalPhoto"/>                <div class="row">
                    <div class="col-sm-5">
                        <img src="/EMPLOYEE/files/<?php echo $daidien; ?>" class="img-responsive" alt="Employee Photo"/><input type="file" name="hinhanh" id="EmployeePhoto"/>                    </div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="data[Employee][name]">Employee Name</label>
                            <input name="tenEmploy" value="<?php echo $Name_Em;?>" class="form-control" maxlength="100" type="text" id="EmployeeName"/>                        </div>
                        <div class="form-group">
                            <label for="data[Employee][department_id]">Department</label>
                            <select name="phongban" class="form-control" id="">
<?php
	$lenh2="SELECT * FROM department";
	$result=$mysqli -> query($lenh2);
	while ($kq=mysqli_fetch_assoc($result)){
		$Name 	= $kq ['Name'];
		$ID_department1 	= $kq ['ID_department'];
		if($ID_department == $ID_department1){
			$selected = 'Selected= "Selected"';
		}else{
			$selected = '';
		}
?>
<option value="<?php echo $ID_department1 ; ?>" <?php echo $selected;?>><?php echo $Name; ?></option>
<?php 
	}
?>
</select>                        </div>
                        <div class="form-group">
                            <label for="data[Employee][job_title]">Job Title</label>
                            <input name="congviec" value="<?php echo $Job_title;?>" class="form-control" maxlength="100" type="text" id="EmployeeJobTitle"/>                        </div>
                        <div class="form-group">
                            <label for="data[Employee][cellphone]">Cellphone</label>
                            <input name="dienthoai" value="<?php echo $Cellphone;?>" class="form-control" maxlength="20" type="text" id="EmployeeCellphone"/>                        </div>
                        <div class="form-group">
                            <label for="data[Employee][email]">Email</label>
                            <input name="thudt" value="<?php echo $Email;?>" class="form-control" maxlength="256" type="email" id="EmployeeEmail"/>                        </div>

                        <div>
                            <input class="btn btn-success" type="submit" name="sua" value="Edit"/>
<a href="index.php" class="btn btn-default">Back</a>                        </div>
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
					congviec: {
						required: true,
					},
					dienthoai: {
						required: true,
					},
					thudt: {
						required: true,
					},
					
					
				},
				messages: {
					tenEmploy: {
						required: "<strong><span style = 'color:red'>Chưa nhập tên employee!</span></strong>",
					},
					congviec: {
						required: "<strong><span style = 'color:red'>Chưa nhập job!</span></strong>",
					},
					dienthoai: {
						required: "<strong><span style = 'color:red'>Chưa nhập phone!</span></strong>",
					},
					thudt: {
						required: "<strong><span style = 'color:red'>Chưa nhập email !</span></strong>",
					},
				}
			});
		});
</script>		
		
		

 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>  