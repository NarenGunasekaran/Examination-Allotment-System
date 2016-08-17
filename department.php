<?php 
session_start();
include('DB/db.php');
$query=mysqli_query($link,"SELECT * FROM department");
?>
<?php include('includes/header.php');?>
	<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
          	<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-file-text-o"></i> Department </h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-user"></i>Utilities</li>
						<li><i class="fa fa-user"></i>Department</li>
					</ol>
				</div>
			</div>
						<?php if(isset($_REQUEST['td']) && $_REQUEST['td']=='view'){?>
						<div class="row">
			                  <div class="col-lg-12">
			                  	<div class="row">
			                  		<div class="col-lg-12">
			                  	      <a class="btn btn-info" style="float:right;" href="department.php?td=add">ADD</a>
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
			                                 
			                                 <th><i class="icon_cogs"></i> Action</th>
			                              </tr>
			                              <?php $j=0;while($row=mysqli_fetch_assoc($query)){$j++;?>
			                              <tr>
			                              	 <td><?php echo $j;?></td>
			                              	 <td><?php echo $row['dep_type'];?></td>
			                              	 
			                              	 <td>
			                              	 	<div class="btn-group">
			                                      <a class="btn btn-primary" href="department.php?td=update&dep_id=<?php echo base64_encode($row['id']);?>"><i class="fa fa-file"></i></a>
			                                     
			                                      <a class="btn btn-danger" href="includes/submit.php?dep_del&dep_id=<?php echo base64_encode($row['id']);?>"><i class="icon_close_alt2"></i></a>
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
					                  	      <a class="btn btn-info" style="float:right;" href="department.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Department
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='n'){
                       			    		echo "Department Not Inserted !!!";
                       			    	} else if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Inserted Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php">  
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Department</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="department" class="form-control">
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="dep_submit" class="btn btn-danger">Submit</button>
                                      				</div>
                                 			 </div>	
                       		           </form>
                       		        </div>
                       		    </div>       	
			              <?php }  else if(isset($_REQUEST['td']) && $_REQUEST['td']=='update'){
			              	    $dep_id = '';
			              	    if(isset($_REQUEST['dep_id']))
			              	    {
			              	    	 $dep_id = base64_decode($_REQUEST['dep_id']);
			              	    }
                                $result = '';
                                $query=mysqli_query($link,"SELECT * FROM department WHERE id='$dep_id'");
                                while($res=mysqli_fetch_assoc($query))
                                {
                                	$result = $res['dep_type'];
                                }
			              	?>
			              		<div class="row">

                  					<div class="col-lg-12">
                  						<div class="row">
					                  		<div class="col-lg-12">
					                  	      <a class="btn btn-info" style="float:right;" href="department.php?td=view">VIEW</a>
					                  	    </div>  
			                 			 </div>
                   					   <section class="panel">
                     					     <header class="panel-heading">
                      					       Add Department
                      					    </header>
                       			    <div class="panel-body">
                       			    	<span style="font-size:16px;color:#F00;"><?php if(isset($_REQUEST['token']) && $_REQUEST['token']=='y'){echo "Updated Successfully !!!";}?></span>
                       		           <form class="form-horizontal" method="POST" action="includes/submit.php">  
                       		           		<div class="form-group">
                                      			<label class="col-sm-2 control-label">Department</label>
                                     			    <div class="col-sm-6">
                                          				<input type="text" name="department" value="<?php echo $result;?>" class="form-control">
                                          				<input type="hidden" name="dep_id" value="<?php echo $dep_id;?>"/>
                                     				 </div>
                                     				
                                 			 </div>
                                 			 <div class="form-group">
                                 			 	 <div class="col-lg-offset-2 col-lg-10">
                                          				<button type="submit" name="dep_update" class="btn btn-danger">Update</button>
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
