<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url_helper');
		$this->load->helper('login_helper');
		$this->load->helper('form_helper');
		$this->load->library('form_validation');
		$this->load->model('Admin_model');
		$this->load->library('session');
		$this->load->database();

		// $this->load->library('google_client');

		function logerror($text)
		{
			$myfile = fopen("error_log.txt", "a") or die("Unable to open file!");
			$txt = date('d-M-y D g:i:s') . " | $text ; " . PHP_EOL;
			fwrite($myfile, $txt);
			fclose($myfile);
		}
		function test_input($data)
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$c_route = $this->router->fetch_method();
		$except_route = ['login', 'signup', 'signin', 'registerIt', 'OtpSend', 'OtpVerify', 'VerifyOtp', 'ResetPassword'];
		isLogin($c_route, $except_route);

		function renderForm($data)
		{
			$rows = '';
			foreach ($data as $row) {
				if (isset($row['e'])){
					$event = $row['e'];
				}else{
					$event = '';
				}
				if (isset($row['max'])) {
					$max = 'max="' . $row['max'] . '"';
				} else {
					$max = "";
				}
				if ($row['inpForm'] == "input") {
					$rows .= '<div class="' . $row['divClass'] . '">
						<label for="' . $row['id'] . '">' . $row['label'] . '</label>';
					$input = '<input type="' . $row['type'] . '" ' . $row['attr'] . ' name="' . $row['name'] . '" class="' . $row['inputClass'] . '" placeholder="' . $row['label'] . '" id="' . $row['id'] . '" autocomplete="' . $row['name'] . '" ' . $max . '>';
					if ($row['group']) {
						$rows .= '
							<div class="input-group mb-2">
								' . $input . '
								<div class="input-group-append">
									<div class="input-group-text" '.$event.'><i class="' . $row['icon'] . '"></i></div>
								</div>
							</div> ';
					} else {
						$rows .= $input;
					}
					$rows .= '</div>';
				} elseif ($row['inpForm'] == "select") {
					$rows .= '<div class="' . $row['divClass'] . '">
					   <label for="' . $row['id'] . '" class="' . $row['r'] . '">' . $row['label'] . '</label>';
					$input = '<select ' . $row['r'] . ' name="' . $row['name'] . '" value="' . $row['v'] . '" class="' . $row['inputClass'] . ' " id="' . $row['id'] . '" ' . $row['attr'] . '><option value="">--Select--</option>';
					foreach ($row['options'] as $opt) {
						$selected = "";
						if (is_array($opt)) {
							if ($opt['v'] == $row['v']) {
								$selected = "selected";
							}
							$input .= '<option value="' . $opt['v'] . '" ' . $selected . '>' . $opt['o'] . '</option>';
						} else {
							if ($opt == $row['v']) {
								$selected = "selected";
							}
							$input .= '<option value="' . $opt . '" ' . $selected . '>' . $opt . '</option>';
						}
					}
					$input .= '</select>';
					if ($row['group']) {

						$rows .= '
						  <div class="input-group mb-2">
							 ' . $input . '
							 <div class="input-group-append">
								<div class="input-group-text" '.$event.'><i class="' . $row['icon'] . '"></i></div>
							 </div>
						  </div> ';
					} else {
						$rows .= $input;
					}
					$rows .= '</div>';
				}
			}
			echo $rows;
		}

		define("REF_BAL", 250);
		define("REF_BAL_TO", 500);
		define("JOINING_BAL", 100);
		define("HP_PER_ANS", 10);
	}
	 public function loadGame($game){
        $this->load->view('games/'.$game);
    }
    public function getGame(){
        $data['title'] = THE_TITLE." - Games";
	    $data['page'] = "Games";
		$data['content'] = $this->load->view('games/game',$data, true);
		$this->load->view('frontend/common/page-builder',$data);
    }
	public function getData()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$tbl = $_REQUEST['tbl'];
			if ($tbl == "questionnaire") {
				$sql = "SELECT `id`, `option_1`, `option_2`, `option_3`, `option_4`, `ques`
						FROM `$tbl` WHERE `is_active` = 1";
			}
			$result = $this->Admin_model->getAllData($sql);
			$noq = 5;
			$indexes = array_rand($result, $noq);
			$data = array();
			foreach ($indexes as $indx) {
				$result[$indx]['ans'] = 0;
				array_push($data, $result[$indx]);
			}
			echo json_encode(array("error" => false, "data" => $data));
		} else {
			echo json_encode(array("error" => true, "msg" => "Invalid access"));
		}
	}
	public function index()
	{
	   // return "test";
		$data['title'] = THE_TITLE . " - Home";
		$data['page'] = 'index';
		$id=$_SESSION['UID'];
        $sql = "SELECT id, job_title FROM `latest_jobs`";
		$data['info'] = $this->Admin_model->getAllData($sql);
		$sql = "SELECT * FROM `test_tbl`";
		$data['AllCourses'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/index', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}

	public function login()
	{
		if (isset($_SESSION['ROLE'])) {
			redirect(base_url());
		}
		$data['title'] = THE_TITLE . " - Login";
		$data['page'] = 'login';
		$data['content'] = $this->load->view('frontend/login', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function logout()
	{
		session_destroy();
		redirect(base_url('login'));
	}
	public function signup()
	{
		$data['title'] = THE_TITLE . " - Sign Up";
		$data['page'] = 'signup';
		$sql = "SELECT DISTINCT(STATE) FROM `pin` ORDER BY STATE ASC";
		$data['states'] = $this->Admin_model->getAllData($sql);
		$sql = "SELECT * FROM `pin` ORDER BY STATE ASC, DISTRICT ASC";
		$data['cities'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/signup', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}


	public function signin()
	{
		$username = test_input($_REQUEST['username']);
		$kunji = test_input($_REQUEST['password']);

		$config = array(
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required|trim'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required|trim',
				'errors' => array(
					'required' => 'You must provide a %s.',
				),
			),
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			echo 'INVALID';
			exit();
		}
		// $sql = "SELECT * FROM `users` WHERE `EMAIL` = '" . $username . "' AND `STATUS` = 'A'";
		$sql = "SELECT * FROM `users` WHERE (`EMAIL` = '" . $username . "'  OR `MOB` = '" . $username . "') AND `STATUS` = 'A'";
		$result = $this->Admin_model->getAllData($sql);

		// print_r($result);
		// exit();

		if (sizeof($result) > 0) {
			if (!password_verify($kunji, $result[0]['KUNJI'])) {
				echo 300;
			} else {
				$_SESSION['user']	= $result[0]['EMAIL'];
				$_SESSION['name']	= $result[0]['NAME'];
				$_SESSION['UID']	= $result[0]['id'];
				$_SESSION['ROLE']	= $result[0]['ROLE'];
				$_SESSION['IMG']	= $result[0]['USER_PROFILE'];
				$_SESSION['AGE']	= $result[0]['DOB'];
				if (isset($_REQUEST['fid2'])) {
					if ($_REQUEST['fid2'] == "loginWithdata") {
						echo json_encode($result[0]);
					} else {
						echo 100;
					}
				} else {
					echo 100;
				}
			}
		} else {
			echo 400;
		}
	}


	public function playnEarn()
	{
		$data['title'] = THE_TITLE . " - Play & Earn";
		$data['page'] = 'play-earn';
		$sql = "SELECT * FROM `playearn` WHERE user_id = '" . $_SESSION['UID'] . "' LIMIT 10";
		$data['history'] =  $this->Admin_model->getAllData($sql);
		// print_r($data['history']);exit();
		$points = 0;
		$currect_ans = 0;
		foreach ($data['history'] as $row) {
			$points += $row['points'];
			$currect_ans += $row['result'];
		}
		$data['points'] = $points;
		$sql = "SELECT COUNT(user_id) As 'total_attempt' FROM `playearn` WHERE user_id = '" . $_SESSION['UID'] . "'";
		$data['HAQ'] =  $this->Admin_model->getAllData($sql);
		foreach ($data['HAQ'] as $row) {
			$attempt = $row['total_attempt'] * 5;
			if ($attempt <= 0) {
				$total = 0;
			} else {
				$total = $currect_ans / $attempt;
			}
		}
		$data['total_haq'] = round($total * 10, 2);
		$data['content'] = $this->load->view('frontend/playtoearn', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}



	public function profile()
	{

		$id = $_SESSION['UID'];
		$data['title'] = THE_TITLE . " - Profile";
		$data['page'] = 'profile';

		$sql2 = "SELECT * FROM `enroll_course` WHERE user_id = $id";
		$sql_res = $this->Admin_model->getAllData($sql2);
		$data['enroll_course_count'] = count($sql_res);
		$sql = "SELECT * FROM `users` WHERE  id=$id";
		$data['info'] = $this->Admin_model->getAllData($sql);
		$sql = "SELECT * FROM `playearn` WHERE user_id = '" . $_SESSION['UID'] . "' LIMIT 10";
		$data['history'] =  $this->Admin_model->getAllData($sql);
		$points = 0;
		foreach ($data['history'] as $row) {
			$points += $row['points'];
		}
		$sql = "SELECT SUM(points) AS t_points FROM `ref_bonus` WHERE to_id = '" . $id . "'";
		$res = $this->Admin_model->getAllData($sql);
		$points += $res[0]['t_points'];
		$data['points'] = $points;
		$data['content'] = $this->load->view('frontend/profile', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function refernEarn()
	{
		$id = $_SESSION['UID'];
		$data['title'] = THE_TITLE . " - Refer & Earn";
		$data['page'] = 'refer-earn';
		$sql = "SELECT ref_code FROM `users` WHERE `id` = '" . $id . "'";
		$result = $this->Admin_model->getAllData($sql);
		$data['referal_code'] = $result[0]['ref_code'];
		// $data['refs'] = array(
		// 	array('date'=>'2023-01-01','remark'=>'Joining bonus - referral','points'=>'250'),
		// 	array('date'=>'2023-01-03','remark'=>'Referral bonus','points'=>'100'),
		// 	array('date'=>'2023-01-06','remark'=>'Joining bonus - referral','points'=>'250'),
		// 	array('date'=>'2023-01-06','remark'=>'Joining bonus - referral','points'=>'250'),
		// 	array('date'=>'2023-01-06','remark'=>'Joining bonus - referral','points'=>'250'),
		// 	array('date'=>'2023-01-06','remark'=>'Joining bonus - referral','points'=>'250'),
		// 	array('date'=>'2023-01-06','remark'=>'Joining bonus - referral','points'=>'250'),
		// 	array('date'=>'2023-01-12','remark'=>'Referral bonus','points'=>'100')
		// );
		$sql = "SELECT * FROM `ref_bonus` WHERE `to_id` = '" . $id . "'";
		$data['refs'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/refertoearn', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function registerIt()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$config = array(
				array(
					'field' => 'name',
					'label' => 'Full Name',
					'rules' => 'required|trim'
				), array(
					'field' => 'email',
					'label' => 'Email',
					'rules' => 'required|trim|valid_email|is_unique[users.EMAIL]'
				), array(
					'field' => 'tel',
					'label' => 'Phone',
					'rules' => 'required|trim|min_length[10]|max_length[10]|is_unique[users.MOB]',
					"errors" => ['is_unique' => 'The %s number is already registered.',],
				),
				array(
					'field' => 'new-password',
					'label' => 'Password',
					'rules' => 'required|min_length[8]|trim'
				),
				array(
					'field' => 'bday',
					'label' => 'Date of birth',
					'rules' => 'required|trim'
				),
				array(
					'field' => 'password-conf',
					'label' => 'Confirm Password',
					'rules' => 'required|trim|matches[new-password]'
				),

			);
			$error = "";
			$this->form_validation->set_rules($config);
			if ($this->form_validation->run() == FALSE) {
				foreach ($config as $row) {
					$error .= form_error($row["field"]);
				}
				echo '{"isSaved":"false","msg":"' . $error . '"}';
			} else {
				try {
					$random = "";
					srand((float) microtime() * 1000000);

					$data3 = "123456123456789071234567890890";
					$data3 .= "aBCdefghijklmn123opq45rs67tuv89wxyz"; // if you need alphabatic also
					for ($i = 0; $i < 8; $i++) {
						$random .= substr($data3, (rand() % (strlen($data3))), 1);
					}
					$is_referal = false;
					$bal = 0;
					if (!empty($_REQUEST['referral'])) {
						$sql = "SELECT * FROM `users` WHERE `ref_code` = '" . $_REQUEST['referral'] . "'";
						$result = $this->Admin_model->getAllData($sql);
						if (sizeof($result) <= 0) {
							echo "ERROR_REF";
							exit();
						} else {
							$referee = $result[0]['id'];
							$is_referal = true;
							$bal = REF_BAL_TO;
						}
					}
					// print_r($_REQUEST); exit();

					$data['NAME'] = test_input($_REQUEST['name']);
					$data['EMAIL'] = test_input($_REQUEST['email']);
					$data['MOB'] = test_input($_REQUEST['tel']);
					$data['F_NAME'] = test_input($_REQUEST['f_name']);
					$data['CLASS'] = test_input($_REQUEST['class']);
					$data['GENDER'] = test_input($_REQUEST['gender']);
					$data['STATE'] = test_input($_REQUEST['state']);
					$data['CITY'] = test_input($_REQUEST['city']);
					$data['ADDRESS'] = test_input($_REQUEST['address']);
					$data['COLLEGE'] = test_input($_REQUEST['college']);
					$data['KUNJI'] = password_hash($_REQUEST['new-password'], PASSWORD_DEFAULT);
					$data['STATUS'] = 'A';
					$data['ROLE'] = 'user';
					$data['DATE'] = date('Y-m-d H:i:s');
					$data['DOB'] = date_format(date_create(test_input($_REQUEST['bday'])), 'Y-m-d');
					$data['ref_code'] = $random;
					$user_id = $this->Admin_model->saveData('users', $data);
					if ($user_id != 0) {
						if ($is_referal) {
							$data1 = [
								'from_id' => $referee,
								'to_id' => $user_id,
								'points' => $bal,
								'date' => date('Y-m-d H:i:s'),
								'remark' => 'Joining bonus - referral'
							];
							$this->Admin_model->saveData('ref_bonus', $data1);
							$data2 = [
								'from_id' => $user_id,
								'to_id' => $referee,
								'points' => REF_BAL,
								'date' => date('Y-m-d H:i:s'),
								'remark' => 'Referral bonus'
							];
							$this->Admin_model->saveData('ref_bonus', $data2);
						}
						echo '{"isSaved":"true"}';
						// redirect('login');
					} else {
						echo '{"isSaved":"false","msg":"Some error occured while registering you details with us. Please try later."}';
						$text = json_encode($this->db->error());
						logerror($text);
					}
				} catch (Exception $e) {
					echo '{"isSaved":"false", "msg": "' . $e->getMessage() . '"}';
				}
			}
		}
	}
	public function save()
	{

		// print_r($_REQUEST);
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$fid = $_REQUEST['fid'];
			switch ($fid) {
				case 'submit-quizz':
					// print_r($_REQUEST);
					$answers = json_decode($_REQUEST['answers'], true);
					$count = 0;
					$k = 0;
					$play_id = 0;
					$points = 0;
					foreach ($answers as $row) {
						//echo $row['id']." : ".$row['ques']."\n";
						$question_id = $row['id'];
						$question_ans = $row['ans'];
						$userid = $_SESSION['UID'];

						$query = "SELECT * FROM `questionnaire` WHERE `id`= '" . $question_id . "' AND `ans`= '" . $question_ans . "'";
						$res = $this->db->query($query);
						$result = $res->row();
						if ($result) {
							$is_correct = 1;
							$count++;
						} else {
							$is_correct = 0;
						}
						if ($k == 0) {
							$data = [
								'user_id' => $userid,
								'result' => $count,
								'points' => $points,
								'date' => date('Y-m-d H:i:s')
							];

							$play_id = $this->Admin_model->saveData('playearn', $data);
						}
						$data1 = [
							'question_id' => $question_id,
							'response_ans' => $question_ans,
							'user_id' => $userid,
							'play_id' => $play_id,
							'is_correct' => $is_correct
						];
						$k++;
						$res = $this->Admin_model->saveData('answers_quiz', $data1);
						if (!$res) {
							echo '{"isSaved":"false","msg":"Error occurred while saving result"}';
							exit();
						}
					}
					$points = $count * HP_PER_ANS;

					$sql = "UPDATE `playearn` SET points = '" . $points . "', result = '" . $count . "' WHERE id = '" . $play_id . "'";
					$this->Admin_model->updateSql($sql);
					echo '{"isSaved":"true","result":"' . $count . '","point":"' . $points . '"}';
					break;
				case 'submit-bmi':
					if ($_SERVER['REQUEST_METHOD'] == "POST") {
						$age = $_REQUEST['age'];
						$weight = $_REQUEST['weight'];
						$height = $_REQUEST['height'];
						$bmi = $_REQUEST['bmi'];
						$userid = $_SESSION['UID'];
					}
					$data = [
						'age' => $age,
						'weight' => $weight,
						'height' => $height,
						'bmi_result' => $bmi,
						'user_id' => $userid
					];

					$res = $this->Admin_model->saveData('bmicalculater', $data);

					break;
			}
		} else {
			$data['error'] = true;
			$data['msg'] = 'Not allowed';
			echo json_encode($data);
		}
	}

	public function latest_jobs()
	{
		defined('BASEPATH') or exit('No direct script access allowed');
		require_once APPPATH . 'libraries/simple_html_dom.php';

		$url = "https://www.sarkariresult.com/";
		$html = file_get_contents($url);

		if ($html) {
			$getdata = array();

			$dom = str_get_html($html);

			$jobDivs = $dom->find('#post');
			if ($jobDivs && count($jobDivs) >= 7) {
				for ($i = 6; $i < count($jobDivs); $i++) {
					$jobDiv = $jobDivs[$i];
					$jobDetails = $jobDiv->find('ul');
					if ($jobDetails) {
						foreach ($jobDetails as $ul) {
							$jobItems = $ul->find('li');
							if ($jobItems) {
								foreach ($jobItems as $item) {
									$getdata[] = $item->plaintext;
								}
							}
						}
					}
				}
			} else {
				echo "Job data not found.";
			}
			$dom->clear();
			unset($dom);
			// print_r($getdata);
		} else {
			echo "Failed to fetch data.";
		}
		$sql = "SELECT * FROM `latest_jobs` ORDER BY STR_TO_DATE(`start_date`, '%d-%m-%Y') DESC";
		$data['result'] = $this->Admin_model->getAllData($sql);


		$data['title'] = THE_TITLE . " - Latest-Jobs";
		$data['page'] = 'Latest-Jobs';
		$data['getdata'] = $getdata;
		$data['content'] = $this->load->view('frontend/latest-jobs', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}


	public function jobdiscreption()
	{
		$name = $this->input->post('home-search');
        $name = $_REQUEST['name'];
		$data['title'] = THE_TITLE . " - Job Discreption";
		$data['page'] = 'Job Discreption';
		$sql = "SELECT * FROM `latest_jobs` where id='$name'";
		$data['descript'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/job-description', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}




	public function BmiCalculator()
	{
		$data['title'] = THE_TITLE . " - BMI Calculator";
		$data['page'] = 'BMI-Calculator';
		$data['content'] = $this->load->view('frontend/BmiCalculator', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function DietPlan()
	{
		$data['title'] = THE_TITLE . " - Diet Plan";
		$data['page'] = 'Diet Plan';
		$data['content'] = $this->load->view('frontend/dietplan', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function Results()
	{
		$data['title'] = THE_TITLE . " - Results";
		$data['page'] = 'Results';
		$data['gettestname'] = $this->Admin_model->gettestname();
		$data['content'] = $this->load->view('frontend/results', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function Symptoms()
	{
		$data['title'] = THE_TITLE . " - Symptoms";
		$data['page'] = 'Symptoms';
		$data['content'] = $this->load->view('frontend/symptoms', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function ReferEarn()
	{
		$data['title'] = THE_TITLE . " - Refer-Earn";
		$data['page'] = 'Refer-Earn';
		$data['content'] = $this->load->view('frontend/referalearn', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function test()
	{
		$data['title'] = THE_TITLE . " - Know Your Test";
		$data['page'] = 'test';
		$data['symptoms'] = $this->Admin_model->getAllSymptoms();
		$data['diseases'] = $this->Admin_model->getAllDiseases();
		$sql = "SELECT * FROM `users` WHERE `id`= '" . $_SESSION['UID'] . "'";
		$data['result'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/test', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function saveTestRecord()
	{
		$symptoms = $_REQUEST['symptomdata'];
		$name = $_REQUEST['username'];
		$age = $_REQUEST['userage'];
		$id = $_REQUEST['userid'];
		$gender = $_REQUEST['usergender'];
		$msg = "I am having ";
		$delim = "";
		foreach ($symptoms as $key => $index) {
			$msg .= $delim . $index['name'] . ' for ' . $index['days'] . ' days';
			$delim = ", ";
		}
		$msg .= ". based on these symptoms what are the possible healthcare conditions i could be dealing with? additionally which blood tests should i discuss with my doctor  (write in active voice with a brief introduction regarding the importance of the mentioned symptoms and do not use the lines that 'i am not a doctor'etc or 'an AI language model' as we already know that), list down health conditions and test in list with proper details.";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		$postdata = array(
			"model" => "text-davinci-003",
			"prompt" => $msg,
			"temperature" => 1,
			"max_tokens" => 1400,
			"top_p" => 1,
			"frequency_penalty" => 0,
			"presence_penalty" => 0
		);
		$postdata = json_encode($postdata);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: Bearer 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';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			// echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		$result = json_decode($result, true);
		echo "<div style='height:92vh;'>";
		echo "<i class='fa fa-smile' style='color: #2ecc71!important;height: 31px;margin-bottom: 15px;'></i><i class='fa fa-times' style='color:black!important;height: 21px;margin-bottom: 15px;float: right;' onclick='closeDialogBox()'></i><p style='font-weight:bold;'>Based on your given symptoms with duration below are the results:-</p>
		<pre style='max-height:78vh;white-space: break-spaces;'>";
		echo $query = $result['choices'][0]['text'];
		echo "</pre>
			<div class='flex flex-content-center' style='justify-content: space-between;'>
				<button style='margin-top: auto;'class='btn btn-primary' onclick='getAccurate()'>Get Accurate Results</button>
				<button type='button' class='btn btn-primary' onclick='closeDialogBox()'>Close</button>
			</div>";
		echo "</div>";
		$data = array(
			'user_id' => $id,
			'name' => $name,
			'age' => $age,
			'query' => $query,
			'gender' => $gender,
		);

		$tbl = 'test';
		$data = $this->Admin_model->saveData($tbl, $data);
	}
	public function Thankyou()
	{
		$data['title'] = THE_TITLE . " - Thank You";
		$data['page'] = 'Thank You';
		$data['content'] = $this->load->view('frontend/thankyou', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function NearLabs()
	{
		$data['title'] = THE_TITLE . " - Near Labs";
		$data['page'] = 'Near Labs';
		$data['content'] = $this->load->view('frontend/nearlabs', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function BmiHistory()
	{
		$data['title'] = THE_TITLE . " - Bmi History";
		$data['page'] = 'Bmi History';
		$userid = $_SESSION['UID'];
		$sql = "SELECT b.id as b_id,b.*,u.* FROM `bmicalculater` b,users u WHERE u.id=b.user_id and user_id=$userid";
		$data['bmi'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/bmihistory', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function getdatabmi()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$fid = $_REQUEST['fid'];
			if ($fid == 'Get-Bmi-data') {
				$tbl = $_REQUEST['tbl'];
				$id = $_REQUEST['id'];
				$sql = "SELECT b.*, u.* FROM `$tbl` b,users u WHERE u.id=b.user_id and user_id=$id ORDER BY user_id DESC
			   LIMIT 1";
				$result = $this->Admin_model->getAllData($sql);
				foreach ($result as $row) {
					error_reporting(0);
					$name = $row['NAME'];
					$bmi_result = $row['bmi_result'];
					$to_email = $row['EMAIL'];
					$from_email = "info@pathobot.in";
					$this->load->library('email');

					$this->email->from($from_email, 'Pathobot');
					$this->email->to($to_email);
					$this->email->subject('Pathobot - Request Received');
					$this->email->message('We have received your request. We will connect with you shortly.');
					$this->email->send();

					$this->email->from($from_email, 'Pathobot');
					$this->email->to($from_email);
					$this->email->subject('Pathobot - Request Received');
					$this->email->message('Name: ' . $row['NAME'] . ' Email: ' . $row['EMAIL'] . ' BMI: ' . $row['bmi_result']);

					//Send mail
					if ($this->email->send()) {
						echo "We have received your request. We will connect with you shortly.";
					} else {
						echo "Some error occurred. Please try again.";
					}
				}
			}
		}
	}

	public function MyProfile()
	{

		$id = $_SESSION['UID'];
		$data['title'] = THE_TITLE . " - Profile";
		$data['page'] = 'profile';
		$sql = "SELECT DISTINCT(STATE) FROM `pin` ORDER BY STATE ASC";
		$data['states'] = $this->Admin_model->getAllData($sql);
		$sql = "SELECT * FROM `pin` ORDER BY STATE ASC, DISTRICT ASC";
		$data['cities'] = $this->Admin_model->getAllData($sql);
		$sql = "SELECT * FROM `users` WHERE  id=$id";
		$data['info'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/myprofile', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}

	public function UpdateProfile()
	{
		$id = $this->input->post('id');
		$data = array(
			'NAME' => $this->input->post('name'),
			'EMAIL' => $this->input->post('email'),
			'MOB' => $this->input->post('mobile'),
			'DOB' => $this->input->post('dob'),
			'F_NAME' => $this->input->post('fname'),
			'CLASS' => $this->input->post('class'),
			'GENDER' => $this->input->post('gender'),
			'ADDRESS' => $this->input->post('address'),
			'COLLEGE' => $this->input->post('college'),
				'STATE' => $this->input->post('state'),
					'CITY' => $this->input->post('city'),
		);
		$this->Admin_model->updateDataProfile($id, $data);
		$this->session->set_flashdata('update', 'Update Successfull');
		redirect('MyProfile');
	}
	public function updateprofileimg()
	{
		$config['upload_path']   = './upload_profile/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|webp|JFIF';
		$config['max_size']      = 4024;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('userfile')) {

			$error = $this->upload->display_errors();
			$this->session->set_flashdata('error', strip_tags($error));
			redirect('MyProfile');
		} else {
			$id = $_SESSION['UID'];
			$data = $this->upload->data();
			$filename = $data['file_name'];
			$data1 = array(
				'USER_PROFILE' => $filename
			);
			$this->Admin_model->updateDataProfileimg($id, $data1);
			redirect('MyProfile');
		}
	}

// 	public function updatepassword()
// 	{
// 		$password = $this->input->post('password');
// 		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
// 		if (password_verify($password, $hashed_password)) {
// 			$id = $_SESSION['UID'];
// 			$this->Admin_model->userpasswordupdate($id, $hashed_password);
// 			redirect('logout');
// 		} else {
// 			echo 'Invalid password.';
// 		}
// 	}

    public function updatepassword()
    {
        $this->load->database();

        $old_password = $this->input->post('oldpassword');
        $new_password = $this->input->post('password');
        $confirm_password = $this->input->post('confirmpassword');

        // Check if new and confirm passwords match
        if ($new_password !== $confirm_password) {
            $this->session->set_flashdata('error', 'New Password and Confirm Password do not match.');
            redirect('MyProfile');
            return;
        }

        // Fetch the stored hashed password for the user directly from the table
        $id = $_SESSION['UID'];
        $query = $this->db->select('KUNJI')
                          ->from('users')
                          ->where('id', $id)
                          ->get();

        if ($query->num_rows() == 0) {
            $this->session->set_flashdata('error', 'User not found.');
            redirect('MyProfile');
            return;
        }

        $stored_password = $query->row()->KUNJI;

        // Verify the old password
        if (password_verify($old_password, $stored_password)) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update the password in the database
            $this->db->where('id', $id)
                     ->update('users', ['KUNJI' => $hashed_password]);

            // Redirect to logout or show a success message
            $this->session->set_flashdata('success', 'Password updated successfully. Please log in again.');
            redirect('logout');
        } else {
            $this->session->set_flashdata('error', 'Invalid old password.');
            redirect('MyProfile');
        }
    }

	public function ViewAll()
	{
		$user_id = $_SESSION['UID'];

		$data['title'] = THE_TITLE . " - View All";
		$data['page'] = 'course';

		$sql2 = "SELECT * FROM `enroll_course` WHERE user_id = $user_id";
		$sql_res = $this->Admin_model->getAllData($sql2);
		if ($sql_res) {
			$course_ids = array();

			foreach ($sql_res as $row) {
				$course_ids[] = $row['course_id'];
			}
			$course_ids_string = implode(',', $course_ids);

			$sql1 = "SELECT * FROM `test_tbl` ORDER BY id ASC";

			// $sql1 = "SELECT * FROM `test_tbl` WHERE id NOT IN ($course_ids_string) ORDER BY id ASC";

		} else {
			$sql1 = "SELECT * FROM `test_tbl`  ORDER BY id ASC";
		}

		$data['viewtest'] = $this->Admin_model->getAllData($sql1);
		$sql = "SELECT * FROM `test_tbl`";
		$data['test'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/viewallcourse', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}


	public function Enrollcourse()
	{
		$user_id = $_SESSION['UID'];

		$data['title'] = THE_TITLE . " - View All";
		$data['page'] = 'enroll-course';

		$sql2 = "SELECT * FROM `enroll_course` WHERE user_id = $user_id";
		$sql_res = $this->Admin_model->getAllData($sql2);


		if ($sql_res) {
			$course_ids = array();

			foreach ($sql_res as $row) {
				$course_ids[] = $row['course_id'];
			}

			$course_ids_string = implode(',', $course_ids);
			$sql1 = "SELECT * FROM `test_tbl` WHERE id IN ($course_ids_string) ORDER BY id ASC";
		} else {
			$sql1 = "SELECT * FROM `test_tbl`  WHERE id = 00000 ";
		}

		$data['viewtest'] = $this->Admin_model->getAllData($sql1);
		$sql = "SELECT * FROM `test_tbl`";
		$data['test'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/enroll-course', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}


	public function webinar()
	{
		$data['title'] = THE_TITLE . " - Webinar";
		$data['page'] = 'Webinar';

		$sql = "SELECT * FROM `webinar`";
		$data['webinar'] = $this->Admin_model->getAllData($sql);

		$data['content'] = $this->load->view('frontend/webinar', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}

		public function webinardiscreption()
	{
		$name = $this->input->post('home-search');
        $name = $_REQUEST['name'];

		$data['title'] = THE_TITLE . " - Webinar Discreption";
		$data['page'] = 'Webinar Discreption';

		$sql = "SELECT * FROM `webinar` where id='$name'";
		$data['descript'] = $this->Admin_model->getAllData($sql);

		$sql1 = "SELECT * FROM `webinar_images` where webinar_id='$name'";
		$data['webinar_images'] = $this->Admin_model->getAllData($sql1);

		$data['content'] = $this->load->view('frontend/webinardescription', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}




	public function testdiscreption()
	{
		$name = $this->input->post('home-search');
	    $_REQUEST['name'] = $name;
		$data['title'] = THE_TITLE . " - Test Discreption";
		$data['page'] = 'Test Discreption';
		$sql = "SELECT * FROM `test_tbl` where id='$name'";
		$data['descript'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/testdiscreption', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}

	public function viewtestdiscreption()
	{
		$user_id = $_SESSION['UID'];
		$sql2 = "SELECT * FROM `enroll_course` WHERE user_id = $user_id";
		$sql_res = $this->Admin_model->getAllData($sql2);
		$course_ids = array();
		if ($sql_res) {
			$course_ids = array();
			foreach ($sql_res as $row) {
				$course_ids[] = $row['course_id'];
			}
		}
		$data['course_id'] = $course_ids;
		$name = $_REQUEST['name'];
		$data['title'] = THE_TITLE . " - Test Discreption";
		$data['page'] = 'Test Discreption';
		$sql = "SELECT * FROM `test_tbl` where id='$name'";
		$data['descript'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/testdiscreption', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function DisesesList()
	{
		$data['title'] = THE_TITLE . " - Diseses List";
		$data['page'] = 'Diseses List';
		// $sql="SELECT * FROM `diseases_list`";
		// $data['diseases_list'] = $this->Admin_model->getAllData($sql);
		$sql1 = "SELECT * FROM `common_health_condition`";
		$data['common_health_condition'] = $this->Admin_model->getAllData($sql1);
		$sql = "SELECT * FROM `common_health_condition` LIMIT 4";
		$data['common_health_condition_limit'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/diseseslist', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function DisesesAllList()
	{
		$data['title'] = THE_TITLE . " - Diseses List";
		$data['page'] = 'Diseses List';
		$id = $_REQUEST['id'];
		$sql = "SELECT * FROM `diseases_list` WHERE cat_id=$id";
		$data['diseases_list'] = $this->Admin_model->getAllData($sql);
		$sql = "SELECT * FROM `diseases_list` WHERE  cat_id=$id LIMIT 4";
		$data['diseases_list_limit'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/viewalldiseases', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	function getdiscriptin()
	{
		$id = $_REQUEST['ids'];
		$sql = "SELECT * FROM `diseases_list` where id='$id'";
		$data = $this->Admin_model->getAllData($sql);
		foreach ($data as $row) {
			$name = $row['diseases_name'];
			$desc = $row['description'];
			$image = $row['image'];
		}
		echo json_encode(array('name' => $name, 'desc' => $desc, 'imgs' => $image));
	}
	function getCategoryName()
	{
		$name = $_REQUEST['name'];
		$sql = "SELECT * FROM `common_health_condition` where category_name='$name'";
		$data = $this->Admin_model->getAllData($sql);
		foreach ($data as $row) {
			$name = $row['category_name'];
			$img = $row['image'];
			$id = $row['id'];
		}
		echo json_encode(array('name' => $name, 'id' => $id, 'img' => $img));
	}

	function getTestName()
	{
		$name = $_REQUEST['name'];
		$sql = "SELECT * FROM `test_tbl` where test_name='$name'";
		$data = $this->Admin_model->getAllData($sql);
		foreach ($data as $row) {
			$name = $row['test_name'];
			$img = $row['image'];
			$id = $row['id'];
		}
		echo json_encode(array('name' => $name, 'id' => $id, 'img' => $img));
	}

	function getRoadMapName()
	{
		$name = $_REQUEST['name'];
		$sql = "SELECT * FROM `roadmap` where title='$name'";
		$data = $this->Admin_model->getAllData($sql);
		foreach ($data as $row) {
			$name = $row['title'];
			$img = $row['image'];
			$id = $row['id'];
		}
		echo json_encode(array('name' => $name, 'id' => $id, 'img' => $img));
	}



	function getDiseasesName()
	{
		$name = $_REQUEST['name'];
		$sql = "SELECT * FROM `diseases_list` where diseases_name='$name'";
		$data = $this->Admin_model->getAllData($sql);
		foreach ($data as $row) {
			$name = $row['diseases_name'];
			$id = $row['id'];
			$img = $row['image'];
		}
		echo json_encode(array('name' => $name, 'id' => $id, 'img' => $img));
	}

	function commingsoon()
	{
		$data['title'] = THE_TITLE . " - Diseses List";
		$data['page'] = 'Diseses List';
		$data['content'] = $this->load->view('frontend/commingsoon', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}

	function checkbmi()
	{
		$bmi_total = $_REQUEST['bmi_total'];
		$id = $_SESSION['UID'];
		$sql = "SELECT * FROM `bmicalculater` where `user_id`=$id OR bmi_result=$bmi_total";
		$data = $this->Admin_model->getAllData($sql);
		if (count($data) > 0) {
			foreach ($data as $row) {
				$date = substr($row['dates'], 0, 10);
			}
			echo $date;
		} else {
			echo "not found";
		}
	}
	function BmiDeleteData()
	{
		$id = $_REQUEST['bmi_id'];
		$sql = "DELETE FROM `bmicalculater` WHERE id=$id";
		$data = $this->Admin_model->deleteData($sql);
		if ($data) {
			echo "Data deleted successfully !";
		} else {
			echo "Error !";
		}
	}
	function checkdietplan()
	{

		$weight_type = $_REQUEST['weight_type'];
		$bmiresult = $_REQUEST['bmiresult'];
		$age = $_REQUEST['age'];
		$height = $_REQUEST['height'];
		$weight = $_REQUEST['weight'];
		$msg = "Get the deit plan with height $height.cm and $weight.kg and age $age and $weight_type with calories and protien";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		$postdata = array(
			"model" => "text-davinci-003",
			"prompt" => $msg,
			"temperature" => 1,
			"max_tokens" => 2100,
			"top_p" => 1,
			"frequency_penalty" => 0,
			"presence_penalty" => 0
		);
		$postdata = json_encode($postdata);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: Bearer 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';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			// echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		$result = json_decode($result, true);
		echo "<div style='height:92vh;'>";
		echo "<i class='fa fa-smile' style='color: #2ecc71!important;height: 31px;margin-bottom: 15px;'></i><i class='fa fa-times' style='color:black!important;height: 21px;margin-bottom: 15px;float: right;' onclick='closeDialogBox()'></i><p style='font-weight:bold;'>As per your inputs bellow are the details :-</p>
		<pre style='max-height:78vh;white-space: break-spaces;font-family: inherit;'>";
		echo $query = $result['choices'][0]['text'];
		echo "</pre>
			<div class='flex flex-content-center' style='justify-content: space-between;'>
				<button style='margin-top: auto;'class='btn btn-primary' onclick='getAccurate()'>Get Accurate Results</button>
				<button type='button' class='btn btn-primary' onclick='closeDialogBox()'>Close</button>
			</div>";
		echo "</div>";
		// $this->load->view('frontend/checkdietplan',$data);


	}
	function dietplanshow()
	{
		$weight_type = $_REQUEST['weight_type'];
		$bmi = $_REQUEST['bmi_value'];

		$msg = "Get the deit plan with BMI $bmi.cm and $weight_type list wise";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		$postdata = array(
			"model" => "text-davinci-003",
			"prompt" => $msg,
			"temperature" => 1,
			"max_tokens" => 2100,
			"top_p" => 1,
			"frequency_penalty" => 0,
			"presence_penalty" => 0
		);
		$postdata = json_encode($postdata);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);

		$headers = array();
		$headers[] = 'Content-Type: application/json';
		$headers[] = 'Authorization: Bearer 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';
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
			// echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		$result = json_decode($result, true);
		echo "<div style='height:92vh;'>";
		echo "<i class='fa fa-smile' style='color: #2ecc71!important;height: 31px;margin-bottom: 15px;'></i><i class='fa fa-times' style='color:black!important;height: 21px;margin-bottom: 15px;float: right;' onclick='closeDialogBox()'></i><p style='font-weight:bold;'>As per your inputs bellow are the details :-</p>
		<pre style='max-height:78vh;white-space: break-spaces;font-family: inherit;'>";
		echo $query = $result['choices'][0]['text'];
		echo "</pre>
			<div class='flex flex-content-center' style='justify-content: space-between;'>
				<button style='margin-top: auto;'class='btn btn-primary' onclick='getAccurate()'>Get Accurate Results</button>
				<button type='button' class='btn btn-primary' onclick='closeDialogBox()'>Close</button>
			</div>";
		echo "</div>";
	}
	function DiseasesByTestName()
	{
		$id = $this->input->post('diseases');
		$sql = "SELECT * FROM `test_tbl` where id IN($id)";
		$data['test_diseases'] = $this->Admin_model->getAllData($sql);
		$data['title'] = THE_TITLE . " - Diseases By Test Name";
		$data['page'] = 'Diseases By Test Name';
		$data['content'] = $this->load->view('frontend/DiseasesByTestName', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}
	public function crop_image_upload()
	{
		$id = $_SESSION['UID'];
		if (isset($_POST["image"])) {
			$data = $_POST["image"];
			$image_array_1 = explode(";", $data);
			$image_array_2 = explode(",", $image_array_1[1]);
			$data = base64_decode($image_array_2[1]);
			$imageName = time() . '.png';
			file_put_contents('upload_profile/' . $imageName, $data);
			$data1 = array(
				'USER_PROFILE' => $imageName
			);
			$_SESSION['IMG'] = $imageName;
			$this->Admin_model->updateDataProfileimg($id, $data1);
		}
	}
	function OtpSend()
	{
		$RandOtp = rand(999999, 100000);
		$email = $_REQUEST['email'];
		$sql = "SELECT * FROM `users` where `EMAIL`='$email'";
		$data = $this->Admin_model->getAllData($sql);
		if (count($data) > 0) {
			$sql = "UPDATE `users` SET OTP = '" . $RandOtp . "' WHERE `EMAIL`='$email'";
			$this->Admin_model->updateSql($sql);
			$this->load->library('email');

			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://sg2plzcpnl504304.prod.sin2.secureserver.net';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '7';
			$config['smtp_user']    = 'noreply@cdc-azamgarh.com';
			$config['smtp_pass']    = '7lc;cHZ5t&0&';
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'text'; // or html
			$config['validation'] = TRUE; // bool whether to validate email or not
			$this->email->initialize($config);
			$msg = "Please Enter the OTP- $RandOtp";
			$this->email->from('noreply@cdc-azamgarh.com', 'CDC');
			$this->email->to($email);
			$this->email->subject('Forget Password');
			$this->email->message($msg);
			if (!$this->email->send()) {
				echo "Failed";
			}
		} else {
			echo "Not Exist";
		}
	}
	function OtpVerify()
	{
		$otp = $_REQUEST['otp'];
		$sql = "SELECT * FROM `users` where `OTP`='$otp'";
		$data = $this->Admin_model->getAllData($sql);
		if (count($data) > 0) {
			echo "verified";
		} else {
			echo "not verified";
		}
	}
	function ResetPassword()
	{
		$email = $_REQUEST['email'];
		$newpassword = password_hash($_REQUEST['newpassword'], PASSWORD_DEFAULT);
		$sql = "UPDATE `users` SET `KUNJI` = '" . $newpassword . "' WHERE `EMAIL`='$email'";
		$data = $this->Admin_model->updateSql($sql);
		if ($data) {
			echo "success";
		}
	}


	public function enrollnow()
	{
		$course_id = $_REQUEST['id'];
		$user_id = $_SESSION['UID'];
		$status = '1';
		$data = array(
			'course_id' => $course_id,
			'user_id' => $user_id,
			'status' => $status
		);
		$tbl = 'enroll_course';
		$this->Admin_model->saveData($tbl, $data);
		redirect('enroll-courses');
	}



	function testdashboard()
	{
		$data['title'] = THE_TITLE . " - Test Dashboard";
		$data['page'] = 'Latest-Jobs';
		$data['content'] = $this->load->view('frontend/testdashboard', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}


	public function authenticate_google()
	{

		// echo "hello";
		// exit();

		$authUrl = $this->google_client->getAuthUrl();
		redirect($authUrl);
	}

	public function oauth_callback()
	{
		if ($this->input->get('code')) {
			$code = $this->input->get('code');
			$this->google_client->authenticate($code);
			$analytics = new Google_Service_Analytics($this->google_client->getClient());

			// Fetch analytics data using the $analytics object

			$data['analytics_data'] = $fetched_data; // Your fetched analytics data

			$this->load->view('analytics_view', $data);
		}
	}

	public function roadmap()
	{
		$data['title'] = THE_TITLE . " - Road Map";
		$data['page'] = 'road-map';
		$sql = "SELECT * FROM `roadmap` ";
		$data['roadmap'] =  $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/road-map/road-map', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}

		public function roadmapdescription()
	{
		$name = $this->input->post('home-search');
        $name = $_REQUEST['name'];
		$data['title'] = THE_TITLE . " - Road Map Discreption";
		$data['page'] = 'Road Map Discreption';
		$sql = "SELECT * FROM `roadmap` where id='$name'";
		$data['descript'] = $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/road-map/roadmap-description', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}

	function getNotification(){
	    $id = $_SESSION['UID'];
	    $sql = "SELECT * FROM `push_logs` WHERE `user_id`='$id' AND `remark`=0 GROUP BY `push_id` ORDER BY `id` ASC";
		$notificationResult = $this->Admin_model->getAllData($sql);
		echo json_encode($notificationResult);
	}

	function NotificationStatus(){
	    $push_id= $_REQUEST['pushId'];
	    $user_id= $_REQUEST['userId'];
	    $sql = "UPDATE `push_logs` SET `remark` = '1' WHERE `user_id` = '$user_id' AND `push_id`='$push_id' ";
		$res = $this->Admin_model->updateSql($sql);
		if($res){
		    echo "success";
		}
	}

	function getNotificationCounter(){
	    $id = $_SESSION['UID'];
	    $sql = "SELECT * FROM `push_logs` WHERE `user_id`='$id' AND `remark`=0 GROUP BY `push_id` ORDER BY `id` ASC";
		$notificationResult = $this->Admin_model->getAllData($sql);
		echo count($notificationResult);
	}

	function saveTest(){
	$input =  $_REQUEST;
	$data = array(
		"name" => $_REQUEST['name'],
		"email" => $_REQUEST['email'],
		"contact" => $_REQUEST['tel'],
		"qualification" => $_REQUEST['qualification'],
// 		"p_location" => $_REQUEST['preferd_location'],
// 		"pref_degree" => $_REQUEST['degree'],
		"dob" => $_REQUEST['dob'],
		"gender" => $_REQUEST['gender'],
		"father_name" => $_REQUEST['fname'],
		"mother_name" => $_REQUEST['mname'],
		"stream" => $_REQUEST['stream'],
// 		"nationality" => $_REQUEST['nationality'],
// 		"c_location" => $_REQUEST['c_location'],
	);

	$res = $this->Admin_model->saveData('students', $data);
	$studentId='';
	if ($res) {
		$lastInsertIdSql  = "SELECT MAX(`id`) as last_id FROM `students`";
		$lastInsertResult  = $this->Admin_model->getAllData($lastInsertIdSql );
		$studentId = $lastInsertResult [0]['last_id'];
	}
	$values = "";   $delim = "";
	for($i=1;$i<=42;$i++){
		$values .= $delim."('".$input['ques-id-'.$i]."','".$input['ques-'.$i]."','$studentId')";
		$delim = ",";
	}
	$sql = "INSERT INTO `answers`(`ques_id`, `answer`, `student_id`) VALUES $values";
    $this->db->query($sql);
	$sql = "SELECT SUM((answer/100)) AS score, q.trait
		FROM `answers` a, `quiz` q
		WHERE a.student_id = '$studentId' AND a.ques_id = q.id
		GROUP BY q.trait ORDER BY score DESC LIMIT 3";
	$query = $this->db->query($sql);
	$result = $query->result();
	$response = [
		'result' => $result,
		'studentId' => $studentId
	];
	echo json_encode($response);

  }

  	function TestName(){
		$id = $_SESSION['UID'];
		$data['title'] = THE_TITLE." - Test";
		$data['page'] = "Test";
		$sql = "SELECT * FROM `users` where `id`=$id ";
		$data['user_details']=$this->Admin_model->getAllData($sql);
		$sql = "SELECT * FROM `quiz`";
		$data['quizes']=$this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/Test',$data, true);
		$this->load->view('frontend/common/page-builder',$data);
	}


	// Event List
	function EventBooking(){
		$id = $_SESSION['UID'];
		$data['title'] = THE_TITLE." - Event Booking";
		$data['page'] = "Event Booking";
		$sql = "SELECT * FROM `event_list` ";
		$data['EventList'] =  $this->Admin_model->getAllData($sql);
		$data['content'] = $this->load->view('frontend/SeatBooking/event-list',$data, true);
		$this->load->view('frontend/common/page-builder',$data);
	}

	// Seat Booking
	public function seatbooking()
	{
		$data['title'] = THE_TITLE . " - Seat Booking";
		$data['page'] = 'seat-booking';

		// Fetch seating plans from database
		$sql = "SELECT * FROM `seating_plans` WHERE is_ative = 1 LIMIT 1";
		$seating_plans = $this->Admin_model->getAllData($sql);

		if (!empty($seating_plans)) {
			$data['planId'] = $seating_plans[0]['id']; // ✅ Use index 0 since it's an array of rows
		} else {
			echo "No seating plans found!";
			return;
		}

		$sql = "SELECT seat_id FROM `saved_seats` WHERE aud_id = " . intval($data['planId']); // Prevent SQL Injection
		$bookedSeatsData = $this->Admin_model->getAllData($sql);

		// Convert database result into an array of seat IDs
		$bookedSeats = [];
		if (!empty($bookedSeatsData)) {
			foreach ($bookedSeatsData as $seat) {
				$bookedSeats[] = $seat['seat_id']; // ✅ Add each seat_id to the bookedSeats array
			}
		}

		// Pass seat data to JavaScript
		$data['bookedSeats'] = json_encode($bookedSeats);

		// Process seating data
		$seatData = [];
		$rowCounter = 0;

		foreach ($seating_plans as $plan) {
			$rowValues = explode('-', $plan['row_value']);
			$seatCapacities = json_decode(str_replace("'", '"', $plan['seat_capacity']), true);

			if (!is_array($seatCapacities) || empty($seatCapacities)) {
				continue; // Skip invalid data
			}

			foreach ($seatCapacities as $seatsInRow) {
				$rowLetter = chr(65 + $rowCounter); // Convert 0 -> A, 1 -> B, etc.
				$rowSeats = [];

				for ($j = 1; $j <= $seatsInRow; $j++) {
					$rowSeats[] = $rowLetter . $j; // Create seat names like A1, A2...
				}

				$seatData[$rowLetter] = $rowSeats; // Store row-wise seat mapping
				$rowCounter++;
			}
		}

		// Pass seat data to JavaScript
		$data['seatData'] = json_encode($seatData);
		$data['bookedSeats'] = json_encode($bookedSeats);

		$data['BookedSeat'] = count(json_decode($data['bookedSeats'], true));

		$seatArray = json_decode($data['seatData'], true);
		$data['totalSeats'] = array_sum(array_map('count', $seatArray));

		$data['content'] = $this->load->view('frontend/SeatBooking/seat-booking', $data, true);
		$this->load->view('frontend/common/page-builder', $data);
	}


	public function saveSeat() {
		$user_id = $_SESSION['UID'];
		$seatNumber = $_REQUEST['selectedSeatNumber'] ?? null;
		$planId = $_REQUEST['planId'] ?? null;

		// Check if seat number and planId are received
		if (!$seatNumber || !$planId) {
			echo json_encode(["success" => false, "message" => "Invalid request parameters!"]);
			return;
		}

		// Load database
		$this->load->database();

		// Check if the student already has a booked seat in the same auditorium
		$sql = "SELECT * FROM `saved_seats` WHERE is_active = 1 AND aud_id = ? AND stu_id = ?";
		$DuplicateCheck = $this->db->query($sql, [$planId, $user_id])->row_array();

		if (!empty($DuplicateCheck)) {
			echo json_encode(["success" => false, "message" => "You have already booked a seat in this auditorium!"]);
			return;
		}

		// Prepare data for insertion
		$data = [
			'seat_id' => $seatNumber,
			'stu_id' => $user_id,
			'aud_id' => $planId,
			'booking_date' => date('Y-m-d H:i:s'),
			'is_active' => 1, // Fixed typo from 'is_ative' to 'is_active'
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];

		// Insert into database
		$insert = $this->db->insert('saved_seats', $data);

		if ($insert) {
			echo json_encode(["success" => true, "message" => "Seat $seatNumber booked successfully!"]);
		} else {
			echo json_encode(["success" => false, "message" => "Database insert failed."]);
		}
	}








}
