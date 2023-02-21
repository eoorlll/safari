jQuery(function ($) {
  $(".calculator-form > *").change(function() {
	  	let calculator = $(this).closest("form");
	  	let calculatorData = calculator.serialize();
	  	  
	  	$.ajax({
			url: calculator.attr("action"),
		  	type: "GET",
		  	data: calculatorData,
			success: function (data) {
				$("#calculator-result").html(data);
			},
		});
		return false;
	});
});
