</div>
<footer>
    <div class="footer-top">
        <div class="inner">
<div class="order-left" action="" id="order-left">
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"stoimost",
	Array(
		"SEF_MODE" => "N",
		"WEB_FORM_ID" => "6",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",)
	)
);?>
		</div>
            <div class="order-right">
                <div class="discount"><img src="<?= SITE_TEMPLATE_PATH ?>/images/discount.png">

                    <p>Скидки при заказе ONLINE</p></div>
                <div class="present"><img src="<?= SITE_TEMPLATE_PATH ?>/images/present.png">

                    <p>Москитная сетка в подарок!</p></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <ul class="caption">
            <li>Продукция:</li>
            <li class="footer2-li">Способы оплаты:</li>
            <li>Контакты:</li>
        </ul>
        <ul class="footer1">
            <li><a href="/plastic/">- Пластиковые окна</a></li>
            <li><a href="/wooden/">- Деревянные окна</a></li>
            <li><a href="/kit/">- Комплектующие</a></li>
            <li><a href="/balcony/">- Остекление балконов и лоджий</a></li>
            <li><a href="/doors/">- Двери</a></li>
            <li><a href="/extra/">- Дополнительные возможности</a></li>
        </ul>
        <ul class="footer2">
            <li><img src="<?= SITE_TEMPLATE_PATH ?>/images/icon01.png">

                <p>Наличными в кассе</p></li>
            <li><img src="<?= SITE_TEMPLATE_PATH ?>/images/icon02.png">

                <p>Менеджеру на объекте</p></li>
            <li><img src="<?= SITE_TEMPLATE_PATH ?>/images/icon03.png">

                <p>Картой в офисе</p></li>
            <li><img src="<?= SITE_TEMPLATE_PATH ?>/images/icon04.png">

                <p>Картой через интернет-сервис оплаты</p></li>
        </ul>
        <div class="footer3">
            <p class="address"> г.Москва, Ленинский проспект, 34</p>

            <p class="tel">Телефон: <b>
					<?$APPLICATION->IncludeComponent("t1:phone", "", array(
						),
						false
					);?>
			</b></p>

            <p class="copy"> © 2005-2014 Современные окна</p>

            <p class="cont"> Производство, монтаж и установка
                пластиковых и деревянных окон</p>
        </div>
    </div>
</footer>


<div id="modal_form"> <!-- Само окно -->
    <span id="modal_close">X</span> <!-- Кнопка закрыть -->
	<div class="modal-main">
<div id="call">
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"zamer",
	Array(
		"SEF_MODE" => "N",
		"WEB_FORM_ID" => "8",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",)
	)
);?>
	</div>
	<div class="footer-form" style="margin-top:40px;">
		<p style="font-size: 16px;">Ваша заявка отправлена.</p>
		<p style="font-size: 16px; margin-top:10px;">Наши специалисты в ближайшее время свяжутся с Вами</p>
	</div>
	</div>
</div>
<div id="modal_form1"> <!-- Само окно -->
    <span id="modal_close1">X</span> <!-- Кнопка закрыть -->
	<div class="modal-main">
	<div id="сallback">
	<?$APPLICATION->IncludeComponent(
		"bitrix:form.result.new",
		"perez",
		Array(
			"SEF_MODE" => "N",
			"WEB_FORM_ID" => "7",
			"LIST_URL" => "",
			"EDIT_URL" => "",
			"SUCCESS_URL" => "",
			"CHAIN_ITEM_TEXT" => "",
			"CHAIN_ITEM_LINK" => "",
			"IGNORE_CUSTOM_TEMPLATE" => "N",
			"USE_EXTENDED_ERRORS" => "N",
			"CACHE_TYPE" => "A",
			"CACHE_TIME" => "3600",
			"CACHE_NOTES" => "",
			"VARIABLE_ALIASES" => array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID",)
		)
	);?>
	</div>



	<div class="footer-form" style="margin-top:40px;">
		<p style="font-size: 16px;">Ваша заявка отправлена.</p>
		<p style="font-size: 16px; margin-top:10px;">Наши специалисты в ближайшее время свяжутся с Вами</p>
	</div>
	</div>
</div>
<div id="modal_form3"> <!-- Само окно -->
    <span id="modal_close2">X</span> <!-- Кнопка закрыть -->
	<div class="modal-main">
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"order",
	Array(
		"SEF_MODE" => "N",
		"AJAX_MODE" => "Y",
		"WEB_FORM_ID" => "4",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"VARIABLE_ALIASES" => Array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID"
		)
	)
);?> 
	</div>
</div>
<div id="overlay"></div> <!-- Подложка -->
<!--
<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/bootstrap.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/main.js"></script>-->
<div class="calculator calculator-img"></div>




<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = '32999';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
<?if($_GET['calculator'] == 'Y'){?>
<script>
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
				$('html, body').animate({scrollTop:0}, 'slow');
			},
			error:  function(xhr, str){}
		});
</script>
<?}?>

<link rel="stylesheet" href="//cdn.callbackhunter.com/widget/tracker.css"> <script type="text/javascript" src="//cdn.callbackhunter.com/widget/tracker.js" charset="UTF-8"></script>

<script type="text/javascript">var hunter_code="cec52ef703eb9b6f8f804869e242d2ff";</script>


</body>
</html>