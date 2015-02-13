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
	<p>Статьи</p>
</div>
<div class="main">
<?$APPLICATION->IncludeComponent("t1:stati","",Array(
)
);?>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>