(function($){
	$("#movie_rating").on("change", function(){

		var formObj = {
			action: "bgs_rate_movie",
			movieid: $(this).data("movieid"),
			viewerRating: $(this).val()
		}

		// console.log(formObj);
		$.post( movie_obj.ajax_url, formObj, function(data){
			console.log(data);
		});
	});	

	// recipe Form submit script
	$(document).on( 'submit', '#movieSubmitForm', function(e){
		e.preventDefault();

		$(this).hide();
		$("#movieSubmitStatus").html("<div class='alert alert-info'>Please wait! We are submitting your movie.</div>");

		var formObj = {
			action: 			"bgs_submit_guest_movie",
			title: 				$("#bgs_inputTitle").val(),
			content: 			tinymce.activeEditor.getContent(), // wordpress loads the tinymce object - returns unsanitized data
			director: 			$("#bgs_inputDirector").val(),
			writer: 			$("#bgs_inputWriter").val(),
			stars: 				$("#bgs_inputStars").val(),
			tagline: 			$("#bgs_inputTagline").val(),
			key_words: 			$("#bgs_inputKeywords").val(),
			genre: 				$("#bgs_inputGenre").val(),
			audience: 			$("#bgs_inputAudience").val(),
			certificate: 		$("#bgs_inputCertificate").val()
		}

		$.post( movie_obj.ajax_url, formObj, function(data){
			console.log(data);
			if(data.status == 'pass'){
				$("#movieSubmitStatus").html("<div class='alert alert-info'>Your movie has been submitted successfully! We will review it. </div>");
			}else{
				$("#movieSubmitStatus").html("<div class='alert alert-info'>Unable to submit movie. Please fill in all fields.</div>");
				$("#movieSubmitForm").show();
			}
		});
	});	
})(jQuery);