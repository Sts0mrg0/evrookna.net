<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<style>
.reviews-question {
    background-color: rgb(239, 242, 233);
    margin: 30px 0px 0px;
    }
.reviews-question, .reviews-answer {
    font-style: italic;
    padding: 10px;
    position: relative;
}
.reviews-question .handsaw.top {
    background-position: 0px 0px;
}
.handsaw.top {
    top: -5px;
}

.reviews-title {
    color: rgb(0, 0, 0);
    font-size: 18px;
    font-style: normal;
}
.reviews-date {
    color: rgb(168, 169, 164);
    font-size: 18px;
    font-style: normal;
}
#page p {
    margin-bottom: 20px;
    line-height: 20px;
    text-align: justify;
}
.handsaw.bottom {
    bottom: -5px;
}
.reviews-question .handsaw.bottom {
    background-position: 0px -5px;
}
</style>
<div class="nodus-selector-rows nodus-selector-rows-faq nodus-teaser-selector-rows nodus-teaser-selector-rows-faq nodus-selector-rows-1 nodus-selector-rows-faq-1 nodus-teaser-selector-rows-1 nodus-teaser-selector-rows-faq-1 nodus-selector-rows-first nodus-teaser-selector-rows-first nodus-selector-rows-faq-first nodus-datatype-selector-rows-faq">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>    
    	<div class="reviews">
	<div class="reviews-question">
		<div class="handsaw top"></div>
		<span class="reviews-title"><?echo $arItem["NAME"]?></span> <span class="reviews-date"><?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span>
		<p><?echo $arItem["PREVIEW_TEXT"]?></p>
        <div class="handsaw bottom"></div>
	</div>
	</div>
	<?endforeach;?>

	</div>