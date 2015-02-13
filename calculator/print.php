<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?>
<?
$id = intval($_GET['id']);
$arFilter = Array("IBLOCK_ID"=>33, "ID"=>$id);
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	echo $arFields['~PREVIEW_TEXT'];
}?>	



<a href='javascript:window.print(); void 0;'>печать</a>