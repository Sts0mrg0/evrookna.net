<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?> 
<?
		$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
		$arFilter = Array("IBLOCK_ID"=>11, "SECTION_ID"=>18, "ID"=>$_POST['id']);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();
			$img_tip = $arFields["PREVIEW_PICTURE"];
		}?>
<? if($img_tip):?>
<?$imgtip = CFile::ResizeImageGet($img_tip, array('width'=>190, 'height'=>170), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
<img src='<?=$imgtip["src"]?>' width="<?=$imgtip["width"]?>" height="<?=$imgtip["height"]?>" />
<? endif;?>