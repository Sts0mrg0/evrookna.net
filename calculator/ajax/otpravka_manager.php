<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?>
<!--Все элементы калькулятора выводим в массив-->
<?
if(!empty($_POST['EMAIL']) && !empty($_POST['ID_EL'])){
echo $_POST['EMAIL'];
echo $_POST['ID_EL'];
	$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*", "PREVIEW_TEXT");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
	$arFilter = Array("ID"=>$_POST['ID_EL']);
	$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
	if($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
	}
	$arEventFields = array(
		"NUMBER_ORDER" => $arFields['ID'],
		"EMAIL" => $_POST['EMAIL'],
		"ORDER" => $arFields['~PREVIEW_TEXT'],
		);

	CEvent::Send("calculator", SITE_ID, $arEventFields, 'N', 29);
}
?>