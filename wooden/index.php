<? require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Деревянные окна, это надёжность и экологичность. Мы производим и устанавливаем деревянные окна из дуба, сосны и лиственницы.");
$APPLICATION->SetPageProperty("keywords", "Деревянные окна, евро окна, стеклопакет, заказ, производство окон.");
$APPLICATION->SetPageProperty("title", "Деревянные евро окна со стеклопакетами на заказ | Производство деревянных окон в Москве");
$APPLICATION->SetTitle("");?>
<?$APPLICATION->IncludeComponent("t1:menu.bottom", "", array(
    ),
    false
);?>
<div class="breadcrumbs">
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb","",Array(
        "START_FROM" => "1", 
        "PATH" => "", 
        "SITE_ID" => "s1" 
    )
);?>
</div>
 <div class="main">
        <div class="column-left">
            <div class="menu-left">
			<?$APPLICATION->IncludeComponent("t1:menu.left", "", array(
				),
				false
			);?>
            </div>
            <div class="left-images">
			<?$APPLICATION->IncludeComponent("t1:action.left", "", array(
				),
				false
			);?>
            </div>
            <div class="form">
                <form class="left-form" id="slider-form">
					<div class="index-form">
						<input class="slider-name" type="text" name="name" placeholder="Ваше имя">
						<input class="slider-phone" type="text" name="phone" placeholder="Ваш телефон">
						<input type="hidden" name="type" value="questions">
						<input type="submit" class="submit" value="Получить консультацию">
					</div>
                </form>
				<div class="index-form-2" style="width: 180px;margin-left: 95px;margin-top: 70px;">
					<p class="text-red" style="width: 200px; top: -20px;">Спасибо! Ваша заявка отправлена.</p>
				</div>
            </div>
        </div>
        <div class="column-right">
		<?$APPLICATION->IncludeComponent("t1:detail.info", "", array(
			),
		false
		);?>
        </div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>