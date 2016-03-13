<?php
	header('Content-Type: application/json');
	require_once('config.php');
	require_once('lib/lti.php');
	require_once('lib/grade.php');

	$lti = new Lti($config,true);
	
	$vars = array('user_id'=>$_POST['user_id'],'oauth_consumer_key'=>$_POST['lti_id'], 'lis_outcome_service_url'=>$_POST['lis_outcome_service_url'], 'lis_result_sourcedid'=>$_POST['lis_result_sourcedid']);
	
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
					"conflict":[]
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
					"conflict":[]
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

	foreach ($answers_entered as $ind => $obj) {

		$pref = $obj["pref"];

		if($ind == "first"){

			$status["first_compatibility"] = false;
			$status["first_conflict"] = false;
			if(!array_diff($obj["com_con"]["com"], $answer_key["roles"][$pref]["compatible"])){
				$status["first_compatibility"] = true;
			}
			if(!array_diff($obj["com_con"]["con"], $answer_key["roles"][$pref]["conflict"])){
				$status["first_conflict"] = true;
			}
		}

		if($ind == "second"){

			$status["second_compatibility"] = false;
			$status["second_conflict"] = false;
			if(!array_diff($obj["com_con"]["com"], $answer_key["roles"][$pref]["compatible"])){
				$status["second_compatibility"] = true;
			}
			if(!array_diff($obj["com_con"]["con"], $answer_key["roles"][$pref]["conflict"])){
				$status["second_conflict"] = true;
			}
		}


	}

	print_r($status);


// $containsAllValues = !array_diff($obj["com"], $all);





	echo '{
		
			"status":"we have an ok",
			"response":"'.$response_raw.'"

	}';


?>