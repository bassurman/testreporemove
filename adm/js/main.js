$(document).ready(function() {
    $('#page_selector').change(function(){
    var idPage = $(this).val();
    ajaxSend({id_page:idPage,action:'get'},fillForm);
    });
    $('#savePage').click(function(){
    var formData = $('form').serializeArray();
    formData.push({ 
        name:'action',
        value:'save'
    });
    console.log(formData);
    formData = jQuery.param(formData);
    console.log(formData);
      ajaxSend(formData,reloadPage);  
    });
});

function ajaxSend(dataSend,functionCall) {
$.ajax({url:"classes/AjaxController.php",
                data:dataSend,
                dataType:'json',
                method:'POST',
                success:function(responce){
                   functionCall(responce);
                }});
}

function fillForm (responce) {
    /*$(tinymce.get('dsc').getBody()).html(responce.content);*/
    $('#dsc').jqteVal(responce.content);
    $('#title').val(responce.title);
    $('#description').val(responce.description);
    $('#keywords').val(responce.keywords);
    $('#page').val(responce.page);
}

function reloadPage(){
    alert('reload');
}