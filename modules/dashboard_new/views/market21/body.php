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
                <div class="panel-heading">21 день</div>
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
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/bzaim5.ru/<?=$referrer?>">Bzaim5</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/dengoman.ru/<?=$referrer?>">Dengoman</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/dengimo.ru/<?=$referrer?>">Dengimo</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/all/<?=$referrer?>">Все сайты</a></li>
                          </ul>
                        </div>                        
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=($referrer <> 'all') ? $referrer : 'Все источники'?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/<?=$site?>/direct">Direct</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/<?=$site?>/mytarget">Mytarget</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/<?=$site?>/vk">VK</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/<?=$site?>/google">Google</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/<?=$site?>/sendpulse">SendPulse</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/<?=$site?>/email">Email</a></li>    
                            <li role="separator" class="divider"></li>
                            <li><a href="https://dengimo.ru/dashboard_new/market21/<?=$date1?>/<?=$date2?>/<?=$site?>/all">Все источники</a></li>
                          </ul>
                        </div>                        
                        
                    </div>
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50" data-sort-name="date" data-sort-order="desc"  data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="date" data-sortable="true">Дата</th>                              
                                <th data-field="leadia">Leadia (<span class="text-success">Принято</span> | <span class="text-danger">Отказ</span>)</th>
                                <th data-field="teleport">Teleport (<span class="text-success">Принято</span> | <span class="text-danger">Отказ</span>)</th>
                                <th data-field="unicom">Unicom (<span class="text-success">Принято</span> | <span class="text-danger">Отказ</span>)</th>
                                <th data-field="cityads">Cityads (<span class="text-success">Принято</span> | <span class="text-danger">Отказ</span>)</th>			    
                            </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php
                                echo '<tr class="">'
                                    . '<td></td>'
                                    . '<td>'.$item['date'].'</td>'
                                    . '<td><span class="text-success">'.$item['l']['leadia']['ok'].'</span><span class="text-danger"> | '.(isset($item['l']['leadia']['validation_errors'])?$item['l']['leadia']['validation_errors'] : 0).'</span></td>'
                                    . '<td><span class="text-success">'.$item['l']['teleport']['success'].'</span><span class="text-danger"> | '.(isset($item['l']['teleport']['error double'])?$item['l']['teleport']['error double'] : 0).'</span></td>'
                                    . '<td><span class="text-success">'.($item['l']['unicom']['NEW']+$item['l']['unicom']['SENT']).'</span><span class="text-danger"> | '. 0 .'</span></td>'
                                    . '<td><span class="text-success">'.$item['l']['firanoall'][1].'</span><span class="text-danger"> | '.$item['l']['firanoall'][0].'</span></td>'
                                . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->
