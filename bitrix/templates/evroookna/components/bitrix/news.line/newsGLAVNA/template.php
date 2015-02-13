<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
		<h1><a href="/news/">Что нового?</a></h1>
		<div id="news_carousel" class="carousel">
	<ul>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
        	<li>
	<a class="news-title" href="<?echo $arItem["DETAIL_PAGE_URL"]?>" title="<?echo $arItem["NAME"]?>"><?echo $arItem["NAME"]?></a><br>
	<img alt="На старте новая акция!" class="annonce_img" width="60" height="60" src="<?echo $arItem["PREVIEW_PICTURE"]["SRC"]?>">
   	<span class="news-date"> <?echo $arItem["DISPLAY_ACTIVE_FROM"]?><br></span> 
	<?echo $arItem["PREVIEW_TEXT"]?></li>
    
	<?endforeach;?>
</ul>
	<div class="d_line"><span class="carosel_nav"></span></div>
</div>
