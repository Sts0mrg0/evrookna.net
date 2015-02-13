<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$ELEMENT_ID = $_POST['id'];
CModule::IncludeModule('iblock');
CIBlockElement::Delete($ELEMENT_ID);
?>