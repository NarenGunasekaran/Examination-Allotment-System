<?php 
session_start();
include('DB/db.php');
$query=mysqli_query($link,"SELECT * FROM user where user_type_id=1");
?>
<?php include('includes/college_admin_header.php');?>
	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-male"></i> Department Admin </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-user"></i>Users</li>
						<li><i class="fa fa-male"></i>Department admin</li>
					</ol>
				</div>
			</div>
						<div class="row">
			                  <div class="col-lg-12">
			                  	<section class="panel">
			                  		 <header class="panel-heading">
			                           Department User List
			                         </header>
			                         <div class="panel-body">
			                         	<div class="col-lg-12">
				                      <section class="panel">
				                            <table class="table table-striped table-advance table-hover">
				                              <tbody>
			                              <tr>
			                              	 <th><i class="fa fa-bars"></i> SL</th>
			                              	 <th><i class="icon_profile"></i> Date</th>
			                                 <th><i class="icon_profile"></i> Users name</th>
			                                 <th><i class="icon_profile"></i> Department</th>
			                                 <th><i class="icon_profile"></i> Email</th>
			                                 <th><i class="icon_cogs"></i> Action</th>
			                              </tr>
			                              <?php $j=0;while($row=mysqli_fetch_assoc($query)){$j++;?>
			                              <tr>
			                              	 <td><?php echo $j;?></td>
			                              	 <td><?php echo $row['date'];?></td>
			                              	 <td><?php echo $row['user_name'];?></td>
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
			                              	 <td><?php echo $row['user_email'];?></td>
			                              	 <td>
			                              	 	<div class="btn-group">
			                              	 		<?php 
			                              	 		    if($row['active'] == 1){
			                              	 		?>
			                              	 	  <a class="btn btn-success" href="includes/submit.php?active&user_id=<?php echo base64_encode($row['id']);?>"><i class="icon_check_alt2"></i></a>
			                              	 	    <?php }else if($row['active'] == 0){?>	
			                                      <a class="btn btn-danger" href="includes/submit.php?active&user_id=<?php echo base64_encode($row['id']);?>"><i class="icon_close_alt2"></i></a>
			                                      <?php }?>
			                                  	</div>
			                              	 </td>
			                              </tr>   
			                              <?php }?>                 
			                           </tbody>
				                          </table>
				                      </section>
			                  </div>
			              </div>
                         </div>	
                      </section>
                  </div>
            </div>          	
          </section>
      </section>    	
<?php include('includes/college_admin_footer.php');?>   
</html>    
