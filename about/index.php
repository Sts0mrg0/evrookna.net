<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "");
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
<?if ($APPLICATION->GetCurPage() == '/about/certificates/') {?>
<?$APPLICATION->IncludeComponent("t1:certificates","",Array(
    )
);?>
<?} else {?>
<?$APPLICATION->IncludeComponent("t1:detail.info","",Array(
    )
);}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>