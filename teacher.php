<?php 
session_start();
include('DB/db.php');


?>
<?php include('includes/header.php');?>
	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Users </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-user"></i>Users</li>
						<li><i class="fa fa-user"></i>Teachers</li>
					</ol>
				</div>
			</div>
						<?php if(isset($_REQUEST['td']) && $_REQUEST['td']=='view'){?>
						<div class="row">
			                  <div class="col-lg-12">
			                      <section class="panel">
			                  		 <header class="panel-heading">
			                           Teachers List
			                         </header>
			                         <div class="panel-body">
			                         	<div class="col-lg-12">
				                      <section class="panel">
				                            <table class="table table-striped table-advance table-hover">
				                              <tbody>
			                              <tr>
			                              	 <th><i class="fa fa-bars"></i> SL</th>
			                                 <th><i class="icon_profile"></i> Full Name</th>
			                                 <th><i class="icon_mail_alt"></i> Email</th>
			                                 <th><i class="icon_mail_alt"></i> Department</th>
			                                 <th><i class="icon_mail_alt"></i> Course</th>
			                                 <th><i class="icon_cogs"></i> Action</th>
			                              </tr>
			                              <?php
			                              	$query=mysqli_query($link,"SELECT u.id, u.user_name, u.user_email, d.dep_type, c.course FROM user as u, department as d, course as c WHERE u.user_type_id=2 and d.id=u.dep_type and c.id=u.course_type");

			                               while($row=mysqli_fetch_assoc($query)){$j=0;$j++;?>
			                              <tr>
			                              	 <td><?php echo $j;?></td>
			                              	 <td><?php echo $row['user_name'];?></td>
			                              	 <td><?php echo $row['user_email']?></td>
			                              	 <td><?php echo $row['dep_type']?></td>
			                              	 <td><?php echo $row['course']?></td>
			                              	 <td>
			                              	 	<div class="btn-group">
			                                      <a class="btn btn-primary" href="teacher.php?td=update&user_id=<?php echo $row['id'];?>"><i class="fa fa-file"></i></a>
			                                      <a class="btn btn-danger" href="includes/submit.php?teacher_del&user_id=<?php echo $row['id'];?>"><i class="icon_close_alt2"></i></a>
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
			              <?php }  else if(isset($_REQUEST['td']) && $_REQUEST['td']=='update'){
			              	    $course_id = '';
			              	    if(isset($_REQUEST['user_id']))
			              	    {
			              	    	 $user_id = $_REQUEST['user_id'];
			              	    }
                                $result = '';
                                $user_query=mysqli_query($link,"SELECT * FROM user WHERE id='$user_id'");
                                while($res=mysqli_fetch_assoc($user_query))
                                {
                                	$name = $res['user_name'];
                                	$user_email = $res['user_email'];
                                	$dep = $res['dep_type'];
                                	$course = $res['course_type'];
                                }
			              	?>
			              		<div class="row">

                  					<div class="col-lg-12">
                  						<div class="row">
					                  		<div class="col-lg-12">
					                  	      <a class="btn btn-info" style="float:right;" href="teacher.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Teachers
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Updated Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php">  
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Name</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="name" value="<?php echo $name;?>" class="form-control">
                                          				<input type="hidden" name="user_id" value="<?php echo $user_id;?>"/>
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                      			<label class="col-sm-2 control-label">Email</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="email" value="<?php echo $user_email;?>" class="form-control">
                                          				
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	<label class="col-sm-2 control-label">Department</label>
                                 			 	    <div class="col-sm-6">
		                                 			 	<select name="depart" class="form-control">
		                                 			 		
		                                 			 		<?php
		                                 			 		    $dep_query = mysqli_query($link,"SELECT * FROM department");
		                                 			 		    while($dep_res = mysqli_fetch_assoc($dep_query)){?>
		                                 			 		    			<option value="<?php echo $dep_res['id'];?>" <?php if($dep_res['id'] == $dep){echo "selected";}?>><?php echo $dep_res['dep_type'];?></option>
		                                 			 		    	<?php }?>		                                 			 	
		                                 			 	</select>
                                 			 	    </div>
                                 			 </div>	
                                 			 <div class="form-group">
                                 			 	<label class="col-sm-2 control-label">Course</label>
                                 			 	    <div class="col-sm-6">
		                                 			 	<select name="course" class="form-control">
		                                 			 		
		                                 			 		<?php
		                                 			 		    $dep_query = mysqli_query($link,"SELECT * FROM course");
		                                 			 		    while($course_res = mysqli_fetch_assoc($dep_query)){?>
		                                 			 		    			<option value="<?php echo $course_res['id'];?>" <?php if($course_res['id'] == $course){echo "selected";}?>><?php echo $course_res['course'];?></option>
		                                 			 		    	<?php }?>		                                 			 	
		                                 			 	</select>
                                 			 	    </div>
                                 			 </div>	
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="teacher_update" class="btn btn-danger">Update</button>
                                      				</div>
                                 			 </div>	
                       		           </form>
                       		        </div>
                       		    </div>    
			              <?php }?>
                         </div>	
                      </section>
                  </div>
            </div>          	
          </section>
      </section>    	
<?php include('includes/footer.php');?>   
</html>    
