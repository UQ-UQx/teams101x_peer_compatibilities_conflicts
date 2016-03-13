<?php
	header('Content-Type: application/json');
	require_once('config.php');
	require_once('lib/lti.php');
	require_once('lib/grade.php');

	$lti = new Lti($config,true);
	
	$vars = array('user_id'=>$_POST['user_id'],'oauth_consumer_key'=>$_POST['lti_id'], 'lis_outcome_service_url'=>$_POST['lis_outcome_service_url'], 'lis_result_sourcedid'=>$_POST['lis_result_sourcedid']);
	$lti->setltivars($vars);

	$answer_key_string = '{

			"roles":{

				"Implementer":{
					"compatible":["Resource_Investigator", "Monitor", "Coordinator"],
					"conflict":["Implementer", "Plant"]
				},

				"Plant":{
					"compatible":["Coordinator", "TeamWorker", "Resource_Investigator"],
					"conflict":["Plant", "Implementer", "Monitor"]
				},

				"Coordinator":{
					"compatible":["Implementer", "TeamWorker"],
					"conflict":["none"]
				},

				"TeamWorker":{
					"compatible":["TeamWorker", "Implementer", "Plant"],
					"conflict":["Shaper"]
				},

				"Monitor":{
					"compatible":["Implementer", "Coordinator"],
					"conflict":["Completer", "Monitor"]
				},

				"Shaper":{
					"compatible":["Resource_Investigator"],
					"conflict":["none"]
				},

				"Resource_Investigator":{
					"compatible":["TeamWorker", "Implementer"],
					"conflict":["Completer"]
				},

				"Completer":{
					"compatible":["Implementer"],
					"conflict":["Monitor"]
				}
			}
	}';


	if(isset($_POST['data'])){
	$response_raw = $_POST['data'];


	$response = array();
	
		foreach ($response_raw as $key => $item) {
		  if(isset($response[$response_raw[$key]["name"]])){
		  	array_push($response[$response_raw[$key]["name"]], $response_raw[$key]["value"]);
		  }else{
		  	$response[$response_raw[$key]["name"]] = array($response_raw[$key]["value"]);
		  }
		}


		$answers_entered = array(

			"first" => array("pref" => $response["first_preference"][0], "com_con"=>array("com"=>$response["first_compatibility"], "con"=>$response["first_conflict"])),

			"second" => array("pref" => $response["second_preference"][0], "com_con"=>array("com"=>$response["second_compatibility"], "con"=>$response["second_conflict"]))
			);


		$answer_key = json_decode($answer_key_string,true);

		$status = array();

		$correct_count = 0;

		foreach ($answers_entered as $ind => $obj) {

			$pref = $obj["pref"];

			$input_comp = $obj["com_con"]["com"];
			$input_conf = $obj["com_con"]["con"];

			$ans_comp = $answer_key["roles"][$pref]["compatible"];
			$ans_conf = $answer_key["roles"][$pref]["conflict"];




			if($ind == "first"){

				$status["first_compatibility_status"] = false;
				$status["first_conflict_status"] = false;

				if(count($input_comp) > count($ans_comp)){
					if(count(array_intersect($input_comp, $ans_comp)) == count($input_comp)){
						$status["first_compatibility_status"] = true;
						$correct_count += 1;
					}
				}else{
					if(count(array_intersect($input_comp, $ans_comp)) == count($ans_comp)){
						$status["first_compatibility_status"] = true;
						$correct_count += 1;
					}
				}


				if(count($input_conf) > count($ans_conf)){
					if(count(array_intersect($input_conf, $ans_conf)) == count($input_conf)){
						$status["first_conflict_status"] = true;
						$correct_count += 1;
					}
				}else{
					if(count(array_intersect($input_conf, $ans_conf)) == count($ans_conf)){
						$status["first_conflict_status"] = true;
						$correct_count += 1;
					}
				}



			}

			if($ind == "second"){




				$status["second_compatibility_status"] = false;
				$status["second_conflict_status"] = false;

				if(count($input_comp) > count($ans_comp)){
					if(count(array_intersect($input_comp, $ans_comp)) == count($input_comp)){
						$status["second_compatibility_status"] = true;
						$correct_count += 1;
					}
				}else{
					if(count(array_intersect($input_comp, $ans_comp)) == count($ans_comp)){
						$status["second_compatibility_status"] = true;
						$correct_count += 1;
					}
				}


				if(count($input_conf) > count($ans_conf)){
					if(count(array_intersect($input_conf, $ans_conf)) == count($input_conf)){
						$status["second_conflict_status"] = true;
						$correct_count += 1;
					}
				}else{
					if(count(array_intersect($input_conf, $ans_conf)) == count($ans_conf)){
						$status["second_conflict_status"] = true;
						$correct_count += 1;
					}
				}

			}


		}

		$grade = $correct_count/4;

		send_grade($grade,$lti);

		 // print_r($status);
		 $status["submit"] = true;

	}else{

		$status = array();

		$status["submit"] = false;

		send_grade(0,$lti);

	}


	echo json_encode($status);



?>