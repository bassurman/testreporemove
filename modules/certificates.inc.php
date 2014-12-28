<div class="certificates">
<strong>Сертификаты</strong>
    <div>
     <a class="certleft" rel="group" title="" href="./images/certificates/svidreg.jpg">
        <img src="./images/certificates/svidreg_l.jpg" />
     </a>
     <a class="certleft" rel="group" title="" href="./images/certificates/monolitrab.jpg">
        <img src="./images/certificates/monolitrab_l.jpg" />
     </a>
    </div>
    <div>
    
    <a class="certleft" rel="group" title="" href="<?=$config['sitelink']?>images/certificates/svidcompet.jpg">
        <img src="./images/certificates/svidcompet_l.jpg" />
     </a>
     <a class="certleft" rel="group" title="" href="./images/certificates/4ystr.jpg">
        <img src="<?=$config['sitelink']?>images/certificates/4ystr_l.jpg" />
     </a>
    </div>
    <div class="cert_link">
    <a href="<?=$config['sitelink']?>contacts.html"><strong>Все сертификаты компании</strong></a>
    </div>
    
        <a title= 'Скачать сертификаты' href="<?=$config['sitelink']?>certificates.zip"><div class="cert_img">Скачать сертификаты</div></a>
    
</div>
<script type="text/javascript">
$(function(){
  $(".certificates a.certleft").fancybox({
    "zoomOpacity": true,
    "zoomSpeedIn": 500,
    "zoomSpeedOut": 500,
    "overlayOpacity": 0.7,
    "easingIn": "easeOutBack",
    "easingOut": "easeInBack",
    "hideOnContentClick": false
  });
});
</script>