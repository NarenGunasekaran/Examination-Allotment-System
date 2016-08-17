<?php
session_start();
include('../DB/db.php');
//Login page
if(isset($_POST['login']))
{
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$query=mysqli_query($link,"SELECT * FROM user WHERE user_email='$email' and user_pass='$pass' and active='1'");
	$res = mysqli_num_rows($query);
    if($res > 0)
    {
    	while($row = mysqli_fetch_assoc($query))
    	{
    		if($row['user_type_id'] == 1){
    			$_SESSION['dep_admin_name'] = $row['user_name'];
    			$_SESSION['user_id'] = $row['id'];
    			header('location:../dep_admin.php');
    		}else if($row['user_type_id'] == 4){
                $_SESSION['college_admin_name'] = $row['user_name'];
    			$_SESSION['user_id'] = $row['id'];
    			header('location:../college_admin.php');
    		}
    	}
    }
    else
    {
    	header('location:../index.php?fail');
    }
}

//Signing in
if(isset($_POST['signin']))
{
	$name = $_POST['uname'];
	$email = $_POST['email'];
	$contact = $_POST['contact'];
	$dep = $_POST['department'];
	$pass = $_POST['password'];
	$course = $_POST['course'];
	$sem =$_POST['semester'];
	$roll =$_POST['roll_no'];
	$id = $_POST['user_type_value'];
	$query_check = mysqli_query($link,"SELECT * FROM user WHERE user_email = '$email'");
	$num = mysqli_num_rows($query_check);
	if($num > 0){
		header('location:../signup.php?error1');
	}
	else{
         if($id == '1')
         {

			$query = mysqli_query($link,"INSERT INTO user VALUES('','','$id','$dep','','','$name','','$email','$pass','','$contact','')");
			if($query){
				header('location:../index.php?success');
			}
			else
			{
				header('location:../signup.php?error2');
			}	
         }
         else if($id == '2')
         {
           $query = mysqli_query($link,"INSERT INTO user VALUES('','','$id','$dep','','','$name','','$email','$pass','','$contact','')");
			if($query){
				header('location:../index.php?success');
			}
			else
			{
				header('location:../signup.php?error2');
			}		
         }
         else if($id == '3')
         {
         	$query = mysqli_query($link,"INSERT INTO user VALUES('','','$id','','$course','$sem','$name','$roll','$email','$pass','','$contact','')");
			if($query){
				header('location:../index.php?success');
			}
			else
			{
				header('location:../signup.php?error2');
			}	
         }
	}
}

//department user activation for Main admin
if(isset($_REQUEST['active'])){
   $id = base64_decode($_REQUEST['user_id']);
   $query = mysqli_query($link,"SELECT * FROM user WHERE id=$id");
   if($query){
   	  while($row=mysqli_fetch_assoc($query)){
   	  	 if($row['active'] == 1){
   	  	 	$update_query = mysqli_query($link,"UPDATE user SET active=0 WHERE id=$id");
   	  	 	header('location:../admin_depadmin.php');
   	  	 }
   	  	 else
   	  	 {
   	  	 	$update_query = mysqli_query($link,"UPDATE user SET active=1 WHERE id=$id");
   	  	 	header('location:../admin_depadmin.php');
   	  	 }
   	  }
   }
}

//department user activation for department admin
if(isset($_REQUEST['active_dep'])){
   $id = base64_decode($_REQUEST['user_id']);
   $query = mysqli_query($link,"SELECT * FROM user WHERE id=$id");
   if($query){
   	  while($row=mysqli_fetch_assoc($query)){
   	  	 if($row['active'] == 1){
   	  	 	$update_query = mysqli_query($link,"UPDATE user SET active=0 WHERE id=$id");
   	  	 	header('location:../active_users.php');
   	  	 }
   	  	 else
   	  	 {
   	  	 	$update_query = mysqli_query($link,"UPDATE user SET active=1 WHERE id=$id");
   	  	 	header('location:../active_users.php');
   	  	 }
   	  }
   }
}

// course add
if(isset($_POST['course_submit']))
{
	$course = strtolower($_POST['course']);
	if(isset($_POST['department'])){
		$dep = $_POST['department'];
	}
	$query=mysqli_query($link,"SELECT * FROM course WHERE course='$course'");
	$res = mysqli_num_rows($query);
	if($res > 0)
	{
		header('location:../course.php?td=add&token=n');
	}
	else
	{
		$query_insert = mysqli_query($link,"INSERT INTO course VALUES('','$dep','$course')");
		if($query_insert)
		{
			header('location:../course.php?td=add&token=y');
		}
	}
}
//course updation 
if(isset($_POST['course_update']))
{
	$course_id = $_POST['course_id'];
	$cou_id = base64_encode($course_id);
	$course = strtolower($_POST['course']);
	$query=mysqli_query($link,"UPDATE course SET course='$course' WHERE id='$course_id'");
	if($query)
		{
			header('location:../course.php?td=update&course_id='.$cou_id.'&token=y');
		}
	
}
//course deletion
if(isset($_REQUEST['course_del']) && $_REQUEST['course_id'] != '')
{
	$course_id = base64_decode($_REQUEST['course_id']);
	$query = mysqli_query($link,"DELETE FROM course WHERE id='".$course_id."'");
	if($query)
	{
		header('location:../course.php?td=view');
	}
} 
// department add
if(isset($_POST['dep_submit']))
{
	$department = strtolower($_POST['department']);
	$query=mysqli_query($link,"SELECT * FROM department WHERE dep_type='$department'");
	$res = mysqli_num_rows($query);
	if($res > 0)
	{
		header('location:../department.php?td=add&token=n');
	}
	else
	{
		$query_insert = mysqli_query($link,"INSERT INTO department VALUES('','$department')");
		if($query_insert)
		{
			header('location:../department.php?td=add&token=y');
		}
	}
}
//department updation 
if(isset($_POST['dep_update']))
{
	$dep_id = $_POST['dep_id'];
	$d_id = base64_encode($dep_id);
	$department = strtolower($_POST['department']);
	$query=mysqli_query($link,"UPDATE department SET dep_type='$department' WHERE id='$dep_id'");
	if($query)
		{
			header('location:../department.php?td=update&dep_id='.$d_id.'&token=y');
		}
	
}
//department deletion
if(isset($_REQUEST['dep_del']) && $_REQUEST['dep_id'] != '')
{
	$dep_id = base64_decode($_REQUEST['dep_id']);
	$query = mysqli_query($link,"DELETE FROM course WHERE dep_id='".$dep_id."'");
	if($query){
		$query_dep = mysqli_query($link,"DELETE FROM department WHERE id='".$dep_id."'");
		if($query_dep)
		{
			header('location:../department.php?td=view');
		}
	}
	else
	{
		$query_dep = mysqli_query($link,"DELETE FROM department WHERE id='".$dep_id."'");
		if($query_dep)
		{
			header('location:../department.php?td=view');
		}
	}
	
} 
//teacher updation 
if(isset($_POST['teacher_update']))
{
	$user_id = $_POST['user_id'];
	
	$name = strtolower($_POST['name']);
	$email = strtolower($_POST['email']);
	$dep = $_POST['depart'];
	$course = $_POST['course'];
	$query=mysqli_query($link,"UPDATE user SET dep_type='$dep',course_type='$course',user_name='$name',user_email='$email' WHERE id='$user_id'");
	if($query)
		{
			header('location:../teacher.php?td=update&user_id='.$user_id.'&token=y');
		}
	
}
//teacher deletion
if(isset($_REQUEST['teacher_del']) && $_REQUEST['user_id'] != '')
{
	$user_id = $_REQUEST['user_id'];
	$query = mysqli_query($link,"DELETE FROM user WHERE id='".$user_id."'");
	if($query)
	{
		header('location:../teacher.php?td=view');
	}
}
// semester add
if(isset($_POST['semester_submit']))
{
	$semester = strtolower($_POST['semester']);
	$query=mysqli_query($link,"SELECT * FROM semester WHERE semester='$semester'");
	$res = mysqli_num_rows($query);
	if($res > 0)
	{
		header('location:../semester.php?td=add&token=n');
	}
	else
	{
		$query_insert = mysqli_query($link,"INSERT INTO semester VALUES('','$semester')");
		if($query_insert)
		{
			header('location:../semester.php?td=add&token=y');
		}
	}
} 
//semester updation 
if(isset($_POST['semester_update']))
{
	$semester_id = $_POST['semester_id'];
	$sem_id = base64_encode($semester_id);
	$semester = strtolower($_POST['semester']);
	$query=mysqli_query($link,"UPDATE semester SET semester='$semester' WHERE id='$semester_id'");
	if($query)
		{
			header('location:../semester.php?td=update&semester_id='.$sem_id.'&token=y');
		}
	
}
//semester deletion
if(isset($_REQUEST['semester_del']) && $_REQUEST['semester_id'] != '')
{
	$semester_id = base64_decode($_REQUEST['semester_id']);
	$query = mysqli_query($link,"DELETE FROM semester WHERE id='".$semester_id."'");
	if($query)
	{
		header('location:../semester.php?td=view');
	}
} 
// subject add
if(isset($_POST['subject_submit']))
{   if(isset($_POST['subject']))
    {
	$subject = strtolower($_POST['subject']);
    $course = $_POST['course'];
	$semester = $_POST['semester'];
    }
	
	$query=mysqli_query($link,"SELECT * FROM subject WHERE subject='$subject'");
	$res = mysqli_num_rows($query);
	if($res > 0)
	{
		header('location:../subject.php?td=add&token=n');
	}
	else
	{
		$query_insert = mysqli_query($link,"INSERT INTO subject VALUES('','$course','$semester','$subject')");
		if($query_insert)
		{
			header('location:../subject.php?td=add&token=y');
		}
	}
}
//subject updation 
if(isset($_POST['subject_update']))
{
	$subject = strtolower($_POST['subject']);
    $course = $_POST['course'];
	$semester = $_POST['semester'];
	$subject_id = $_POST['subject_id'];
	$id = base64_encode($_POST['subject_id']);
	$query=mysqli_query($link,"UPDATE subject SET course_id=$course,semester=$semester,subject='$subject' WHERE id='$subject_id'");
	if($query)
		{
			header('location:../subject.php?td=update&subject_id='.$id.'&token=y');
		}
	
}
//subject deletion
if(isset($_REQUEST['subject_del']) && $_REQUEST['subject_id'] != '')
{
	$subject_id = base64_decode($_REQUEST['subject_id']);
	$query = mysqli_query($link,"DELETE FROM subject WHERE id='".$subject_id."'");
	if($query)
	{
		header('location:../subject.php?td=view');
	}
} 
//student updation 
if(isset($_POST['student_update']))
{
	$user_id = $_POST['user_id'];
	
	$name = strtolower($_POST['name']);
	$email = strtolower($_POST['email']);
	$dep = $_POST['depart'];
	$course = $_POST['course'];
	$semester = $_POST['semester'];
	$reg = $_POST['reg_no'];
	$contact = $_POST['contact'];
	$query=mysqli_query($link,"UPDATE user SET dep_type='$dep',course_type='$course',semester='$semester',user_name='$name',user_email='$email',contact='$contact',roll_number='$reg' WHERE id='$user_id'");
	if($query)
		{
			header('location:../student.php?td=update&user_id='.$user_id.'&token=y');
		}
	
}
//student deletion
if(isset($_REQUEST['student_del']) && $_REQUEST['user_id'] != '')
{
	$user_id = $_REQUEST['user_id'];
	$query = mysqli_query($link,"DELETE FROM user WHERE id='".$user_id."'");
	if($query)
	{
		header('location:../student.php?td=view');
	}
}
?>						