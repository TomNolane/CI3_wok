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
                <div class="panel-heading">Короткие</div>
                <div class="panel-body">
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50" data-sort-name="id" data-sort-order="desc"  data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>
                                <th data-field="status" data-visible="false">Статус</th>
			        <th data-field="mail" data-sortable="true">Рассылка</th>                              
                                <th data-field="delay" data-sortable="true">Задержка</th>
                                <th data-field="domen">Домены</th>
                                <th data-field="do">Действия</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php                                
                                    $item['status']? $status = '<button type="button" id="mail'.$item['id'].'" class="btn btn-default btn-sm mail-settings" data-id="0"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>' : $status = '<button type="button" id="mail'.$item['id'].'" class="btn btn-default btn-sm mail-settings" data-id="1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';                                    
                                ?>
                                <tr class="">
                                    <td></td>
                                    <td><?=$item['status']?></td>
                                    <td><?=$item['name']?></td>
                                    <td>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="minus" data-id="<?=$item['id']?>" data-field="quant[<?=$item['id']?>]">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant[<?=$item['id']?>]" class="form-control input-number" value="<?=$item['delay']?>" size="4">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-id="<?=$item['id']?>" data-field="quant[<?=$item['id']?>]">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>  
                                    </td>
                                    <td><span id="domen<?=$item['id']?>"><?=$item['domen']?></span></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="...">
                                          <?=$status?>
                                          <button type="button" id="modal<?=$item['id']?>" data-name="<?=$item['name']?>" data-id="<?=$item['id']?>" data-domen="<?=$item['domen']?>" class="btn btn-default btn-sm m"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></button>                                          
                                        </div>                                        
                                    </td>  
                                </tr>
                            <?php } ?>                            
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->
<!-- Modal -->
<div class="modal fade" id="domensettings" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                        <h3 class="modal-title" id="feedbackModalLabel">Выберите домены для рассылки <span id="feedbackModalLabelname"></span> </h3>
                <p>Просто поставьте галочки напротив названия домена</p>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="checkbox"><label><input type="checkbox" value="edenga" name="edenga">Edenga</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="promo.edenga" name="promo.edenga">Promo.edenga</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="vkredito" name="vkredito">Vkredito</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="promo.vkredito" name="promo.vkredito">Promo.vkredito</label></div>                    
                        <div class="checkbox"><label><input type="checkbox" value="dengimo" name="dengimo">Dengimo</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="promo.dengimo" name="promo.dengimo">Promo.dengimo</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="promo.rublimo" name="promo.rublimo">Promo.rublimo</label></div>
                        
                        <div class="checkbox"><label><input type="checkbox" value="dengoman" name="dengoman">Dengoman</label></div>
                        <div class="checkbox"><label><input type="checkbox" value="promo.dengoman" name="promo.dengoman">Promo.dengoman</label></div>
                        
                        <button type="button" class="btn btn-default" id="save_domen_settings" data-id="">Сохранить</button>
                    </div>
		</div>
            </div>
        </div>
    </div>
</div>

