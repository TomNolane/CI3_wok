$(document).ready(function(){
    
function init($surname, $name, $patronymic) {
  var self = {};
  self.$surname = $surname;
  self.$name = $name;
  self.$patronymic = $patronymic;
  var fioParts = ["SURNAME", "NAME", "PATRONYMIC"];
  $.each([$surname, $name, $patronymic], function(index, $el) {
    var sgt = $el.suggestions({
      serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
      token: "78fc76023580df0ec78566913b31a87d909f1ec0",
      type: "NAME",
      triggerSelectOnSpace: false,
      hint: "",
      noCache: true,
      scrollOnFocus: false,
      minChars: 2,
      addon: "none",
      params: {
        // каждому полю --- соответствующая подсказка
        parts: [fioParts[index]]
      },
      onSearchStart: function(params) {
        // если пол известен на основании других полей,
        // используем его
        var $el = $(this);
        var $gender = 0;
        params.gender = isGenderKnown.call(self, $el) ? self.gender : "UNKNOWN";
        if(params.gender == "MALE"){$gender=1;}else{$gender=0;}
        $('#gender').val($gender);
      },
      onSelect: function(suggestion) {
        // определяем пол по выбранной подсказке
        self.gender = suggestion.data.gender;
        if(self.gender == "MALE"){$gender=1;}else{$gender=0;}
        $('#gender').val($gender);
      }
    });
  });
};
// Проверяет, известен ли пол на данный момент
function isGenderKnown($el) {
  var self = this;
  var surname = self.$surname.val(),
      name = self.$name.val(),
      patronymic = self.$patronymic.val();
  if (($el.attr('id') == self.$surname.attr('id') && !name && !patronymic) ||
      ($el.attr('id') == self.$name.attr('id') && !surname && !patronymic) ||
      ($el.attr('id') == self.$patronymic.attr('id') && !surname && !name)) {
    return false;
  } else {
    return true;
  }
}
init($("#f"), $("#i"), $("#o")); 
traffic('rublimo.ru', '1');
$("#email").suggestions({
        serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
        token: "78fc76023580df0ec78566913b31a87d909f1ec0",
        type: "EMAIL",
        count: 3,
        addon: "none",
        scrollOnFocus: false
    });
  $.validate({
    lang : 'ru',
    modules : 'date,sanitize'
  });
  $('input').on('validation', function(evt, valid) {
        if(valid){
            $('#'+this.id+'status').removeClass('glyphicon-remove').addClass('glyphicon-ok');
            $(this).attr("Почта"); 
			$('#_email').removeClass('lbl');
			$('#_email').addClass('lbl2');
        } else {
            $('#'+this.id+'status').removeClass('glyphicon-ok').addClass('glyphicon-remove');
            $(this).attr("placeholder", "Пожалуйста, введите свой email адрес"); 
			$(this).addClass('your-class');
			$(this).removeClass('your-class2');
			$(this).addClass('your-class3');
			$('#_email').removeClass('lbl2');
			$('#_email').addClass('lbl');
        }
  });
  var t6 = $('#email');
  t.click(function(){
      $(this).removeClass('your-class3');
      $(this).addClass('your-class2');
  });  
  $('#phone').blur(function(){
    //console.log( $('#phone').val() );
    $.ajax({
	type: 'POST',
	url: '/validate/phone/',
	data: 'phone='+$('#phone').val(),
	success: function(data){          
            validator = JSON.parse(data);
            if(validator.status){
                //console.log(validator.operator);
                $('#phonestatus').removeClass('glyphicon-remove').removeClass('glyphicon-ok');
                $('#phonestatus').html('<img src="/templates/common/img/mobile/'+validator.operator+'.png" width="24px" />');
                $('#phonestatus').parent().parent().removeClass('has-error').addClass('has-success');
                if(validator.operator == 'undefined'){
                    $('#phonestatus').html('');
                    $('#phonestatus').removeClass('glyphicon-remove').addClass('glyphicon-ok');
                }                
            }else{
                //console.log('error');
                $('#phonestatus').html('');
                $('#phonestatus').removeClass('glyphicon-ok').addClass('glyphicon-remove');
                $('#phonestatus').parent().parent().removeClass('has-success').addClass('has-error');
            }
            
        }    
    });   
  });
  $('#passport_code').blur(function(){
    $.ajax({
	type: 'POST',
	url: 'http://rublimo.ru/validate/passport_code/',
	data: 'passport_code='+$('#passport_code').val(),
	success: function(data){
            //console.log(data);    
            validator = JSON.parse(data);
            if(validator.status){
                $('#passport_who').val(validator.who);
            }else{
            }   
        }    
    });   
  });    
  var lang=0;
  
  $('#f, #i, #o, #passport_who, #birthplace, #city, #reg_city, #street, #reg_street, #work_occupation, #work_experience, #work_region, #work_city, #work_street').on('keyup keypress', function(e) {
        if($(this).val().match(/([a-zA-Z]+)/)){
          lang++;
            var input = $(this),
            text = input.val().replace(/[^а-яёА-ЯЁ0-9-_\s]/g, "");
            //text = '';
            input.val(text);         
          if(lang==1){
              $(this).parent().addClass('has-error');
              $(this).after('<span class="help-block form-error">Пожалуйста, смените раскладку клавиатуры на <span class="label label-info">RU</span></span>');
          }
      } else {
        lang=0;
        $(this).parent().removeClass('has-error');
        $(this).next("span").text(' ');
      }
  });
  
  $('#email').on('keyup keypress', function(e) {
      if($(this).val().match(/([а-яёА-ЯЁ]+)/)){
          lang++;
          $(this).val('');
          if(lang==1){
              $(this).parent().addClass('has-error');
              $(this).after('<span class="help-block form-error">Пожалуйста, смените раскладку клавиатуры на <span class="label label-info">EN</span></span>');
          }
      } else {
        lang=0;
        $(this).parent().removeClass('has-error');
        $(this).next("span").text(' ');
      }
  }); 
  $('#birthdate').datepicker({
    dateFormat: "dd/mm/yy",  
    changeMonth: true,
    changeYear: true,
    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    firstDay: 1,
    yearRange: "-60:-19",
    defaultDate: "01/01/1998",
    isRTL: false,
    onSelect: function(date) {
            $('#birthdate').focus();
            $('#birthdate').blur();
            if( $(this).val().indexOf("_") == -1)
            {  
                $('#_birthdate').removeClass('lbl');
                $('#_birthdate').addClass('lbl2');
            } 
            else
            { 
                $(this).attr("placeholder", "Пожалуйста, выберите дату рождения"); 
                $(this).addClass('your-class');
                $(this).removeClass('your-class2');
                $(this).addClass('your-class3');
                $('#_birthdate').removeClass('lbl2');
                $('#_birthdate').addClass('lbl'); 
            }  
        }
  });
  $('#passportdate').datepicker({
    dateFormat: "dd/mm/yy",  
    changeMonth: true,
    changeYear: true,
    monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
    dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
    firstDay: 1,
    yearRange: "-100:+0",
    isRTL: false,
    onSelect: function(date) {
            $('#passportdate').focus();
            //$('#passportdate').blur();
            $('#passportdate').datepicker("hide");
            birth = date.split('/');
            $('select#passport_dd').append($("<option></option>").attr("value",birth[0]).text(birth[0]));
            $("select#passport_dd").val(birth[0]);
            $('select#passport_mm').append($("<option></option>").attr("value",birth[1]).text(birth[1]));
            $("select#passport_mm").val(birth[1]);     
            $('select#passport_yyyy').append($("<option></option>").attr("value",birth[2]).text(birth[2]));
            $("select#passport_yyyy").val(birth[2]);     
        }
  });       
	function setcookies() {
		$('.ec').each(function(){
			var variant = $(this).attr('name');
			var value = $(this).val();
			if ($(this).context.tagName == 'INPUT'){
				if ($(this).context.type == 'radio') {if ($(this).prop('checked')) setcookie(variant, value);}
				else setcookie(variant, value);
			}
			else setcookie(variant, value);
		});
		setcookie('lk', '1');
	}
	
	$('#next').click(function(){
		if (validate1()) {
			send_form();
			$('#step2').removeClass('off');
			$('.form-steps-green-line').addClass('step2');
			$('.form-steps-line').show();
			$('#form-steps a[href="#form2"]').tab('show');
			$('html, body').animate({scrollTop:$('#form-steps').offset().top}, 1000);
			markTarget('form-step-1');
                        traffic('rublimo.ru', '2');
                        $('#htitle').text('Заполните паспортные данные');
                        oSpP.push("i", $('#i').val());
                        oSpP.push("o", $('#o').val());                        
		}
		showBzzz = false;
		$('.reg_same').change();
		setcookies();
		$('select[name="reg_type"]').change();
	});
	
	$('#next2').click(function(){
		if (validate2()) {
                        $('input[name="step"]').val('2');
			send_form();
			$('#step3').removeClass('off');
			$('.form-steps-green-line').addClass('step3');
			$('.form-steps-line').show();
			$('#form-steps a[href="#form3"]').tab('show');
			$('html, body').animate({scrollTop:$('#form-steps').offset().top}, 1000);
                        $('#htitle').text('Заполните данные о работе');
			markTarget('form-step-2');
                        traffic('rublimo.ru', '3');
		}
		showBzzz = false;
		setcookies();
    });

    // 
    $('#next3').click(function(){
		if (validate2()) {
                        $('input[name="step"]').val('3');
			send_form();
			$('#step4').removeClass('off');
			$('.form-steps-green-line').addClass('step4');
			$('.form-steps-line').show();
			$('#form-steps a[href="#form4"]').tab('show');
			$('html, body').animate({scrollTop:$('#form-steps').offset().top}, 1000);
                        $('#htitle').text('Заполните данные о работе');
			markTarget('form-step-3');
                        traffic('rublimo.ru', '4');
		}
		showBzzz = false;
		setcookies();
	});
    //
    

	$('#form-send').click(function(){
		if (validate()) {
                        $('input[name="step"]').val('3');
			$('#form-modal').show();
			send_form(true, '/lk');
			markTarget('form-step-3');
                        traffic('rublimo.ru', '4');
                        //window.location = '/confirm';
		}
		showBzzz = false;
		setcookies();
	});
	
	$('select[name="reg_type"]').change(function(){
		if ($(this).val() == '0') {
			$('.reg_same[value="1"]').prop('checked', true);
			$('#reg_same').hide();
			$('#reg_address').hide();
			$('#reg_address').prop('disabled', true);
		}
		else $('#reg_same').show();
	}).change();
	
	$('.reg_same').change(function(){
		if ($('.reg_same:checked').val() == '1' || $('select[name="reg_type"]').val() == '0') {
			$('#reg_address').prop('disabled', true);
			$('#reg_address').hide();
		}
		else {
			$('#reg_address').prop('disabled', false);
			$('#reg_address').show();
		}
	}).change();
        $('#passport').blur(function(){
            var pass = $('#passport').val().split(' ');
            $('#passport-s').val(pass[0]);
            $('#passport-n').val(pass[1]);
        });   
        $('#work').change(function(){
            if($('#work').val() == 'ПЕНСИОНЕР' ){
                //console.log('ПЕНСИОНЕР');
                $('#work_name_help').html('укажите последнее место работы');
            } else {
                $('#work_name_help').html('');
            }
        });  
        var isMobile = false; //initiate as false
        // device detection
        if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
            || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;
        if(isMobile){
            $('#birthdate').prop('readonly', true);
            $('#passportdate').prop('readonly', true);
        } else {
            $('.tip').poshytip({
                    className: 'tip-twitter',
                    showTimeout: 100,
                    alignTo: 'target',
                    alignX: 'right',
                    alignY: 'center',
                    offsetX: 5,
                    allowTipHover: false,
                    fade: false,
                    slide: false
            });             
        }
});
