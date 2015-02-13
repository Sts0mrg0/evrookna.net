<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<style>
.for_table {
    display: table-cell;
    padding: 7px;
    text-align: center;
}
</style>
<div style="display: table;">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
        
            <div class="for_table">  	
                 <a class="full_img" href="<?echo $arItem["PREVIEW_PICTURE"]["SRC"]?>"><img style="width: 220px; height: 300px;" src="<?echo $arItem["PREVIEW_PICTURE"]["SRC"]?>" /></a>
	       </div>
        
           <?$i++?>
        <?if($i % 4 == 0){?>
        </div><div style="display: table;">
         <?}?>
    <?endforeach;?>
    </div>
