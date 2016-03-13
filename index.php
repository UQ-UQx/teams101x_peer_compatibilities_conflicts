<?php require_once('inc/header.php'); ?>







</head>
<body>

<h1>Welcome to the Teams101x Compatibilties and potential clashes activity</h1>



	


	<form class="survey_form" action="javascript:void(0);" method="POST">



		

		<select name="preference_one" id="" class="preferences">
			
				
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



		<button class="btn btn-primary btn-md makepdf">Submit</button> <button type='reset' class="btn btn-default btn-md resetButton">Reset</button>
	</form>






<script type="text/javascript">$(document).ready(function(){



	var data = {'data':{}};

	data['user_id'] = '<?php echo $lti->user_id(); ?>';
	data['data'] = "WAAATT";

	data['form'] = $('#questionnaire_form').serialize();

	data['lti_id'] = '<?php echo $lti->lti_id(); ?>';
	data['lis_outcome_service_url'] = '<?php echo $lti->grade_url(); ?>';
	data['lis_result_sourcedid'] = '<?php echo $lti->result_sourcedid(); ?>';



	$.ajax({
	  type: "POST",
	  url: "checkdata.php",
	  data: data,
	  success: function(response) {

		 console.log(response);

	  },
	  error: function(error){

		  console.log(error);
	  }
	});






});</script>


</body>
</html>
