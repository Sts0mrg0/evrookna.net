$(document).ready(function(){

	$('.calculator12').live("click", function() {
		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/calc-box.php',
			data: ({id:'1'}),
			success: function(data) {
				$('body').append('<div class="popup-calculator-fon"></div><div class="popup-calculator"></div>');
				$('.popup-calculator').html(data);
			},
			error:  function(xhr, str){}
		});

        return false;
	});

	
	
});