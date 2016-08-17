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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Course </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-user"></i>Utilities</li>
						<li><i class="fa fa-user"></i>Course</li>
					</ol>
				</div>
			</div>
						<?php if(isset($_REQUEST['td']) && $_REQUEST['td']=='view'){?>
						<div class="row">
			                  <div class="col-lg-12">
			                  	<div class="row">
			                  		<div class="col-lg-12">
			                  	      <a class="btn btn-info" style="float:right;" href="course.php?td=add">ADD</a>
			                  	    </div>  
			                  </div>
			                      <section class="panel">
			                  		 <header class="panel-heading">
			                           User List
			                         </header>
			                         <div class="panel-body">
			                         	<div class="col-lg-12">
				                      <section class="panel">
				                            <table class="table table-striped table-advance table-hover">
				                              <tbody>
			                              <tr>
			                              	 <th><i class="fa fa-bars"></i> SL</th>
			                                 <th><i class="icon_profile"></i> Department</th>
                                       <th><i class="icon_profile"></i> Course</th>
                                       <th><i class="icon_cogs"></i> Action</th>
                                    </tr>
			                              <?php 
                                    $query=mysqli_query($link,"SELECT c.course,d.dep_type,c.id FROM course c, department d WHERE d.id=c.dep_id");
                                    $j=0;
                                    while($row=mysqli_fetch_assoc($query)){$j++;?>
			                              <tr>
			                              	 <td><?php echo $j;?></td>
			                              	 <td><?php echo $row['dep_type'];?></td>
                                       <td><?php echo $row['course'];?></td>
			                              	 <td>
			                              	 	<div class="btn-group">
			                                      <a class="btn btn-primary" href="course.php?td=update&course_id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-file"></i></a>
			                                     
			                                      <a class="btn btn-danger" href="includes/submit.php?course_del&course_id=<?php echo base64_encode($row['id']);?>"><i class="icon_close_alt2"></i></a>
			                                  	</div>
			                              	 </td>
			                              </tr>   
			                              <?php }?>                 
			                           </tbody>
				                          </table>
				                      </section>
			                  </div>
			              </div>
			              <?php } else if(isset($_REQUEST['td']) && $_REQUEST['td']=='add'){?>
			              		<div class="row">

                  					<div class="col-lg-12">
                  						<div class="row">
					                  		<div class="col-lg-12">
					                  	      <a class="btn btn-info" style="float:right;" href="course.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Courses
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='n'){
                       			    		echo "Course Not Inserted !!!";
                       			    	} else if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Inserted Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php">  
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Department</label>
                                     			    <div class="col-sm-6">
                                          				<select name="department" class="form-control m-bot15">
                                          					<option value="">-- Choose Department --</option>
                                          					<?php
		                                 			 		    $dep_query = mysqli_query($link,"SELECT * FROM department");
		                                 			 		    while($dep_res = mysqli_fetch_assoc($dep_query)){?>
		                                 			 		    <option value="<?php echo $dep_res['id'];?>"><?php echo $dep_res['dep_type'];?></option>
		                                 			 		<?php }?>		
                                          				</select>	
                                     				 </div>
                                     				
                                 			 </div>
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Course</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="course" class="form-control">
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="course_submit" class="btn btn-danger">Submit</button>
                                      				</div>
                                 			 </div>	
                       		           </form>
                       		        </div>
                       		    </div>       	
			              <?php }  else if(isset($_REQUEST['td']) && $_REQUEST['td']=='update'){
			              	    $course_id = '';
			              	    if(isset($_REQUEST['course_id']))
			              	    {
			              	    	 $course_id = base64_decode($_REQUEST['course_id']);
			              	    }
                                $result = '';
                                $query=mysqli_query($link,"SELECT * FROM course WHERE id='$course_id'");
                                while($res=mysqli_fetch_assoc($query))
                                {
                                	$result = $res['course'];
                                	$dep = $res['dep_id'];
                                }
			              	?>
			              		<div class="row">

                  					<div class="col-lg-12">
                  						<div class="row">
					                  		<div class="col-lg-12">
					                  	      <a class="btn btn-info" style="float:right;" href="course.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Courses
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Updated Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php"> 
                       		                <div class="form-group">
                                      			<label class="col-sm-2 control-label">Department</label>
                                     			    <div class="col-sm-6">
                                          				<select name="department" class="form-control m-bot15">
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
                                          				<input type="text" name="course" value="<?php echo $result;?>" class="form-control">
                                          				<input type="hidden" name="course_id" value="<?php echo $course_id;?>"/>
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="course_update" class="btn btn-danger">Update</button>
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
