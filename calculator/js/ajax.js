		function getimg(){
			html2canvas($('#shag3_box_right_box1'), { // Указываем область для скрина
				onrendered: function (canvas) {
                    var data = canvas.toDataURL('image/png').replace("image/png", "image/octet-stream");
				   $.ajax({ // Отправляем кодированый файл на сервер чтобы сохранить его в файл через php
						url: "/calculator/ajax/photo.php",
						type: "POST",
						data: ({photo: data}),
						dataType: "text",
						success: function (data) { // Получаем адрес файла
							$('input[name=getimg]').val(data);
						}
					});
				}
			});
			return false;
		}
$(document).ready(function(){

	$('.d-carousel_netlime ul li input').live("click", function() {
		var txt = '';var i = 0;
		$('.d-carousel_netlime ul li .clearajax:checked').each(function(){
			if(i++ == 0){
				txt = $(this).parents('.shag2_box_middle_box_elem_right_name').find('.shag2_box_middle_box_elem_right_name_span').html();
			}else{
				txt = txt + ', ' +$(this).parents('.shag2_box_middle_box_elem_right_name').find('.shag2_box_middle_box_elem_right_name_span').html();
			}
		});
		if($("#dopcii").length){
			$('.shag1-boxtext-right-box.shag1-boxtext-right-box2 ul #dopcii i').html(txt);
		}else{
			$('.shag1-boxtext-right-box.shag1-boxtext-right-box2 ul').append('<li id="dopcii"><span class="boxtext-span-red">Дополнительные опции:</span> <i>' + txt + '</i></li>');
		}
	});
/*переключение между табами*/
	$('.calculator-top ul li').live("click", function() {
		/*return false;*/
		$('.calculator-top ul li').removeClass('calculator-shac-active');
		
		if($(".request_div_shag_3").length){
			var href = 'calc3';
			$('#calc3').addClass('calculator-shac-active');
		}else{
			var href = $(this).attr('id');
			$(this).addClass('calculator-shac-active');
		}
		var pst = $('.calculator-middle form').serialize();
		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/' + href + '.php',
			data: pst,
			success: function(data) {
				$('.calculator-middle').html(data);
			},
			error:  function(xhr, str){}
		});

        return false;
	});
/* !end переключение между табами*/
	
/*Между табами кнопками*/
	$('.shagi-buttons-sp').live("click", function() {
		if($(".request_div_shag_3").length){
			var cla = 'calc3';
		}else{
			var cla = $(this).find('span').attr('class');
		}
		$('.calculator-top ul li').removeClass('calculator-shac-active');
		$('#' + cla).addClass('calculator-shac-active');
		var pst = $('.calculator-middle form').serialize();

		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/' + cla + '.php',
			data: pst,
			success: function(data) {
				$('.calculator-middle').html(data);
			},
			error:  function(xhr, str){}
		});

        return false;
	});
/**/

	$('.shagi-buttons-left-href').live("click", function() {
		var cla = $(this).find('span').attr('class');
		$('.calculator-top ul li').removeClass('calculator-shac-active');
		$('#calc1').addClass('calculator-shac-active');
		var pst = $('.calculator-middle form').serialize();
		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/calc1.php?serialize=y',
			data: pst,
			success: function(data) {
				$('.calculator-middle').html(data);
			},
			error:  function(xhr, str){}
		});

        return false;
	});
	
	
	
	$('.shag1-box1-ul li label').live("click", function() {
		$(this).parents('ul').find('li').removeClass('radioactive');
		$(this).parents('li').addClass('radioactive');
	});
	/*Шаг1*/
	$('#shag-1 ul li input, #shag-1 .shag1-box6 li, #shag-1 .shagi-buttons-each input, .shag1_balkon_dver option').live("click", function() {
		var pst = $('#shag-1').serialize();
		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/calc1.php',
			data: pst,
			success: function(data) {
				$('.calculator-middle').html(data);
			},
			error:  function(xhr, str){}
		});
	});
	$('.shag1_balkon_dver').live("change", function() {
		var pst = $('#shag-1').serialize();
		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/calc1.php',
			data: pst,
			success: function(data) {
				$('.calculator-middle').html(data);
			},
			error:  function(xhr, str){}
		});
	});
	/**/
	/*Шаг2*/
	$('#shag2_box ul li input, #shag2_box .selectbox ul li').live("click", function() {
		if($(this).hasClass("clearajax")){
			
		}else{
			var pst = $('#shag2_box').serialize();
			$.ajax({
				type: 'POST',
				url: '/calculator/ajax/calc2.php',
				data: pst,
				success: function(data) {
					$('.calculator-middle').html(data);
				},
				error:  function(xhr, str){}
			});
		}
	});
	/**/
	/*Шаг3*/
	$('#shag3_box ul li input[type=radio], #shag3_box ul li input[type=checkbox]').live("click", function() {
		var pst = $('#shag3_box').serialize();
		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/calc3.php',
			data: pst,
			success: function(data) {
				$('.calculator-middle').html(data);
			},
			error:  function(xhr, str){}
		});
	});
	/**/
		$('#shdg3-otpravka').live('click', function() {
			var error = 0;
			$('#shag3_box_right_box2-form-box input').each(function(){
				if($(this).val().length < 3){
					$(this).css('box-shadow','0px 0px 3px 1px red');error = 1;
				}
			});
			var pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
			if(!pattern.test($('#shag3_box_right_box2-form-box input[name=e-mail]').val())){
                $('#shag3_box_right_box2-form-box input[name=e-mail]').css('box-shadow','0px 0px 3px 1px red');error = 1;
            }
			
			$('#shag3_box_right_box2-form-box input')
			if(error == 0){
				var pst = $('#shag3_box').serialize();
				$.ajax({
					type: 'POST',
					url: '/calculator/ajax/otpravka.php',
					data: pst,
					success: function(data) {
						$('.calculator-middle').html(data);
					},
					error:  function(xhr, str){}
				});
			}
			return false;
		});
		$('#shag3_box_right_box2-form-box input').live('keyup',function(){
			if($(this).val().length > 2){$(this).css('box-shadow','none');}
		});

		
});