<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?> 
		<?
		$arSelect = Array("ID", "NAME", "PREVIEW_TEXT");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
		$arFilter = Array("IBLOCK_ID"=>11, "ID"=>$_POST['id']);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();
echo $arFields['PREVIEW_TEXT'];
		}?>