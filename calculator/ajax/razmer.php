<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?> 
		<?
		$tip = $_POST['tip'];$seria = $_POST['seria'];$konst = $_POST['cons'];
		$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*", "PREVIEW_TEXT");
		$arFilter = Array("IBLOCK_ID"=>12, "PROPERTY_TIPHOUS"=>$tip, "PROPERTY_SERIAHOUS"=>$seria, "PROPERTY_CONSTRUCT"=>$konst);
		$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
		while($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();
 $arProps = $ob->GetProperties();
$height = $arProps['HEIGHT']['VALUE'];
$width = $arProps['WIDTH']['VALUE'];
?>
		<div class="shag1-box4-name">
			Укажите ширину и высоту оконного проема:
		</div>
		<div class="shag1-box4-inp">
			Ширина:<input type="text" value="<?=$width;?>"/> мм
		</div>
		<div class="shag1-box4-inp">
			Высота:<input type="text" value="<?=$height;?>"/> мм
		</div>

		<?}
?>