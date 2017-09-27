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
})(jQuery);