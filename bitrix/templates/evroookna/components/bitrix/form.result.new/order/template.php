<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?/*=$arResult["FORM_ERRORS_TEXT"];*/?><?endif;?>

<?if ($arResult["isFormNote"] == "Y")
{
?>
<div class="error-result"><?=$arResult["FORM_NOTE"]?></div>
<?}?>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<?
/***********************************************************************************
						form questions
***********************************************************************************/
?>
<h3>ЗАКАЗАТЬ</h3>
<table class="form-table-order">
	<tbody>
		<tr>
			<td><input placeholder="Ваше имя" class="inputtext" name="form_text_31" value="" size="0" type="text"></td>
		</tr>
		<tr>
			<td><input placeholder="Ваш телефон" class="inputtext" name="form_text_32" value="" size="0" type="text"></td>
		</tr>
		<tr>
			<td><input placeholder="Ваш e-mail" class="inputtext" name="form_text_33" value="" size="0" type="text"></td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<td>
				<input type="hidden" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" name="web_form_submit"/>
				<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit2" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
			</td>
		</tr>
	</tfoot>
</table>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>