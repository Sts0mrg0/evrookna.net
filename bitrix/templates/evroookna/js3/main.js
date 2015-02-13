jQuery(document).ready(function($) {

    $('.index-form-2').hide();
    $('.footer-form').hide();

    $('#slider-form').submit(function() {
        var str = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/ajax/slider-form.php",
            data: str,
            success: function (msg) {
                var obj = jQuery.parseJSON(msg);

                if (obj.name == 'NO') {
                    $(".slider-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".slider-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }

                if (obj.phone === 'NO') {
                    $(".slider-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".slider-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }

                if (obj.end === 'YES') {
                    $(".index-form").hide();
                    $(".index-form-2").show();
                }
            }
        });
        return false;
    });
	
    $('#order-left').submit(function() {
        var str = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/ajax/slider-form.php",
            data: str,
            success: function (msg) {
                var obj = jQuery.parseJSON(msg);

                if (obj.name == 'NO') {
                    $(".footer-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".footer-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }

                if (obj.phone === 'NO') {
                    $(".footer-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".footer-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }
				
				if (obj.end === 'YES') {
					$(".footer-form").show();
				}
            }
        });
        return false;
    });
	    $('#call').submit(function() {
        var str = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/ajax/slider-form.php",
            data: str,
            success: function (msg) {
                var obj = jQuery.parseJSON(msg);

                if (obj.name == 'NO') {
                    $(".modal-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".modal-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }

                if (obj.phone === 'NO') {
                    $(".modal-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".modal-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }
				
				if (obj.end === 'YES') {
					$('#call').hide();
					$('.footer-form').show();
				}
            }
        });
        return false;
    });
	    $('#сallback').submit(function() {
        var str = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/ajax/slider-form.php",
            data: str,
            success: function (msg) {
                var obj = jQuery.parseJSON(msg);

                if (obj.name == 'NO') {
                    $(".modal1-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".modal1-name").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }

                if (obj.phone === 'NO') {
                    $(".modal1-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0.5)");
                } else {
                    $(".modal1-phone").css("box-shadow", " 0 0 10px rgba(255,0,0,0)");
                }
				
				if (obj.end === 'YES') {
					$('#сallback').hide();
					$('.footer-form').show();
				}
            }
        });
        return false;
    });
    $('#go').click( function(event){ // ловим клик по ссылки с id="go"
        event.preventDefault(); // выключаем стандартную роль элемента
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function(){ // после выполнения предъидущей анимации
                $('#modal_form')
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '40%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
    });
    /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
    $('#modal_close, #overlay').click( function(){ // ловим клик по крестику или подложке
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
            function(){ // после анимации
                $(this).css('display', 'none'); // делаем ему display: none;
                $('#overlay').fadeOut(400); // скрываем подложку
            }
        );
    });
    $('#go1').click( function(event){ // ловим клик по ссылки с id="go"
        event.preventDefault(); // выключаем стандартную роль элемента
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function(){ // после выполнения предъидущей анимации
                $('#modal_form')
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '40%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
    });
    /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
    $('#modal_close, #overlay').click( function(){ // ловим клик по крестику или подложке
        $('#modal_form')
            .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
            function(){ // после анимации
                $(this).css('display', 'none'); // делаем ему display: none;
                $('#overlay').fadeOut(400); // скрываем подложку
            }
        );
    });
    $('#go11').click( function(event){ // ловим клик по ссылки с id="go"
        event.preventDefault(); // выключаем стандартную роль элемента
        $('#overlay').fadeIn(400, // сначала плавно показываем темную подложку
            function(){ // после выполнения предъидущей анимации
                $('#modal_form1')
                    .css('display', 'block') // убираем у модального окна display: none;
                    .animate({opacity: 1, top: '40%'}, 200); // плавно прибавляем прозрачность одновременно со съезжанием вниз
            });
    });
    /* Закрытие модального окна, тут делаем то же самое но в обратном порядке */
    $('#modal_close1, #overlay').click( function(){ // ловим клик по крестику или подложке
        $('#modal_form1')
            .animate({opacity: 0, top: '45%'}, 200,  // плавно меняем прозрачность на 0 и одновременно двигаем окно вверх
            function(){ // после анимации
                $(this).css('display', 'none'); // делаем ему display: none;
                $('#overlay').fadeOut(400); // скрываем подложку
            }
        );
    });
	 /* Создание калькулятора */
	$('.calculator').click(function() {
		$.ajax({
			type: 'POST',
			url: '/calculator/ajax/calc-box.php',
			data: ({id:'1'}),
			success: function(data) {
				if($("div").is(".popup-calculator-fon")){
					$('.popup-calculator-fon, .popup-calculator').fadeIn();
				}else{
					$('body').append('<div class="popup-calculator-fon"></div><div class="popup-calculator"></div>');
					$('.popup-calculator').html(data);
				}
			},
			error:  function(xhr, str){}
		});

        return false;
	});
	/* Закрытие калькулятора */
	$('.calculator-close').live("click", function() {
		$('.popup-calculator-fon, .popup-calculator').fadeOut();

        return false;
	});
});
