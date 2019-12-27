<?php
	include_once("config/dbconfig.php");
	include_once("classes/adminCrud.php");
	//session_start();
								


	 class employeeCrudClass extends adminCrudClass
	{
		public $employee_id;

		
		 public function __construct()
		{
			parent::__construct();
		}

		
		//---------------------------------Create Employee ----------------------------------/

		public function createEmployee($id){

				$this->job_id = $id;
				$qry = "SELECT employee_id,job_id
						INTO applied_jobs
						FROM employee_records 
						JOIN job_records
						ON employee_records.id = job_records.id";

				$dbCon = mysqli_query($this->connectionString, $this->insertQry);

				if(mysqli_affected_rows($this->connectionString)>0){

					echo "Account created successfully. Kindly login with your user name and password ";
					header("refresh:20; url = index.php");
				}
		}
		

		//------------Employee Login---------------/

		public function employeelogin($rawData){
			
			$this->userName = (isset($rawData['username']) && $rawData['username'] != "") ? mysqli_real_escape_string($this->connectionString,$rawData['username']) : "";

			$this->pass 	= (isset($rawData['password']) && $rawData['password'] != "") ? mysqli_real_escape_string($this->connectionString,$rawData['password']) : "";

			$this->passHash = md5($this->pass);
			$qry 	= "SELECT * FROM employee_records WHERE username = '$this->userName' && 
			password='$this->passHash' ";
			//$qry2	= "SELECT password FROM admin_records WHERE password = $this->pass;";
			//echo "$qry";die;
				$this->dbCon = mysqli_query($this->connectionString, $qry);
				if(mysqli_affected_rows($this->connectionString) > 0){
				//echo "$qry";die;

					$rec = mysqli_fetch_assoc($this->dbCon);
				
					//print_r($rec);die;
					//echo "$this->userName == {$rec['username']} === $this->passHash =={$rec['password']}";die;
					if(($this->userName == $rec['username']) && ($this->passHash == $rec['password'])){

						$_SESSION['userName'] 	= $rec['username'];
						$_SESSION['id'] 		= $rec['id'];
						$_SESSION['userType'] 	= $rec['userType'];
						$_SESSION['firstname']	= $rec['firstname'];
						$_SESSION['status']		= $rec['status'];
						//print_r($_SESSION['userType']);die;
					//echo "Login successful";die;
					header("refresh:0; url= employee_dashboard.php");
					}
				}

				else{

					echo "Incorect username or password";

				}

			}

	//------------Retrieve Employee Info---------------/

		public function viewEmployee($id = ""){

			$this->id = $id;
			
			if($this->id != ""){
				
				$qry = "SELECT * FROM admin_records WHERE 1 = 1 AND id = '$this->id'";

			}
			else{

				$qry = "SELECT * FROM admin_records WHERE 1 = 1";
			
			}


			$this->dbCon = mysqli_query($this->connectionString, $qry);
			
			    if(mysqli_affected_rows($this->connectionString) > 0){

			    while($row = mysqli_fetch_assoc($this->dbCon)){

			    		$rows[] = $row;

			    }

			   // print_r($rows); die;
			    return $rows;

			}    
			   

		}
		
		

		// 

		//------------update Employee---------------/

		function updateEmployee($post,$id){
			
			$this->id = $id;
			if(($this->id != "") && ($this->validateAccUpdate($post))){

				$this->updateQry = "UPDATE  admin_records
									SET 	firstname = '$this->firstName',
											surname   = '$this->surName',
											logo      = '$this->fileName'
									WHERE id = '$this->id'
									";
			
			    $this->dbCon = mysqli_query($this->connectionString, $this->updateQry);

			    if(mysqli_affected_rows($this->connectionString) > 0){
			    	$this->uploaded = 	move_uploaded_file($this->fileTmpName   , $this->uploadPath);
			    	echo "Upload 1 = {$this->uploaded}<br>";die();
			    	if ($this->uploaded) {
			    		echo "Upload 2 = {$this->uploaded}";
                        echo "The file " . basename($this->fileName) . " has been uploaded and saved to DB";die();
                        header("refresh:5; url=admin.php");

                    } 
                    else {
                        echo "An error occurred somewhere. Try again or contact the admin";
                    }
			    	 

			    }
			    else{

			    	echo "record not updated";
			    	header("Location: admin.php");
			    }
			}	
		}

		//------------Delete Employee---------------/

		function deleteEmployee(){
			
		}

		//==========Apply for Job function========/
		
		public function appliedJobs($jobId = "", $empId ="", $user =""){

			$this->id = $jobId;
			$this->employee_id = $empId;
			$this->userName = $user;
			//echo $this->employee_id; die;
			//Retrieve data to check if already applied

			
			if($this->id != "" && $this->employee_id){
				$qryRead = "SELECT * FROM applied_jobs WHERE employee_id = $this->employee_id && job_id = $this->id";
				//echo $qryRead; die;
				$this->dbCon = mysqli_query($this->connectionString, $qryRead);
				
				    if(mysqli_affected_rows($this->connectionString) > 0){

				       	$rec = mysqli_fetch_assoc($this->dbCon);
				
						//print_r($rec);die;
						//echo "$this->userName == {$rec['username']} === $this->passHash =={$rec['password']}";die;
						if(($this->employee_id == $rec['employee_id']) && ($this->id == $rec['job_id'])){

					   	echo "Whooops!You have already applied for this job. Choose another job to apply";
					    		header("refresh:5; url=applied_job.php");

						}
					}

					else if($this->id != "" && $this->employee_id !=""){
						
						$qryInsert = "INSERT INTO applied_jobs(employee_id, username, job_id) 
									  VALUES('$this->employee_id', $this->userName, '$this->id')";
					
								//echo"kjdjdkdk";die;


						$this->dbCon = mysqli_query($this->connectionString, $qryInsert);
						
						    if(mysqli_affected_rows($this->connectionString) > 0){

						    	echo "You have successfully applied for the job with Id: $this->id. You'll be contacted as soon as possible";
						    		header("refresh:5; url=index.php");

							}else{

							echo "Whooops! Job apllication failed";
							header("refresh:5; url=index.php");
						}
					}
				
			}
		}

		//==========Bookmark for Job function========/
		
		public function bookmarkJobs($jobId = "", $empId =""){

			$this->id = $jobId;
			$this->employee_id = $empId;
			$this->userName = $user;
			//echo $this->employee_id; die;
			//Retrieve data to check if already applied

			
			if($this->id != "" && $this->employee_id){
				$qryRead = "SELECT * FROM bookmark_jobs WHERE employee_id = $this->employee_id && job_id = $this->id";
				//echo $qryRead; die;
				$this->dbCon = mysqli_query($this->connectionString, $qryRead);
				
				    if(mysqli_affected_rows($this->connectionString) > 0){

				    	$rec = mysqli_fetch_assoc($this->dbCon);
					
						//print_r($rec);die;
						//echo "$this->userName == {$rec['username']} === $this->passHash =={$rec['password']}";die;
						if(($this->employee_id == $rec['employee_id']) && ($this->id == $rec['job_id'])){

					   	echo "Whooops! You have already bookmarked for this job. Check your bookmark list";
					    		header("refresh:5; url=bookmarked_job.php");

						}
					}
					else if($this->id != "" && $this->employee_id !=""){
						
						$qryInsert = "INSERT INTO bookmark_jobs(employee_id, username, job_id) 
									  VALUES('$this->employee_id', $this->userName, '$this->id')";
					
								//echo"kjdjdkdk";die;


						$this->dbCon = mysqli_query($this->connectionString, $qryInsert);
						
						    if(mysqli_affected_rows($this->connectionString) > 0){

						    	echo "You have successfully applied for the job with Id: $this->id. You'll be contacted as soon as possible";
						    		header("refresh:5; url=index.php");

							}else{

							echo "Whooops! Job apllication failed";
							header("refresh:5; url=index.php");
						}
					}
				
			}
		}

		

			//------------Employee Approval---------------/

			// public function approveAdmin($id = ""){

			// 		$this->id = $id;
					
			// 		if($this->id != ""){
						
			// 			$qry = "UPDATE  admin_records SET status = 'approved' WHERE 1 = 1 AND id = '$this->id'";
			// 		//echo $qry; die;
			// 			$this->dbCon = mysqli_query($this->connectionString, $qry);
					
			// 		    if(mysqli_affected_rows($this->connectionString) > 0){

			// 		    	header("Location:view_admin.php");
			// 		    }    

			// 		    else{

			// 		    	header("Location:view_admin.php");

			// 		    }

			// 		}
			// 	}
		
		//***************************** Employee Count  Methods*************************/

		public function countAppliedJobs($empId){

			$this->employee_id = $empId;

			$qry = "SELECT * FROM applied_jobs WHERE employee_id = $this->employee_id";
			
			$this->dbCon  = mysqli_query($this->connectionString, $qry);
			
			    $rowcount = (mysqli_num_rows($this->dbCon));
			   
			    return $rowcount;
		}

		public function countBookmarkedJobs($empId){

			$this->employee_id = $empId;

			$qry = "SELECT * FROM bookmark_jobs WHERE employee_id = $this->employee_id";
			// echo $qry; die;
			$this->dbCon  = mysqli_query($this->connectionString, $qry);
			
			    $rowcount = (mysqli_num_rows($this->dbCon));
			   
			  // echo $rowcount;die;
			    return $rowcount;


		}

		public function countAllJobs(){

			$qry = "SELECT * FROM job_records WHERE 1 = 1 ";
			
			$this->dbCon  = mysqli_query($this->connectionString, $qry);
			
			    $rowcount = mysqli_num_rows($this->dbCon);
			   
			    return $rowcount;
		}

//***************************** Applied & Bookmarked Jobs For Specific User Methods************************/

		public function readAppliedJobs($empId,$username){

			$this->employee_id 	= $empId;
			$this->userName 	= $username;


			$qry = "SELECT * FROM applied_jobs WHERE employee_id = $this->employee_id && username = '$this->userName' ";
			//echo $qry;die;
			$this->dbCon  = mysqli_query($this->connectionString, $qry);
			
			    if(mysqli_affected_rows($this->connectionString) > 0){

			    	while($row = mysqli_fetch_assoc($this->dbCon)){

			    		$rows[] = $row;


			    	}
			    	//print_r($rows);die;
			    	return $rows;
				}
		}

		//=====Bookmarked=====/
		public function readBookmarkedJobs($empId,$username){

			$this->employee_id 	= $empId;
			$this->userName 	= $username;


			$qry = "SELECT * FROM bookmark_jobs WHERE employee_id = $this->employee_id && username = '$this->userName' ";
			//echo $qry;die;
			$this->dbCon  = mysqli_query($this->connectionString, $qry);
			
			    if(mysqli_affected_rows($this->connectionString) > 0){

			    	while($row = mysqli_fetch_assoc($this->dbCon)){

			    		$rows[] = $row;


			    	}
			    	//print_r($rows);die;
			    	return $rows;
				}
		}		


		function validate($rawData){

		
			$this->compName = (isset($rawData['companyName']) 	&& $rawData['companyName']	 != "") ? $this->checkInput($rawData['companyName']) : "";

			//$this->userName = (isset($rawData['username']) 		&& $rawData['username']		 != "") ? $rawData['username'] : "";

			$this->email 	= (isset($rawData['email']) 		&& $rawData['email'] 		 != "") ? $this->checkInput($rawData['email']) : "";


			$this->phone 	= (isset($rawData['phone']) 		&& $rawData['phone'] 		 != "") ? $this->checkInput($rawData['phone']) : "";

			$this->addr 	= (isset($rawData['address'])		&& $rawData['address'] 	 	 != "") ? $this->checkInput($rawData['address']) : "";
	
		

			//Create User Account validations 

			$this->saveFlag = true;
			$this->error 	= "Correct the following errors <br>";

			if ($this->compName == ""){
			    $this->error.= "Your Company name can't be empty<br>";
			    $this->saveFlag = false;
			}


			if ($this->addr == ""){
		    	$this->error.= "address can't be empty<br>";
		    	$this->saveFlag = false;
		    }

			if($this->phone == ""){
			    $this->error .= "Phone number cannot be empty <br>";
			    $this->saveFlag = false;
			 }
			   
			  //echo "phone xter length = ".strlen($phone);die("wait...");
			   if(strlen($this->phone) < 13){
			    $this->error .= "Invalid Phone number <br>";
			    $this->saveFlag = false;
			 }
		   if(!filter_var( $this->email ,FILTER_VALIDATE_EMAIL)){
			    $this->error .= "Invalid Email<br>";
			    $this->saveFlag = false;
		    } 

			
		    // PostJob Validation----End

		   if($this->saveFlag == false) {

		   		echo $this->error;
		    	return false;	
		    }
		 
		    else{
		    	return true;
		    }
		}

		// Employee Account Validations
		function validateEmployee($rawData){

			
				$this->firstName = (isset($rawData['firstname']) 	&& $rawData['firstname']	 != "") ? $this->checkInput($rawData['firstname']) : "";

				$this->surName = (isset($rawData['surname']) 		&& $rawData['surname']		 != "") ? $this->checkInput($rawData['surname']) : "";

				$this->userName = (isset($rawData['username']) 		&& $rawData['username']		 != "") ? $this->checkInput($rawData['username']) : "";

				$this->email 	= (isset($rawData['email']) 		&& $rawData['email'] 		 != "") ? $this->checkInput($rawData['email']) : "";


				$this->phone 	= (isset($rawData['phone']) 		&& $rawData['phone'] 		 != "") ? $this->checkInput($rawData['phone']) : "";

				$this->pass 	= (isset($rawData['password']) 		&& $rawData['password'] 		 != "") ? $this->checkInput($rawData['password']) : "";

				$this->cPass 	= (isset($rawData['cpassword']) 		&& $rawData['cpassword'] 		 != "") ? $this->checkInput($rawData['cpassword']) : "";

				$this->addr 	= (isset($rawData['address'])		&& $rawData['address'] 	 	 != "") ? $this->checkInput($rawData['address']) : "";
		
		
				//Create User Account validations 

				$this->saveFlag = true;
				$this->error 	= "Correct the following errors <br>";

				if ($this->firstName == ""){
				    $this->error.= "Your firstname name can't be empty<br>";
				    $this->saveFlag = false;
				}

				if ($this->surName == ""){
				    $this->error.= "Your surName name can't be empty<br>";
				    $this->saveFlag = false;
				}

				if ($this->userName == ""){
				    $this->error.= "Your username name can't be empty<br>";
				    $this->saveFlag = false;
				}

				if ($this->addr == ""){
			    	$this->error.= "address can't be empty<br>";
			    	$this->saveFlag = false;
			    }

				if($this->phone == ""){
				    $this->error .= "Phone number cannot be empty <br>";
				    $this->saveFlag = false;
				 }
				   
				  //echo "phone xter length = ".strlen($phone);die("wait...");
				   if(strlen($this->phone) < 13){
				    $this->error .= "Invalid Phone number <br>";
				    $this->saveFlag = false;
				 }
			   if(!filter_var( $this->email ,FILTER_VALIDATE_EMAIL)){
				    $this->error .= "Invalid Email<br>";
				    $this->saveFlag = false;
			    } 

				if($this->pass == ""){
				    $this->error .= "Password cannot be empty <br>";
				    $this->saveFlag = false;
				 }

				 if(strlen($this->phone) < 5 ){
				    $this->error .= "Password too weak  <br>";
				    $this->saveFlag = false;
				 }

				 if($this->cPass != $this->pass){
				    $this->error .= "Password does not match <br>";
				    $this->saveFlag = false;
				 }
			    // PostJob Validation----End

			   if($this->saveFlag == false) {

			   		echo $this->error;
			    	return false;	
			    }
			 
			    else{
			    	return true;
			    }
		}
			
		function validatePost($rawData){

				//Post Job Form Input assigned to variable

				$this->jobTitle 	= (isset($rawData['job_title'])			&& $rawData['job_title']	 		 != "") ? $this->checkInput($rawData['job_title'])	    : "";

				$this->jobLocation 	= (isset($rawData['job_location'])		&& $rawData['job_location'] 	 	 != "") ? $this->checkInput($rawData['job_location'])   : "";

				$this->jobCategory 	= (isset($rawData['job_category'])		&& $rawData['job_category'] 	 	 != "") ? $this->checkInput($rawData['job_category'])   : "";

				$this->jobType 		= (isset($rawData['job_type'])			&& $rawData['job_type'] 	 		 != "") ? $this->checkInput($rawData['job_type'])  		: "";

				$this->textArea 	= (isset($rawData['textarea'])			&& $rawData['textarea'] 	 		 != "") ? $this->checkInput($rawData['textarea']) 		: "";

				$this->emailURL 	= (isset($rawData['emailURL'])			&& $rawData['emailURL'] 	 		 != "") ? $this->checkInput($rawData['emailURL']) 		: "";

				$this->day 			= (isset($rawData['day']) 				&& 	$rawData['day']					!= "")	?	$this->checkInput($rawData['day'])			:	"";	

	    		$this->month 		= (isset($rawData['month']) 			&& 	$rawData['month']				!= "")	?	$this->checkInput($rawData['month'])		:	"";

	    		$this->year 		= (isset($rawData['year']) 				&& 	$rawData['year']				!= "")	?	$this->checkInput($rawData['year'])			:	"";



				   //postJob validations -----Begins
			  	$this->postFlag = true;
				$this->error2 	= "Correct the following errors <br>";

				if ($this->jobTitle == ""){
				    $this->error2.= "Your Job Title name can't be empty<br>";
				    $this->postFlag = false;
				}


				if ($this->jobLocation == ""){
			    	$this->error2.= "Job Location can't be empty<br>";
			    	$this->postFlag = false;
			    }

				if($this->jobCategory == ""){
				    $this->error2 .= "Job Category  cannot be empty <br>";
				    $this->postFlag = false;
				 }

				 if($this->jobType == ""){
				    $this->error2 .= "Job Type  cannot be empty <br>";
				    $this->postFlag = false;
				 }

				  if($this->emailURL == ""){
				    $this->error2 .= "Email/URL  cannot be empty <br>";
				    $this->postFlag = false;
				 }
				   
				  //echo "phone xter length = ".strlen($phone);die("wait...");
				 //   if(strlen($this->phone) < 13){
				 //    $this->error2 .= "Invalid Phone number <br>";
				 //    $this->postFlag = false;
				 // }
				   if(!filter_var( $this->emailURL ,FILTER_VALIDATE_EMAIL) /*|| !filter_var($this->emailURL,FILTER_VALIDATE_URL)*/){
					    $this->error2 .= "Invalid Email or Url<br>";
					    $this->postFlag = false;
				    } 
				   // echo "$this->emailURL";die;
				    // if($this->day == "" || $this->year == "" || $this->month == ""){

					   //  $this->error2 .= "Please enter correct Birthday<br>";
					   //  $this->postFlag = false;
					   // }

					$this->date = $this->year."-".$this->month."-".$this->day;

						if ($this->date <= date("y-m-d")){
						 $this->error2 .= "Deadline must be future date<br>";
					     $this->postFlag = false;
					}   
					

				if($this->postFlag == false){

			    	echo $this->error2;
			    	return false;
			    }

			    else{
			    	return true;
			    }

		}
		
		// Picture Upload Function-----------/

		function validateAccUpdate($rawData){

		
			$this->firstName = (isset($rawData['firstname']) 		&& $rawData['firstname']		 != "") ? $this->checkInput($rawData['firstname']) : "";

			$this->surName = (isset($rawData['surname']) 			&& $rawData['surname']			 != "") ? $this->checkInput($rawData['surname']) : "";

			//$this->fileupload = (isset($rawData['company_logo']) 		&& $rawData['company_logo']		 != "") ? $this->checkInput($rawData['company_logo']) : "";



			$this->saveFlag = true;
			$this->error 	= "Correct the following errors <br>";

			if ($this->firstName == ""){
			    $this->error.= "Your  firstname can't be empty<br>";
			    $this->saveFlag = false;
			}


			if ($this->surName == ""){
		    	$this->error.= "Your  surname can't be empty<br>";
		    	$this->saveFlag = false;
		    }

		   if(isset($rawData['fileupload']) && !empty($rawData['fileupload'])){
		   
		    $this->currentDir = getcwd();
		    $this->uploadDirectory = "/images/";
		   
		    $this->errors = array();
		   
		    $this->fileExtensions = ['jpeg','jpg','png','gif']; 
		    $this->fileName      = $rawData['fileupload']['name'];
		    $this->fileSize      = $rawData['fileupload']['size'];
		    $this->fileTmpName   = $rawData['fileupload']['tmp_name'];
		    $this->fileType      = $rawData['fileupload']['type'];
		    $this->fileName_arr  =  array();
		    $this->fileName_arr  = explode('.',$this->fileName);
		    //move_uploaded_file($this->fileName   , $this->uploadDirectory)
		    $this->fileExtension = strtolower(end($this->fileName_arr));
		    $this->uploadPath = $this->currentDir . $this->uploadDirectory . basename($this->fileName); 

		    

		        if (! in_array($this->fileExtension,$this->fileExtensions)) {
		              //echo "somethng is wrong 2 ";
		            $this->error.= "This file extension is not allowed. Please upload a JPEG or PNG file";
		        	$this->saveFlag == false;
		        }

		        if ($this->fileSize > 2000000) {
		              //echo "somethng is wrong 3 ";
		            $this->error.= "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
		        	$this->saveFlag == false;
		        }

		       
		      }


			if($this->saveFlag == false){
	    
			    echo $this->error;   
			    return false;

			}else{

				return true;
			}

			}

			 function checkInput($rawData){

				$this->value = trim($rawData);
				$this->value = stripslashes($this->value);
				$this->value = htmlspecialchars($this->value);
				return $this->value;

			}
			
		}
	


?>