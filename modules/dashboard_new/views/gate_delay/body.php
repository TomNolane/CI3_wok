<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Настройки шлюза</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Задержка отправки анкеты на шлюз по расписанию</div>
                <div class="panel-body">                                                     
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="date" data-sortable="true">Шлюз</th>
                                <th data-field="delay" data-sortable="true">Задержка</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>                            
                                <?php                                  
                                echo '<tr class="">'
                                    . '<td></td>'
                                    . '<td>'.$item['gate'].'</td>'
                                    . '<td>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="minus" data-id="'.$item['id'].'" data-field="quant['.$item['id'].']">
                                                    <span class="glyphicon glyphicon-minus"></span>
                                                </button>
                                            </span>
                                            <input type="text" name="quant['.$item['id'].']" class="form-control input-number" value="'.$item['delay'].'" size="4">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-default btn-number" data-type="plus" data-id="'.$item['id'].'" data-field="quant['.$item['id'].']">
                                                    <span class="glyphicon glyphicon-plus"></span>
                                                </button>
                                            </span>
                                        </div>  
                                        </td>'
                                    . '</tr>'
                                ; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>        
    </div><!--/.row-->
</div><!--/.main-->
