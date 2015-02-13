<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;?>

<?/*=$arResult["FORM_NOTE"]*/?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<?/*
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
	?>
				<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS'])):?>
				<span class="error-fld" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"></span>
				<?endif;?>
				<?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?>
				<?=$arQuestion["IS_INPUT_CAPTION_IMAGE"] == "Y" ? "<br />".$arQuestion["IMAGE"]["HTML_CODE"] : ""?>
<?=$arQuestion["HTML_CODE"]?>
	<?
		}
	} //endwhile
*/?>

		<p class="modal-title">Вызов замерщика</p>
		<input type="text" placeholder="Ваше имя" name="form_text_46" value="" class="namename modal-name">
		<input type="text" placeholder="Ваш телефон" name="form_text_47" value="" class="namename modal-phone">
		<div class="date-box">


			<input type="text" placeholder="Примерное время" name="form_text_48" value="" class="modal-time">
			<div class="date-form">
			<?
			$APPLICATION->IncludeComponent(
				'bitrix:main.calendar',
				'',
				array(
					'FORM_NAME' => 'iblock_add',
					'INPUT_NAME' => "form_text_48",
					'INPUT_VALUE' => $value,
				),
				null,
				array('HIDE_ICONS' => 'Y')
			);?>
			</div>
		</div>
		<input type="hidden" name="type" value="call">
		<textarea placeholder="Примечание" name="form_textarea_49" class="message"></textarea>
		<p class="modal-text">Мы гарантируем, что персональные данные, которые вы нам сообщаете, 
		будут использованы исключительно для целей обработки ваших заказов. 
		Мы работаем в соответствии с Федеральным Законом от 
		27.07.2006 N 152-ФЗ "О ПЕРСОНАЛЬНЫХ ДАННЫХ"</p>
<input type="hidden" name="web_form_submit" value="Y"/>
		<input  type="submit" onclick="yaCounter27207701.reachGoal('еngineer'); ga('send','event','engineer','send');" value="Отправить">





<?=$arResult["FORM_FOOTER"]?>
<?
}else{ //endif (isFormNote)
?>
<style>
	#modal_form .footer-form{
		display:block !important;
	}
</style>
<?}?>