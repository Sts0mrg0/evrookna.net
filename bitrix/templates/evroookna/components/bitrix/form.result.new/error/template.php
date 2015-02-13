<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
<?if ($arResult["isFormErrors"] == "Y"):?><?/*=$arResult["FORM_ERRORS_TEXT"];*/?><?endif;?>

<div class="error-result"><?=$arResult["FORM_NOTE"]?></div>

<?if ($arResult["isFormNote"] != "Y")
{
?>
<?=$arResult["FORM_HEADER"]?>

<table class="form-table-error">
	<tbody>
		<tr class="error-table-tr">
			<td><input placeholder="Введите ваше имя" class="inputtext" name="form_text_29" value="" size="0" type="text"></td>
			<td><input placeholder="Введите ваш телефон" class="inputtext" name="form_text_30" value="" size="0" type="text"></td>
		</tr>
		<tr>
			<td colspan="2">
				<input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(strlen(trim($arResult["arForm"]["BUTTON"])) <= 0 ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" />
			</td>
		</tr>
	</tbody>
</table>
<?=$arResult["FORM_FOOTER"]?>
<?
} //endif (isFormNote)
?>