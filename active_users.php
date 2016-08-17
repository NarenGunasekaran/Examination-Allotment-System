<?php 
session_start();
include('DB/db.php');
?>
<style type='text/css'>
tr > td{
	border-top: none;
}
</style>
<?php include('includes/header.php');?>
	<!--main content start-->
        <section id="main-content">
            <section class="wrapper">
		          	<div class="row">
						<div class="col-lg-12">
							<h3 class="page-header"><i class="fa fa-user"></i> Active Users </h3>
							<ol class="breadcrumb">
								<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
								<li><i class="fa fa-user"></i>Active Users</li>
							</ol>
						</div>
					</div>
					<div class="row">
				         <div class="col-sm-6">
		                      <section class="panel" style="height:450px;overflow-y:scroll;">
		                          <header class="panel-heading">
		                              Teachers
		                          </header>
		                          <table class="table">
		                              <thead>
			                              <tr>
			                                  <th>SL</th>
			                                  <th>Name</th>
			                                  <th>Department</th>
			                                  <th>Action</th>
			                              </tr>
		                              </thead>
		                              <tbody>
                                          <tr>
 											<?php 
 												$query=mysqli_query($link,"SELECT * FROM user where user_type_id=2");
 												$j=0;while($row=mysqli_fetch_assoc($query)){$j++;
 											?>
 												<td><?php echo $j;?></td>
 												<td style="text-transform:capitalize;"><?php echo $row['user_name'];?></td>
 												<td>
 													<?php
				                              	 	    $dep_id=$row['dep_type'];
				                              	 		$dep_query=mysqli_query($link,"select dep_type from department where id='$dep_id'");
				                              	 		if($dep_query){
				                              	 			$dep_row=mysqli_fetch_assoc($dep_query);
				                              	 			echo $dep_row['dep_type'];	
				                              	 		}
			                              	 	    ?>
 												</td>
 												<td>
 													<div class="btn-group">
				                              	 		<?php 
				                              	 		    if($row['active'] == 1){
				                              	 		?>
				                              	 	  <a class="btn btn-success" href="includes/submit.php?active_dep&user_id=<?php echo base64_encode($row['id']);?>"><i class="icon_check_alt2"></i></a>
				                              	 	    <?php }else if($row['active'] == 0){?>	
				                                      <a class="btn btn-danger" href="includes/submit.php?active_dep&user_id=<?php echo base64_encode($row['id']);?>"><i class="icon_close_alt2"></i></a>
				                                      <?php }?>
				                                  	</div>
 												</td>
 											<?php }?>
                                          </tr>
                                      </tbody>        	
		                           </table>   
		                       </section>    
		                  </div>  
		                  <div class="col-sm-6">
		                      <section class="panel" style="height:450px;overflow-y:scroll;">
		                          <header class="panel-heading">
		                              Student
		                          </header>
		                          <table class="table">
		                              <thead>
		                              <tr>
		                                  <th>SL</th>
		                                  <th>Name</th>
		                                  <th>Roll Number</th>
		                                  <th>Action</th>
		                              </tr>
		                              </thead>
		                              <tbody>
                                          <tr>
 											<?php 
 												$query=mysqli_query($link,"SELECT * FROM user where user_type_id=3");
 												$j=0;while($row=mysqli_fetch_assoc($query)){$j++;
 											?>
 												<td><?php echo $j;?></td>
 												<td style="text-transform:capitalize;"><?php echo $row['user_name'];?></td>
 												<td><?php echo $row['roll_number'];?></td>
 												<td>
 													<div class="btn-group">
				                              	 		<?php 
				                              	 		    if($row['active'] == 1){
				                              	 		?>
				                              	 	  <a class="btn btn-success" href="includes/submit.php?active_dep&user_id=<?php echo base64_encode($row['id']);?>"><i class="icon_check_alt2"></i></a>
				                              	 	    <?php }else if($row['active'] == 0){?>	
				                                      <a class="btn btn-danger" href="includes/submit.php?active_dep&user_id=<?php echo base64_encode($row['id']);?>"><i class="icon_close_alt2"></i></a>
				                                      <?php }?>
				                                  	</div>
 												</td>
 											<?php }?>
                                          </tr>
                                      </tbody>       
		                           </table>   
		                       </section>    
		                  </div>     
					</div>	
            </section>
        </section>    	
<?php include('includes/footer.php');?>   
</html>    
