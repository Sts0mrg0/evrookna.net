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


		<p class="modal-title">Вам перезвонить?</p>
		<input type="text" placeholder="Ваше имя" name="form_text_38" value="" class="modal1-name">
		<input type="text" placeholder="Ваш телефон" name="form_text_39" value="" class="modal1-phone">
		<input type="hidden" name="type" value="callback">
		<table>
			<tr>
				<td>Удобное время:</td>
				<td style="width: 72.8%;">		
<select class="inputselect" name="form_dropdown_SIMPLE_QUESTION_361" id="form_dropdown_SIMPLE_QUESTION_361">
<option value="40">Прямо сейчас</option><option value="41">С 09.00 - 13.00</option><option value="42">С 13.00 - 16.00</option><option value="43">С 16.00 - 19.00</option><option value="44">С 19.00 - 21.00</option><option value="45"> </option>
</select>
				</td>
			</tr>
		</table>
		<input type="hidden" name="web_form_submit" value="Y"/>
		<input type="submit" onclick="yaCounter27207701.reachGoal('call_back'); ga('send','event','call_back','send');" value="Отправить">

<?=$arResult["FORM_FOOTER"]?>
<?
}else{ //endif (isFormNote)
?>
<style>
	#modal_form1 .footer-form{
		display:block !important;
	}
</style>
<?}?>