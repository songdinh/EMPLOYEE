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
                            <div class="panel panel-primary">
        <div class="panel-body">
            <a href="addEmployee.php" class="btn btn-success">Add Employee</a>        </div>
    </div>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">Search</h3>
    </div>
    <div class="panel-body">
	<?php 
		$idd=null;
		if (isset ( $_GET ['idd'] )) { 	
			$idd 	= $_GET ['idd']; 
		}
		$txtSearch=null;
		$idgetduoc=null;
		if(isset($_GET['Search'])){
		$txtSearch=$_GET['txtSearch'];
		$idgetduoc=$_GET['department_id'];
		}
		
		
		$lenh9=null;
		if($idd != null && $txtSearch == null && $idgetduoc == null ){
			$lenh9="WHERE employeee.ID_department=$idd";
		}
		else if($idd == null && $txtSearch != null && $idgetduoc == null){
			$lenh9="WHERE Name_Em LIKE '%$txtSearch%' ";
		}
		else if($idd == null && $txtSearch == null && $idgetduoc != null){
			$lenh9="WHERE employeee.ID_department=$idgetduoc";
		}
		else if($idd == null && $txtSearch != null && $idgetduoc != null){
			$lenh9="WHERE Name_Em LIKE '%$txtSearch%' AND employeee.ID_department=$idgetduoc ";
		}else if($idd == null && $txtSearch == null && $idgetduoc == null){
			$lenh9=null;
		}
		
		
		
	?>
	
	
        <form action="" class="form-inline" id="indexForm" method="GET" accept-charset="utf-8">
		
				<label class="sr-only" for="Name">Employee Name</label>
				
				<input name="txtSearch" value="<?php echo $txtSearch; ?>" type="search" class="form-control" placeholder="Employee Name" type="text" id="name"/>        
			
			
				<label class="sr-only" for="DepartmentId">Department</label>
				<select name="department_id" class="form-control" id="department_id">
					
					<option value=""  >Tất cả</option>
						<?php
							$lenh2="SELECT * FROM department";
							$result=$mysqli -> query($lenh2);
							while ($kq=mysqli_fetch_assoc($result)){
								$Name 	= $kq ['Name'];
								$ID_department 	= $kq ['ID_department'];
								$str=null;
								if (isset ( $idgetduoc )) {
												if ($ID_department == $idgetduoc)
													$str = "selected = 'selected'";
											}
						?>
					<option value="<?php echo $ID_department; ?>" <?php echo $str?> ><?php echo $Name; ?></option>
						<?php
							}
						?>

				</select>        
					<button name="Search" class="btn btn-success" type="submit">Search</button>
					<button class="btn btn-default btn-clear" name="clear" type="button">Clear</button>
					
		</form>
    </div>
</div>
<h3>Employees</h3>
				<table id="employee-list" class="table table-striped">
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Department</th>
						<th class="hidden-xs">Job title</th>
						<th class="hidden-xs hidden-sm">Email</th>
						<th>Action</th>
					</tr>
					
					<?php
						
						echo $idd;
						$lenh1="SELECT ID_Employee,Name_Em,department.Name,Job_title,Email FROM employeee 
								INNER JOIN department ON employeee.ID_department=department.ID_department ".$lenh9;
								
							
						$result=$mysqli -> query($lenh1);
						while ($kq=mysqli_fetch_assoc($result)){
							$ID_Employee 	= $kq ['ID_Employee'];
							$Name_Em 	=htmlspecialchars( $kq ['Name_Em']);
							$Name 	= htmlspecialchars($kq ['Name']);
							$Job_title 	= htmlspecialchars($kq ['Job_title']);
							$Email 	= htmlspecialchars($kq ['Email']);
					?>
					<tr>
						<td><?php echo $ID_Employee; ?></td>
						<td>
							<a href="viewEmployee.php?id=<?php echo $ID_Employee;?>"><?php echo $Name_Em; ?></a>            </td>
						<td><?php echo $Name; ?></td>
						<td class="hidden-xs"><?php echo $Job_title; ?></td>
						<td class="hidden-xs hidden-sm"><?php echo $Email; ?></td>
										<td>
								<a href="editEmployee.php?id=<?php echo $ID_Employee;?>" class="btn btn-success">Edit</a>
						<form action="/ed/employees/delete/72" name="post_585b82d0ceffd720282955" id="post_585b82d0ceffd720282955" style="display:none;" method="post"><input type="hidden" name="_method" value="POST"/></form><a href="delEmployee.php?id=<?php echo $ID_Employee;?>" class="btn btn-danger" onclick="if (confirm(&quot;Are you sure to delete  Abraham Benjamin?&quot;)) { document.post_585b82d0ceffd720282955.submit(); } event.returnValue = false; return false;">Delete</a>                </td>
					</tr>	

					<?php
						}
					?>
				</table>
        </div>

 <?php require_once $_SERVER['DOCUMENT_ROOT'].'/EMPLOYEE/templates/admin/inc/footer.php';?>      