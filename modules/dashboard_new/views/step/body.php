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
                <div class="panel-heading">Форма</div>
                <div class="panel-body">
                    <!--
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
                    </div>               
                    -->
                    <div id="toolbar" class="btn-group">
                        <!-- <input type="text" class="btn btn-sm btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date1) ? $date1 : date('Y-m-d');?> - <?=isset($date2) ? $date2 : date('Y-m-d');?>"/> -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=($site <> 'all') ? $site : 'Все сайты'?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="https://dengimo.ru/dashboard_new/step/<?=$date1?>/<?=$date2?>/bzaim5.ru">Bzaim5</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/step/<?=$date1?>/<?=$date2?>/dengoman.ru">Dengoman</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/step/<?=$date1?>/<?=$date2?>/dengimo.ru">Dengimo</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="https://dengimo.ru/dashboard_new/step/<?=$date1?>/<?=$date2?>/all">Все сайты</a></li>
                          </ul>
                        </div>
                    </div>
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50" data-sort-name="date" data-sort-order="desc"  data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="date" data-sortable="true">Дата</th>
                                <th data-field="sum" data-sortable="true">Сумма</th>
                                <th data-field="1" data-sortable="true">Ушли на первом шаге</th>
                                <th data-field="2" data-sortable="true">Ушли на втором шаге</th>
                                <th data-field="leave" data-sortable="true">Ушли (сумма)</th>
                                <th data-field="3" data-sortable="true">Перешли на страницу спасибо</th>
                                <th data-field="pixel" data-sortable="true">Перешли на пиксель</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data['step'] as $item) { ?>
                                <?php
                                ++$i;
                                $p = (                                        
                                        +$data['pixel'][$i]['data']['bzaim5.ru']['Kredito24']
                                        +$data['pixel'][$i]['data']['dengoman.ru']['Kredito24']
                                        +$data['pixel'][$i]['data']['dengimo.ru']['Kredito24']
                                        +$data['pixel'][$i]['data']['rublimo.ru']['Kredito24']
                                        +$data['pixel'][$i]['data']['edenga.ru']['Kredito24']
                                        +$data['pixel'][$i]['data']['vkredito.ru']['Kredito24']
                                        +$data['pixel'][$i]['data']['bzaim5.ru']['Vivus']
                                        +$data['pixel'][$i]['data']['dengoman.ru']['Vivus']
                                        +$data['pixel'][$i]['data']['dengimo.ru']['Vivus']
                                        +$data['pixel'][$i]['data']['rublimo.ru']['Vivus']
                                        +$data['pixel'][$i]['data']['edenga.ru']['Vivus']
                                        +$data['pixel'][$i]['data']['vkredito.ru']['Vivus']
                                        +$data['pixel'][$i]['data']['bzaim5.ru']['Займер']
                                        +$data['pixel'][$i]['data']['dengoman.ru']['Займер']
                                        +$data['pixel'][$i]['data']['dengimo.ru']['Займер']
                                        +$data['pixel'][$i]['data']['rublimo.ru']['Займер']
                                        +$data['pixel'][$i]['data']['edenga.ru']['Займер']
                                        +$data['pixel'][$i]['data']['vkredito.ru']['Займер']
                                        
                                        +$data['pixel'][$i]['data']['bzaim5.ru']['Moneyman']
                                        +$data['pixel'][$i]['data']['dengoman.ru']['Moneyman']
                                        +$data['pixel'][$i]['data']['dengimo.ru']['Moneyman']
                                        +$data['pixel'][$i]['data']['rublimo.ru']['Moneyman']
                                        +$data['pixel'][$i]['data']['edenga.ru']['Moneyman']
                                        +$data['pixel'][$i]['data']['vkredito.ru']['Moneyman']                                        
                                );
                                
                                echo '<tr class="'.$trclass.'">'
                                    . '<td></td>'
                                    . '<td>'.$item['date'].'</td>'
                                    . '<td>'.($item['data']['1'] + $item['data']['2'] + $item['data']['3']).'</td>'                                        
                                    . '<td>'.$item['data']['1'].' ('. round(( $item['data']['1']/($item['data']['1'] + $item['data']['2'] + $item['data']['3']))*100, 1) .'% | '.(100-round(( $item['data']['1']/($item['data']['1'] + $item['data']['2'] + $item['data']['3']))*100, 1)).'%) </td>'
                                    . '<td>'.$item['data']['2'].' ('. round(( $item['data']['2']/($item['data']['1'] + $item['data']['2'] + $item['data']['3']))*100, 1) .'% | '.(100-round(( $item['data']['2']/($item['data']['1'] + $item['data']['2'] + $item['data']['3']))*100, 1)-round(( $item['data']['1']/($item['data']['1'] + $item['data']['2'] + $item['data']['3']))*100, 1)).'%) </td>'
                                    . '<td>'.($item['data']['1'] + $item['data']['2']).' ('.round(( ($item['data']['1'] + $item['data']['2'])/($item['data']['1'] + $item['data']['2'] + $item['data']['3']))*100, 1).'%)</td>'
                                    . '<td>'.$item['data']['3'].' ('. round(( $item['data']['3']/($item['data']['1'] + $item['data']['2'] + $item['data']['3']))*100, 1) .'%)</td>'
                                    . '<td>'.$p.' ('.round(( $p/($item['data']['3']))*100, 1).'%)</td>'
                                    . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->
