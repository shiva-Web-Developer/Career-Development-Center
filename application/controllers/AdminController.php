<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminController extends CI_Controller {
	public function __construct (){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url','file','form'));
		$this->load->library('session');
		$this->load->model('Admin');
		$this->load->database();
		
		// $route=$this->router->fetch_method();
		// print_r($route);
			function wrapIntoHtml($msg){
    	    $htmlMsg = '<html><body>'
    	            .$msg.
    	        '</body>
    	   </html>';
    	    return $htmlMsg;
    	}
		
	}
	public function admin()
	{
		$data['title']="Admin Login";
		$this->load->view('admin/login',$data);
 		$this->load->view('admin/common/footer');
	}
	public function getMedia(){
	    $data['title'] = "Media";
		$this->load->view('admin/load_media', $data);
		$this->load->view('admin/common/footer');
	}
	public function Dashboard()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		
		$sql8 = "SELECT DATE(DATE) AS created_date, COUNT(*) AS count_users FROM users GROUP BY created_date";

		$data['allus'] = $this->Admin->getData($sql8);
		
		
		$data['title']="Dashboard";
		$sql="SELECT * FROM `users`";
		$data['user']=$this->Admin->getData($sql);
		$sql1="SELECT COUNT(id) AS COUNTID, CITY FROM `users` GROUP BY CITY;";
		$data['citywise']=$this->Admin->getData($sql1);
		$sql3="SELECT COUNT(id) AS COUNTID, GENDER FROM `users` GROUP BY GENDER;";
		$data['genderwise']=$this->Admin->getData($sql3);

	    $sql4 = "SELECT COUNT(id) AS COUNTID, CLASS FROM `users` GROUP BY CLASS ORDER BY 
        CASE WHEN CLASS REGEXP '^[0-9]' THEN CAST(CLASS AS UNSIGNED) ELSE 9999 END, CLASS ASC";

        $data['classwise'] = $this->Admin->getData($sql4);

		
		$sql5="SELECT DOB FROM `users`";
		$data['agewige']=$this->Admin->getData($sql5);
		
        $sql6 = "SELECT * FROM enroll_course";
        $enrollc = $this->Admin->getData($sql6);
        $data['enrolledcourse'] = COUNT($enrollc);
        $sql7 = "SELECT * FROM test_tbl";
        $allcousres = $this->Admin->getData($sql7);
        $data['allcourses'] = COUNT($allcousres);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/common/footer',$data);
	}
	public function AddUser()
	{  if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Add-User";
		$this->load->view('admin/addUser',$data);
		$this->load->view('admin/common/footer');
	}
	public function ViewUser()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="View-User";
		$sql="SELECT * FROM `users`";
		$data['result']=$this->Admin->getData($sql);
		$this->load->view('admin/viewUser',$data);
		$this->load->view('admin/common/footer');
	}
	public function SendMessage()
	{
		
		$data['title']="Send-Message";
		$sql="SELECT * FROM `users`";
		$data['user']=$this->Admin->getData($sql);
		$this->load->view('admin/sendMessage',$data);
		$this->load->view('admin/common/footer');
	}
	public function SendEmailMessage()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Send-Email-Message";
		$sql="SELECT * FROM `users`";
		$data['user']=$this->Admin->getData($sql);
		$this->load->view('admin/sendEmailMessage',$data);
		$this->load->view('admin/common/footer');
	}
	function Register()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Register-Form";
		$this->load->view('admin/register',$data);
		$this->load->view('admin/common/footer');
	}
	function Profile()
	{   $email=$_SESSION['EMAIL'];
		$data['title']="Register-Form";
		$sql="SELECT * FROM `admin` WHERE EMAIL='$email'";
		$data['profile']=$this->Admin->getData($sql);
		$this->load->view('admin/profile',$data);
		$this->load->view('admin/common/footer');
	}
	function ForgetPassword()
	{
		$data['title']="Forgot-Password";
		$this->load->view('admin/forgetpassword',$data);
        $this->load->view('admin/common/footer');
	}
	function RecoverPassword()
	{
		$data['title']="Recover-Password";
		$this->load->view('admin/recoverpassword',$data);
		$this->load->view('admin/common/footer');
	}
	function Demography()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Demography";
		$this->load->view('admin/Demography',$data);
		$this->load->view('admin/common/footer');
	}
	function LiveUsers()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Live-Users";
		$this->load->view('admin/LiveUsers',$data);
		$this->load->view('admin/common/footer');
	}
	function ProductsListed()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Products-Listed";
		$sql="SELECT * FROM `product`";
		$data['product_list']=$this->Admin->getData($sql);
		$this->load->view('admin/ProductsListed',$data);
		$this->load->view('admin/common/footer');
	}
	function AddProducts()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Add-Products";
		$this->load->view('admin/AddProducts',$data);
		$this->load->view('admin/common/footer');
	}
	function CheckDq()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Check-Dq";
		$sql="SELECT * FROM `check_dq`";
		$data['dq']=$this->Admin->getData($sql);
		$this->load->view('admin/CheckDq',$data);
		$this->load->view('admin/common/footer');
	}
	function Testimonial()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Testimonial";
		$this->load->view('admin/Testimonial',$data);
		$this->load->view('admin/common/footer');
	}
	function OurBlogs()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Our-Blogs";
		$this->load->view('admin/OurBlogs',$data);
		$this->load->view('admin/common/footer');
	}
	function ViewBlogs()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="View-Blogs";
		$sql="SELECT * FROM `blog`";
		$data['blog']=$this->Admin->getData($sql);
		$this->load->view('admin/ViewBlogs',$data);
		$this->load->view('admin/common/footer');
	}
	
		function ViewCourses()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="View Courses";
		$sql="SELECT * FROM `test_tbl`";
		$data['query']=$this->Admin->getData($sql);
		$this->load->view('admin/ViewCourses',$data);
		$this->load->view('admin/common/footer');
	}
	
	
	function EnrolledCourses()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Enrolled Courses";
// 		$sql="SELECT * FROM `enroll_course`";
// 		$sql = "SELECT ec.*, c.course_id FROM test_tbl ec INNER JOIN enroll_course c ON ec.id = c.course_id";
		
// 		SELECT ec.*, c.course_id, u.student_name
// FROM test_tbl ec
// INNER JOIN enroll_course c ON ec.id = c.course_id
// INNER JOIN user_table u ON c.student_id = u.id;

$sql = "SELECT ec.*, c.course_id, u.name FROM test_tbl ec INNER JOIN enroll_course c ON ec.id = c.course_id INNER JOIN users u ON c.user_id = u.id ";

		$data['query']=$this->Admin->getData($sql);
		$this->load->view('admin/EnrolledCourses',$data);
		$this->load->view('admin/common/footer');
	}
	public function UserQuery(){
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="User-Query";
		$sql="SELECT * FROM `query_form`";
		$data['user_query']=$this->Admin->getData($sql);
		$this->load->view('admin/UserQuery',$data);
		$this->load->view('admin/common/footer');
	}
	function ViewTestimonial()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="View-Testimonial";
		$sql="SELECT * FROM `testimonial`";
		$data['testimonial']=$this->Admin->getData($sql);
		$this->load->view('admin/viewTestimonial',$data);
		$this->load->view('admin/common/footer');
	}
	
	
	function AccessLogin()
	{

		$user_email=$_REQUEST['email'];
		$user_password=$_REQUEST['password'];
		$sql="SELECT * FROM `admin` WHERE EMAIL='".$user_email."'";
		$result=$this->Admin->getData($sql);
		if(count($result) > 0)
		{    
			foreach($result as $row)
			{   $_SESSION['EMAIL']= $row->EMAIL;
			 $_SESSION['UID']= $row->ID;
			 
			     $_SESSION['NAME']= $row->NAME;
			    $_SESSION['img']= $row->USER_PROFILE;
				$pass=$row->KUNJI;
				if(password_verify($user_password,$pass))
				{ echo 1;
					
				}else{
					echo 2;
				}
			}
		}
		else{
				echo 3; 
		}
		
	}
	function ForgetEmail()
	{
		$user_foget_email=$_REQUEST['email'];
		$user_otp=$_REQUEST['otp'];
		$sql="SELECT * FROM `users` WHERE EMAIL='".$user_foget_email."'";
		$results=$this->Admin->getData($sql);
		if(count($results) > 0)
	{    	$sql="UPDATE `users` SET OTP='$user_otp' WHERE EMAIL='".$user_foget_email."'";
			$results=$this->Admin->updateData($sql);
              echo 1;
		}else{
				echo 2;
		}
	}
	
	function deleteRecord()
	{
		$tbl=$_REQUEST['tbl'];
		$where=$_REQUEST['where'];
		$id=$_REQUEST['id'];
		$sql="DELETE FROM `$tbl` WHERE $where=$id";
		$result=$this->Admin->deleteData($sql);
		if($result)
			{   
				  echo 1;
			}else{
					echo 2;
			}

	}
	function UserViewDetails()
	{
		$id=$_REQUEST['id'];
	    $sql="SELECT * FROM `users` WHERE  id=$id";
		$result=$this->Admin->getData($sql);
		foreach($result as $row)
		{ 	$name=$row->NAME;
			$email=$row->EMAIL;
			$mobile=$row->MOB;
			$role=$row->ROLE;
			$dob=$row->DOB;
			$gender=$row->GENDER;
			$address=$row->ADDRESS;
			$college=$row->COLLEGE;
			$class=$row->CLASS;
			$f_name=$row->F_NAME;

			$id=$row->id;
		}
		echo json_encode(array('name'=>$name,'email'=>$email,'mobile'=>$mobile,
		'role'=>$role,'dob'=>$dob,'gender'=>$gender,'address'=>$address,'college'=>$college,'class'=>$class,'f_name'=>$f_name,'id'=>$id));

	}
	function updateUserRecord()
	{
		$userId=$_REQUEST['id'];
		$userName=$_REQUEST['name'];
		$userEmail=$_REQUEST['email'];
		$userMobile=$_REQUEST['mobile'];
		$userRole=$_REQUEST['role'];
		$userDob=$_REQUEST['dob'];
		$userAddress=$_REQUEST['address'];
		$userCollege=$_REQUEST['college'];
		$userClass=$_REQUEST['class'];
		$userFname=$_REQUEST['f_name'];

		$sql="UPDATE `users` SET NAME='$userName', EMAIL='$userEmail', MOB='$userMobile', ROLE='$userRole', DOB='$userDob',ADDRESS='$userAddress', COLLEGE='$userCollege', CLASS='$userClass', F_NAME='$userFname' WHERE id=$userId";
		$results=$this->Admin->updateData($sql);
		if($results)
		{
			echo 1;
		}else{
			echo 2;
		}

	}
	 function Logout()
    {
        $this->session->sess_destroy();
		redirect(base_url('admin'), 'refresh');
    }
	function nameWiseMessage()
	{
		// echo $number=$_REQUEST['number'];
		// $subject=$_REQUEST['subject'];
		// $message=$_REQUEST['message'];
		$to      = 'agufran740@gmail.com';
		$subject = 'Fake sendmail test';
		$message = 'If we can read this, it means that our fake Sendmail setup works!';
		$headers = 'From: gufran.ahmad@3ea.in' . "\r\n" .
				'Reply-To: myemail@gmail.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

		if(mail($to, $subject, $message, $headers)) {
			echo 'Email sent successfully!';
		} else {
			die('Failure: Email was not sent!');
		}
	}
	function emailWiseMessage()
	{
		// echo $email=$_REQUEST['email'];
		// $subject=$_REQUEST['subject'];
		// $message=$_REQUEST['message'];
		$to      = 'agufran740@gmail.com';
		$subject = 'Fake sendmail test';
		$message = 'If we can read this, it means that our fake Sendmail setup works!';
		$headers = 'From: gufran.ahmad@3ea.in' . "\r\n" .
				'Reply-To: myemail@gmail.com' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

		if(mail($to, $subject, $message, $headers)) {
			echo 'Email sent successfully!';
		} else {
			die('Failure: Email was not sent!');
		}
	}
	function ProfileUpdate()
	{
		$userId=$_REQUEST['id'];
		$userName=$_REQUEST['name'];
		$userEmail=$_REQUEST['email'];
		$userMobile=$_REQUEST['mobile'];
// 	echo 	$userKunji=$_REQUEST['kunji'];
// 	exit();
		
		$sql="UPDATE `admin` SET NAME='$userName', EMAIL='$userEmail', PHONE='$userMobile' WHERE ID=$userId";
		$results=$this->Admin->updateData($sql);
		if($results)
		{
			echo 1;
		}else{
			echo 2;
		}
	}
	
	
	function SaveProduct()
	{
			$config['upload_path']   = './assets/img/product/'; 
			$config['allowed_types'] = 'jpg|png|jpeg'; 
			$config['max_size']      = 1024; 
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('userfile')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error',strip_tags($error));	
				redirect(base_url().'Add-Products');
			}   
			else { 
				$data1 =$this->upload->data();
				$filename=$data1['file_name'];
				$data=array(
					'product_name'=>$this->input->post('name'),
					'price'=>$this->input->post('price'),
					'product_description'=>$this->input->post('desc'),
					'link'=>$this->input->post('link'),
					'image'=>$filename
				);
				$tbl= 'product';
				$this->Admin->saveData($tbl,$data);
				$this->session->set_flashdata('product', 'Product Added Successfully');
				redirect(base_url().'Add-Products');
			}
		
	}
	
	
	function SaveTestimonial()
	{
			$config['upload_path']   = './assets/img/testimonial/'; 
			$config['allowed_types'] = 'jpg|png|jpeg'; 
			$config['max_size']      = 1024; 
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('userfile')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error',strip_tags($error));	
				redirect(base_url().'Testimonial');
			}   
			else { 
				$data1 =$this->upload->data();
				$filename=$data1['file_name'];
				$data=array(
					'name'=>$this->input->post('name'),
					'description'=>$this->input->post('desc'),
					'image'=>$filename
				);
				$tbl= 'testimonial';
				$this->Admin->saveData($tbl,$data);
				$this->session->set_flashdata('testimonial', 'Testimonial Added Successfully');
				redirect(base_url().'Testimonial');
			}
		
	}
	function SaveBlog()
	{
			$config['upload_path']   = './assets/img/blog/'; 
			$config['allowed_types'] = 'jpg|png|jpeg'; 
			$config['max_size']      = 1024; 
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('userfile')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error',strip_tags($error));	
				redirect(base_url().'Our-Blogs');
			}   
			else { 
				$data1 =$this->upload->data();
				$filename=$data1['file_name'];
				$data=array(
					'name'=>$this->input->post('name'),
					'description'=>$this->input->post('desc'),
					'image'=>$filename
				);
				$tbl= 'blog';
				$this->Admin->saveData($tbl,$data);
				$this->session->set_flashdata('Blogs', 'Blogs Added Successfully');
				redirect(base_url().'Our-Blogs');
			}
		
	}
	function UploadImage()
	{
			$config['upload_path']   = './assetstunch/dist/img/profile/'; 
			$config['allowed_types'] = 'gif|jpg|png|jpeg|webp|JFIF'; 
			$config['max_size']      = 4024; 
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload('userfile')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error',strip_tags($error));	
				redirect(base_url().'Profile');
			}   
			else { 
				$email=$_SESSION['EMAIL'];
				$data1 =$this->upload->data();
				$filename=$data1['file_name'];
				$_SESSION['img']=$filename;
				$tbl= 'admin';
				$sql="UPDATE `$tbl` SET USER_PROFILE='$filename' where EMAIL='$email'";
				$this->Admin->updateData($sql);
				$this->session->set_flashdata('Profile', 'Profile Updated Successfully');
				redirect(base_url().'Profile');
			}
		
	}



    function GetRecord() {
    // print_r($_REQUEST);exit();

    $filter = "";

        if ($_REQUEST['age_group']) {
            if ($_REQUEST['age_group'] == "G1") {
                $min = 0; $max = 14;
            } elseif ($_REQUEST['age_group'] == "G2") {
                $min = 15; $max = 24;
            } elseif ($_REQUEST['age_group'] == "G3") {
                $min = 25; $max = 35;
            } elseif ($_REQUEST['age_group'] == "G4") {
                $min = 36; $max = 48;
            } elseif ($_REQUEST['age_group'] == "G5") {
                $min = 49; $max = 105;
            }
            $date1 = date_create();
            $date2 = date_create();
            date_sub($date1, date_interval_create_from_date_string("$max Years"));
            $dt1 = date_format($date1, "Y-m-d");
            date_sub($date2, date_interval_create_from_date_string("$min Years"));
            $dt2 = date_format($date2, "Y-m-d");
          $filter .= " AND `DOB` BETWEEN '" . $dt1 . "' AND '" . $dt2 . "'";
        } 

    if (isset($_REQUEST['gender_group'])) {
        if($_REQUEST['gender_group'] != '')
        {
            $filter .= " AND GENDER LIKE '" . $_REQUEST['gender_group'] . "'";
        }
    }

    if (isset($_REQUEST['class_group'])) {
        if($_REQUEST['class_group'] != '')
        {
             $filter .= " AND CLASS LIKE '" . $_REQUEST['class_group'] . "'";
        }
    }
    
    if (isset($_REQUEST['city'])) {
        if($_REQUEST['city'] != '')
        {
             $filter .= " AND CITY LIKE '" . $_REQUEST['city'] . "'";
        }
    }

  $sql = "SELECT * FROM `users` WHERE 1 $filter";
    $result = $this->Admin->getData($sql);
    echo json_encode($result);
}


		public function addjob()
	{  if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="Add-Job";
		$this->load->view('admin/job/add-job',$data);
		$this->load->view('admin/common/footer');
	}
	
	
	
	
		function savejob()
	{
		
				$data=array(
					'job_title'=>$this->input->post('job_title'),
					'min_age'=>$this->input->post('min_age'),
					'max_age'=>$this->input->post('max_age'),
					'start_date'=>$this->input->post('start_date'),
					'end_date'=>$this->input->post('end_date'),
					'eligibility'=>$this->input->post('eligibility'),
					'fee'=>$this->input->post('fee'),
					'url'=>$this->input->post('url'),
					'description'=>$this->input->post('description')
				);
				
				$tbl= 'latest_jobs';
				$this->Admin->saveData($tbl,$data);
				$this->session->set_flashdata('job', 'Job Added Successfully');
				redirect(base_url().'addjob');
			
		
	}
	

	public function joblist()
	{
		if(isset($_SESSION['EMAIL'])==false)
		{
			redirect(base_url('admin'));
		}
		$data['title']="View-Job";
		$sql="SELECT * FROM `latest_jobs`";
		$data['result']=$this->Admin->getData($sql);
		$this->load->view('admin/job/job-list',$data);
		$this->load->view('admin/common/footer');
	}


	function GetAllEmail()
	{	
		$sql="SELECT * FROM `users`";
		$result=$this->Admin->getData($sql);
		echo json_encode($result);
	}
	function SendMessageByEmail()
	{
		$filter_query="";
			$this->load->library('email');
			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.hostinger.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '7';
			$config['smtp_user']    = 'noreply@cdc-azamgarh.com';
			$config['smtp_pass']    = '!1234@no_Reply';
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not      
		   $this->email->initialize($config);
		   $msg = wrapIntoHtml($_REQUEST['msg']);
		if($_REQUEST['FilterType']=='All')
		{
			$email= $_REQUEST['alluseremail'];
			$nameArray = explode(",", $email);
		
		   $msg=$_REQUEST['msg'];  
		   foreach ($nameArray as $value) {
				$this->email->from('noreply@cdc-azamgarh.com', 'Career Developement Center');
				$this->email->to($value); 
				$this->email->subject($_REQUEST['subject']);
				$this->email->message($msg);
				if($this->email->send())
				{
				    $data['email'] = $value;
					$data['message'] = $msg;
					$data['subject'] = $_REQUEST['subject'];
					$data['send_by'] = $_SESSION['UID'];
					$data['date'] = date('Y-m-d H:i:s');
					$res = $this->Admin->saveData('email_log', $data);
				
				}
		    }
		   	echo '"send email"';

		}
		else if($_REQUEST['FilterType']=='Individual')
		{
			    
		  
		   $this->email->from('noreply@cdc-azamgarh.com', 'Career Developement Center');
		   $this->email->to($_REQUEST['single_email'] ); 
		   $this->email->subject($_REQUEST['subject']);
		   $this->email->message($msg);  
		   
		   if($this->email->send())
		   {
		        $data['email'] = $_REQUEST['single_email'];
				$data['message'] = $msg;
				$data['subject'] = $_REQUEST['subject'];
				$data['send_by'] = $_SESSION['UID'];
				$data['date'] = date('Y-m-d H:i:s');
				
		        $res = $this->Admin->saveData('email_log', $data);
				echo '"send email"';
		   }
		   
		}else if($_REQUEST['FilterType']=='Selected')
		{
			$email= $_REQUEST['selectedemail'];
			$nameArray = explode(",", $email);
		
		   foreach ($nameArray as $value) {
		       
				$this->email->from('noreply@cdc-azamgarh.com', 'Career Developement Center');
				$this->email->to($value); 
				$this->email->subject($_REQUEST['subject']);
				$this->email->message($msg); 
				if($this->email->send())
				{
				    $data['email'] = $value;
					$data['message'] = $msg;
					$data['subject'] = $_REQUEST['subject'];
					$data['send_by'] = $_SESSION['UID'];
					$data['date'] = date('Y-m-d H:i:s');
					
			        $res = $this->Admin->saveData('email_log', $data);
				
				}
		    }
		    	echo '"send email"';
		   
		}
		
	}
	
	
		public function SendSMSSchedule()
	{
		// GET THE AGE/CUISINE/DIETARY FROM LOGIN HELPER
		$this->load->helper('login');
		$data['ages'] = get_age_options();
		$data['cuisines'] = get_cuisine_options();
		$data['dietary'] = get_dietary_options();
		$data['months'] = get_month_options();
		if (isset($_SESSION['EMAIL']) == false) {
			redirect(base_url('admin'));
		}
		$data['title'] = "Send-sms-schedule";
		$sql = "SELECT * FROM `users`";
		$data['user'] = $this->Admin->getData($sql);
		$sqll = "SELECT DISTINCT  STATE FROM `pin`";
		$data['pin'] = $this->Admin->getData($sqll);
		$sqlll = "SELECT * FROM `message_data` WHERE status !=3 ";
		$data['scheduled_message'] = $this->Admin->getData($sqlll);
		$this->load->view('admin/SendSMSSchedule', $data);
		$this->load->view('admin/common/footer');
	}
		public function ajaxfetchcity()
	{
		$statename = $_REQUEST['statename'];
		$sql = "SELECT * FROM `pin` WHERE `STATE` =  '$statename' ";
		$cities = $this->Admin->getData($sql);
		echo json_encode($cities);
	}
		function Savesmsdata()
	{
		$config['upload_path']   = './assetstunch/smsdata/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size']      = 1024;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', strip_tags($error));
			redirect(base_url() . 'Send-sms-schedule');
		} else {
			$data1 = $this->upload->data();
			$filename = $data1['file_name'];

			$msg_type = $this->input->post('send_type');

			if ($msg_type == 'Once') {
				$time = $this->input->post('time');
				$time_slott = json_encode(['m' =>'', 'day' => '', 'date' => '', 'time_slot' => '', 't' => $time]);
			}

			else if ($msg_type == 'Daily' ) {
				$time = $this->input->post('time');
				$date = $this->input->post('date');
				$time_slott = json_encode(['m' =>'', 'day' => '', 'date' => $date, 'time_slot' => '', 't' => $time]);
			}

			else if ($msg_type == 'Weekly' ) {
				$time = $this->input->post('time');
				$day = $this->input->post('day');
				$time_slott = json_encode(['m' =>'', 'day' => $day, 'date' => '', 'time_slot' => '', 't' => $time]);
			}

			else if ($msg_type == 'monthly' ) {
				$time = $this->input->post('time');
				$time_slot = $this->input->post('time_slot');
				$time_slott = json_encode(['m' =>'', 'day' => '', 'date' => '', 'time_slot' => $time_slot, 't' => $time]);
			}

			else{
				$month = $this->input->post('month');
				$day = $this->input->post('day');
				$time_slot = $this->input->post('time_slot');
				$time = $this->input->post('time');
				$time_slott = json_encode(['m' => $month, 'day' => $day, 'date' => '', 'time_slot' => $time_slot, 't' => $time]);
			}

			$data = array(
				'state' => $this->input->post('state'),
				'city' => json_encode($this->input->post('city')),
				'age' => $this->input->post('age'),
				'gender' => $this->input->post('gender'),
				'cuisine' => $this->input->post('cuisine'),
				'dietary' => $this->input->post('dietary'),
				'subject' => $this->input->post('subject'),
				'message' => $this->input->post('message'),
				'send_type' => $this->input->post('send_type'),
				'message_type' => $this->input->post('message_type'),
				'time_slot' => $time_slott,
				'status' => '0',
				'run_status' => '0',
				'image' => $filename
			);
			$tbl = 'message_data';
			$this->Admin->saveData($tbl, $data);
			$this->session->set_flashdata('product', 'Message Data Added Successfully');
			redirect(base_url() . 'Send-sms-schedule');
		}
	}
	
		function PushNotification()
	{
		$data['title'] = "Push Notification";
		$emp_id = $_SESSION['UID'];
		$sql = "SELECT COUNT(*) AS COUNT, CONVERT(a.date, date) as Send_date, a.msg, a.id, b.NAME FROM `push_logs` a, `admin` b WHERE  a.send_by = b.ID GROUP BY a.msg, CONVERT(a.date, date)";
		$data['result'] = $this->Admin->getData($sql);
		$this->load->view('admin/notification-log/push-notification', $data);
		$this->load->view('admin/common/footer');
	}
	
	function EmailNotification()
	{
		$data['title'] = "Email Notification";
		$emp_id = $_SESSION['UID'];
	    $sql = "SELECT COUNT(*) AS COUNT, CONVERT(a.date, date) as Send_date, a.message, a.id, b.NAME FROM `email_log` a, `admin` b WHERE  a.send_by = b.ID GROUP BY a.message, CONVERT(a.date, date)";
		$data['result'] = $this->Admin->getData($sql);
		$this->load->view('admin/notification-log/email-notification', $data);
		$this->load->view('admin/common/footer');
	}
	
	
	
	
}
