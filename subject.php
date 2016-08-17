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
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Subject </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-user"></i>Utilities</li>
						<li><i class="fa fa-user"></i>Subject</li>
					</ol>
				</div>
			</div>
						<?php if(isset($_REQUEST['td']) && $_REQUEST['td']=='view'){?>
						<div class="row">
			                  <div class="col-lg-12">
			                  	<div class="row">
			                  		<div class="col-lg-12">
			                  	      <a class="btn btn-info" style="float:right;" href="subject.php?td=add">ADD</a>
			                  	    </div>  
			                  </div>
			                      <section class="panel">
			                  		 <header class="panel-heading">
			                           Subject List
			                         </header>
			                         <div class="panel-body">
			                         	<div class="col-lg-12">
				                      <section class="panel">
				                            <table class="table table-striped table-advance table-hover">
				                              <tbody>
			                              <tr>
			                              	 <th><i class="fa fa-bars"></i> SL</th>
			                                 <th><i class="icon_profile"></i> Course</th>
                                       <th><i class="icon_profile"></i> Semester</th>
                                       <th><i class="icon_profile"></i> Subject</th>
                                       <th><i class="icon_cogs"></i> Action</th>
                                    </tr>
			                              <?php 
                                    $query=mysqli_query($link,"SELECT s.subject,c.course,s.id,sm.semester FROM course c, subject s,semester sm WHERE c.id=s.course_id and sm.id=s.semester");
                                    $j=0;
                                    while($row=mysqli_fetch_assoc($query)){$j++;?>
			                              <tr>
			                              	 <td><?php echo $j;?></td>
			                              	 <td><?php echo $row['course'];?></td>
                                       <td><?php echo $row['semester'];?></td>
                                       <td><?php echo $row['subject'];?></td>
			                              	 <td>
			                              	 	<div class="btn-group">
			                                      <a class="btn btn-primary" href="subject.php?td=update&subject_id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-file"></i></a>
			                                     
			                                      <a class="btn btn-danger" href="includes/submit.php?subject_del&subject_id=<?php echo base64_encode($row['id']);?>"><i class="icon_close_alt2"></i></a>
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
					                  	      <a class="btn btn-info" style="float:right;" href="subject.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Subject
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='n'){
                       			    		echo "Subject Not Inserted !!!";
                       			    	} else if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Inserted Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php">  
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Course</label>
                                     			    <div class="col-sm-6">
                                          				<select name="course" class="form-control m-bot15">
                                          					<option value="">-- Choose Course --</option>
                                          					<?php
		                                 			 		    $course_query = mysqli_query($link,"SELECT * FROM course");
		                                 			 		    while($course_res = mysqli_fetch_assoc($course_query)){?>
		                                 			 		    <option value="<?php echo $course_res['id'];?>"><?php echo $course_res['course'];?></option>
		                                 			 		<?php }?>		
                                          				</select>	
                                     				 </div>
                                        </div>
                                     		<div class="form-group">
                                            <label class="col-sm-2 control-label">Semester</label>
                                              <div class="col-sm-6">
                                                  <select name="semester" class="form-control m-bot15">
                                                    <option value="">-- Choose Semester --</option>
                                                    <?php
                                                  $sem_query = mysqli_query($link,"SELECT * FROM semester");
                                                  while($sem_res = mysqli_fetch_assoc($sem_query)){?>
                                                  <option value="<?php echo $sem_res['id'];?>"><?php echo $sem_res['semester'];?></option>
                                              <?php }?>   
                                                  </select> 
                                             </div>		
                                 			 </div>
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Subject</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="subject" class="form-control">
                                     				 </div>	
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="subject_submit" class="btn btn-danger">Submit</button>
                                      				</div>
                                 			 </div>	
                       		           </form>
                       		        </div>
                       		    </div>       	
			              <?php }  else if(isset($_REQUEST['td']) && $_REQUEST['td']=='update'){
			              	    $subject_id = '';
			              	    if(isset($_REQUEST['subject_id']))
			              	    {
			              	    	 $subject_id = base64_decode($_REQUEST['subject_id']);
			              	    }
                                $result = '';
                                $query=mysqli_query($link,"SELECT * FROM subject WHERE id='$subject_id'");
                                while($res=mysqli_fetch_assoc($query))
                                {
                                	$sub = $res['subject'];
                                	$course = $res['course_id'];
                                  $sem = $res['semester'];
                                }
			              	?>
			              		<div class="row">

                  					<div class="col-lg-12">
                  						<div class="row">
					                  		<div class="col-lg-12">
					                  	      <a class="btn btn-info" style="float:right;" href="subject.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Subjects
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Updated Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php"> 
                       		                <div class="form-group">
                                      			<label class="col-sm-2 control-label">Course</label>
                                     			    <div class="col-sm-6">
                                          				<select name="course" class="form-control m-bot15">
                                          					<?php
		                                 			 		    $course_query = mysqli_query($link,"SELECT * FROM course");
		                                 			 		    while($course_res = mysqli_fetch_assoc($course_query)){?>
		                                 			 		    <option value="<?php echo $course_res['id'];?>" <?php if($course_res['id'] == $course){echo "selected";}?>><?php echo $course_res['course'];?></option>
		                                 			 		<?php }?>		
                                          				</select>	
                                     				 </div>
                                          </div>
                                     		<div class="form-group">
                                            <label class="col-sm-2 control-label">Semester</label>
                                              <div class="col-sm-6">
                                                  <select name="semester" class="form-control m-bot15">
                                                    <option value="">-- Choose Semester --</option>
                                                    <?php
                                                  $sem_query = mysqli_query($link,"SELECT * FROM semester");
                                                  while($sem_res = mysqli_fetch_assoc($sem_query)){?>
                                                  <option value="<?php echo $sem_res['id'];?>" <?php if($sem_res['id'] == $sem){echo "selected";}?>><?php echo $sem_res['semester'];?></option>
                                              <?php }?>   
                                                  </select> 
                                             </div>   
                                       </div>		 
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Subject</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="subject" value="<?php echo $sub;?>" class="form-control">
                                          				<input type="hidden" name="subject_id" value="<?php echo $subject_id;?>"/>
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="subject_update" class="btn btn-danger">Update</button>
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
