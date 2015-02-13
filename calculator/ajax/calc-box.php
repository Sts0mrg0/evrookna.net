<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<link rel="stylesheet" type="text/css" media="all" href="/calculator/css/style.css" />
<link href="/calculator/jqueryselectbox/selectbox.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" media="all" href="/calculator/jScrollPane/jScrollPane.css" />
<link rel="stylesheet" type="text/css" href="/calculator/carusel/style.css" media="all" />	
<link type="text/css" href="/calculator/css/jquery-ui.css" rel="stylesheet">
<script type="text/javascript" src="/calculator/jqueryselectbox/jquery.selectbox.js"></script>	
<script type="text/javascript" src="/calculator/jScrollPane/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="/calculator/jScrollPane/jScrollPane.js"></script>
<script type="text/javascript" src="/calculator/js/ajax.js"></script>
<script type="text/javascript" src="/calculator/carusel/jquery.jcarousel.js"></script>
<script type="text/javascript" src="/calculator/js/html2canvas.js"></script>
<script type="text/javascript" src="/calculator/js/jquery-ui.js"></script>
		<script type="text/javascript">
			$(function()
			{
	        	$('select').selectbox();
			});
		</script>
				<script type="text/javascript">
			$(function()
			{
		/*	$('.d-carousel .carousel').jcarousel({
                scroll: 1
            });*/
				$('.shag1-boxbox3 ul').jScrollPane({verticalDragMinHeight: 22, verticalDragMaxHeight: 22, horizontalDragMinWidth: 22, verticalGutter: 10, maintainPosition: true});
			});
		</script>

<div class="calculator-close"></div>
<div class="calculator-top">
	<ul>
		<li id="calc1" class="calculator-shac1 calculator-shac-active"><span>Шаг 1. Выбор варианта.</span></li>
		<li id="calc2" class="calculator-shac2"><span>Шаг 2. Ввод данных.</span></li>
		<li id="calc3" class="calculator-shac3"><span>Шаг 3. Расчет заказа.</span></li>
	</ul>
</div>
<div class="calculator-middle">
<?require($_SERVER["DOCUMENT_ROOT"]."/calculator/ajax/calc1.php");?>
</div>