<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Элитные окна, имеют роскошнее оформление: ламинация, витражи, раскладки, цветные ручки. Это придает дополнительное изящество и шик, что позволяет реализовать дизайнерские решения в интерьере помещения.");
$APPLICATION->SetPageProperty("keywords", "Элитные окна.");
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
<?
$APPLICATION->IncludeComponent("t1:stati.detail", "", array(
));
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>