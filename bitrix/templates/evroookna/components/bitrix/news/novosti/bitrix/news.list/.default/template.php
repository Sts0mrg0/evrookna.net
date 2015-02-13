<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="news-list">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    
    
    <div class="news-teaser" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<img alt="<?echo $arItem["NAME"]?>" class="news-img" width="60" height="60" src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" />	<p class="news-date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></p>
	<p class="news-title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></p>
	<p class="news-announce">	<?echo $arItem["PREVIEW_TEXT"];?></p>
</div>
    
    

<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>
