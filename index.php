<?php require_once('inc/header.php'); ?>

<?php

	$sid = $lti->resource_id().'-lti-uid-'.$lti->user_id();

	require_once('model.php');



	$saved_data_raw = getResponse($sid);

	$data_available = false;
		$number_of_selections = 0;


	if(isset($saved_data_raw)){



		$saved_data_raw_json = json_decode($saved_data_raw->response);
		$saved_data = array();
		foreach ($saved_data_raw_json as $ind => $obj) {

			if(isset($saved_data[$obj->name])){
				array_push($saved_data[$obj->name], $obj->value);
				
			}else{
				$saved_data[$obj->name] = array($obj->value);
			}
		}
		// $saved_data_json = json_encode($saved_data);

		$number_of_selections = count($saved_data);
		$data_available = true;

	}

?>


<style type="text/css">

	.question_container{

		margin-bottom:30px;
	}

	.input_container{

		margin-left:2px;
		margin-bottom:30px;

	}

	.input_container input{

		margin-right: 10px;
		margin-bottom:10px;
	}


	.input_container p{

		font-weight: bold;

	}

	.preference_dropdown{

		display: block;

	}

	.titles{
		font-weight:bold;
		font-size: 20px;

	}

	.hint_text{
		color: #FFFFFF;
		display: block;
		padding:5px;
		margin-top: 5px;
		background-color: #FF6128;
		text-align: center;
	}

	.fa-check{

		color:green;

	}

	.fa-times{

		color:red;
	}

	.status {

		font-size: 20px;
	}

</style>


</head>
<body>


<form id="survey_form" action="javascript:void(0);" method="POST">


<?php



	$number_of_options = 2;


	$options_string = '{

			"roles":{

				"Implementer":{
					"display_name":"Implementer"
				},

				"Plant":{
					"display_name":"Plant"
				},

				"Coordinator":{
					"display_name":"Coordinator"
				},

				"TeamWorker":{
					"display_name":"Team Worker"
				},

				"Monitor":{
					"display_name":"Monitor Evaluator"
				},

				"Shaper":{
					"display_name":"Shaper"
				},

				"Resource_Investigator":{
					"display_name":"Resource Investigator"
				},

				"Completer":{
					"display_name":"Completer Finisher"
				}
			}
	}';


	$options = json_decode($options_string,true);

?>





<div class="question_container">


	<div class="input_container preferences_inputs">
		<p>What is your 1st preferred role type?</p>


		<?php




			echo '<select name="first_preference" class="preference_dropdown target custom_select" id="preference_1"><option selected disabled hidden style="display: none" value=""></option>';
			foreach ($options["roles"] as $value => $obj) {
				if(isset($saved_data["first_preference"])){
					if($saved_data["first_preference"][0] == $value){
						echo '<option selected value='.$value.' >'.$obj["display_name"].'</option>';
					}else{
						echo '<option value='.$value.' >'.$obj["display_name"].'</option>';
					}
				}else{
					echo '<option value='.$value.' >'.$obj["display_name"].'</option>';
				}
				//echo $value." --- ".$display_name["display_name"]."</br>";
				//Implementer --- Implementer
				// Plant --- Plant
				// Coordinator --- Coordinator
				// TeamWorker --- Team Worker
				// Monitor --- Monitor Evaluator
				// Shaper --- Shaper
				// Resource_Investigator --- Resource Investigator
				// Completer --- Completer Finisher
			}
			echo '</select>';
		?>
	</div>


	<div class="input_container preferences_inputs">
		<p>Which peer role types are compatibile with your 1st preferred role type?</p>
		<p>You can select as many as necessary.</p>


		<?php

			foreach ($options["roles"] as $value => $obj) {
				if(isset($saved_data["first_compatibility"])){

					if(in_array($value,$saved_data["first_compatibility"])){
						echo '<input type="checkbox" name="first_compatibility" value="'.$value.'" class="target" checked>'.$obj["display_name"].'</br>';
					}else{
						echo '<input type="checkbox" name="first_compatibility" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
					}
				}else{
					echo '<input type="checkbox" name="first_compatibility" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
				}
			}

		?>

		<i class="first_compatibility_status status"></i>

	</div>

	<div class="input_container preferences_inputs">
		<p>Which peer role types are likely to clash with your 1st preferred role type?</p>
		<p>You can select as many as necessary.</p>



		<?php

			foreach ($options["roles"] as $value => $obj) {
				if(isset($saved_data["first_conflict"])){

					if(in_array($value,$saved_data["first_conflict"])){
						echo '<input type="checkbox" name="first_conflict" value="'.$value.'" class="target" checked>'.$obj["display_name"].'</br>';
					}else{
						echo '<input type="checkbox" name="first_conflict" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
					}
				}else{
					echo '<input type="checkbox" name="first_conflict" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
				}
			}


			if(isset($saved_data["first_conflict"])){

					if(in_array("none",$saved_data["first_conflict"])){
						echo '	<input type="checkbox" name="first_conflict" value="none" class="target" checked>
		No increased likelihood of conflict between this role and any other particular role</br>';
					}else{
						echo '	<input type="checkbox" name="first_conflict" value="none" class="target">
		No increased likelihood of conflict between this role and any other particular role</br>';
							}
				}else{
					echo '	<input type="checkbox" name="first_conflict" value="none" class="target">
		No increased likelihood of conflict between this role and any other particular role</br>';
				}
		?>


		<i class="first_conflict_status status"></i>

	</div>


</div>


<div class="question_container">


	<div class="input_container preferences_inputs">
		<p>What is your 2nd preferred role type?</p>
		<?php
			echo '<select name="second_preference" class="preference_dropdown target custom_select" id="preference_2"><option selected disabled hidden style="display: none" value=""></option>';
			foreach ($options["roles"] as $value => $obj) {
				if(isset($saved_data["second_preference"])){

					if($saved_data["second_preference"][0] == $value){
						echo '<option selected value='.$value.' >'.$obj["display_name"].'</option>';
					}else{
						echo '<option value='.$value.' >'.$obj["display_name"].'</option>';
					}
				}else{
					echo '<option value='.$value.' >'.$obj["display_name"].'</option>';
				}
			}
			echo '</select>';
		?>
	</div>


	<div class="input_container preferences_inputs">
		<p>Which peer role types are compatibile with your 2nd preferred role type?</p>
		<p>You can select as many as necessary.</p>

		<?php

			foreach ($options["roles"] as $value => $obj) {
				if(isset($saved_data["second_compatibility"])){

					if(in_array($value,$saved_data["second_compatibility"])){
						echo '<input type="checkbox" name="second_compatibility" value="'.$value.'" class="target" checked>'.$obj["display_name"].'</br>';
					}else{
						echo '<input type="checkbox" name="second_compatibility" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
					}
				}else{
					echo '<input type="checkbox" name="second_compatibility" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
				}
			}

		?>

		<i class="second_compatibility_status status"></i>


	</div>

	<div class="input_container preferences_inputs">
		<p>Which peer role types are likely to clash with your 2nd preferred role type?</p>
		<p>You can select as many as necessary.</p>


		<?php

			foreach ($options["roles"] as $value => $obj) {
				if(isset($saved_data["second_conflict"])){

					if(in_array($value,$saved_data["second_conflict"])){
						echo '<input type="checkbox" name="second_conflict" value="'.$value.'" class="target" checked>'.$obj["display_name"].'</br>';
					}else{
						echo '<input type="checkbox" name="second_conflict" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
					}
				}else{
					echo '<input type="checkbox" name="second_conflict" value="'.$value.'" class="target">'.$obj["display_name"].'</br>';
				}
			}


			if(isset($saved_data["second_conflict"])){
					if(in_array("none",$saved_data["second_conflict"])){
						echo '	<input type="checkbox" name="second_conflict" value="none" class="target" checked>
		No increased likelihood of conflict between this role and any other particular role</br>';
					}else{
						echo '	<input type="checkbox" name="second_conflict" value="none" class="target">
		No increased likelihood of conflict between this role and any other particular role</br>';
							}
			}else{
					echo '	<input type="checkbox" name="second_conflict" value="none" class="target">
		No increased likelihood of conflict between this role and any other particular role</br>';
			}
		?>




		<i class="second_conflict_status status"></i>

	</div>


</div>


<button class="btn btn-primary btn-md submit_button">Submit</button> <button type='reset' class="btn btn-default btn-md resetButton">Reset</button>
<span class="hint_text">The Submit button will enable once all the questions have been completed.</span>

</form>



<script type="text/javascript">$(document).ready(function(){

					$(".hint_text").hide();


	var saved_data_amount =  '<?php echo $number_of_selections;  ?>'
	console.log(saved_data_amount);

	if(saved_data_amount == 6){
		toggleGenerateButton("on");


	}else{
		toggleGenerateButton("off");

	}

	$(".submit_button").click(function(event) {

		$(".resetButton").prop("disabled", true);


		$(this).prop("disabled", true);
		$(this).empty().append("Submitting <i class='fa fa-spinner fa-pulse'></i>");


		var form_data = $('#survey_form').serializeArray();
		checkData(form_data);

	});

	$(".resetButton").click(function(evemt){

		toggleGenerateButton("off");


		$(this).prop("disabled", true);
 		$(this).empty().append("Resetting <i class='fa fa-spinner fa-pulse'></i>");

		checkData();

		//$('#survey_form')[0].reset();


		$('#survey_form').trigger("reset");

		$('.target').removeAttr("checked");
		$('option:selected', 'select[name="first_preference"]').removeAttr('selected');
		$('option:selected', 'select[name="second_preference"]').removeAttr('selected');

		$('select[name="first_preference"]').find('option[value=""]').attr("selected",true);
		$('select[name="second_preference"]').find('option[value=""]').attr("selected",true);




		var form_data_to_save = JSON.stringify($('#survey_form').serializeArray());
		saveData(form_data_to_save);


		$('.status').removeClass("fa fa-times fa-check");


	});


	$('.target').change(function(event){

		var form_data = $('#survey_form').serializeArray();
		var form_data_to_save = $('#survey_form').serializeArray();


		form_data_to_save = JSON.stringify(form_data_to_save);

		var formated_data = {};

		$.each(form_data,function(ind, obj){

			if(!(obj["name"] in formated_data)){
				formated_data[obj["name"]] = [obj["value"]];
			}else{
				formated_data[obj["name"]].push(obj["value"]);
			}

		});


		saveData(form_data_to_save);


		if(Object.keys(formated_data).length == 6){
			toggleGenerateButton('on');
		}else{
			toggleGenerateButton('off');
		}

	});





	function checkData(data_to_save){


		var data = {'data':{}};

		data['data'] = data_to_save;
		data['user_id'] = '<?php echo $lti->user_id(); ?>';
		data['lti_id'] = '<?php echo $lti->lti_id(); ?>';
		data['lis_outcome_service_url'] = '<?php echo $lti->grade_url(); ?>';
		data['lis_result_sourcedid'] = '<?php echo $lti->result_sourcedid(); ?>';
		data['sid'] = '<?php echo $sid ?>';


		$.ajax({
		  type: "POST",
		  url: "checkdata.php",
		  data: data,
		  success: function(response) {
			 console.log(response);

			 if(response["submit"] == true){
				 updateStatus(response);

				$(".resetButton").removeClass('disabled');
				$(".resetButton").prop("disabled", false);

				$(".submit_button").removeClass('disabled');
				$(".submit_button").prop("disabled", false);
 				$(".submit_button").empty().append("Submit");

			 }else{

			 	$(".resetButton").removeClass('disabled');
				$(".resetButton").prop("disabled", false);
 				$(".resetButton").empty().append("Reset");

			 }

		  },
		  error: function(error){
			  console.log(error);
		  }
		});


	}


	function saveData(data_to_save){



		var data = {'data':{}};

		data['data'] = data_to_save;
		data['user_id'] = '<?php echo $lti->user_id(); ?>';
		data['lti_id'] = '<?php echo $lti->lti_id(); ?>';
		data['lis_outcome_service_url'] = '<?php echo $lti->grade_url(); ?>';
		data['lis_result_sourcedid'] = '<?php echo $lti->result_sourcedid(); ?>';
		data['sid'] = '<?php echo $sid ?>';


		$.ajax({
		  type: "POST",
		  url: "savedata.php",
		  data: data,
		  success: function(response) {
			 console.log(response);
		  },
		  error: function(error){
			  console.log(error);
		  }
		});




	}


	function updateStatus(status_data){

		$.each(status_data, function(key, val){

				if(val == false){

					$("."+key).removeClass("fa fa-check");

					$("."+key).addClass("fa fa-times");

				}else{
					$("."+key).removeClass("fa fa-times");

					$("."+key).addClass("fa fa-check");

				}

		});

	}


	/**
	 * Toggles the submit button to on or off
	 * @param  {string} state options["on", "off"]
	 * @return {null}       No return
	 */
	function toggleGenerateButton(state){
		if(state == "on"){
			if($('.submit_button').is(":disabled")){
				$('.submit_button').prop("disabled",false);
				$(".hint_text").hide();
			}
		}else{
			if(!$('.submit_button').is(":disabled")){
				$('.submit_button').prop("disabled",true);
				$(".hint_text").show();
			}
		}
	}


});</script>


</body>
</html>
