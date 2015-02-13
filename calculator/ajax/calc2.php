<?/*if($_POST['name_165'] == 1168 || $_POST['name_165'] == 1173){?>
		<script type="text/javascript">
			$('#calc3').click();
		</script>
<?}else{*/?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<link rel="stylesheet" type="text/css" href="/calculator/carusel/style.css" />
		<script type="text/javascript">$(function(){$('select').selectbox();});</script>
		<script type="text/javascript">
			$(function(){
				$('.shag1-boxbox3 ul').jScrollPane({verticalDragMinHeight: 22, verticalDragMaxHeight: 22, horizontalDragMinWidth: 22, verticalGutter: 10});
				$('.d-carousel_netlime .carousel_netlime').jcarousel({scroll: 1, target: '+=5',});
			});
		</script>
<? CModule::IncludeModule('iblock');?> 

<?$arResult = array();$svjazka = array();$ii = 1;
$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*", "PREVIEW_TEXT", "PREVIEW_PICTURE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
$arFilter = Array("IBLOCK_ID"=>30, "INCLUDE_SUBSECTIONS"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['FILDS'] = $arFields;
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['PROPS'] = $arProps;
	$svjazka[$arFields['ID']] = $arFields['IBLOCK_SECTION_ID'];
}?>	
<form id="shag2_box">
<?foreach($_POST as $post_key=>$post_item){?>
	<?if(is_array($post_item)){?>
		<?if($post_key != 'name_190' && $post_key != 'name_189'){?>
			<?foreach($post_item as $post_item_key=>$post_item_item){?>
				<input name="<?=$post_key?>[<?=$post_item_key?>]" type="hidden" value="<?=$post_item_item?>" />
			<?}?>
		<?}?>
	<?}else{?>
		<input name="<?=$post_key?>" type="hidden" value="<?=$post_item?>" />
	<?}?>
<?}?>
	<div id="shag2_box_top">
		<div id="shag2_box_top_left">
			<div id="shag2_box_top_left_top">
				<div id="shag2_box_top_left_top_left">
					<ul>
					<?$i = 1;$BLOCK = IntVal($_POST['name_176']);?>
					<?if($_POST['name_166'] == 1108){
						unset($arResult['176']['1312']);
						unset($arResult['176']['1313']);
						unset($arResult['176']['1314']);
						if($BLOCK == 1312 || $BLOCK == 1313 ||$BLOCK == 1314){$BLOCK = "";}
					}else if($_POST['name_166'] != 1105 && $_POST['name_166'] != 1106){
						unset($arResult['176']['1311']);
						$_POST['name_177'] = "";
						if($BLOCK == 1311){$BLOCK = "";}
					}?>
					<?foreach($arResult['176'] as $item){?>
						<?$vibor_arr[] = $item['PROPS']['SECTION']['VALUE'];?>
							<?if($i++ == 1 && empty($BLOCK) || $BLOCK == $item['FILDS']['ID']){?>
								<?$vibor_act = $item['PROPS']['SECTION']['VALUE'];?>
								<li class="radioactive"><div class="shag1-reshenie-number shag2-reshenie-number-1"><?=$ii++;?></div><input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag2_<?=$item['FILDS']['ID']?>" checked="checked"/><label for="shag2_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label></li>
							<?}else{?>
								<li><div class="shag1-reshenie-number shag2-reshenie-number-1"><?=$ii++;?></div><input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag2_<?=$item['FILDS']['ID']?>"/><label for="shag2_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label></li>
							<?}?>
					
					<?}?>
					</ul>
				</div>
				
				
			<?foreach($vibor_arr as $vibor){?>
				<?if($vibor == $vibor_act){?>
				<div id="shag2_box_top_left_top_right">
					<ul>
					<?$i = 1;
					foreach($vibor as $vibor_item){?>
						<?$item = $arResult[$svjazka[$vibor_item]][$vibor_item];
						$BLOCK_PROP = IntVal($_POST['name_'.$item['FILDS']['IBLOCK_SECTION_ID']]);?>
						<?if($i++ == 1 && empty($BLOCK_PROP) || $BLOCK_PROP == $item['FILDS']['ID']){?>
							<?$vib_glubina = $item['PROPS']['GLUBINA']['VALUE'];
							$vib_prop = $item['PROPS']['SECTION']['VALUE'];
							$vib_name = $item['FILDS']['IBLOCK_SECTION_ID'];
							$pole = $item['PROPS']['POLE']['VALUE'];
							$name = 'name_'.$item['FILDS']['ID'];
							?>
							<li class="radioactive">
								<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag2_<?=$item['FILDS']['ID']?>" checked="checked"/>
								<label for="shag2_<?=$item['FILDS']['ID']?>" class="input_img"></label>
								<label for="shag2_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
							</li>
						<?}else{?>
							<li>
								<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag2_<?=$item['FILDS']['ID']?>"/>
								<label for="shag2_<?=$item['FILDS']['ID']?>" class="input_img"></label>
								<label for="shag2_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
							</li>
						<?}?>
					<?}?>
					</ul>
					<?if($pole){?>
					<div class="glubina_box">
						<div class="glubina">
						<div id="slider-resu3lt"></div>
							Глубина <input id="glubina_input" type="text" name="glubina_<?=$name?>" value="<?if($_POST['glubina_'.$name]){echo $_POST['glubina_'.$name];}else{echo $arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['HEIGHT']['VALUE'];}?>"/> мм
							<div class="slider_ui"></div>
							<?if($arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['HEIGHT']['VALUE'] && $arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['WIDTH']['VALUE']){?>
							<div class="slider_ui_box">
								<div class="slider_ui_box_min"><?=$arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['HEIGHT']['VALUE']?> мм</div>
								<div class="slider_ui_box_max"><?=$arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['WIDTH']['VALUE']?> мм</div>
							</div>
							<?}?>
							<script>
							$(document).ready(function(){
								// Указываем class блока div где будет ползунок.
								 $( ".slider_ui" ).slider({
									animate: true, // Анимация ползунка
										range: "min", // Фон пути ползунка, если это свойство убрать, то синей линии не будет.
										value: <?if($_POST['glubina_'.$name]){echo $_POST['glubina_'.$name];}else{echo $arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['HEIGHT']['VALUE'];}?>, // Значение по умолчанию.
										min: <?=$arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['HEIGHT']['VALUE']?>, // Минимальная сумма.
										max: <?=$arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['WIDTH']['VALUE']?>, // Максимальная сумма.
								step: 1, // Шаг диапазона.
								// Вывод диапазона
										slide: function( event, ui ) {
											$( "#slider-result" ).html(ui.value);
										},
								// Вывод диапазона в поле input
										change: function(event, ui) {
											$('#glubina_input').attr('value', ui.value);
											$('.glubina_prop').html('глубина ' + ui.value);
										}
								 });
								$('.ui-slider-handle').html('<div id="slider-result"><?if($_POST['glubina_'.$name]){echo $_POST['glubina_'.$name];}else{echo $arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['HEIGHT']['VALUE'];}?></div>');
							  });
							</script>
						</div>
						<?if($vib_prop){?>
						<div class="glubina_lam">
							Ламинация:
							<select name="select_<?=$name?>">
								<?foreach($vib_prop as $vib_prop_item){?>
									<?if(empty($_POST['select_'.$name])){
										$_POST['select_'.$name] = $vib_prop_item;
									}?>
									<?if($vib_prop_item == $_POST['select_'.$name]){?>
										<option value="<?=$vib_prop_item?>" selected="selected"><?=$arResult[$svjazka[$vib_prop_item]][$vib_prop_item]['FILDS']['NAME']?></option>
									<?}else{?>
										<option value="<?=$vib_prop_item?>"><?=$arResult[$svjazka[$vib_prop_item]][$vib_prop_item]['FILDS']['NAME']?></option>
									<?}?><?}?>
							</select>
						</div>
						<?}?>
					</div>
					<?}?>
				</div>
				<?}else{?>
				<div style="display:none;">
					<ul>
					<?$i = 1;
					foreach($vibor as $vibor_item){?>
						<?$item = $arResult[$svjazka[$vibor_item]][$vibor_item];
						$BLOCK_PROP = IntVal($_POST['name_'.$item['FILDS']['IBLOCK_SECTION_ID']]);?>
						<?if($i++ == 1 && empty($BLOCK_PROP) || $BLOCK_PROP == $item['FILDS']['ID']){?>
							<?$vib_glubina = $item['PROPS']['GLUBINA']['VALUE'];
							$vib_prop = $item['PROPS']['SECTION']['VALUE'];
							$vib_name = $item['FILDS']['IBLOCK_SECTION_ID'];
							$pole = $item['PROPS']['POLE']['VALUE'];
							$name = 'name_'.$item['FILDS']['ID'];
							?>
							<li class="radioactive">
								<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag2_<?=$item['FILDS']['ID']?>" checked="checked"/>
								<label for="shag2_<?=$item['FILDS']['ID']?>" class="input_img"></label>
								<label for="shag2_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
							</li>
						<?}else{?>
							<li>
								<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag2_<?=$item['FILDS']['ID']?>"/>
								<label for="shag2_<?=$item['FILDS']['ID']?>" class="input_img"></label>
								<label for="shag2_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
							</li>
						<?}?>
					<?}?>
					</ul>
					<?if($pole){?>
					<div class="glubina_box">
						<div class="glubina">
							Глубина <input type="text" name="glubina_<?=$name?>" value="<?if($_POST['glubina_'.$name]){echo $_POST['glubina_'.$name];}else{echo $arResult[$svjazka[$vib_glubina]][$vib_glubina]['PROPS']['HEIGHT']['VALUE'];}?>"/> мм
						</div>
						<?if($vib_prop){?>
						<div class="glubina_lam">
							Ламинация:
							<select name="select_<?=$name?>">
								<?foreach($vib_prop as $vib_prop_item){?>
									<?if($vib_prop_item == $_POST['select_'.$name]){?>
										<option value="<?=$vib_prop_item?>" selected="selected"><?=$arResult[$svjazka[$vib_prop_item]][$vib_prop_item]['FILDS']['NAME']?>1</option>
									<?}else{?>
										<option value="<?=$vib_prop_item?>"><?=$arResult[$svjazka[$vib_prop_item]][$vib_prop_item]['FILDS']['NAME']?></option>
									<?}?>
								<?}?>
							</select>
						</div>
						<?}?>
					</div>
					<?}?>
				</div>
				<?}?>
			<?}?>
				
				
			</div>
			<div id="shag2_box_top_left_bottom">
				<div class="shag2_box_top_left_bottom-name shagboxname"><div class="shag1-reshenie-number shag2-reshenie-number-2"><?=$ii++;?></div>
					Выберите стеклопакет:
				</div>
				<div class="shag2_box_top_left_bottom_box">



		<?$i = 1;$j = 1;$STEKLO = $_POST['name_189'];
		
		if(!empty($STEKLO)){
			$ste_mass = array();
			if(!empty($_POST['steklo'])){
				$ste_1 = explode('/', $_POST['steklo']);
			}
			$ste_2 = $STEKLO;
			if(sizeof($ste_1) > sizeof($ste_2)){
				foreach($ste_1 as $ste_val){
					if(in_array($ste_val, $ste_2)){
						$ste_mass[] = $ste_val;
					}
				}
				$sl = implode('/', $ste_mass);
				$tdesc_act = array_pop($ste_mass);
			}else if(sizeof($ste_1) < sizeof($ste_2)){
				$ste_mass = $ste_1;
				foreach($ste_2 as $ste_val){
					if(!in_array($ste_val, $ste_mass)){
						$ste_mass[] = $ste_val;
					}
				}
				
				$sl = implode('/', $ste_mass);
				$tdesc_act = array_pop($ste_mass);
			}else if(sizeof($ste_1) == sizeof($ste_2)){
				$sl = $_POST['steklo'];
				$tdesc_act = array_pop($ste_1);
			}
		}else{
			$tdesc_act = '';
		}
		?><input type='hidden' name='steklo' value='<?=$sl?>' /><? 
		foreach($arResult['189'] as $item){?>
			<?if($j++ == 1){?>
				<div class="shag2_box_top_left_bottom_box_item">
					<ul>
			<?}?>
			
			<?
			if($tdesc_act == $item['FILDS']['ID']){
				?><input type='hidden' name='steklo_2' value='<?=$tdesc_act?>' /><?
				$text_desc = $item['FILDS']['PREVIEW_TEXT'];
			}
			?>
			
				<?if(in_array($item['FILDS']['ID'], $STEKLO)){?>
					<li class="radioactive">
						<input class="clearajax1" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>[]" type="checkbox" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" checked="checked"/>
						<label for="id_<?=$item['FILDS']['ID']?>" class="checkbox_img"><div></div></label>
						<label for="id_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
					</li>
				<?}else{?>
					<li>
						<input class="clearajax1" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>[]" type="checkbox" id="id_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" />
						<label for="id_<?=$item['FILDS']['ID']?>" class="checkbox_img"><div></div></label>
						<label for="id_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
					</li>
				<?}?>
			<?if($j == 4){$j = 1;?>	
					</ul>
				</div>
			<?}?>
		<?}?>
			<?if($j < 4 && $j != 1){$j = 1;?>	
					</ul>
				</div>
			<?}?>
					<div class="shag2_box_top_left_bottom_box_item_description"><?=$text_desc;?></div>
				</div>
			</div>
		</div>
		<div id="shag2_box_top_right">
			<div class="shag2_img_fon">
	<!-- Размеры картинок -->
	<?
	if($_POST['name_165'] == 1113){
		$height = 320;
		$width = 358;
	}else{
		$height = 420;
		$width = 458;
	}
	?>
	<!-- END -->
	<!-- Получаем картинки -->		
	<?/*$kon_izgib = $_POST['name_165'];*/
	$kon_izgib = $_POST['name_165'];
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
			<?foreach($stvorka as $item){?>
				<?if($_POST['name_'.$svjazka[$item]] == $item){?>
					<?$left_wind = $item;?>
				<?}?>
			<?}?>
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
			<div class="shag2_img_fon">
			<?
			$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PREVIEW_PICTURE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
			$arFilter = Array("IBLOCK_ID"=>30, "ID"=>$kon_izgib );
			$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			if($ob = $res->GetNextElement()){ 
				$arFields = $ob->GetFields();
				if($arFields['PREVIEW_PICTURE'] && empty($img_fon_active)){
					$imgtip = CFile::ResizeImageGet($arFields['PREVIEW_PICTURE'], array('width'=>458, 'height'=>420), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
					<?$res = '<img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" />';?>
					<?=$res;?>
				<?}?>
			<?}else{?>
				<img src="/bitrix/images/calculator/okno.jpg" />
			<?}?>
			<?if($_POST['name_165'] == 1109){
				$style_pod = "margin:-12px 0 0 -35px;width:380px";
			}?>
			<?if($_POST['name_165'] == 1109 || $_POST['name_165'] == 1110 || $_POST['name_165'] == 1111 || $_POST['name_165'] == 1113 || $_POST['name_165'] == 1168 || $_POST['name_165'] == 1169 || $_POST['name_165'] == 1170){?>
			<!-- PDOKONNIK -->
				<?if($_POST['select_name_'.$_POST['name_178']] == 1324 || $_POST['select_name_'.$_POST['name_178']] == 1327){?>
					<?if($_POST['name_165'] == 1113){?>
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
					<?if($_POST['name_165'] == 1113){?>
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
					<?if($_POST['name_165'] == 1113){?>
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
					<?if($_POST['name_165'] == 1113){?>
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
		</div>
		<div class="clear-both"></div>
	</div>
	<div id="shag2_box_middle">
		<div class="shag2_box_middle-name shagboxname"><div class="shag1-reshenie-number shag2-reshenie-number-2"><?=$ii++;?></div>
			Дополнительные опции:
		</div>
		<div id="shag2_box_middle_box">
 <!-- Begin Wrapper -->
  <div id="wrapper_netlime">
    <div class="d-carousel_netlime">
		<ul class="carousel_netlime">
			<?foreach($arResult['190'] as $item){?>
			<li>
				<div class="shag2_box_middle_box_elem">
					<div class="shag2_box_middle_box_elem_left">
					<?if($item['FILDS']["PREVIEW_PICTURE"]){?>
						<?$imgtip = CFile::ResizeImageGet($item['FILDS']["PREVIEW_PICTURE"], array('width'=>120, 'height'=>100), BX_RESIZE_IMAGE_PROPORTIONAL, true);?>
						<?$res = '<img src="'.$imgtip["src"].'" width="'.$imgtip["width"].'" height="'.$imgtip["height"].'" />';?>
						<?=$res?>
					<?}?>
					</div>
					<div class="shag2_box_middle_box_elem_right">
						<div class="shag2_box_middle_box_elem_right_name">
							<input class="clearajax" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>[<?=$item['FILDS']['ID']?>]" id="check2_<?=$item['FILDS']['ID']?>" value="<?=$item['FILDS']['ID']?>" type="checkbox" 
							<?if(in_array($item['FILDS']['ID'], $_POST['name_190'])){echo "checked='checked'";}?>
							/><label for="check2_<?=$item['FILDS']['ID']?>" class="checkbox_img"><div></div></label>
							<span class="shag2_box_middle_box_elem_right_name_span"><?=$item['FILDS']['NAME']?></span>
						</div>
						<div class="shag2_box_middle_box_elem_right_box"><?=$item['FILDS']['PREVIEW_TEXT']?></div>
					</div>
				</div>
			</li>	
			<?}?>
		</ul>	
    </div>
    <div class="clear"></div>
  </div>
</div>
</div>
<div class="shagi-buttons">
	<div class="shagi-buttons-left shagi-buttons-sp"><span class="calc1">Предыдущий шаг</span></div>
	<div class="shagi-buttons-right shagi-buttons-sp"><span class="calc3">Следующий шаг</span></div>	
</div><br />
<div class="shag1-boxtext">
	<div class="shag1-boxtext-left">
		Описание решения:
	</div>
	<div class="shag1-boxtext-right">
		<div class="shag1-boxtext-right-box">
			<ul>
				<li><span class="boxtext-span-red">Решение:</span> <?=$arResult[$svjazka[$_POST['name_166']]][$_POST['name_166']]['FILDS']['NAME'];?></li>
				<li><span class="boxtext-span-red">Вид конструкции:</span> <?=$arResult[$svjazka[$_POST['name_165']]][$_POST['name_165']]['FILDS']['NAME'];?></li>
				<li><span class="boxtext-span-red">Тип дома:</span> <?=$arResult[$svjazka[$_POST['name_168']]][$_POST['name_168']]['FILDS']['NAME'];?></li>
				<li><span class="boxtext-span-red">Серия дома:</span> <?=$arResult[$svjazka[$_POST['name_167']]][$_POST['name_167']]['FILDS']['NAME'];?></li>
				<li><span class="boxtext-span-red">Ширина и Высота:</span> <?=$_POST['WIDTH']?> / <?=$_POST['HEIGHT']?> мм </li>
				<?if($arResult[$svjazka[$_POST['izgib']]][$_POST['izgib']]['FILDS']['NAME']){?>
					<li><span class="boxtext-span-red">Колличество изгибов:</span> <?=$arResult[$svjazka[$_POST['izgib']]][$_POST['izgib']]['FILDS']['NAME'];?></li>
				<?}?>
			</ul>
		</div>
		<div class="shag1-boxtext-right-box shag1-boxtext-right-box2">
			<ul>
				<?if($arResult[$svjazka[$_POST['name_177']]][$_POST['name_177']]['FILDS']['NAME']){?>
					<li><span class="boxtext-span-red">Ламинация:</span> <?=$arResult[$svjazka[$_POST['name_177']]][$_POST['name_177']]['FILDS']['NAME'];?></li>
				<?}?>
				<li><span class="boxtext-span-red">Выбор подоконника:</span> <?=$arResult[$svjazka[$_POST['name_178']]][$_POST['name_178']]['FILDS']['NAME'];?> / <span class="glubina_prop">глубина <?=$_POST['glubina_name_'.$_POST['name_178']]?></span> / ламинация <?=$arResult[$svjazka[$_POST['select_name_'.$_POST['name_178']]]][$_POST['select_name_'.$_POST['name_178']]]['FILDS']['NAME'];?></li>
				<li><span class="boxtext-span-red">Выбор откосов:</span> ширина <?=$_POST['glubina_name_'.$_POST['name_183']]?> мм / ламинация <?=$arResult[$svjazka[$_POST['select_name_'.$_POST['name_183']]]][$_POST['select_name_'.$_POST['name_183']]]['FILDS']['NAME'];?></li>
				<li><span class="boxtext-span-red">Выбор отлива:</span> размер <?=$_POST['glubina_name_'.$_POST['name_186']]?> мм / цвет <?=$arResult[$svjazka[$_POST['select_name_'.$_POST['name_186']]]][$_POST['select_name_'.$_POST['name_186']]]['FILDS']['NAME'];?></li>
				<?if($_POST['name_189']){?>
				<li><span class="boxtext-span-red">Стеклопакет:</span> 
					<?foreach($_POST['name_189'] as $stekpaket){?>
						<?if($arResult[$svjazka[$stekpaket]][$stekpaket]['FILDS']['NAME']){?>
							<?=$arResult[$svjazka[$stekpaket]][$stekpaket]['FILDS']['NAME'];?>, 
						<?}?>
					<?}?>
				</li>
				<?}?>
				<?if($_POST['name_190']){?>
					<li id="dopcii"><span class="boxtext-span-red">Дополнительные опции:</span>
					<i>
					<?$iji = 0;foreach($_POST['name_190'] as $opc){?>
						<?if($iji++ == 0){?>
							<?=$arResult[$svjazka[$opc]][$opc]['FILDS']['NAME'];?> 
						<?}else{?>
							, <?=$arResult[$svjazka[$opc]][$opc]['FILDS']['NAME'];?> 
						<?}?>
					<?}?>
					</i>
					</li>
				<?}?>
			</ul>
		</div>
	</div>
</div>
<input type="hidden" name="number_shag" value="2" />
</form>
<?/*}*/?>