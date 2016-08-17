<?php 
session_start();
include('DB/db.php');
$query=mysqli_query($link,"SELECT * FROM semester");
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
						<li><i class="fa fa-user"></i>Semester</li>
					</ol>
				</div>
			</div>
						<?php if(isset($_REQUEST['td']) && $_REQUEST['td']=='view'){?>
						<div class="row">
			                  <div class="col-lg-12">
			                  	<div class="row">
			                  		<div class="col-lg-12">
			                  	      <a class="btn btn-info" style="float:right;" href="semester.php?td=add">ADD</a>
			                  	    </div>  
			                  </div>
			                      <section class="panel">
			                  		 <header class="panel-heading">
			                           Semester List
			                         </header>
			                         <div class="panel-body">
			                         	<div class="col-lg-12">
				                      <section class="panel">
				                            <table class="table table-striped table-advance table-hover">
				                              <tbody>
			                              <tr>
			                              	 <th><i class="fa fa-bars"></i> SL</th>
			                                 <th><i class="icon_profile"></i> Semester</th>
			                                 
			                                 <th><i class="icon_cogs"></i> Action</th>
			                              </tr>
			                              <?php $j=0;while($row=mysqli_fetch_assoc($query)){$j++;?>
			                              <tr>
			                              	 <td><?php echo $j;?></td>
			                              	 <td><?php echo $row['semester'];?></td>
			                              	 
			                              	 <td>
			                              	 	<div class="btn-group">
			                                      <a class="btn btn-primary" href="semester.php?td=update&semester_id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-file"></i></a>
			                                     
			                                      <a class="btn btn-danger" href="includes/submit.php?semester_del&semester_id=<?php echo base64_encode($row['id']);?>"><i class="icon_close_alt2"></i></a>
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
					                  	      <a class="btn btn-info" style="float:right;" href="semester.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Semester
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='n'){
                       			    		echo "Semester Not Inserted !!!";
                       			    	} else if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Inserted Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php">  
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Semester</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="semester" class="form-control">
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="semester_submit" class="btn btn-danger">Submit</button>
                                      				</div>
                                 			 </div>	
                       		           </form>
                       		        </div>
                       		    </div>       	
			              <?php }  else if(isset($_REQUEST['td']) && $_REQUEST['td']=='update'){
			              	    $semester_id = '';
			              	    if(isset($_REQUEST['semester_id']))
			              	    {
			              	    	 $semester_id = base64_decode($_REQUEST['semester_id']);
			              	    }
                                $result = '';
                                $query=mysqli_query($link,"SELECT * FROM semester WHERE id='$semester_id'");
                                while($res=mysqli_fetch_assoc($query))
                                {
                                	$result = $res['semester'];
                                }
			              	?>
			              		<div class="row">

                  					<div class="col-lg-12">
                  						<div class="row">
					                  		<div class="col-lg-12">
					                  	      <a class="btn btn-info" style="float:right;" href="semester.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Semester
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Updated Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php">  
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">semester</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="semester" value="<?php echo $result;?>" class="form-control">
                                          				<input type="hidden" name="semester_id" value="<?php echo $semester_id;?>"/>
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="semester_update" class="btn btn-danger">Update</button>
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
