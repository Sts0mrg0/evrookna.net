<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<? CModule::IncludeModule('iblock');?> 
<script type="text/javascript">$(function(){$('select').selectbox();});</script>
<?if(!isset($_POST['items_s'])){
	$_POST['items_s'] = 5555;
}?>
<?if(isset($_POST['items_s'])){
	if($_POST['items_s'] == 5555){//проверка на новую конструкцию
			if($_POST['items_s_active'] != $_POST['items_s']){//проверка на 1 заход
				if(!empty($_POST['ITEM_1'])){
					$pst = $_POST['ITEM_1'];
					$x_items = $_POST['ITEM'];
					$x_items_s = $_POST['items_s'];	
					$post_mas = explode('/', $pst);
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
					$posts['ITEM'] = $x_items;
					$posts['items_s'] = $x_items_s;
					$posts['items_s_active'] = $x_items_s;
					$_POST = $posts;
					$_POST['ITEM_1'] = $pst;
				}else{
					$x_items_s = 5555;
					$pst = $_POST['ITEM'];
					$_POST = "";
					$_POST['ITEM'] = $pst;
					$_POST['items_s'] = $x_items_s;
					$_POST['items_s_active'] = $x_items_s;
				}
			}else{
			
				$pst_2 = $_POST;
				unset($pst_2['ITEM']);
				unset($pst_2['ITEM_1']);
				$post_text2 = '';
				foreach($pst_2 as $pst_key=>$pst_val){
					if(is_array($pst_val)){
						foreach($pst_val as $pstv_key=>$pstv_val){
							$post_text2 .= $pst_key."-".$pstv_key."+".$pstv_val."/";
						}
					}else{
						$post_text2 .= $pst_key."-".$pst_val."/";
					}
				}
				$_POST['ITEM_1'] = $post_text2;
			}
	}else{//проверка на новую конструкцию
		if($_POST['items_s_active'] == $_POST['items_s']){//проверка на 1 заход
			$pst_2 = $_POST;
			unset($pst_2['ITEM']);
			unset($pst_2['ITEM_1']);
			$post_text2 = '';
			foreach($pst_2 as $pst_key=>$pst_val){
				if(is_array($pst_val)){
					foreach($pst_val as $pstv_key=>$pstv_val){
						$post_text2 .= $pst_key."-".$pstv_key."+".$pstv_val."/";
					}
				}else{
					$post_text2 .= $pst_key."-".$pst_val."/";
				}
			}
			$_POST['ITEM'][$_POST['items_s']] = $post_text2;
		}
		$pst = $_POST['ITEM'][$_POST['items_s']];
		$x_items = $_POST['ITEM'];
		$x_items_1 = $_POST['ITEM_1'];
		$x_items_s = $_POST['items_s'];	
		$post_mas = explode('/', $pst);
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
		$posts['ITEM'] = $x_items;
		$posts['ITEM_1'] = $x_items_1;
		$posts['items_s'] = $x_items_s;
		$posts['items_s_active'] = $x_items_s;
		$_POST = $posts;
	}
}?>
<?/*print_r($_POST);*/?>
<!--Получаем все элементы и распределяем по -->
<?$arResult = array();
$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*", "PREVIEW_TEXT", "PREVIEW_PICTURE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>30, "SECTION_ID"=>164, "INCLUDE_SUBSECTIONS"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['FILDS'] = $arFields;
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['PROPS'] = $arProps;
	$svjazka[$arFields['ID']] = $arFields['IBLOCK_SECTION_ID'];
}?>	
<?if($_GET['serialize'] == 'y'){
	$pst_item = $_POST['ITEM'];
	if($_POST['ITEM']){
		foreach($_POST['ITEM'] as $ite){
			$item_pst[] = $ite;
		}
		unset($_POST['ITEM']);
	}
/*разбираем массив*/
		$post_text = '';
		foreach($_POST as $pst_key=>$pst_val){
			if(is_array($pst_val)){
				foreach($pst_val as $pstv_key=>$pstv_val){
					$post_text .= $pst_key."-".$pstv_key."+".$pstv_val."/";
				}
			}else{
				$post_text .= $pst_key."-".$pst_val."/";
			}
		}
		$item_pst[] = $post_text;
	/*собираем массив*/
		/*$post_mas = explode('/', $post_text);
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
		}*/

		/*$_POST = "";*/
		$items_s = $_POST['items_s'];$items_s_active = $_POST['items_s_active'];$ITEM_1 = $_POST['ITEM_1'];$name_191 = $_POST['name_191'];$name_192 = $_POST['name_192'];$name_193 = $_POST['name_193'];$licho = $_POST['licho'];$number = $_POST['number'];$email = $_POST['e-mail'];
		$_POST = "";
		$_POST['items_s'] = $items_s;$_POST['items_s_active'] = $items_s_active;$_POST['ITEM_1'] = $ITEM_1;$_POST['name_191'] = $name_191;$_POST['name_192'] = $name_192;$_POST['name_193'] = $name_193;$_POST['licho'] = $licho;$_POST['number'] = $number;$_POST['e-mail'] = $email;
		/*print_r($_POST);*/
}?>

<form action="" id="shag-1">
<?foreach($item_pst as $item_val){?>
	<input name="ITEM[]" type="hidden" value="<?=$item_val?>" />
<?}?>
<?foreach($_POST as $post_key=>$post_item){?>
	<?if(is_array($post_item)){?>
		<?foreach($post_item as $post_item_item){?>
		<input name="<?=$post_key?>[]" type="hidden" value="<?=$post_item_item?>" />
		<?}?>
	<?}else{?>
		<input name="<?=$post_key?>" type="hidden" value="<?=$post_item?>" />
	<?}?>
<?}?>
<div id="shag1-reshenie" class="shag1-box1">
	<div class="shag1-box1-name"><div class="shag1-reshenie-number shag1-reshenie-number-1">1</div>Выберите решение:</div>
	<div class="shag1-box1-ul">
		<ul id="shag1-box1-ul-ul">
		<?$i = 1;$RESH = IntVal($_POST['name_166']);
		foreach($arResult['166'] as $item){?>
			<?if($i == 1 && empty($RESH) || $RESH == $item['FILDS']['ID']){
				$konstr = $item['PROPS']['KONSTR']['VALUE'];
				$descrip = $item['FILDS']["PREVIEW_TEXT"];?>
				<li class="radioactive">
					<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" checked="checked" />
					<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
					<label for="id_<?=$item['FILDS']['ID'];?>"><span><?$i++;?></span> <?=$item['FILDS']['NAME']?></label>
				</li>
			<?}else{?>
				<li>
					<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" />
					<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
					<label for="id_<?=$item['FILDS']['ID'];?>"><span><?$i++;?></span> <?=$item['FILDS']['NAME']?></label>
				</li>
			<?}?>
		<?}?>
		</ul>
	</div>
	<div class="clear-both"></div>
</div>
<div  id="shag1-konstruc" class="shag1-box1">
	<div class="shag1-box1-name"><div class="shag1-reshenie-number shag1-reshenie-number-1">2</div>Выберите вид конструкции:</div>
	<div class="shag1-box1-ul">
		<ul>
		<?$i = 1;$KONSTR = IntVal($_POST['name_165']);
		foreach($konstr as $konstr_item){
			$item = $arResult['165'][$konstr_item];
			?>
			<? if($i == 1 && (empty($KONSTR) || !in_array($KONSTR, $konstr)) || $KONSTR == $item['FILDS']['ID']){?>
				<?$kon_izgib = $item['FILDS']['ID'];?>
				<?
				if(!empty($item['FILDS']["PREVIEW_TEXT"])){
					$descrip = $item['FILDS']["PREVIEW_TEXT"];
				}
				?>
				<li class="radioactive">
					<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" checked="checked"/>
					<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
					<label for="id_<?=$item['FILDS']['ID']?>"><span><?$i++;?></span> <?=$item['FILDS']['NAME']?></label>
				</li>
			<?}else{?>
				<li>
					<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" />
					<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
					<label for="id_<?=$item['FILDS']['ID']?>"><span><?$i++;?></span> <?=$item['FILDS']['NAME']?></label>
				</li>
			<?}?>
		<?}?>
		</ul>
	</div>
	<div class="clear-both"></div>
</div>
<div class="shag1-boxbox">
	<div class="shag1-box2">
		<div class="shag1-box2-name shagboxname"><div class="shag1-reshenie-number shag1-reshenie-number-2">3</div>
			Выберите тип дома:
		</div>
		<div class="shag1-boxbox-left">
			<ul>
		<?$i = 1;$TIPHOUSE = IntVal($_POST['name_168']);
		foreach($arResult['168'] as $item){?>
			<?if($i++ == 1 && empty($TIPHOUSE) || $TIPHOUSE == $item['FILDS']['ID']){
				$seria = $item['PROPS']['SERIA']['VALUE'];
				$tip_izgib = $item['FILDS']['ID'];
			?>
			<li class="radioactive">
				<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" checked="checked"/>
				<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
				<label for="id_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
			</li>
			<?}else{?>
				<li>
					<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" />
					<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
					<label for="id_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
				</li>
			<?}?>
		<?}?>
			</ul>
		</div>
		<div class="shag1-boxbox-right">
		<? $APPLICATION->ShowProperty("ser_img", "Нет изображения"); ?>

		</div>
	</div>
	<div class="shag1-box3">
		<div class="shag1-box3-name shagboxname"><div class="shag1-reshenie-number shag1-reshenie-number-2">4</div>
			Выберите серию дома:
		</div>
		<div class="shag1-boxbox3">
			<ul>
		<?$i = 1;$SERHOUSE = IntVal($_POST['name_167']);
		foreach($seria as $seria_item){
			$item = $arResult['167'][$seria_item];
			if($i++ == 1 && (empty($SERHOUSE) || !in_array($SERHOUSE, $seria)) || $SERHOUSE == $item['FILDS']['ID']){?>
			<?$ser_izgib = $item['FILDS']['ID'];?>
			<?if($item['FILDS']["PREVIEW_PICTURE"]){?>
				<?$imgtip = CFile::ResizeImageGet($item['FILDS']["PREVIEW_PICTURE"], array('width'=>190, 'height'=>170), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
				<?$res = '<img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" />';?>
				<?$APPLICATION->SetPageProperty("ser_img", $res);?>
				
			<?}?>
				<li class="radioactive">
					<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" checked="checked"/>
					<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
					<label for="id_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
				</li>
			<?}else{?>
				<li>
					<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>"/>
					<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
					<label for="id_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
				</li>
			<?}?>
		<?}?>
			</ul>
		</div>
	</div>
	<div class="shag1-box4">
		<div class="shag1-box4-name shagboxname"><div class="shag1-reshenie-number shag1-reshenie-number-3">5</div>
		<?if($_POST['name_166'] == 1108){?>
			Укажите параметры дверного проема:
		<?}else{?>
			Укажите параметры оконного проема:
		<?}?>
		</div>
		<?
		$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
		$arFilter = Array("IBLOCK_ID"=>31, "SECTION_ID"=>174, "INCLUDE_SUBSECTIONS"=>"Y", "PROPERTY_TIPHOUS" => $tip_izgib, "PROPERTY_SERIAHOUS" => $ser_izgib, "PROPERTY_CONSTRUCT" => $kon_izgib);
		$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
		if($ob = $res->GetNextElement()){ 
			$arFields = $ob->GetFields();
			$arProps = $ob->GetProperties();?>
			<div class="shag1-box4-inp">
				<span>Ширина:</span><input type="text" name="WIDTH" value="<? echo $arProps['WIDTH']['VALUE'];?>" /> мм
			</div>
			<div class="shag1-box4-inp">
				<span>Высота:</span><input type="text" name="HEIGHT" value="<? echo $arProps['HEIGHT']['VALUE'];?>" /> мм
			</div>
		<?}else{?>
			<div class="shag1-box4-inp">
				<span>Ширина:</span><input type="text" name="WIDTH" value="<?=htmlspecialchars($_POST['WIDTH']);?>" /> мм
			</div>
			<div class="shag1-box4-inp">
				<span>Высота:</span><input type="text" name="HEIGHT" value="<?=htmlspecialchars($_POST['HEIGHT']);?>" /> мм
			</div>
		<?}?>
		<?if($kon_izgib == 1113){?>
		<div class="shag1-box4-balkon">
			<div class="shag1-box4-name shagboxname">
				Укажите параметры<br /> балконной двери:
			</div>
			<div class="shag1-box4-inp">
				<span>Ширина:</span><input type="text" name="WIDTH_2" value="<?=htmlspecialchars($_POST['WIDTH_2']);?>" /> мм
			</div>
			<div class="shag1-box4-inp">
				<span>Высота:</span><input type="text" name="HEIGHT_2" value="<?=htmlspecialchars($_POST['HEIGHT_2']);?>"" /> мм
			</div>
		</div>	
		<?}?>
		
		
		<?if($_POST['name_166'] == 1107){?>
		<div id="quanty_stvorok" class="shag1-box4-balkon">
			<div class="shag1-box4-name shagboxname">
				Выберите кол-во створок:
			</div>
			<div class="shag1-box4-box"><?$ji = 0;$jii = 1;$QUST = IntVal($_POST['name_213']);?>
				<?foreach($arResult['213'] as $item){?>
					<?if($ji == 0){?>
						<ul class="shag1-box4-box-left shag1-box4-box-left-<?=$jii++?>">
					<?}?>
					<?if($jii == 2 && $ji == 0 && empty($QUST) || $QUST == $item['FILDS']['ID']){?>
						<li class="radioactive">
							<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" checked="checked"/>
							<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="id_<?=$item['FILDS']['ID']?>"> - <?=$item['FILDS']['NAME']?></label>
						</li>
					<?}else{?>
						<li>
							<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>"/>
							<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="id_<?=$item['FILDS']['ID']?>"> - <?=$item['FILDS']['NAME']?></label>
						</li>
					<?}?>
					<?if($ji++ == 3){$ji = 0;?>
						</ul>
					<?}?>
				<?}?>
				<?if($ji < 5 && $ji != 0){?>
					</ul>
				<?}?>
			</div>
		</div>	
		<?}?>
		<?if($kon_izgib == 1113 && ($_POST['balkon_dver'] == 1468 || $_POST['balkon_dver'] == 1470 || empty($_POST['balkon_dver']))){?>
		<div id="quanty_stvorok" class="shag1-box4-balkon quanty_stvorok_2">
			<div class="shag1-box4-name shagboxname">
				Выберите кол-во створок:
			</div>
			<div class="shag1-box4-box"><?$ji = 0;$jii = 1;$QUST = IntVal($_POST['name_220']);?>
				<?foreach($arResult['220'] as $item){?>
					<?if($ji == 0){?>
						<ul class="shag1-box4-box-left shag1-box4-box-left-<?=$jii++?>">
					<?}?>
					<?if($jii == 3 && $ji == 0 && empty($QUST) || $QUST == $item['FILDS']['ID']){?>
						<li class="radioactive">
							<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" checked="checked"/>
							<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="id_<?=$item['FILDS']['ID']?>"> - <?=$item['FILDS']['NAME']?></label>
						</li>
					<?}else{?>
						<li>
							<input name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" type="radio" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>"/>
							<label for="id_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="id_<?=$item['FILDS']['ID']?>"> - <?=$item['FILDS']['NAME']?></label>
						</li>
					<?}?>
					<?if($ji++ == 0){$ji = 0;?>
						</ul>
					<?}?>
				<?}?>
				<?if($ji < 1 && $ji != 0){?>
					</ul>
				<?}?>
			</div>
		</div>	
			
		<?}?>
		
		
	</div>
	<div class="shag1-box5">
	<!-- Размеры картинок -->
	<?
	if($kon_izgib == 1113){
		$height = 320;
		$width = 358;
	}else if($_POST['name_166'] == 1107){
		$height = 420;
		$width = 458;
	}else{
		$height = 420;
		$width = 458;
	}
	?>
	<!-- END -->
	<!-- Получаем картинки -->		
	<?/*$kon_izgib = $_POST['name_165'];*/
	$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>31, "SECTION_ID"=>175, "INCLUDE_SUBSECTIONS"=>"Y", "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
	while($ob = $res->GetNextElement()){ 
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['OKNO_2'] = $arProps["OKNO_2"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['OKNO_3'] = $arProps["OKNO_3"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['CVET_OKNO'] = $arProps["CVET_OKNO"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['CVET_OKNO_2'] = $arProps["CVET_OKNO_2"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['CVET_OKNO_3'] = $arProps["CVET_OKNO_3"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['STVORKA_7'] = $arProps["STVORKA_7"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['OKNO_11'] = $arProps["OKNO_11"]["VALUE"];
			$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['OKNO_12'] = $arProps["OKNO_12"]["VALUE"];
			
			if($arFields['IBLOCK_SECTION_ID'] == 205){
				$img_fon[$arProps['CONSTRUCT']['VALUE']] = $arProps["OKNO"]["VALUE"];
			}else if($arFields['IBLOCK_SECTION_ID'] == 206){
				if($arProps['CONSTRUCT']['VALUE'] == 1113){
					$img_podokonnik[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
					$img_podokonnik[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO_2'] = $arProps["OKNO_2"]["VALUE"];
				}else{
					$img_podokonnik[$arProps['CONSTRUCT']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
					$img_podokonnik[$arProps['CONSTRUCT']['VALUE']]['OKNO_2'] = $arProps["OKNO_2"]["VALUE"];
				}
			}else if($arFields['IBLOCK_SECTION_ID'] == 207){
				if($arProps['CONSTRUCT']['VALUE'] == 1113){
					$img_otkosi[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
					$img_otkosi[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO_2'] = $arProps["OKNO_2"]["VALUE"];
				}else{
					$img_otkosi[$arProps['CONSTRUCT']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
					$img_otkosi[$arProps['CONSTRUCT']['VALUE']]['OKNO_2'] = $arProps["OKNO_2"]["VALUE"];
				}
			}else if($arFields['IBLOCK_SECTION_ID'] == 212){
				$img_fon_balokon[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
				$img_fon_balokon[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO_2'] = $arProps["OKNO_2"]["VALUE"];
				$img_fon_balokon[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO_3'] = $arProps["OKNO_3"]["VALUE"];
				$img_fon_balokon[$arProps['CONSTRUCT']['VALUE']][$arProps['BALKON_2']['VALUE']]['OKNO_4'] = $arProps["CVET_OKNO"]["VALUE"];
			}else if($arFields['IBLOCK_SECTION_ID'] == 214){
				$img_fon_lodgi[$arProps['CONSTRUCT']['VALUE']][$arProps['QUANTY_STV']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
			}else if($arFields['IBLOCK_SECTION_ID'] == 215){
				$img_fon_lodgi[$arProps['CONSTRUCT']['VALUE']][$arProps['QUANTY_STV']['VALUE']]['OKNO'] = $arProps["OKNO"]["VALUE"];
			}
		$stvorka_img[$arProps['CONSTRUCT']['VALUE']][$arProps['STVORKA']['VALUE']]['HTML'] = $arProps["CSS"]["~VALUE"]["TEXT"];
		/*print_r($arProps["CSS"]);*/
	}?>
	<!-- END -->
	<!-- Меняем фон -->	
	<?if($_POST['name_166'] == 1107){?>
			<?if(!empty($img_fon_lodgi[$kon_izgib][$_POST['name_213']]['OKNO'])){
				$img_fon_active = $img_fon_lodgi[$kon_izgib][$_POST['name_213']]['OKNO'];
				$imgtip = CFile::ResizeImageGet($img_fon_lodgi[$kon_izgib][$_POST['name_213']]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}?>
	<?}else if($kon_izgib == 1113){?>
		<?if($_POST['name_177'] == 1316 || $_POST['name_177'] == 1318){?>
			<?if($_POST['name_220'] == 1565 && $_POST['balkon_dver'] != 1469){?>
				<?if(!empty($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_4'])){
					$img_fon_active = $img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_4'];
					$imgtip = CFile::ResizeImageGet($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_4'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
				}?>
			<?}else{?>
				<?if(!empty($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_2'])){
					$img_fon_active = $img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_2'];
					$imgtip = CFile::ResizeImageGet($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
				}?>
			<?}?>
		<?}else{?>
			<?if($_POST['name_220'] == 1565 && $_POST['balkon_dver'] != 1469){?>
				<?if(!empty($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_3'])){
					$img_fon_active = $img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_3'];
					$imgtip = CFile::ResizeImageGet($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO_3'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
				}?>
			<?}else{?>
				<?if(!empty($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO'])){
					$img_fon_active = $img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO'];
					$imgtip = CFile::ResizeImageGet($img_fon_balokon[$kon_izgib][$_POST['balkon_dver']]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
				}?>
			<?}?>
		<?}?>
	<?}else if(($_POST['name_177'] == 1316 || $_POST['name_177'] == 1318) && ($_POST['name_166'] == 1105 || $_POST['name_166'] == 1106 || $_POST['name_166'] == 1108)){?>
		<?if(!empty($img_fon[$kon_izgib])){
			$img_fon_active = $img_fon[$kon_izgib];
			$imgtip = CFile::ResizeImageGet($img_fon[$kon_izgib], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
			$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
		}?>
	<?}?>
	<!-- END -->
	<?
	if($_POST['name_166'] == 1107){
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_1']['VALUE'];
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_2']['VALUE'];
		if($_POST['name_213'] == 1475){
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
		}else if($_POST['name_213'] == 1476){
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_4']['VALUE'];
		}else if($_POST['name_213'] == 1477){
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_4']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_5']['VALUE'];
		}else if($_POST['name_213'] == 1478){
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_4']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_5']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_6']['VALUE'];
		}else if($_POST['name_213'] == 1479){
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_4']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_5']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_6']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_7']['VALUE'];
		}else if($_POST['name_213'] == 1480){
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_4']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_5']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_6']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_7']['VALUE'];
			$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_8']['VALUE'];
		}
	}else if($_POST['name_165'] == 1113 && $_POST['name_220'] == 1565 && $_POST['balkon_dver'] == 1470){
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_1']['VALUE'];
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_2']['VALUE'];
	}else if($_POST['name_165'] == 1113 && $_POST['name_220'] == 1565 && $_POST['balkon_dver'] == 1468){
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_1']['VALUE'];
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
	}else{
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_1']['VALUE'];
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_2']['VALUE'];
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_3']['VALUE'];
		$stvorka_arr[] = $arResult[$svjazka[$kon_izgib]][$kon_izgib]['PROPS']['STVORKA_4']['VALUE'];
	}

	$iii = 1;$iiii = 6;
	foreach($stvorka_arr as $stvorka){?>
		<?if(!empty($stvorka)){?><?$left_wind = '';?>
		<div class="shag1-box5-left <?if($iii == 2){echo 'shag1-box5-right';}else if($iii == 3){ echo 'shag1-box5-stvorka';}else if($iii == 4){echo 'shag1-box5-pvh';}else if($iii > 4){echo "shag1-box5-left-".$iii;}?>">
			<span><?=$iiii++;?><?$iii++;?></span>
			<ul>
			<?foreach($stvorka as $item){?>
				<?if($_POST['name_'.$svjazka[$item]] == $item){?>
				<?$left_wind = $item;?>
				<li class="active">
					<input name="name_<?=$svjazka[$item]?>" type="radio" id="id_<?=$item?>" value="<?=$item?>" checked="checked"/>
					<label for="id_<?=$item?>"><?=$arResult[$svjazka[$item]][$item]['FILDS']['NAME'];?></label>
				</li>
				<?}else{?>
				<li>
					<input name="name_<?=$svjazka[$item]?>" type="radio" id="id_<?=$item?>" value="<?=$item?>"/>
					<label for="id_<?=$item?>"><?=$arResult[$svjazka[$item]][$item]['FILDS']['NAME'];?></label>
				</li>
				<?}?>
			<?}?>
			</ul>
		</div>
		<?if($_POST['name_166'] == 1107){//если выход на балкон?>
			<?
		if($_POST['name_213'] == 1475){
			if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_2'])){
				$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}
		}else if($_POST['name_213'] == 1476){
			if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_3'])){
				$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_3'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}
		}else if($_POST['name_213'] == 1477){
			if(!empty($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO'])){
				$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}
		}else if($_POST['name_213'] == 1478){
			if(!empty($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_2'])){
				$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}
		}else if($_POST['name_213'] == 1479){
			if(!empty($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_3'])){
				$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_3'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}
		}else if($_POST['name_213'] == 1480){
			if(!empty($stvorka_img[$kon_izgib][$left_wind]['STVORKA_7'])){
				$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['STVORKA_7'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}
		}else{
			if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO'])){
				$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
				$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
			}
		}
			?>
		<?}else if($kon_izgib == 1113){//если выход на балкон?>
			<?if(($_POST['name_177'] == 1316 || $_POST['name_177'] == 1318)){//если цветное?>
				<?if($_POST['balkon_dver'] == 1470){?>
					<?if($_POST['name_220'] == 1565 && ($left_wind == 1301 || $left_wind == 1300)){?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_12'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_12'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}else{?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}?>				
				<?}else if($_POST['balkon_dver'] == 1469){?>
					<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_2'])){
						$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
					}?>
				<?}else{?>
					<?if($_POST['name_220'] == 1565 && ($left_wind == 1297 || $left_wind == 1298)){?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_12'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_12'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}else{?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_3'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['CVET_OKNO_3'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}?>
				<?}?>
			<?}else{//если не цветное?>
				<?if($_POST['balkon_dver'] == 1470){?>
					<?if($_POST['name_220'] == 1565 && ($left_wind == 1301 || $left_wind == 1300)){?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_11'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_11'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}else{?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}?>
				<?}else if($_POST['balkon_dver'] == 1469){?>
					<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_2'])){
						$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
						$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
					}?>
				<?}else{?>
					<?if($_POST['name_220'] == 1565 && ($left_wind == 1297 || $left_wind == 1298)){?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_11'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_11'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}else{?>
						<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_3'])){
							$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_3'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}?>
				<?}?>
			<?}?>
		<?}else{?>
			<?if(($_POST['name_177'] == 1316 || $_POST['name_177'] == 1318) && !empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_2']) && ($_POST['name_166'] == 1105 || $_POST['name_166'] == 1106 || $_POST['name_166'] == 1108)){?>
				<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO_2'])){
					$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
				}?>
			<?}else{?>
				<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['OKNO'])){
					$imgtip = CFile::ResizeImageGet($stvorka_img[$kon_izgib][$left_wind]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
					$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
				}?>
			<?}?>
		<?}?>	
			
			<?if(!empty($stvorka_img[$kon_izgib][$left_wind]['HTML'])){
				$res_css .= $stvorka_img[$kon_izgib][$left_wind]['HTML'];
			}?>
		
		<?}?>
	<?}?>

<?if($kon_izgib == 1171 || $kon_izgib == 1172){?>
		<style>	
		.shag1-box5-left{
			left:70px;
			top:110px;
		}  
		</style>
<?}
if($kon_izgib == 1110){?>
		<style>	.shag1-box5-left{left:85px;}  
		.shag1-box5-left.shag1-box5-right{left:270px;}
		</style>
<?}else if($kon_izgib == 1111){?>
		<style>	
		.shag1-box5-left{top:145px;left:62px;}  
		.shag1-box5-left.shag1-box5-right{left:205px; }
		.shag1-box5-left.shag1-box5-stvorka{left:355px; }
		</style>
<?}else if($kon_izgib == 1113 && $_POST['name_220'] == 1565 && $_POST['balkon_dver'] != 1469){?>
		<style>	
		.shag1-box5{width:360px !important; }
		.shag1-box6{width:400px !important;z-index:6;}
		<?if($_POST['balkon_dver'] == 1470){?>
			.shag1-box5-left{top:90px;left:34px;}  
			.shag1-box5-left.shag1-box5-right{left:182px; }
		<?}else{?>
			.shag1-box5-left{top:90px;left:90px;}  
			.shag1-box5-left.shag1-box5-right{left:228px; }
		<?}?>
		</style>
<?}else if($kon_izgib == 1113){?>
		<style>	
		.shag1-box5{width:360px !important; }
		.shag1-box6{width:400px !important;z-index:6;}
		<?if($_POST['balkon_dver'] == 1470){?>
			.shag1-box5-left{top:90px;left:34px;}  
			.shag1-box5-left.shag1-box5-right{left:137px; }
			.shag1-box5-left.shag1-box5-stvorka{left:228px; }
		<?}else if($_POST['balkon_dver'] == 1469){?>
			.shag1-box5-left{top:90px;left:34px;}  
			.shag1-box5-left.shag1-box5-right{left:130px; }
			.shag1-box5-left.shag1-box5-stvorka{left:227px; }
		<?}else{?>
			.shag1-box5-left{top:90px;left:32px;}  
			.shag1-box5-left.shag1-box5-right{left:125px; }
			.shag1-box5-left.shag1-box5-stvorka{left:230px; }
		<?}?>
		</style>
<?}else if($kon_izgib == 1168){?>
		<style>	
			.shag1-box5-left{top:245px;left:53px;}  
		.shag1-box5-left.shag1-box5-right{left:180px; }
		</style>
<?}else if($kon_izgib == 1169 || $kon_izgib == 1170){?>
		<style>	
			<?if($_POST['name_213'] == 1480){?>
			.shag1-box5-left{top:105px;left:24px;}  
			.shag1-box5-left.shag1-box5-right{left:77px; }
			.shag1-box5-left.shag1-box5-stvorka{left:128px; }
			.shag1-box5-left.shag1-box5-pvh{left:181px; }
			.shag1-box5-left.shag1-box5-left-5{left:234px; }
			.shag1-box5-left.shag1-box5-left-6{left:285px; }
			.shag1-box5-left.shag1-box5-left-7{left:336px; }
			.shag1-box5-left.shag1-box5-left-8{left:388px; }
			<?}else if($_POST['name_213'] == 1479){?>
			.shag1-box5-left{top:105px;left:27px;}  
			.shag1-box5-left.shag1-box5-right{left:87px; }
			.shag1-box5-left.shag1-box5-stvorka{left:147px; }
			.shag1-box5-left.shag1-box5-pvh{left:208px; }
			.shag1-box5-left.shag1-box5-left-5{left:268px; }
			.shag1-box5-left.shag1-box5-left-6{left:327px; }
			.shag1-box5-left.shag1-box5-left-7{left:387px; }
			<?}else if($_POST['name_213'] == 1478){?>
			.shag1-box5-left{top:105px;left:31px;}  
			.shag1-box5-left.shag1-box5-right{left:102px; }
			.shag1-box5-left.shag1-box5-stvorka{left:175px; }
			.shag1-box5-left.shag1-box5-pvh{left:240px; }
			.shag1-box5-left.shag1-box5-left-5{left:313px; }
			.shag1-box5-left.shag1-box5-left-6{left:380px; }
			<?}else if($_POST['name_213'] == 1477){?>
			.shag1-box5-left{top:105px;left:40px;}  
			.shag1-box5-left.shag1-box5-right{left:125px; }
			.shag1-box5-left.shag1-box5-stvorka{left:205px; }
			.shag1-box5-left.shag1-box5-pvh{left:290px; }
			.shag1-box5-left.shag1-box5-left-5{left:375px; }
			<?}else if($_POST['name_213'] == 1476){?>
			.shag1-box5-left{top:105px;left:55px;}  
			.shag1-box5-left.shag1-box5-right{left:160px; }
			.shag1-box5-left.shag1-box5-stvorka{left:260px; }
			.shag1-box5-left.shag1-box5-pvh{left:365px; }
			<?}else if($_POST['name_213'] == 1475){?>
			.shag1-box5-left{top:105px;left:70px;}  
			.shag1-box5-left.shag1-box5-right{left:210px; }
			.shag1-box5-left.shag1-box5-stvorka{left:350px; }
			<?}else{?>
			.shag1-box5-left{top:105px;left:105px;}  
			.shag1-box5-left.shag1-box5-right{left:320px; }
			<?}?>
		</style>
<?}?>
		
			<div class="shag2_img_fon">
			<?
			$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
			$arFilter = Array("IBLOCK_ID"=>30, "ID"=>$kon_izgib );
			$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			if($ob = $res->GetNextElement()){ 
				$arFields = $ob->GetFields();
				if($arFields['PREVIEW_PICTURE'] && empty($img_fon_active)){
					$imgtip = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
					<?$res = '<img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" />';?>
					<?=$res;?>
				<?}?>
			<?}else{?>
				<img src="/bitrix/images/calculator/okno.jpg" />
			<?}?>
			<?if($kon_izgib == 1109){
				$style_pod = "margin:-12px 0 0 -35px;width:380px";
			}?>
			<?if($kon_izgib == 1109 || $kon_izgib == 1110 || $kon_izgib == 1111 || $kon_izgib == 1113 || $kon_izgib == 1168 || $kon_izgib == 1169 || $kon_izgib == 1170){?>
			<!-- PDOKONNIK -->
				<?if($_POST['select_name_'.$_POST['name_178']] == 1324 || $_POST['select_name_'.$_POST['name_178']] == 1327){?>
					<?if($kon_izgib == 1113){?>
						<?
							if($img_podokonnik[$kon_izgib][$_POST['balkon_dver']]['OKNO_2']){
								$imgtip = CFile::ResizeImageGet($img_podokonnik[$kon_izgib][$_POST['balkon_dver']]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
								$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
							}
						?>
					<?}else{
							if($img_podokonnik[$kon_izgib]['OKNO_2']){
								$imgtip = CFile::ResizeImageGet($img_podokonnik[$kon_izgib]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
								$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
							}
					?>
					<?}?>
				<?}else if($_POST['select_name_'.$_POST['name_178']] == 1323 || $_POST['select_name_'.$_POST['name_178']] == 1326){?>
					<?if($kon_izgib == 1113){?>
						<?
							if($img_podokonnik[$kon_izgib][$_POST['balkon_dver']]['OKNO']){
								$imgtip = CFile::ResizeImageGet($img_podokonnik[$kon_izgib][$_POST['balkon_dver']]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
								$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
							}
						?>
					<?}else{
						if($img_podokonnik[$kon_izgib]['OKNO']){
							$imgtip = CFile::ResizeImageGet($img_podokonnik[$kon_izgib]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}
					?>
					<?}?>
				<?}?>
			<!-- END -->	
			<!-- OTKOSI -->
				<?if($_POST['select_name_'.$_POST['name_183']] == 1331){?>
					<?if($kon_izgib == 1113){?>
						<?if($img_otkosi[$kon_izgib][$_POST['balkon_dver']]['OKNO']){
							$imgtip = CFile::ResizeImageGet($img_otkosi[$kon_izgib][$_POST['balkon_dver']]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}else{	
						if($img_otkosi[$kon_izgib]['OKNO']){
							$imgtip = CFile::ResizeImageGet($img_otkosi[$kon_izgib]['OKNO'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}?>
				<?}else if($_POST['select_name_'.$_POST['name_183']] == 1332){?>
					<?if($kon_izgib == 1113){?>
						<?if($img_otkosi[$kon_izgib][$_POST['balkon_dver']]['OKNO_2']){
							$imgtip = CFile::ResizeImageGet($img_otkosi[$kon_izgib][$_POST['balkon_dver']]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}else{
						if($img_otkosi[$kon_izgib]['OKNO_2']){
							$imgtip = CFile::ResizeImageGet($img_otkosi[$kon_izgib]['OKNO_2'], array('width'=>$width, 'height'=>$height), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							$res_img .= '<span class="shag2_img_fon_stvorka"><img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" /></span>';
						}?>
					<?}?>
				<?}?>
			<!-- END -->	
			<?}?>	
			<?echo $res_img;?>
				<?/*echo($res_css);*/?>
			</div>
	</div>
	<?if($kon_izgib != 1109 && $kon_izgib != 1113 && $_POST['name_166'] != 1108 && $kon_izgib != 1113 && $kon_izgib != 1168){?>
	<div class="shag1-box6"><div class="shag1-reshenie-number shag1-reshenie-number-3"><?=$iiii;?></div>
			Укажите количество изгибов в Вашей конструкции (эркер):
		<select name="izgib">
		<?$i = 1;$izgib = IntVal($_POST['izgib']);?>		
		<?foreach($arResult['169'] as $item){?>
			<option value="<?=$item['FILDS']['ID']?>" <?if($i++ == 1 && empty($izgib) || $izgib == $item['FILDS']['ID']){echo 'selected="selected"';}?>><?=$item['FILDS']['NAME']?></option>
		<?}?>
		</select>
	</div>
	<?}else if($kon_izgib == 1113){?>
	<div class="shag1-box6"><div class="shag1-reshenie-number shag1-reshenie-number-3"><?=$iiii;?></div>
		Положение двери
		<select class="shag1_balkon_dver" name="balkon_dver">
		<?$i = 1;$izgib = IntVal($_POST['balkon_dver']);?>		
		<?foreach($arResult['211'] as $item){?>
			<option value="<?=$item['FILDS']['ID']?>" <?if($i++ == 1 && empty($izgib) || $izgib == $item['FILDS']['ID']){echo 'selected="selected"';}?>><?=$item['FILDS']['NAME']?></option>
		<?}?>
		</select>
	</div>
	<?}?>
</div>
<?$jj = 1;?>
<div class="shagi-buttons">
	<div class="shagi-buttons-each">
		<?if(!empty($item_pst)){$_POST['ITEM'] = $item_pst;}?>
		<?foreach($_POST['ITEM'] as $item_key => $item_val){?>
		<input id="items_<?=$item_key?>" name="items_s" value="<?=$item_key?>" type="radio" <?if($item_key == $_POST['items_s'] && isset($_POST['items_s'])){echo 'checked="checked"';}?>/>
		<label for="items_<?=$item_key?>" class="shagi-buttons-each-element">
			<div class="shagi-buttons-each-element-number"><?=$jj++;?></div>
			<div class="shagi-buttons-each-element-img"><div><img src="/bitrix/images/calculator/okno.png" /></div></div>
		</label>
		<?}?>
		<??><input id="items_5555" name="items_s" value="5555" type="radio" <?if(5555 == $_POST['items_s'] && isset($_POST['items_s']) || !isset($_POST['items_s'])){echo 'checked="checked"';}?>/>
		<label for="items_5555" class="shagi-buttons-each-element">
			<div class="shagi-buttons-each-element-number"><?=$jj++;?></div>
			<div class="shagi-buttons-each-element-img"><div><img src="/bitrix/images/calculator/okno.png" /></div></div>
</label><??>
	</div>
	<div class="shagi-buttons-right shagi-buttons-sp"><span class="calc2">Следующий шаг</span></div>	
</div>
<br />
<div class="shag1-boxtext">
	<div class="shag1-boxtext-left">
		Описание решения:
	</div>
	<div class="shag1-boxtext-right">
		<?=$descrip?>
	</div>
</div><input type="hidden" name="number_shag" value="1" />
</form>
<script type="text/javascript">
	$(function(){
		$('.shag1-boxbox3 ul').jScrollPane({verticalDragMinHeight: 22, verticalDragMaxHeight: 22, horizontalDragMinWidth: 22, verticalGutter: 10, maintainPosition: true}); 
		var api = $('.shag1-boxbox3 ul').data('jsp');
		var tp = $('.shag1-boxbox3 .radioactive').position().top;
		api.scrollTo(0, tp);
	});
</script>
<?if($kon_izgib == 1168 || $kon_izgib == 1173){?>	
	<div class="request_div_shag_3"></div>
<?}?>