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
					"compatible":["Resource Investigator", "Monitor Evaluator", "Coordinator"],
					"conflict":["Implementer", "Plant"]
				},

				"Plant":{
					"compatible":["Coordinator", "Team Worker", "Resource Investigator"],
					"conflict":["Plant", "Implementer", "Monitor Evaluator"]
				},

				"Coordinator":{
					"compatible":["Implementer", "Team Worker"],
					"conflict":[]
				},

				"Team Worker":{
					"compatible":["Team Worker", "Implementer", "Plant"],
					"conflict":["Shaper"]
				},

				"Monitor Evaluator":{
					"compatible":["Implementer", "Coordinator"],
					"conflict":["Completer Finisher", "Monitor Evaluator"]
				},

				"Shaper":{
					"compatible":["Resource Investigator"],
					"conflict":[]
				},

				"Resource Investigator":{
					"compatible":["Team Worker", "Implementer"],
					"conflict":["Completer Finisher"]
				},

				"Completer Finisher":{
					"compatible":["Implementer"],
					"conflict":["Monitor Evaluator"]
				}
			}

	}';

		$response = $_POST['data'];



	echo '{
		
			"status":"we have an ok",
			"response":"'.$response.'"

	}';


?>