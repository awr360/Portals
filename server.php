<?php

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
	define("API_URL", "https://awrchatbot.org/php/CPEBotAPI.php");
	//define("API_URL", "https://awrinfo.org/php/CPEBotAPI.php");
    define("API_TOKEN", "BTK#6ghUxPmHTMwjp3C?4=tHQjDzJ");
		// initializing variables
		$username = "";
		$email    = "";
		$errors = array(); 
		
					// LOGIN USER
					if (isset($_POST['login_user'])) { 
					 $username =  $_POST['username'];
					 $password =  $_POST['password'];
					if (empty($username)) 
					{ 
						array_push($errors, "Username is required");
					}
					if (empty($password)) 
					{
						array_push($errors, "Password is required");
					}
					if (count($errors) == 0) 
					{  	
						$data = array(
							'token'=>API_TOKEN,
							'cmd'=>'checkEvangelistPassword',
							'username'=>$username,
							'password'=>$password
						 );

						$data = json_encode($data);
						$options = stream_context_create(['http' => [
							 'method'  => 'POST',
							 'header'  => 'Content-type: application/json',
							 'content' => $data]]);

						$response = file_get_contents(API_URL,false,$options);
						$responseArr = json_decode($response, true);

						$results = $responseArr['ResponseData'];						
						$Resultx = $results[0]['result'];
						
						
					if ($Resultx == 'verified') 
					{
						$_SESSION['username'] = $username;											
						$TeacherID = $results[0]['teacherId'];
						$_SESSION['teacherId'] = $TeacherID;	
						///////////////////////
						$dataa = array(
							'token'=>API_TOKEN,
							'cmd'=>'getEvangelist',
							'teacherid'=>$TeacherID							
						 );

						$dataa = json_encode($dataa);
						$optionsa = stream_context_create(['http' => [
							 'method'  => 'POST',
							 'header'  => 'Content-type: application/json',
							 'content' => $dataa]]);

						$responsea = file_get_contents(API_URL,false,$optionsa);
						$responseArra = json_decode($responsea, true);	
						$resultsdetails = $responseArra['ResponseData'];  
						//$_SESSION['DE_chatid'] = json_encode($resultsdetails);
						$_SESSION['DE_chatid'] = $resultsdetails[0]["chatid"];	
						$_SESSION['DE_phone'] = $resultsdetails[0]["phone"];							
						$_SESSION['DE_id'] = $resultsdetails[0]["id"];							
						$_SESSION['DE_capacity'] = $resultsdetails[0]["capacity"];							
						$_SESSION['DE_numstudents'] = $resultsdetails[0]["numstudents"];							
						$_SESSION['DE_countrycode'] = $resultsdetails[0]["countrycode"];
						$_SESSION['DE_email'] = $resultsdetails[0]["email"];						
						$_SESSION['DE_lastreport'] = $resultsdetails[0]["lastreport"];
						
						///////////////////////

						
						header('location: index.php');
					}
					else 
					{
						array_push($errors, "Wrong username/password combination");						
					}
					  }
					}		
	
	
		// Get All Students
		if(!isset($_SESSION['allStudents']) && isset($_SESSION['username']))
		{		
			 $datareferences  = array(
			'token'=>API_TOKEN,
			'cmd'=>'getStudents',
			'teacherid'=>$_SESSION['teacherId']
		 );	

		$datareferences  = json_encode($datareferences );		
		$optionsreferences  = stream_context_create(['http' => [
			 'method'  => 'POST',		
			 'header'  => 'Content-type: application/json',
			 'content' => $datareferences ]]);

			

		$responseferences = file_get_contents(API_URL,false,$optionsreferences );		
		$responseArrferences = json_decode($responseferences, true);
					$ferences = $responseArrferences['ResponseData'];
					
					//$_SESSION['test'] = json_encode($ferences);
					
					$data = $ferences;
					$AllStudentsCount = 0;
					$SubStudentsCount = 0;
					$UnSubStudentsCount = 0;
					
					
					//build student profiles					
					$array_profiles = $ferences;					
					for($i = 0; $i < sizeof($array_profiles); $i++)
					{
						if(isset($array_profiles[$i]["firstname"]))
						{	
						 unset($array_profiles[$i]);
						}
						else
						{							//series						
							if($array_profiles[$i]["series"] == 'ROH')
							{
								$array_profiles[$i]["series"] = 'Revelation Of Hope';
							}
							else if($array_profiles[$i]["series"] == 'rh')
							{
								$array_profiles[$i]["series"] = 'Revelation Of Hope';
							}
							else 
							{
								$array_profiles[$i]["series"] = 'Other';
							}		
											
							//study						
							if($array_profiles[$i]["language"] == 'en')
							{							
								
								switch ($array_profiles[$i]["seriesindex"]) {
								case 0:
									$array_profiles[$i]["seriesindex"] = '00 Seven Reasons for Studying Revelation';
									$array_profiles[$i]["status"] = 'Reasons to study prophecy';
									break;
								case 1:
									$array_profiles[$i]["seriesindex"] = '01 Intelligent Design';
									$array_profiles[$i]["status"] = 'Evolution vs Creation';
									break;
								case 2:
									$array_profiles[$i]["seriesindex"] = '02 Revelations Biggest Surprise';
									$array_profiles[$i]["status"] = 'Daniel 2';
									break;
								case 3:
									$array_profiles[$i]["seriesindex"] = '03 Revelations Greatest End Time Signs';
									$array_profiles[$i]["status"] = 'Signs of the times';
									break;
								case 4:
									$array_profiles[$i]["seriesindex"] = '04 Revelations Star Wars';
									$array_profiles[$i]["status"] = 'The great controversy';
									break;
								case 5:
									$array_profiles[$i]["seriesindex"] = '05 Revelation Peacemaker';
									$array_profiles[$i]["status"] = 'Plan of redemption';
									break;
								case 6:
									$array_profiles[$i]["seriesindex"] = '06 Revelations Source of Spiritual Power';
									$array_profiles[$i]["status"] = 'Faith in Jesus';
									break;
								case 7:
									$array_profiles[$i]["seriesindex"] = '07 Revelations Final Events';
									$array_profiles[$i]["status"] = 'Events just before Jesus returns';
									break;
								case 8:
									$array_profiles[$i]["seriesindex"] = '08 Revelations Most Amazing Prophecy';
									$array_profiles[$i]["status"] = '3 Angels message';
									break;
								case 9:
									$array_profiles[$i]["seriesindex"] = '09 Revelations Final Judgment';
									$array_profiles[$i]["status"] = '2300 Day prophecy';
									break;							
								case 10:
									$array_profiles[$i]["seriesindex"] = '10 Revelations Answers for Societys Crumbling Values';
									$array_profiles[$i]["status"] = 'Fruits of the spirit';
									break;
								case 11:
									$array_profiles[$i]["seriesindex"] = '11 Revelations Eternal Signs in Earths Last Conflict';
									$array_profiles[$i]["status"] = 'Sabbath';
									break;
								case 12:
									$array_profiles[$i]["seriesindex"] = '12 Revelation Reveals Historys Biggest Hoax';
									$array_profiles[$i]["status"] = 'Sunday';
									break;
								case 13:
									$array_profiles[$i]["seriesindex"] = '13 Revelation Unmasks Cult Deceptions';
									$array_profiles[$i]["status"] = 'What is a cult';
									break;
								case 14:
									$array_profiles[$i]["seriesindex"] = '14 Revelations Battle of Armageddon';
									$array_profiles[$i]["status"] = 'Final battle on earth';
									break;
								case 15:
									$array_profiles[$i]["seriesindex"] = '15 Revelation Reveals Deadly Delusions';
									$array_profiles[$i]["status"] = 'What heppens when you die';
									break;
								case 16:
									$array_profiles[$i]["seriesindex"] = '16 Revelations 1000 Years of Peace';
									$array_profiles[$i]["status"] = '1000 Years in Revelation';
									break;
								case 17:
									$array_profiles[$i]["seriesindex"] = '17 Revelations Lake of Fire';
									$array_profiles[$i]["status"] = 'Truth about hell';
									break;
								case 18:
									$array_profiles[$i]["seriesindex"] = '18 Revelations New Life for a New Millennium';
									$array_profiles[$i]["status"] = 'Baptism';
									break;
								case 19:
									$array_profiles[$i]["seriesindex"] = '19 Revelation Reveals Life at its Best';
									$array_profiles[$i]["status"] = 'Health';
									break;
								case 20:
									$array_profiles[$i]["seriesindex"] = '20 Why so Many Different Denominations';
									$array_profiles[$i]["status"] = 'One church';
									break;
								case 21:
									$array_profiles[$i]["seriesindex"] = '21 Revelations Last Appeal';
									$array_profiles[$i]["status"] = 'Follow Jesus';
									break;
								case 22:
									$array_profiles[$i]["seriesindex"] = '22 Revelations Movement of Destiny';
									$array_profiles[$i]["status"] = 'SDA Church';
									break;
								case 23:
									$array_profiles[$i]["seriesindex"] = '23 Revelations Mark of the Beast Exposed';
									$array_profiles[$i]["status"] = 'Mark of the beast';
									break;
								case 24:
									$array_profiles[$i]["seriesindex"] = '24 Revelation Reveals the USA in Prophecy';
									$array_profiles[$i]["status"] = 'USA';
									break;
								case 25:
									$array_profiles[$i]["seriesindex"] = '25 Revelations Prophetic Movement at the End of Time';
									$array_profiles[$i]["status"] = 'EG White';
									break;
								case 26:
									$array_profiles[$i]["seriesindex"] = '26 Revelations World of Tomorrow';
									$array_profiles[$i]["status"] = 'Heaven';
									break;
								case 27:
									$array_profiles[$i]["seriesindex"] = '27 Revelations Startling Predictions for the 21st Century';
									$array_profiles[$i]["status"] = 'Prophecy';
									break;
								case 28:
									$array_profiles[$i]["seriesindex"] = '28 Who Are the Seventh Day Adventists';
									$array_profiles[$i]["status"] = 'About our church';
									break;}
									
							}
							else if($array_profiles[$i]["language"] == 'af')
							{
								switch ($array_profiles[$i]["seriesindex"]) 
								{
								case 1:
									$array_profiles[$i]["seriesindex"] = '01 Openbaring se Grootste Verrassing';
									$array_profiles[$i]["status"] = '';
									break;
								case 2:
									$array_profiles[$i]["seriesindex"] = '02 Openbaring se Grootste Eindtyd Gebeure';
									$array_profiles[$i]["status"] = '';
									break;
								case 3:
									$array_profiles[$i]["seriesindex"] = '03 Openbaring se Stryd Tussen Goed en Kwaad';
									$array_profiles[$i]["status"] = '';
									break;
								case 4:
									$array_profiles[$i]["seriesindex"] = '04 Openbaring se Grootste Vredemaker';
									$array_profiles[$i]["status"] = '';
									break;
								case 5:
									$array_profiles[$i]["seriesindex"] = '05 Openbaring se Finale Gebeure';
									$array_profiles[$i]["status"] = '';
									break;
								case 6:
									$array_profiles[$i]["seriesindex"] = '06 Openbaring se Verstommendste Profesie';
									$array_profiles[$i]["status"] = '';
									break;
								case 7:
									$array_profiles[$i]["seriesindex"] = '07 Openbaring se Antwoord op Morele Verval';
									$array_profiles[$i]["status"] = '';
									break;
								case 8:
									$array_profiles[$i]["seriesindex"] = '08 Openbaring se Ewige Teken';
									$array_profiles[$i]["status"] = '';
									break;
								case 9:
									$array_profiles[$i]["seriesindex"] = '09 Openbaring se Lewe Op Sy Beste';
									$array_profiles[$i]["status"] = '';
									break;
								case 10:
									$array_profiles[$i]["seriesindex"] = '10 Openbaring Onthul Dodelike Dwalinge';
									$array_profiles[$i]["status"] = '';
									break;							
								case 11:
									$array_profiles[$i]["seriesindex"] = '11 Openbaring se 1000 Jaar van Vrede';
									$array_profiles[$i]["status"] = '';
									break;
								case 12:
									$array_profiles[$i]["seriesindex"] = '12 Openbaring Onthul Nuwe Lewe In Nuwe Millennium';
									$array_profiles[$i]["status"] = '';
									break;
								case 13:
									$array_profiles[$i]["seriesindex"] = '13 Openbaring Onthul die Laaste Oproep';
									$array_profiles[$i]["status"] = '';
									break;
								case 14:
									$array_profiles[$i]["seriesindex"] = '14 Openbaring Onthul die Eindtyd se Finale Beweging';
									$array_profiles[$i]["status"] = '';
									break;
								case 15:
									$array_profiles[$i]["seriesindex"] = '15 Openbaring Onthul Hoekom Daar So Baie Kerke Is';
									$array_profiles[$i]["status"] = '';
									break;
								case 16:
									$array_profiles[$i]["seriesindex"] = '16 Openbaring Onthul die Sewe Laaste Plae';
									$array_profiles[$i]["status"] = '';
									break;
								case 17:
									$array_profiles[$i]["seriesindex"] = '17 Openbaring se Profetiese Beweging';
									$array_profiles[$i]["status"] = '';
									break;
								case 18:
									$array_profiles[$i]["seriesindex"] = '18 Openbaring se Wêreld van die Toekoms';
									$array_profiles[$i]["status"] = '';
									break;
							}
							}
							
						}
					}
					$_SESSION['student_profiles'] = $array_profiles;					
					
					
					//get rid of sets we do not use
					for($i = 0; $i < sizeof($data); $i++)
					{						
						if(isset($data[$i]["firstname"]))
						{	
						//Language						
							if($data[$i]["language"] == 'en')
							{
								$data[$i]["language"] = 'English';
							}
							else if($data[$i]["language"] == 'af')
							{
								$data[$i]["language"] = 'Afrikaans';
							}		
						//Series						
							if($data[$i]["series"] == 'rt')
							{
								$data[$i]["series"] = 'RT';
							}
							else if($data[$i]["series"] == 'rh')
							{
								$data[$i]["series"] = 'ROH';
							}						
						
							$AllStudentsCount += 1;	
							if($data[$i]["status"] == 'unsubscribed')
							{
								$UnSubStudentsCount += 1;
							}
							else
							{
								$SubStudentsCount += 1;
							}
						}
						else
						{
						 unset($data[$i]);
						}
					}					
					$_SESSION['allStudents'] = $data;
					$_SESSION['AllStudentsCount'] = $AllStudentsCount;
					$_SESSION['SubStudentsCount'] = $SubStudentsCount;
					$_SESSION['UnSubStudentsCount'] = $UnSubStudentsCount;
					if($AllStudentsCount > 0 && $SubStudentsCount > 0)
					{
						$_SESSION['SubStudentsPerc'] = round($SubStudentsCount/$AllStudentsCount*100);						
					}
					else
					{
						$_SESSION['SubStudentsPerc'] = 0;
					}
					if($AllStudentsCount > 0 && $UnSubStudentsCount > 0)
					{
						$_SESSION['UnSubStudentsPerc'] = round($UnSubStudentsCount/$AllStudentsCount*100);						
					}
					else
					{
						$_SESSION['UnSubStudentsPerc'] = 0;
					}	
					$_SESSION['Ratio'] = round($UnSubStudentsCount/$AllStudentsCount*100);
					
					
					//chart data
					$mylabel = array();					
					
					for($i = 0; $i < sizeof($data); $i++)
					{
						if(isset($data[$i]['firstcontact']))
						{
							$xx = new DateTime($data[$i]['firstcontact']);	
							$xx = $xx->format('Y m'); 						
							array_push($mylabel,$xx);							
						}
					}					
							
					sort($mylabel);						
					$array1 = array_count_values($mylabel);
					$mylabelF = array();
					$mydataF = array();
					 foreach($array1 as $key => $val) 
					 {							
							array_push($mylabelF,$key);
							array_push($mydataF,$val);							
					 }
					
					$_SESSION['chartlabel'] = implode(",",$mylabelF);  				
					$_SESSION['chartdata'] = implode(",",$mydataF); 
					
					
		}
		
		
		


?>