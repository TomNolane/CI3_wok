<?php
    $this->load->model('dashboard_new/forms_model', 'forms');
    $popup_text = $this->forms->site_settings('bzaim5.ru');
    $popup_text = $popup_text[0]['popup_text'];
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Рассылки</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Генерация ссылки</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-4">                            
                            <select class="form-control" id="select_site" name="select_site">
                              <option value="http://bzaim5.ru">Bzaim5</option>
                              <option value="http://dengoman.ru">Dengoman</option>
                              <option value="https://dengimo.ru">Dengimo</option>
                              <option value="http://rublimo.ru">Rublimo</option>
                              <option value="http://edenga.ru">Edenga</option>
                              <option value="http://vkredito.ru">Vkredito</option>
                            </select>
                            <br/>
                            <select class="form-control" id="select_url" name="select_url">
                              <option value="form/">Форма</option>
                              <option value="">Главная</option>
                            </select>
                            <br/>                            
                                <input type="text" class="form-control" id="utm_source" name="utm_source" value="email" placeholder="Utm"/>
                            <br/>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="popup"> Popup
                                </label>
                            </div>
                            <div class="form-slider white">					
                                <input type="text" class="amount" id="amount" name="amount" value="6000"/>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="textareaurl" rows="6" value="">http://bzaim5.ru/form/?&amount=6000&utm_source=email</textarea>
                            <br/>
                            <textarea class="form-control" id="textareatext" rows="2" value=""><?=$popup_text?></textarea>
                            <br/>
                            <button class="btn btn-sx btn-default">Сохранить</button> 
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-sx btn-default" id="copyurl">Копировать</button>                        
                        </div>                        
                        
                    </div>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->