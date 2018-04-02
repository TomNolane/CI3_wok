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
                <div class="panel-heading">Пиксель</div>
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
                        <input type="text" class="btn btn-sm btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date1) ? $date1 : date('Y-m-d');?> - <?=isset($date2) ? $date2 : date('Y-m-d');?>"/>
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=($site <> 'all') ? $site : 'Все сайты'?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="http://dengimo.ru/dashboard_new/pixel/<?=$date1?>/<?=$date2?>/bzaim5.ru">Bzaim</a></li>
                            <li><a href="http://dengimo.ru/dashboard_new/pixel/<?=$date1?>/<?=$date2?>/dengimo.ru">Dengimo</a></li>
                            <li><a href="http://dengimo.ru/dashboard_new/pixel/<?=$date1?>/<?=$date2?>/dengoman.ru">Dengoman</a></li>    
                            <li role="separator" class="divider"></li>
                            <li><a href="http://dengimo.ru/dashboard_new/pixel/<?=$date1?>/<?=$date2?>/all">Все сайты</a></li>
                          </ul>
                        </div>
                    </div>
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50" data-sort-name="date" data-sort-order="desc"  data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="date" data-sortable="true">Дата</th> 
                                <th data-field="kredito24" data-sortable="true">Kredito24</th>
                                <th data-field="Vivus" data-sortable="true">Vivus</th>
                                <th data-field="zaymer" data-sortable="true">Займер</th>
                                <th data-field="moneyman" data-sortable="true">Moneyman</th>
                                
                                <!--<th data-field="fastmoney" data-sortable="true">Fastmoney</th> -->
                                <!--<th data-field="turbozaim" data-sortable="true">Турбозайм</th> -->
                                <!--<th data-field="ekapusta" data-sortable="true">МигКредит</th>
                                <th data-field="moneza" data-sortable="true">Moneza</th>-->                       
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php
                                echo '<tr class="'.$trclass.'">'
                                    . '<td></td>'
                                    . '<td>'.$item['date'].'</td>'
                                /*    . '<td>'.($item['data']['bzaim5.ru']['Турбозайм']+$item['data']['dengoman.ru']['Турбозайм']+$item['data']['dengimo.ru']['Турбозайм']+$item['data']['rublimo.ru']['Турбозайм']+$item['data']['edenga.ru']['Турбозайм']+$item['data']['vkredito.ru']['Турбозайм']).'</td>'*/
                                    . '<td>'.($item['data']['bzaim5.ru']['Kredito24']+$item['data']['dengoman.ru']['Kredito24']+$item['data']['dengimo.ru']['Kredito24']+$item['data']['rublimo.ru']['Kredito24']+$item['data']['edenga.ru']['Kredito24']+$item['data']['vkredito.ru']['Kredito24']).'</td>'
                                    . '<td>'.($item['data']['bzaim5.ru']['Vivus']+$item['data']['dengoman.ru']['Vivus']+$item['data']['dengimo.ru']['Vivus']+$item['data']['rublimo.ru']['Vivus']+$item['data']['edenga.ru']['Vivus']+$item['data']['vkredito.ru']['Vivus']).'</td>'
                                /*    . '<td>'.($item['data']['bzaim5.ru']['fastmoney']+$item['data']['dengoman.ru']['fastmoney']+$item['data']['dengimo.ru']['fastmoney']+$item['data']['rublimo.ru']['fastmoney']+$item['data']['edenga.ru']['fastmoney']+$item['data']['vkredito.ru']['fastmoney']).'</td>'*/    
                                /*    . '<td>'.($item['data']['bzaim5.ru']['Konga']+$item['data']['dengoman.ru']['Konga']+$item['data']['dengimo.ru']['Konga']+$item['data']['rublimo.ru']['Konga']+$item['data']['edenga.ru']['Konga']+$item['data']['vkredito.ru']['Konga']).'</td>' */
                                    . '<td>'.($item['data']['bzaim5.ru']['Займер']+$item['data']['dengoman.ru']['Займер']+$item['data']['dengimo.ru']['Займер']+$item['data']['rublimo.ru']['Займер']+$item['data']['edenga.ru']['Займер']+$item['data']['vkredito.ru']['Займер']).'</td>'
                                    . '<td>'.($item['data']['bzaim5.ru']['Moneyman']+$item['data']['dengoman.ru']['Moneyman']+$item['data']['dengimo.ru']['Moneyman']+$item['data']['rublimo.ru']['Moneyman']+$item['data']['edenga.ru']['Moneyman']+$item['data']['vkredito.ru']['Moneyman']).'</td>'
                            /*      . '<td>'.($item['data']['bzaim5.ru']['еКапуста']+$item['data']['dengoman.ru']['еКапуста']+$item['data']['dengimo.ru']['еКапуста']+$item['data']['rublimo.ru']['еКапуста']+$item['data']['edenga.ru']['еКапуста']+$item['data']['vkredito.ru']['еКапуста']).'</td>'
                                    . '<td>'.($item['data']['bzaim5.ru']['МигКредит']+$item['data']['dengoman.ru']['МигКредит']+$item['data']['dengimo.ru']['МигКредит']+$item['data']['rublimo.ru']['МигКредит']+$item['data']['edenga.ru']['МигКредит']+$item['data']['vkredito.ru']['МигКредит']).'</td>'
                                    . '<td>'.($item['data']['bzaim5.ru']['Moneza']+$item['data']['dengoman.ru']['Moneza']+$item['data']['dengimo.ru']['Moneza']+$item['data']['rublimo.ru']['Moneza']+$item['data']['edenga.ru']['Moneza']+$item['data']['vkredito.ru']['Moneza']).'</td>'    
                            */
                                    . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->
