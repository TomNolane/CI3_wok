<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Статистика</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Время на форме</div>
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">График</div>
                                <div class="panel-body">
                                    <div class="canvas-wrapper">
                                        <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.row-->                    
                    
                    <div id="toolbar" class="btn-group">
                        <input type="text" class="btn btn-sm btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date1) ? $date1 : date('Y-m-d');?> - <?=isset($date2) ? $date2 : date('Y-m-d');?>"/>
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=($site <> 'all') ? $site : 'Все сайты'?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="https://dengimo.ru/dashboard_new/time/<?=$date1?>/<?=$date2?>/bzaim5.ru">Bzaim5</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/time/<?=$date1?>/<?=$date2?>/dengoman.ru">Dengoman</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/time/<?=$date1?>/<?=$date2?>/dengimo.ru">Dengimo</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="https://dengimo.ru/dashboard_new/time/<?=$date1?>/<?=$date2?>/all">Все сайты</a></li>
                          </ul>
                        </div>
                    </div>
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50" data-sort-name="date" data-sort-order="desc"  data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="date" data-sortable="true">Дата</th>                              
                                <th data-field="step1" data-sortable="true">Первый шаг</th>
                                <th data-field="step2" data-sortable="true">Второй шаг</th>
                                <th data-field="step3" data-sortable="true">Третий шаг</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php
                                echo '<tr class="'.$trclass.'">'
                                    . '<td></td>'
                                    . '<td>'.$item['date'].'</td>'
                                    . '<td>'.round($item['data']['time1'] / $item['data']['count']).'</td>'   
                                    . '<td>'.round($item['data']['time2'] / $item['data']['count']).'</td>'   
                                    . '<td>'.round($item['data']['time3'] / $item['data']['count']).'</td>'       
                                    . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->
