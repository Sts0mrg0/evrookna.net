<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?/*=$arResult["FORM_ERRORS_TEXT"];*/?><?endif;?>

<?/*=$arResult["FORM_NOTE"]*/?>


<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>

<input class="inputtext slider-name" name="form_text_34" value="" size="0" type="text" placeholder="Ваше имя">	
<input class="inputtext slider-name" name="form_text_35" value="" size="0" type="text" placeholder="Ваш телефон">	
<input type="hidden" name="web_form_submit" value="Y"/>

<input name="wfs" type="submit" onclick="yaCounter27207701.reachGoal('consult');return true;ga('send', 'event', 'consult', 'send');" value="получить консультацию">



<?=$arResult["FORM_FOOTER"]?>
<?
}else{ //endif (isFormNote)
?>
<style>
	#slider-form .index-form-2{
		display:block !important;
	}
</style>
<?}?>