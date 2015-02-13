<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?$APPLICATION->ShowTitle()?></title>
<?$APPLICATION->IncludeComponent("t1:meta", "", array(
	),
	false
);?>
<meta http-equiv="Content-Type" content="text/html;charset=<?= SITE_CHARSET ?>"/>
<meta name="google-site-verification" content="e_oqFmEKacbOnx-Ih218dafLYYReTeDee52LAWZhTzs" />
<link rel="stylesheet" type="text/css" media="screen" href="<?= SITE_TEMPLATE_PATH ?>/css/style.css">
<?php if ($APPLICATION->GetCurPage() != '/') {?>
	<link rel="stylesheet" type="text/css" media="screen" href="<?= SITE_TEMPLATE_PATH ?>/css/style1.css">
<?}?>
<link rel="stylesheet" type="text/css" media="screen" href="<?= SITE_TEMPLATE_PATH ?>/fancybox/jquery.fancybox-1.3.4.css">
<?$APPLICATION->ShowHead();?>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/bootstrap.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/jquery.inputmask.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/main.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/js/mainscroll.js"></script>
<script src="<?= SITE_TEMPLATE_PATH ?>/fancybox/jquery.fancybox-1.3.4.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$(".fancybox").fancybox({
					'cyclic' : 'true',
					'centerOnScroll' : 'true',
					'transitionIn' : 'none',
					'transitionOut' : 'none',
					'titlePosition' : 'over',
					'titleFormat' : function(title, currentArray, currentIndex, currentOpts) {
						return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
					}
				});
			});
		</script>

<script type="text/javascript">
var __cs = __cs || [];
__cs.push(["setAccount", "I23VRETBMUv0TOXdp1lfxGk8UyRCaX3S"]);
__cs.push(["setHost", "http://server.comagic.ru/comagic"]);
</script>
<script type="text/javascript" async src="http://app.comagic.ru/static/cs.min.js"></script>



</head>
<body>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter27207701 = new Ya.Metrika({id:27207701,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/27207701" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<script>

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
ga('create', 'UA-37323021-1', 'auto');
ga('send', 'pageview');

</script>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-TSLVC4"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TSLVC4');</script>
<!-- End Google Tag Manager -->
<?$APPLICATION->ShowPanel();?>
<div class="wrapper">
    <div class="header">
	<div class="header-top">
        <a href="/"><div class="logo"></div></a>
        <div class="garantia"></div>
        <a href="tel:84952151545"><div class="phone">8 (495) <b>215-15-45</b></div></a>
        <div class="info">
            <a href="" id="go11"><img src="<?= SITE_TEMPLATE_PATH ?>/images/phone.png" class="phoneImg">
            <div class="phone_1">Вам перезвонить?</div></a>

            <a href="" id="go"><img src="<?= SITE_TEMPLATE_PATH ?>/images/line.png" class="lineImg">
            <div class="line">Вызов замерщика</div></a>

            <img src="<?= SITE_TEMPLATE_PATH ?>/images/time.png" class="timeImg">
            <div class="time">Ежедневно с 9.00 до 20.00</div>
        </div>
    <div class="hr"></div>
    <div id="float-block" class="float-block">
        <div class="menu">
            <div class="inner">
                <ul>
					<?$APPLICATION->IncludeComponent("t1:menu", "", array(
						"IBLOCK_ID" => "5",
						"SECTION_CODE" => "",
						"COUNT_ELEMENTS" => "Y",
						"CACHE_TYPE" => "N",
						"CACHE_TIME" => "36000000",
						"CACHE_GROUPS" => "Y",
						"ADD_SECTIONS_CHAIN" => "N"
						),
						false
					);?>
                </ul>
            </div>
        </div>
    </div>
    <script>
        var el = document.getElementById('float-block');
        scrollFloat.init(el);
    </script>
	</div>
</div>


