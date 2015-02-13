<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Акция - Теплопакет 2.0 в подарок!");
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
<?$APPLICATION->IncludeComponent("t1:detail.info", "", array(
	),
	false
);?>

<?if ($APPLICATION->GetCurPage() == '/actions/') {
$APPLICATION->IncludeComponent("t1:action.info", "", array(
	),
	false
);}?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>