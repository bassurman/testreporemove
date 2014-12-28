<div class="left_title_head">
                <div class="left_title_pod"></div>
                   <div class="left_title_left">
                      <div class="left_title_right">
                         <h2>Оформить заказ</h2>
                      </div>
                   </div>
             </div>
<form class="zakaz" name="zakaz">
<input type="hidden" name="prod" value="<? echo $page ?>">
<div class="one_half">
<p>Заполните контактные данные:</p>
<p class="small">(Обязательны для заполнения)</p>
<input type="text" placeholder="Ваше имя" name="name" value="">
<input type="text" placeholder="Ваш Email" name="email" value="">
<input type="text" placeholder="Ваш номер телефона" name="phone" value="">
</div>
<div class="two_half" style="margin-right:10px;">
<p>Загрузите файл с макетом:</p>
<p class="small">(Разрешенный формат - jpg, png, jpeg, gif, psd, ai, zip, rar, eps, tif, cdr. Для передачи нескольких файлов закачивайте их по одному.)</p>
<input type="button" name="upload" id="upload" class="btn" value="Выбрать файл">
<input type="hidden" name="filename" id="filename" value="">
<input type="text" id="desing" name="desing" readonly="readonly">
</div>
<div class="two_half">
<p>Параметры печати:</p>
<p class="small">(Стороны и цвета)</p>
<input type="radio" class="checkbox" name="side" value="sideA" checked> односторонняя <input type="radio" class="checkbox" name="side" value="sideB"> двухсторонняя<br />
Лицевая<select name="colorA">
<option>Черно-белая</option>
<option>Цветная</option>
</select> 
Обратная<select name="colorB">
<option>Черно-белая</option>
<option>Цветная</option>
</select>
</div>
<div class="clear"></div>
<div class="three_half" style="margin-right:10px;">
<p>Количество:</p>
<input class="small" type="text" name="count" value="">шт.
</div>
<div class="three_half" style="margin-right:10px;">
<p>Способ оплаты:</p>
<select name="payment">
<option>Наличный</option>
<option>Безналичный</option>
<option>Webmoney</option>
<option>Easypay</option>
<option>ЕРИП</option>
</select>
</div>
<div class="three_half">
<p>Способ доставки:</p>
<select name="delivery">
<option>Самовывоз</option>
<option>Курьером</option>
<option>Почтовой пересылкой</option>
</select>
</div>
<div class="clear"></div>
<div class="one_half">
<p>Дополнительная информация:</p>
<textarea type="text" placeholder="Сообщение" name="message" value=""></textarea>
</div>
<input type="submit" name="submit" class="btn" value="Отправить">
</form>
<script type="text/javascript">
zakaz.onsubmit = function (){
    var prod = zakaz.prod.value;
	var name = zakaz.name.value;
	var email = zakaz.email.value;
	var phone = zakaz.phone.value;
	var filename = zakaz.filename.value;
	var count = zakaz.count.value;
	var message = zakaz.message.value;
	var delivery = zakaz.delivery.value;
	var payment = zakaz.payment.value;
	var colorA = zakaz.colorA.value;
	var colorB = zakaz.colorB.value;
	var side = zakaz.side[0].checked && 1 || 2;
	 $.ajax({
        type: "POST",
        data: {"prod": prod, "name": name, "email": email, "phone": phone, "filename": filename, "count": count, "message": message, "delivery": delivery, "payment": payment, "colorA": colorA, "colorB": colorB, "side": side},
        url: "send_mes.php",
        dataType: "text",
        success: function(response){
			alert(response);
        }
    });	
	return false;
};

$(function(){
var btnUpload=$('#upload');
var status=$('#desing');
new AjaxUpload(btnUpload, {
action: 'upload-file.php',
//Имя файлового поля ввода
name: 'uploadfile',
onSubmit: function(file, ext){
if (! (ext && /^(jpg|png|jpeg|gif|psd|ai|zip|rar|eps|tif|cdr)$/.test(ext))){
// Валидация расширений файлов
status.val('Не верный формат');
return false; 
}
status.val('Загрузка...');
},
onComplete: function(file, response){
//Очищаем текст статуса
status.val('');
//Добавляем загруженные файлы в лист
if(response==="success"){
status.val('Готово');
var val = $('#filename').val();
if(val == ''){
$('#filename').val(file);
}else{
$('#filename').val(val+';'+file);
}
} else{
status.val('Ошибка');
}
}
});
});
</script>