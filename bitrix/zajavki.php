<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
	if($_GET['ID']){
		$APPLICATION->IncludeComponent("t1:zajavka", "", array());
	}else{
		$APPLICATION->IncludeComponent("t1:zajavka_all", "", array());
	}
?>
