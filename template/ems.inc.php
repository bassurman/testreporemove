<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Строительные услуги</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<meta http-equiv="Content-Language" content="ru" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
    <meta name='yandex-verification' content='5fc4cb5e684fbb08' />
    <meta name="google-site-verification" content="0Yw4OnenLi0Rc_wdXKNyLlyPkJw7tz4fNeGWRw5bPeg" />
	<link href="<?=$config['sitelink']?>css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
    <script type="text/javascript">
	   $(document).ready(function (){
	      $('li.active').parents('li').addClass('active');
	   });
	</script>
    <script type='text/javascript' src='<?=$config['sitelink']?>js/jquery.cycle.all.js'></script>
	<script type='text/javascript' src='<?=$config['sitelink']?>js/jquery.easing.1.3.js'></script>
	<script type='text/javascript' src='<?=$config['sitelink']?>js/cycle_script.js'></script>
    <link type="text/css" href="<?=$config['sitelink']?>js/jquery.fancybox-1.2.1/jquery.fancybox.css" rel="stylesheet">
    <script src="<?=$config['sitelink']?>js/jquery.fancybox-1.2.1/jquery.fancybox-1.2.1.pack.js" type="text/javascript"></script>
</head>
<body>

<div id="container">

	<div id="header">
		<a href="index.html" id="logo">
        <img src="/images/logo2_res2.png">
        <!--span>Эконом</span>Монолит<span>Строй</span-->
        <b>Экономим Ваше время и деньги!</b></a>
		<div id="phone">
        <p><i class="iconfa-phone"></i> <span>+375 29</span> 345-9-345</p>
        <p><i class="iconfa-phone"></i> <span>+375 29</span> 131-91-81</p>
        <p><i class="iconfa-phone"></i> <span>+375 17</span> 542-26-09</p>
        </div>	
        <div id="mail">
		<p>E-mail: <a href="mailto:ecmonstroy@mail.ru">ecmonstroy@mail.ru</a></p>
        <!--p>Skype: <a href="skype:first_manager">first_manager</a> <img src="http://mystatus.skype.com/smallicon/first_manager"></p-->
        </div>
        <div id="search"><input placeholder="Поиск..." /><i class="iconfa-search search-btn"></i></div>
        <ul id="buttons">
			<li class="home"><a href=""></a></li>
			<li class="contacts"><a href=""></a></li>
			<li class="pricelist"><a title= 'Скачать сертификаты' href="<?=$config['sitelink']?>certificates.zip"></a></li>
		</ul>
		<div class="clear"></div>
		<div class="menu">
            <ul>
			<?=GetMenuItems($this_page, $mainmenu)?> 
            </ul>
		</div>	
	</div>
    <div class="clear"></div>
    
    <!------------------------------------------------------------------------------------------------------------------>
    <?php include_once $path . 'modules/slideshow.inc.php';?>
    <!------------------------------------------------------------------------------------------------------------------>
		
	<!-- РѕСЃРЅРѕРІРЅРѕР№ Р±Р»РѕРє -->
	<div id="main">
	
		<!-- СЃР°Р№РґР±Р°СЂ -->
		<div id="sidebar">
        
            <h3><i class="iconfa-cogs"></i> Услуги</h3>
            <ul>
               <?=view_cat($sidemenu);?>
            </ul>   
            
            <?php include_once $path . 'modules/certificates.inc.php';?>
            
            <a href="http://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*http://pogoda.yandex.ru/minsk" target="_blank"><img src="http://info.weather.yandex.net/minsk/2_white.ru.png" border="0" alt="" /><img width="1" height="1" src="http://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*http://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>
            <a href="http://www.obmennik.by" target="_blank" title="Курс валют в обменниках Беларуси"> <img src="http://www.obmennik.by/images/kurs/bestkurs200x1551.png" width="200" height="155" border="0" alt="Лучший курс обмена в банках Беларуси"></a>
        
		</div>
		
		<!-- РєРѕРЅС‚РµРЅС‚ -->
		<div id="content">
           <div id="navigation"><?=navigation($page, $category, $parent, $ruspage); ?></div>
        <div id="content_text"><?=$content;?></div>
        <? if ( $modules != '' )
		include_once $path . 'modules/'.$modules.'.inc.php';
		?>
        
        <!--div id="content_right">
        <!--h3><i class="iconfa-picture"></i> Примеры работ</h3>
           <ul class="gallery">
             <li></li>
             <li></li>
             <li></li>
             <li></li>
           </ul>
           <a href="/gallery.html">Перейти в галерею</a>
        
        <h3><i class="#"></i> Последние статьи</h3>
           <ul class="articles">
             <li></li>
             <li></li>
             <li></li>
             <li></li>
           </ul>
           <a href="/stati.html">Читать статьи</a>
        
        <div class="clear"></div-->
  </div>
  <div class="clear"></div>
	
	<!-- footer -->
	<div id="footer">
			<div class="footer_block">	
			<h5><i class="iconfa-globe"></i> Контакты</h5>
                <p><i class="iconfa-phone"></i> +375 29 345-9-345</p>
                <p><i class="iconfa-phone"></i> +375 29 131-91-81</p>
                <p><i class="iconfa-phone"></i> +375 17 542-26-09</p>               
                <p><i class="iconfa-time"></i> 8.00-21.00</p>
             </div>
             <div class="footer_block">	
             <h5><i class="iconfa-home"></i> Адрес</h5>
               <p><i class="iconfa-home"></i> п. Ждановичи, пер. Горный 1, офис 5</p>
               <p><i class="iconfa-time"></i> 10.00-18.00</p>
               <p>Выходные дни: суббота и воскресенье</p>               
            </div>
            <div class="footer_block">	
               <h5><i class="iconfa-map-marker"></i> Карта проезда</h5>
               <iframe width="360" height="100" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.ru/maps?f=q&amp;source=s_q&amp;hl=ru&amp;geocode=&amp;q=%D1%8D%D0%BA%D0%BE%D0%BD%D0%BE%D0%BC%D0%BC%D0%BE%D0%BD%D0%BE%D0%BB%D0%B8%D1%82%D1%81%D1%82%D1%80%D0%BE%D0%B9&amp;aq=&amp;sll=52.19038,18.666292&amp;sspn=8.113983,21.643066&amp;ie=UTF8&amp;hq=%D1%8D%D0%BA%D0%BE%D0%BD%D0%BE%D0%BC%D0%BC%D0%BE%D0%BD%D0%BE%D0%BB%D0%B8%D1%82%D1%81%D1%82%D1%80%D0%BE%D0%B9&amp;hnear=&amp;t=m&amp;ll=53.943632,27.428915&amp;spn=0.071946,0.071946&amp;output=embed"></iframe>
		    </div>
    <div class="clear"></div>
    <div id="copyright">&copy; <a href="">ecmonstroy.by</a> - 2014</div>
    <div class="footmenu">
            <ul>
			<?=GetMenuItems($this_page, $footmenu)?> 
            </ul>
		</div>
        <div class="clear"></div>	
	</div>
	
</div> <!-- container end -->

</body>
</html>