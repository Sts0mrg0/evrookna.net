<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="promotion_carousel" class="carousel">
			<ul>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
   
    	<li>
                <h2><strong><?echo $arItem["NAME"]?></strong></h2>
<p>	<?echo $arItem["PREVIEW_TEXT"]?></p></li>
	<?endforeach;?>
    	</ul>
			<div class="d_line"><span class="carosel_nav"></span></div>
		</div>


				