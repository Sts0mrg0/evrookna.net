<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/main_products/(.*)/(.*)/#",
		"RULE" => "ELEMENT_ID=\$2",
		"ID" => "",
		"PATH" => "/main_products/index.php",
	),
	array(
		"CONDITION" => "#^/services/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/services/index.php",
	),
	array(
		"CONDITION" => "#^/plastic/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/plastic/detail.php",
	),
	array(
		"CONDITION" => "#^/balcony/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/plastic/detail.php",
	),
	array(
		"CONDITION" => "#^/actions/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/actions/index.php",
	),
	array(
		"CONDITION" => "#^/wooden/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/plastic/detail.php",
	),
	array(
		"CONDITION" => "#^/about/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/about/index.php",
	),
	array(
		"CONDITION" => "#^/stati/(.*)/#",
		"RULE" => "ELEMENT_CODE=\$1",
		"ID" => "",
		"PATH" => "/stati/detail.php",
	),
	array(
		"CONDITION" => "#^/extra/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/plastic/detail.php",
	),
	array(
		"CONDITION" => "#^/stati/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/about/detail.php",
	),
	array(
		"CONDITION" => "#^/doors/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/plastic/detail.php",
	),
	array(
		"CONDITION" => "#^/news/(.*)/#",
		"RULE" => "ELEMENT_ID=\$1",
		"ID" => "",
		"PATH" => "/news/detail.php",
	),
	array(
		"CONDITION" => "#^/kit/(.*)/#",
		"RULE" => "IBLOCK_CODE=\$1",
		"ID" => "",
		"PATH" => "/plastic/detail.php",
	),
);

?>