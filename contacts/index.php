<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Контакты | Современные окна в Москве");
$APPLICATION->SetTitle("Контакты - Современные окна в Москве");
?>
<div class="menu.bottom">
</div>
<div class="breadcrumbs">
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
        "START_FROM" => "1", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
    )
);?>
</div>

<?$APPLICATION->IncludeComponent("t1:detail.info","",Array(
    )
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>