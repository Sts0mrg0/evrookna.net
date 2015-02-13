<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<div id="actions_carousel" class="carousel">
	<ul>
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<li>
	       <a href="<?echo $arItem["PREVIEW_TEXT"]?>" title="<?echo $arItem["NAME"]?>">
                <img width="940" height="380" src="<?echo $arItem["PREVIEW_PICTURE"]["SRC"]?>">
           </a>
        </li>
	<?endforeach;?>
           </ul>
	<div class="carosel_nav"></div>
    </div>	
    <div class="step_hand"><a id="step_hand-1" class="hand_min"></a></div>	

       	
	