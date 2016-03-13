<?php require_once('inc/header.php'); ?>




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

</style>


</head>
<body>



<form id="survey_form" action="javascript:void(0);" method="POST">



<div class="question_container">


	<div class="input_container preferences_inputs">
		<p>What is your 1st preferred role type?</p>
		<select name="first_preference" class="preference_dropdown target custom_select" id='preference_1'>
				<option selected disabled hidden style='display: none' value=''></option>
				<option value="Coordinator">Coordinator</option>
				<option value="Shaper">Shaper</option>
				<option value="Implementer">Implementer</option>
				<option value="Plant">Plant</option>
				<option value="TeamWorker">Team Worker</option>
				<option value="Monitor">Monitor Evaluator</option>
				<option value="Completer">Completer Finisher</option>
				<option value="Resource_Investigator">Resource Investigator</option>
		</select>
	</div>


	<div class="input_container preferences_inputs">
		<p>Which peer role types are compatibile with your 1st preferred role type?</p>
		<p>You can select as many as necessary.</p>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_1" value="Coordinator" class="target">
		Coordinator</br>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_2" value="Shaper" class="target">
		Shaper</br>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_3" value="Implementer" class="target">
		Implementer</br>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_4" value="Plant" class="target">
		Plant</br>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_5" value="TeamWorker" class="target">
		Team Worker</br>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_6" value="Monitor" class="target">
		Monitor Evaluator</br>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_7" value="Completer" class="target">
		Completer Finisher</br>

		<input type="checkbox" name="first_compatibility" id="first_compatibility_option_8" value="Resource_Investigator" class="target">
		Resource Investigator</br>

	</div>

	<div class="input_container preferences_inputs">
		<p>Which peer role types are likely to clash with your 1st preferred role type?</p>
		<p>You can select as many as necessary.</p>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_1" value="Coordinator" class="target">
		Coordinator</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_2" value="Shaper" class="target">
		Shaper</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_3" value="Implementer" class="target">
		Implementer</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_4" value="Plant" class="target">
		Plant</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_5" value="TeamWorker" class="target">
		Team Worker</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_6" value="Monitor" class="target">
		Monitor Evaluator</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_7" value="Completer" class="target">
		Completer Finisher</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_8" value="Resource_Investigator" class="target">
		Resource Investigator</br>

		<input type="checkbox" name="first_conflict" id="first_conflict_option_9" value="none" class="target">
		No increased likelihood of conflict between this role and any other particular role</br>

	</div>


</div>


<div class="question_container">


	<div class="input_container preferences_inputs">
		<p>What is your 2nd preferred role type?</p>
		<select name="second_preference" class="preference_dropdown target custom_select" id='preference_2'>
				<option selected disabled hidden style='display: none' value=''></option>
				<option value="Coordinator">Coordinator</option>
				<option value="Shaper">Shaper</option>
				<option value="Implementer">Implementer</option>
				<option value="Plant">Plant</option>
				<option value="TeamWorker">Team Worker</option>
				<option value="Monitor">Monitor Evaluator</option>
				<option value="Completer">Completer Finisher</option>
				<option value="Resource_Investigator">Resource Investigator</option>
		</select>
	</div>


	<div class="input_container preferences_inputs">
		<p>Which peer role types are compatibile with your 2nd preferred role type?</p>
		<p>You can select as many as necessary.</p>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_1" value="Coordinator" class="target">
		Coordinator</br>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_2" value="Shaper" class="target">
		Shaper</br>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_3" value="Implementer" class="target">
		Implementer</br>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_4" value="Plant" class="target">
		Plant</br>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_5" value="TeamWorker" class="target">
		Team Worker</br>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_6" value="Monitor" class="target">
		Monitor Evaluator</br>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_7" value="Completer" class="target">
		Completer Finisher</br>

		<input type="checkbox" name="second_compatibility" id="second_compatibility_option_8" value="Resource_Investigator" class="target">
		Resource Investigator</br>


	</div>

	<div class="input_container preferences_inputs">
		<p>Which peer role types are likely to clash with your 2nd preferred role type?</p>
		<p>You can select as many as necessary.</p>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_1" value="Coordinator" class="target">
		Coordinator</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_2" value="Shaper" class="target">
		Shaper</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_3" value="Implementer" class="target">
		Implementer</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_4" value="Plant" class="target">
		Plant</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_5" value="TeamWorker" class="target">
		Team Worker</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_6" value="Monitor" class="target">
		Monitor Evaluator</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_7" value="Completer" class="target">
		Completer Finisher</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_8" value="Resource_Investigator" class="target">
		Resource Investigator</br>

		<input type="checkbox" name="second_conflict" id="second_conflict_option_9" value="none" class="target">
		No increased likelihood of conflict between this role and any other particular role</br>

	</div>


</div>


<button class="btn btn-primary btn-md submit_button">Submit</button> <button type='reset' class="btn btn-default btn-md resetButton">Reset</button>
<span class="hint_text">The Submit button will enable once all the questions have been completed.</span>

</form>



<script type="text/javascript">$(document).ready(function(){

	toggleGenerateButton("off");


	$(".submit_button").click(function(event) {

		var form_data = $('#survey_form').serializeArray();
		checkData(form_data);


	});


	$('.target').change(function(event){

		var form_data = $('#survey_form').serializeArray();

		var formated_data = {};

		$.each(form_data,function(ind, obj){

				if(!(obj["name"] in formated_data)){

					formated_data[obj["name"]] = [obj["value"]];
				}else{
					formated_data[obj["name"]].push(obj["value"]);
				}

		});

		saveData(form_data);


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


		$.ajax({
		  type: "POST",
		  url: "checkdata.php",
		  data: data,
		  success: function(response) {
			 console.log(response);

			 updateStatus(response);

		  },
		  error: function(error){
			  console.log(error);
		  }
		});


	}

	function displayStatus(status){

		/**

			first_compatibility_status:false;
			first_conflict_status:true;

			second_compatibility_status:false;
			second_conflict_status:true;

		*/


	}

	function saveData(data){



	}


	function updateStatus(status_data){

		$.each(status_data, function(key, val){


				console.log(key+" - "+val);

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
