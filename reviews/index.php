<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");?>
<?$APPLICATION->IncludeComponent("t1:menu.bottom", "", array(
    ),
    false
);?>
<div class="breadcrumbs">
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
        "START_FROM" => "1", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
    )
);?>
</div>
<div class="solid-line">
	<p>"Современные окна" - отзывы</p>
</div>
<div class="main">
	<?$APPLICATION->IncludeComponent("t1:comments", "all.comments", array(
	),
	false
	);?>
	<div style="clear:both;"></div>
	<div class="reviews-box">
		<div class="reviews-box-name">Оставить отзыв</div>
<?$_REQUEST['PROPERTY']['PREVIEW_TEXT'][0] = strip_tags($_REQUEST['PROPERTY']['PREVIEW_TEXT'][0]);?>
<?$APPLICATION->IncludeComponent(
	"t1:infoportal.element.add.form", 
	"reviews", 
	array(
		"IBLOCK_TYPE" => "Dynamics",
		"IBLOCK_ID" => "23",
		"STATUS_NEW" => "N",
		"LIST_URL" => "",
		"USE_CAPTCHA" => "Y",
		"USER_MESSAGE_EDIT" => "",
		"USER_MESSAGE_ADD" => "Отзыв добавлен",
		"DEFAULT_INPUT_SIZE" => "30",
		"RESIZE_IMAGES" => "N",
		"PROPERTY_CODES" => array(
			0 => "NAME",
			1 => "PREVIEW_TEXT",
		),
		"PROPERTY_CODES_REQUIRED" => array(
		),
		"GROUPS" => array(
		),
		"STATUS" => "ANY",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"MAX_USER_ENTRIES" => "100000",
		"MAX_LEVELS" => "100000",
		"LEVEL_LAST" => "Y",
		"MAX_FILE_SIZE" => "0",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"SEF_MODE" => "N",
		"SEF_FOLDER" => "/reviews/",
		"CUSTOM_TITLE_NAME" => "Имя",
		"CUSTOM_TITLE_TAGS" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "Отзыв",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => ""
	),
	false
);?> 
	</div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
