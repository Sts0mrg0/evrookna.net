<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<script type="text/javascript">$(function(){$('select').selectbox();});</script>
<script type="text/javascript">$(function(){$('.shag1-boxbox3 ul').jScrollPane({verticalDragMinHeight: 22, verticalDragMaxHeight: 22, horizontalDragMinWidth: 22, verticalGutter: 10});});</script>
<? CModule::IncludeModule('iblock');?> 

<?$arResult = array();$svjazka = array();
$arSelect = Array("ID", "NAME", "IBLOCK_ID", "IBLOCK_SECTION_ID", "PROPERTY_*", "PREVIEW_TEXT", "PREVIEW_PICTURE");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
/*$arFilter = Array("IBLOCK_ID"=>30, "SECTION_ID"=>171, "INCLUDE_SUBSECTIONS"=>"Y");*/
$arFilter = Array("IBLOCK_ID"=>30, "INCLUDE_SUBSECTIONS"=>"Y");
$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, false, $arSelect);
while($ob = $res->GetNextElement()){ 
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['FILDS'] = $arFields;
	$arResult[$arFields['IBLOCK_SECTION_ID']][$arFields['ID']]['PROPS'] = $arProps;
	$svjazka[$arFields['ID']] = $arFields['IBLOCK_SECTION_ID'];
}?>	
<?/*print_r($arResult);*/
/*print_r($_POST);


*/?>
<form id="shag3_box">
<?foreach($_POST as $post_key=>$post_item){?>
	<?if(is_array($post_item)){?>
		<?foreach($post_item as $post_item_item){?>
		<input name="<?=$post_key?>[]" type="hidden" value="<?=$post_item_item?>" />
		<?}?>
	<?}else{?>
		<input name="<?=$post_key?>" type="hidden" value="<?=$post_item?>" />
	<?}?>
<?}?>
<?if($_POST['name_165'] == 1168 || $_POST['name_165'] == 1173){?>
<div id="shag3_box_left_nestandart">
	Данная конструкция требуют индивидуального подхода, оставьте свои контактные данные и наш менеджер свяжется с вами для расчета стоимости
</div>
<?}?>
	<div id="shag3_box_left">
		<div id="shag3_box_left_box1">
			<div class="shag3_box_left_box1-name shagboxname">Выберите способ доставки:</div>
			<div class="shag3_box_left_box1-box">
				<ul>
				<?$i = 1;$DELIV = IntVal($_POST['name_191']);?>
				<?foreach($arResult['191'] as $item){?>
					<?if($i++ == 1 && empty($DELIV) || $DELIV == $item['FILDS']['ID']){?>
						<li class="radioactive">
							<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag3_<?=$item['FILDS']['ID']?>" checked="checked"/>
							<label for="shag3_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="shag3_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
							<?if($item['PROPS']['POLE']['VALUE']){?>
								<div class="shag3_box_left_box1-box-litext">
								Укажите расстояние в км: <input name="pole_<?=$item['FILDS']['ID']?>" type="text" value="<?=$_POST['pole_'.$item['FILDS']['ID']]?>"/>
								</div>
							<?}?>
						</li>
					<?}else{?>
						<li>
							<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag3_<?=$item['FILDS']['ID']?>" />
							<label for="shag3_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="shag3_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
						</li>
					<?}?>
				<?}?>
				</ul>
			</div>
			<div class="shag3_box_left_box1-descr">
			<span>Внимание!</span>  При заказе изделий без монтажных работ стоимость их доставки составляет 2000 рублей в пределах МКАД и Одинцовского района.
			</div>
		</div>
		<div id="shag3_box_left_box2">
			<div class="shag3_box_left_box2-name shagboxname">На какой этаж необходимо поднять конструкции:</div>
			<div class="shag3_box_left_box2-box">
				<ul>
				<?$i = 1;$ET = IntVal($_POST['name_192']);?>
				<?foreach($arResult['192'] as $item){?>
					<?if($i++ == 1 && empty($ET) || $ET == $item['FILDS']['ID']){?>
						<li class="radioactive">
							<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag3_<?=$item['FILDS']['ID']?>" checked="checked"/>
							<label for="shag3_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="shag3_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
							<?if($item['PROPS']['POLE']['VALUE']){?>
								<div class="shag3_box_left_box2-box-litext">укажите этаж: <input name="pole_<?=$item['FILDS']['ID']?>" type="text" value="<?=$_POST['pole_'.$item['FILDS']['ID']]?>"/></div>
							<?}?>
							<div class="clear-both"></div>
						</li>
					<?}else{?>
						<li>
							<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag3_<?=$item['FILDS']['ID']?>" />
							<label for="shag3_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="shag3_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
							<div class="clear-both"></div>
						</li>
					<?}?>
				<?}?>
				</ul>	
			</div>
			
		</div>
		<div id="shag3_box_left_box3">
			<div class="shag3_box_left_box3-name shagboxname">Монтажные работы:</div>
			<div class="shag3_box_left_box3-box">
				<ul>
				<?$i = 1;$MON = IntVal($_POST['name_193']);?>
				<?foreach($arResult['193'] as $item){?>
					<?if($i++ == 1 && empty($MON) || $MON == $item['FILDS']['ID']){?>
						<li class="radioactive">
							<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag3_<?=$item['FILDS']['ID']?>" checked="checked"/>
							<label for="shag3_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="shag3_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
						</li>
					<?}else{?>
						<li>
							<input type="radio" name="name_<?=$item['FILDS']['IBLOCK_SECTION_ID']?>" value="<?=$item['FILDS']['ID']?>" id="shag3_<?=$item['FILDS']['ID']?>" />
							<label for="shag3_<?=$item['FILDS']['ID']?>" class="input_img"></label>
							<label for="shag3_<?=$item['FILDS']['ID']?>"><?=$item['FILDS']['NAME']?></label>
						</li>
					<?}?>
				<?}?>
				</ul>	
			</div>
		</div>
	</div>
	<div id="shag3_box_right">
		<div id="shag3_box_right_box1">
		
		
		
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
	
	
		
			<div class="shag2_img_fon2">
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
			<div style="clear:both;width:100%;height:1px;"></div>
			
			
		</div>
		<div id="shag3_box_right_box2">
				<div id="shag3_box_right_box2-form">
					<div id="shag3_box_right_box2-form-name">Обратная связь:</div>
					<div id="shag3_box_right_box2-form-box">
						<div class="shag3_box_right_box2-form-box-name">Контактное лицо:</div>
						<div class="shag3_box_right_box2-form-box-input"><input name="licho" type="text" value="<?=$_POST['licho']?>"/></div>
						<div class="shag3_box_right_box2-form-box-name">Ваш телефон:</div>
						<div class="shag3_box_right_box2-form-box-input"><input name="number" type="text"  value="<?=$_POST['number']?>"/></div>
						<div class="shag3_box_right_box2-form-box-name">Ваш E-mail:</div>
						<div class="shag3_box_right_box2-form-box-input"><input name="e-mail" type="email"  value="<?=$_POST['e-mail']?>"/></div>
					</div>
					<div style="position:relative;"><div style="color:red;position:absolute;top:4px;left:0px;">*Все поля обязательны для заполнения</div></div>
				</div>

		</div>
	</div>
	<div class="clear-both"></div>
	<?if($_POST['items_s'] == 5555){?>
	<div class="shagi-buttons">
		<div class="shagi-buttons-left-href">Добавить еще конструкцию</div>
		<div id="shdg3-otpravka" class="shagi-buttons-right">Расчитать заказ</div>	
	</div>
	<?}else{?>
		<div class="shagi-buttons-5555">У вас есть не завершенная конструкция</div>
	<?}?>
	<input type="hidden" name="getimg" value="<?=$_POST['getimg']?>" />
<input type="hidden" name="number_shag" value="3" />
</form>

<?if($_POST['number_shag'] != 3){?>
<script>
$('#shag3_box_right_box1 img').load(function() {
getimg();
});
</script>
<?}?>

<script>
$(document).ready(function(){
   $("input[name=number]").inputmask("+7(999)9999999", {  "showMaskOnHover": false });
});	
</script>