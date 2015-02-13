<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?>
<!--Все элементы калькулятора выводим в массив-->
<?$arResult = array();$svjazka = array();
$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*", "PREVIEW_TEXT", "PREVIEW_PICTURE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>30, "INCLUDE_SUBSECTIONS"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['FILDS'] = $arFields;
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['PROPS'] = $arProps;
	$svjazka[$arFields['ID']] = $arFields['IBLOCK_SECTION_ID'];
}?>	

<!---->
<!--Запись последнего-->
<?$i = 1;
$_POST['last'] = 1;
$pst_2 = $_POST;
unset($pst_2['ITEM']);
$_POST['ITEM'][] = $pst_2;
?>
<!--END-->

<?if($_POST['ITEM'][0]){?><?$ttd = 0;$iiii = 1;$abc=0;?>
	<?foreach($_POST['ITEM'] as $item){$abc++;?>
		<?
		if($item['last'] == 1){
			$posts = $item;
		}else{
			$post_mas = explode('/', $item);
			foreach($post_mas as $post_val){
				if(!empty($post_val)){
					$item_mas = explode('-', $post_val);
					$item_plus = explode('+', $item_mas[1]);
					if($item_plus[1]){
						$posts[$item_mas[0]][$item_plus[0]] = $item_plus[1];
					}else{
						$posts[$item_mas[0]] = $item_mas[1];
					}
				}
			}
		}
	?><?/*print_r($posts);*/?>
		<?/*$text .= '<tr><td><h3>Конструкция N'.$i++.'</h3></td><td></td></tr>';*/
		$text1 = "";
		$text1 .= '<tr><td style="min-width:160px;" class="calc_table_tr_td_1"><b>Решение: </b></td><td class="calc_table_tr_td_2">'.$arResult[$svjazka[$posts['name_166']]][$posts['name_166']]['FILDS']['NAME'].'</td></tr>';
		$text1 .= '<tr><td><b>Вид конструкции: </b></td><td>'.$arResult[$svjazka[$posts['name_165']]][$posts['name_165']]['FILDS']['NAME'].'</td></tr>';
		$text1 .= '<tr><td><b>Тип дома: </b></td><td>'.$arResult[$svjazka[$posts['name_168']]][$posts['name_168']]['FILDS']['NAME'].'</td></tr>';
		$text1 .= '<tr><td><b>Серия дома: </b></td><td>'.$arResult[$svjazka[$posts['name_167']]][$posts['name_167']]['FILDS']['NAME'].'</td></tr>';
		$ttd = 5;
		if(!empty($posts['WIDTH'])){
			$text1 .= '<tr><td><b>Ширина: </b></td><td>'.$posts['WIDTH'].' мм </td></tr>';
			$ttd++;
		}	
		if(!empty($posts['HEIGHT'])){
			$text1 .= '<tr><td><b>Высота: </b></td><td>'.$posts['HEIGHT'].' мм </td></tr>';
			$ttd++;
		}
		if(!empty($arResult[$svjazka[$posts['izgib']]][$posts['izgib']]['FILDS']['NAME'])){
			$text1 .= '<tr><td><b>Колличество изгибов: </b></td><td>'.$arResult[$svjazka[$posts['izgib']]][$posts['izgib']]['FILDS']['NAME'].'</td></tr>';
			$ttd++;
		}
		/*$text1 .= '<tr><td><b>Левая сторона окна: </b></td><td>'.$arResult[$svjazka[$posts['name_172']]][$posts['name_172']]['FILDS']['NAME'].'</td></tr>';
		$text1 .= '<tr><td><b>Правая сторона окна: </b></td><td>'.$arResult[$svjazka[$posts['name_173']]][$posts['name_173']]['FILDS']['NAME'].'</td></tr>';*/
		if(!empty($arResult[$svjazka[$posts['name_177']]][$posts['name_177']]['FILDS']['NAME'])){
			$text1 .= '<tr><td><b>Ламинация: </b></td><td>'.$arResult[$svjazka[$posts['name_177']]][$posts['name_177']]['FILDS']['NAME'].'</td></tr>';
			$ttd++;
		}
		$text1 .= '<tr><td><b>Выбор подоконника: </b></td><td>'.$arResult[$svjazka[$posts['name_178']]][$posts['name_178']]['FILDS']['NAME'];$ttd++;
		if($arResult[$svjazka[$posts['name_178']]][$posts['name_178']]['FILDS']['NAME'] != 'Не нужен'){
			$text1 .= ' глубина '.$posts['glubina_name_'.$posts['name_178']].' / ламинация '.$arResult[$svjazka[$posts['select_name_'.$posts['name_178']]]][$posts['select_name_'.$posts['name_178']]]['FILDS']['NAME'].'</td></tr>';
		}else{
			$text1 .= '</td></tr>';
		}
		$text1 .= '<tr><td><b>Выбор откосов: </b></td><td>'.$arResult[$svjazka[$posts['name_183']]][$posts['name_183']]['FILDS']['NAME'];$ttd++;
		if($arResult[$svjazka[$posts['name_183']]][$posts['name_183']]['FILDS']['NAME'] != 'Не нужен'){
			$text1 .= ' ширина '.$posts['glubina_name_'.$posts['name_183']].' мм / ламинация '.$arResult[$svjazka[$posts['select_name_'.$posts['name_183']]]][$posts['select_name_'.$posts['name_183']]]['FILDS']['NAME'].'</td></tr>';
		}else{
			$text1 .= '</td></tr>';
		}$ttd++;
		$text1 .= '<tr><td><b>Выбор отлива: </b></td><td>'.$arResult[$svjazka[$posts['name_186']]][$posts['name_186']]['FILDS']['NAME'];$ttd++;
		if($arResult[$svjazka[$posts['name_186']]][$posts['name_186']]['FILDS']['NAME'] != 'Не нужен'){
			$text1 .= ' размер '.$posts['glubina_name_'.$posts['name_186']].' мм / цвет '.$arResult[$svjazka[$posts['select_name_'.$posts['name_186']]]][$posts['select_name_'.$posts['name_186']]]['FILDS']['NAME'].'</td></tr>';
		}else{
			$text1 .= '</td></tr>';
		}$ttd++;
		if(!empty($posts['name_189'])){$ttd++;
			$text1 .= '<tr><td><b>Стеклопакет: </b></td><td>';
			foreach($posts['name_189'] as $ite){
				$text1 .= $arResult[$svjazka[$ite]][$ite]['FILDS']['NAME'].', '; 
			}
			$text1 .= '</td></tr>'; 
		}
		
		if(!empty($posts['name_190'])){$ttd++;
			$text1 .= '<tr><td><b>Дополнительные опции: </b></td><td>';
			foreach($posts['name_190'] as $ite){
				$text1 .= $arResult[$svjazka[$ite]][$ite]['FILDS']['NAME'].', '; 
			}
			$text1 .= '</td></tr>'; 
		}
/*		
		$text1 .= '<tr><td><b>Способ доставки </b></td><td>'.$arResult[$svjazka[$posts['name_191']]][$posts['name_191']]['FILDS']['NAME'].' / '.$posts['pole_'.$posts['name_191']].' км</td></tr>';
		$text1 .= '<tr><td><b>Этаж </b></td><td>'.$arResult[$svjazka[$posts['name_192']]][$posts['name_192']]['FILDS']['NAME'].' / '.$posts['pole_'.$posts['name_192']].'</td></tr>';
		$text1 .= '<tr><td><b>Монт раб </b></td><td>'.$arResult[$svjazka[$posts['name_193']]][$posts['name_193']]['FILDS']['NAME'].'</td></tr>';$ttd++;$ttd++;$ttd++;
*/		
		$text .= '<table width="100%" border="0" cellpadding="3">';
		$text .= '<tr><td><h3>Конструкция N'.$i++.'</h3></td><td></td><td rowspan="'.$ttd.'"><img src="http://www.eurookna.net/calculator/ajax/screens/'.$posts['getimg'].'.png" /></td></tr>';
		$text .= $text1;
		$text .= '<tr><td style="height:30px;" colspan="3"></td></tr>';
		$text .= '</table>';
	}?>
<?}



$el = new CIBlockElement;

$PROP = array();
$text .= '<table width="100%" border="0" cellpadding="3">';
$text .= '<tr><td><b>Способ доставки </b></td><td>'.$arResult[$svjazka[$_POST['name_191']]][$_POST['name_191']]['FILDS']['NAME'].' / '.$_POST['pole_'.$_POST['name_191']].' км</td></tr>';
$text .= '<tr><td><b>Этаж </b></td><td>'.$arResult[$svjazka[$_POST['name_192']]][$_POST['name_192']]['FILDS']['NAME'].' / '.$_POST['pole_'.$_POST['name_192']].'</td></tr>';
$text .= '<tr><td><b>Монт раб </b></td><td>'.$arResult[$svjazka[$_POST['name_193']]][$_POST['name_193']]['FILDS']['NAME'].'</td></tr>';
$text .= '<tr><td><b>Имя </b></td><td>'.$_POST['licho'].'</td></tr>';
$text .= '<tr><td><b>Телефона </b></td><td>'.$_POST['number'].'</td></tr>';
$text .= '<tr><td><b>E-mail </b></td><td>'.$_POST['e-mail'].'</td></tr>';
$text .= '</table>';

$PROP[110] = $_POST['licho']; 
$PROP[111] = $_POST['number'];   
$PROP[112] = $_POST['e-mail']; 
$PROP[137] = $abc; 
     
/*$text = 	*/ 
	 
	 
$arLoadProductArray = Array(
  "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
  "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
  "IBLOCK_ID"      => 33,
  "NAME"           => "Заявку от ".$_POST['licho'],
  "ACTIVE"         => "Y",            // активен
  "PREVIEW_TEXT"   => $text,
  "PREVIEW_TEXT_TYPE" => "HTML",
	"PROPERTY_VALUES"=> $PROP,
  );

if($PRODUCT_ID = $el->Add($arLoadProductArray))
  $PRODUCT_ID;
else
  $el->LAST_ERROR;


$arEventFields = array(
    "NUMBER_ORDER" => $PRODUCT_ID,
    "DATE"  => date("Y-m-d H:i:s"),
    "NAME"         => $_POST['licho'],
    "NUMBER"            => $_POST['number'],
	"EMAIL" => $_POST['e-mail'],
	"ORDER" => $text,
    );

CEvent::Send("calculator", SITE_ID, $arEventFields, 'N', 25);
CEvent::Send("calculator", SITE_ID, $arEventFields, 'N', 26);
?>
<div class="otpravka_box">
	<div class="otpravka_box_1">Спасибо! Ваша заявка N<?=$PRODUCT_ID?> принята на расчет.</div>
	<?/*?><div class="otpravka_box_2"><a href="#">Описание заказа</a></div>
	<div class="otpravka_box_3">.........................</div><?*/?>
	<div class="otpravka_box_4">Наш менеджер свяжется с Вами в течение часа и сообщит точную стоимость. Для самостоятельной связи с менеджером Вы можете позвонить по номеру 8(495) 215-15-45 и сообщить номер заявки.</div>
	<div class="otpravka_box_5"><a target="_blank" href="/calculator/print.php?id=<?=$PRODUCT_ID?>">Распечатать</a>
<script>
yaCounter27207701.reachGoal('calc_online_send');
ga('send','event','calc_online_send','send');</script>
</div>
</div>



