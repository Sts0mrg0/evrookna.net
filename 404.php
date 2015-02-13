<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("404 Not Found");?>

<div id="error404-box" class="main">
	<div class="rasporka"></div>
	<div class="error404">404 ошибка</div>
	<div class="error404-text">Не можете зайти на сайт? Мы Вам перезвоним!</div>
	<div class="error404-form">
<?$APPLICATION->IncludeComponent(
	"bitrix:form.result.new", 
	"error", 
	array(
		"SEF_MODE" => "N",
		"AJAX_MODE" => "Y",
		"WEB_FORM_ID" => "3",
		"LIST_URL" => "",
		"EDIT_URL" => "",
		"SUCCESS_URL" => "",
		"CHAIN_ITEM_TEXT" => "",
		"CHAIN_ITEM_LINK" => "",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS" => "Y",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"CACHE_NOTES" => "",
		"SEF_FOLDER" => "/",
		"VARIABLE_ALIASES" => array(
			"WEB_FORM_ID" => "WEB_FORM_ID",
			"RESULT_ID" => "RESULT_ID",
		)
	),
	false
);?> 
	</div>

 
<div id="error404-price" class="price"> 
  <div class="inner"> 
            <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                    <a href="/plastic/">Пластиковые окна</a>
                </li>
                <li><a href="/wooden/">Деревянные окна</a></li>
                <li><a href="/balcony/">Остекление бaлконов</a></li>
            </ul>
   </div>
 </div>


</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>