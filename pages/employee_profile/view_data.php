<!DOCTYPE html>
<html lang="en">
<?php
    include '../head.php';
    include '../session.php';
    include '../connect.php';
    require_once 'f_employeeprofile.php'; 
?>

<?php

$mysqli = new mysqli('localhost','root',"","ah_info_system") or die(mysqli_error($mysqli));
$sql="SELECT * from employee_profile";
$result=$mysqli->query($sql);
//pre_r($result); 
?>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 150%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<body>
 

  <div class="container-scroller">
    <?php include '../navbar.php'; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include '../sidebar.php'; ?>
      <div class="main-panel">
        <div class="content-wrapper" style="background-color:background: rgb(9,41,66);
background: linear-gradient(61deg, rgba(9,41,66,1) 23%, rgba(118,168,208,1) 92%);background-position: center;background-size: cover; background-attachment: fixed;">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                
                <div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Employee Profile</p>
                  <div class="row">
                  <div class="col-md-8">

                                
                                   
					  <table id="table">
						 <thead>
							<tr>
                               
                              
                               <th>Name</th>
							   <th>Title</th>
							   <th>Department</th>
								<th>Hire Date</th>
							   <th>Daily Rate</th>
							   <th>Schedule</th>
                               <th>Image</th>
							</tr>
						 </thead>
	<?php
   
			while($row = $result->fetch_assoc()): ?>
				<tr>
                
			
				<td><?php echo $row["name"]; ?></td>
				<td><?php echo $row["title"]; ?></td>
				<td><?php echo $row["department"]; ?></td>
				<td><?php echo $row["hire_date"]; ?></td>
                <td><?php echo $row["daily_rate"]; ?></td>
                <td><?php echo $row["schedule"]; ?></td>
                <td><?php echo  '<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="150" width="200" class="img-thumnail" />'   ?></td>
        
				</tr>
				<?php endwhile; ?>
		</div>
		</table>
		</div>
		</div></div>
		
	
<?php
    include '../scripts.php'; 
    include '../modals.php';
?>
<script src="../app.js"></script>

<script>  
 $(document).ready(function(){  
      $('#insert').click(function(){  
           var image_name = $('#image').val();  
           if(image_name == '')  
           {  
                alert("Please Select Image");  
                return false;  
           }  
           else  
           {  
                var extension = $('#image').val().split('.').pop().toLowerCase();  
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
                {  
                     alert('Invalid Image File');  
                     $('#image').val('');  
                     return false;  
                }  
           }  
      });  
 });  
 </script> 
</body>
</html>