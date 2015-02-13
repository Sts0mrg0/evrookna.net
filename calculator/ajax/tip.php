<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?> 
		<?
		$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
		$arFilter = Array("IBLOCK_ID"=>11, "SECTION_ID"=>18, "ID"=>$_POST['id']);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();
			$arProps = $ob->GetProperties();
			$seria = $arProps['SERIA']['VALUE'];
		}?>
		<?$i = 1;
		$arSelect = Array("ID", "NAME", "IBLOCK_SECTION_ID");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
		$arFilter = Array("IBLOCK_ID"=>11, "SECTION_ID"=>19, "ID"=>$seria);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();?>
			<li <? if($i == 1){echo 'class="radioactive"';}?>>
				<input name="name_<?=$arFields['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$arFields['ID']?>" value="<?=$arFields['ID']?>" <? if($i++ == 1){echo 'checked="checked"';}?>/>
				<label for="id_<?=$arFields['ID']?>" class="input_img"></label>
				<label for="id_<?=$arFields['ID']?>"><?=$arFields['NAME']?></label>
			</li>
		<?}?>