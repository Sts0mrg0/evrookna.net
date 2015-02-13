<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Пластиковые окна, евроокна, окна пвх, деревянные окна, производство, монтаж, установка, сервисное обслуживание, современные окна.");
$APPLICATION->SetPageProperty("description", "Компания «Современные окна» изготовит пластиковые или деревянные окна по индивидуальному заказу.  Монтаж и сервисное обслуживание в Москве и МО. Гарантия 5 лет.");
$APPLICATION->SetTitle("Пластиковые окна пвх в Москве от производителя «Современные окна» | Евроокна – официальный сайт, отзывы, цены, преимущества");
?><div class="sl">
	<div class="slider">
		<div class="slider-form" id="slider-form">
			<p>
				Есть вопросы?
			</p>
			<p>
				Закажите бесплатную консультацию!
			</p>
			<div class="zaglushka_img">
			</div>
			<div class="index-form">
				 <?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new",
	"consult",
	Array(
		"SEF_MODE" => "N",
		"WEB_FORM_ID" => "5",
		"LIST_URL" => "result_list.php",
		"EDIT_URL" => "result_edit.php",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"VARIABLE_ALIASES" => Array("WEB_FORM_ID"=>"WEB_FORM_ID","RESULT_ID"=>"RESULT_ID")
	)
);?> <?/*}else{?> <input placeholder="Ваше имя" name="name" class="slider-name" type="text"> <input placeholder="Ваш телефон" name="phone" class="slider-phone" type="text"> <input name="type" value="questions" type="hidden"> <input onclick="yaCounter27207701.reachGoal('consult');return true;ga('send', 'event', 'consult', 'send');" value="получить консультацию" type="submit"> <?}*/?>
			</div>
			<div class="index-form-2">
				<p class="text-red">
					Спасибо! Ваша заявка отправлена.
				</p>
			</div>
		</div>
		<div class="slider-bottom">
			 <a name="">
        <div class="calculator"> <img src="<?=SITE_TEMPLATE_PATH ?>/images/calculatore.png" />
          <span>Онлайн калькулятор</span>
         
          <p>Рассчитайте стоимость окон с помощью онлайн-калькулятора.</p>
         </div>
      </a> <a name="">
        <div class="zamer vizov_zam"> <img src="<?=SITE_TEMPLATE_PATH ?>/images/zamer.png"  />
          <span>Бесплатный вызов замерщика</span>

          <p>Замер и точный расчет стоимости пластиковых окон.</p>
         </div>
      </a> <a href="http://www.eurookna.net/actions/32/">
			<div class="actia">
 <img src="<?=SITE_TEMPLATE_PATH ?>/images/present-form.png" />

				<span>
Акция! Закажи ПВХ окна сейчас - получи подарок!
				</span>
			</div>
 </a>
		</div>
	</div>
	<div class="slider-box">
	</div>
	<div style="margin-bottom: 27px;" class="carousel slide" id="myCarousel">
		 <!-- Carousel items -->
		<div class="carousel-inner">
			 <?$APPLICATION->IncludeComponent(
	"t1:slider",
	"",
	Array(
	)
);?>
		</div>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/bitrix/include/slide_navigation.php",
		"EDIT_TEMPLATE" => "standard.php"
	)
);?>
	</div>
</div>
<div class="main-index">
	<div class="index-width">
		<div class="title">
			<h1>Производство и установка окон</h1>
		</div>
	</div>
</div>
<div class="price">
	<div class="inner">
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"PATH" => "/bitrix/include/tabs_navigation.php",
		"EDIT_TEMPLATE" => "standard.php"
	)
);?>
	</div>
</div>
<div class="price inner" style="background: none repeat scroll 0% 0% transparent;">
	<div id="myTabContent" class="tab-content">
		 <?$APPLICATION->IncludeComponent(
	"t1:index.orders",
	"",
	Array(
	)
);?>
	</div>
</div>
<div class="main-index">
	<div class="index-width">
		<div class="title">
			Почему наши клиенты нами довольны
		</div>
	</div>
</div>
<div class="clients">
	<div class="main-icon">
		<div class="icon">
 <img src="<?=SITE_TEMPLATE_PATH ?>/images/icon05.png"/>
			<h3>Мы производители</h3>
			<p>
				Никаких наценок и комиссий. Уже более 10 лет мы радуем наших клиентов!
			</p>
		</div>
		<div class="icon">
    <img src="<?=SITE_TEMPLATE_PATH ?>/images/icon06.png" />
        	<h3>Хорошее качество</h3>
			<p>
				Наши окна не пропустят звук и тепло, сделаны из экологических материалов. Качество контролируется по ГОСТ 1234-5
			</p>
		</div>
		<div class="icon">
        <img src="<?=SITE_TEMPLATE_PATH ?>/images/icon07.png" />
        
	
            <h3>Гарантии</h3>
			<p>
				Мы бесплатно заменим и устраним все недочеты продукции. Гарантия качества пластиковых окон - 5 лет.
			</p>
		</div>
	</div>
</div>
<div class="main-index">
	<div class="index-width">
		<div class="title">
			<h1> ИЗГОТОВЛЕНИЕ И УСТАНОВКА СОВРЕМЕННЫХ ОКОН</h1>
		</div>
	</div>
</div>
<div class="comments">
	<p>

	</p>
</div>
<div class="main-index">
	<div class="index-width">
		<div class="title">
			<a href="/reviews/">Отзывы о нашей работе</a>
		</div>
	</div>
</div>
<div class="comments">
	<div class="comments-main">
		<div class="comments-maint">

 <img src="<?=SITE_TEMPLATE_PATH ?>/images/quet01.png" class="quet01" />
 
 
 <?$APPLICATION->IncludeComponent(
	"t1:comments",
	"",
	Array(
	)
);?>
		</div>
  <img src="<?=SITE_TEMPLATE_PATH ?>/images/quet02.png"  class="quet02"  />    
        


	</div>
</div><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
