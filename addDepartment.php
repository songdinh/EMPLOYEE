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
    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Add Department</h3>
            </div>
            <div class="panel-body">
			<?php
				if(isset($_POST['them'])){
					$tenphong = $mysqli->real_escape_string($_POST['tenphong']);
					$dienthoai = $mysqli->real_escape_string($_POST['dienthoai']);
					$quanly = $mysqli->real_escape_string($_POST['quanly']);
					$lenh1="INSERT INTO department(Name,Office_phone,Manager) VALUES('$tenphong','$dienthoai','$quanly')";
					$result = $mysqli->query($lenh1);
								if($result){
									header("LOCATION: indexDepartment.php");
									exit();
								}else{
									echo "có lỗi khi thêm";
								}
				}
			?>
			
			
			
                <form action="" id="DepartmentEditForm" method="POST" accept-charset="utf-8"><div style="display:none;"><input type="hidden" name="_method" value="POST"/></div>                <div class="form-group">
                    <label for="data[Department][name]">Department Name</label>
                    <input name="tenphong" class="form-control" maxlength="256" type="text" id="DepartmentName"/>                </div>
                <div class="form-group">
                    <label for="data[Department][phone]">Office Phone</label>
                    <input name="dienthoai" class="form-control" maxlength="20" type="tel" id="DepartmentPhone"/>                </div>
                <div class="form-group">
                    <label for="data[Department][manger_id]">Manager</label>
					<input name="quanly" class="form-control" maxlength="20" type="tel" id=""/>  
                                    </div>
                <div class="submit"><input class="btn btn-success" type="submit" value="Add" name="them" /></div></form>            </div>
        </div>
    </div>
</div>
        </div>
<script type="text/javascript">
			$(document).ready(function(){
			$("#DepartmentEditForm").validate({
				rules: {
					tenphong: {
						required: true,
					},
					dienthoai: {
						required: true,
					},
					quanly: {
						required: true,
					},
					
					
					
				},
				messages: {
					tenphong: {
						required: "<strong><span style = 'color:red'>Chưa nhập tên Phòng!</span></strong>",
					},
					dienthoai: {
						required: "<strong><span style = 'color:red'>Chưa nhập điện thoại!</span></strong>",
					},
					quanly: {
						required: "<strong><span style = 'color:red'>Chưa nhập tên quản lý !</span></strong>",
					},
					
				}
			});
		});
</script>

 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>  