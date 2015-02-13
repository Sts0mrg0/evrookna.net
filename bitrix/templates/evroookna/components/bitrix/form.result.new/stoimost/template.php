<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?/*=$arResult["FORM_ERRORS_TEXT"];*/?><?endif;?>

<?/*=$arResult["FORM_NOTE"]*/?>



<?=$arResult["FORM_HEADER"]?>

<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>


<p>Узнайте полную стоимость окон для вас:</p>
<input type="text" placeholder="Ваше имя" name="form_text_36" value="" class="footer-name" />
<input type="text" placeholder="Ваш телефон" name="form_text_37" value="" class="footer-phone">
<input type="hidden" name="type" value="cost">
<input type="hidden" name="web_form_submit" value="Y"/>



<input  type="submit" onclick="yaCounter27207701.reachGoal('calculation'); ga('send','event','calculation','send');" value="рассчитать">


<?=$arResult["FORM_FOOTER"]?>
<?if ($arResult["isFormNote"] != "Y")
{
?>
<?
}else{ //endif (isFormNote)
?>
<style>
#order-left .footer-form{
 display:block !important; 
}
</style>
<?}?>
<div class="footer-form">
					<p style="font-size: 12px;">Ваша заявка отправлена.</p>
					<p style="font-size: 12px; margin-top:0;">Наши специалисты в ближайшее время свяжутся с Вами</p>
				</div>