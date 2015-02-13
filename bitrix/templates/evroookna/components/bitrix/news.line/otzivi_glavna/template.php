<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="main_reviews"><h1><a href="/reviews/">Отзывы</a></h1><div id="reviews_carousel" class="carousel">
	<ul>
	     
        <li>	
    <?
    $i=0;
    foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
   
            <a href="/reviews/" title="<?echo $arItem["NAME"]?>" class="reviews_main_item ">
	           <span class="reviews_name"><?echo $arItem["NAME"]?></span> <span class="reviews_date"> <?echo $arItem["DISPLAY_ACTIVE_FROM"]?></span><br>
	           <p><?echo $arItem["PREVIEW_TEXT"]?></p>	<div class="opacal"></div>
            </a>
            <?$i++?>
        <?if($i % 3 == 0){?>
        </li><li>
         <?}?>

	<?endforeach;?>
       </li>
	</ul>
 
	<div class="d_line"><span class="carosel_nav"></span></div>
</div>
<div></div>
	</div>	