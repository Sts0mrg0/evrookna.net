<?define("NO_KEEP_STATISTIC", true);

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

CModule::IncludeModule('iblock');
$rs_Section = CIBlockElement::GetList(
    array(),
    array("IBLOCK_ID" => '24', 'ACTIVE' => 'Y',),
    false,
    false,
    array('ID', 'NAME')
);
while ($ar_Section = $rs_Section->Fetch()) {
    $arResult['EMEIL'] = $ar_Section['NAME'];
}

$post = (!empty($_POST)) ? true : false;
$result = array();
if ($post) {
    $name = mysql_real_escape_string($_POST['name']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $type = mysql_real_escape_string($_POST['type']);
    $time = mysql_real_escape_string($_POST['time']);
    $message1 = mysql_real_escape_string($_POST['message']);
	
    if ($type == 'cost') {
        $text = 'Расчет полной стоимости окон';
    }
    if ($type == 'questions') {
        $text = 'Бесплатная консультация';
    }
	
	if ($type == 'callback') {
        $text = 'Вам перезвонить';
    }
	if ($type == 'call') {
        $text = 'Вызов замерщика';
    }
    if (empty($phone))
    {
        $result['phone'] = 'NO';
    }

    if (empty($name))
    {
        $result['name'] = 'NO';
    }

    if (empty($result['phone']) && empty($result['name'])) {
        $to  = $arResult['EMEIL'];

		$subject = $text;

		$message = '
		<html>
			<head>
				<title>'.$text.'</title>
			</head>
			<body>
				<table border=1>
				    <THEAD>
						  <TR>
							   <TD>Имя</TD>
							   <TD>Телефон</TD>
							   <TD>Время (может отсутствовать))</TD>
							   <TD>Примечание (может отсутствовать)</TD>
						  </TR>
					</THEAD>
					<tr>
						<td>
							'.$name.'
						</td>
						<td>
							'.$phone.'
						</td>
						<td>
							'.$time.'
						</td>
						<td>
							'.$message1.'
						</td>
					</tr>
				</table>
			</body>
		</html>';

		$headers  = "Content-type: text/html; charset=utf8 \r\n";

		mail($to, $subject, $message, $headers);
		
        $result['end'] = 'YES';
    }


    echo(json_encode($result));
}