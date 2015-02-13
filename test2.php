<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?> 
<?
$ELEMENT_ID = 525;  // код элемента
$PROPERTY_CODE = "ANSWER";  // код свойства
$PROPERTY_VALUE = "Синий";  // значение свойства

// Установим новое значение для данного свойства данного элемента
CIBlockElement::SetPropertyValuesEx($ELEMENT_ID, false, array($PROPERTY_CODE => $PROPERTY_VALUE));

?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>