<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости");
?>
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
	<h1>Новости</h1>
</div>
<?$APPLICATION->IncludeComponent("t1:news", "", array(
));?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>