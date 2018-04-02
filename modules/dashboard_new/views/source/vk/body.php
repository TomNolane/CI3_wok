<?php
    $theme = $this->config->item('themes');
    $ad = array();
    
    $clicks_sum = 0;
    $ad_c_sum = 0;
    $cpc_sum = 0;
    $spent_sum = 0;
    $ad_cost_sum = 0;
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="/dashboard_new/"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Источники анкет</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Анкеты</div>
                <div class="panel-body"> 
                    <div id="toolbar" class="btn-group">
                        <input type="text" class="btn btn-sm btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date1) ? $date1 : date('Y-m-d');?> - <?=isset($date2) ? $date2 : date('Y-m-d');?>"/>
                        <!--
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=($site <> 'all') ? $site : 'Все сайты'?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="http://edenga.ru/dashboard_new/vk/<?=$date1?>/<?=$date2?>/bzaim5.ru">Bzaim5</a></li>
                            <li><a href="http://edenga.ru/dashboard_new/vk/<?=$date1?>/<?=$date2?>/dengoman.ru">Dengoman</a></li>
                            <li><a href="http://edenga.ru/dashboard_new/vk/<?=$date1?>/<?=$date2?>/dengimo.ru">Dengimo</a></li>
                            <li><a href="http://edenga.ru/dashboard_new/vk/<?=$date1?>/<?=$date2?>/rublimo.ru">Rublimo</a></li>
                            <li><a href="http://edenga.ru/dashboard_new/vk/<?=$date1?>/<?=$date2?>/edenga.ru">Edenga</a></li>
                            <li><a href="http://edenga.ru/dashboard_new/vk/<?=$date1?>/<?=$date2?>/vkredito.ru">Vkredito</a></li>    
                            <li role="separator" class="divider"></li>
                            <li><a href="http://edenga.ru/dashboard_new/vk/<?=$date1?>/<?=$date2?>/all">Все сайты</a></li>
                          </ul>
                        </div> 
                        -->
                    </div>                                      
                    <table class="table-sm" data-toggle="table" data-url="" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="10" data-sort-name="id" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="site">Сайт</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="create_date" data-sortable="true">Создано</th>
			        <th data-field="fio">ФИО</th>
                                <th data-field="city" data-visible="false">Город</th>
                                <th data-field="birthday" data-visible="false">ДР</th>
                                <th data-field="email">Email</th>
                                <th data-field="phone">Телефон</th>                               
                                <th data-field="utm">UTM</th>
                                <th data-field="ad_id">Campaign</th>
                                <th data-field="step">Шаг</th>
                                <th data-field="status">Статус</th>
                                <th data-field="settings">Действия</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php 
                                
                                parse_str($item['referer'], $output);
                                if(isset($output['utm_source'])){
                                    $utm = $output['utm_source']; 
                                }else{
                                    $utm = ''; 
                                }
                                if((isset($output['ad_id'])) && ($item['step'] == 3)){
                                    $ad_id = $output['ad_id'];
                                    array_push($ad, $ad_id);
                                }else{
                                    $ad_id = ''; 
                                }                                
                                
                                $site = '<img src="/templates/'.$theme[$item['site']].'/img/favicon.png" title="'.$item['site'].'">';
                                
                                if(isset($item['leadia_date'])){
                                    if(strtotime(date('Y-m-d')) == strtotime(date('Y-m-d',strtotime($item['leadia_date'])))){
                                        $leadia_date = date('H:i:s',strtotime($item['leadia_date']));
                                    }else{
                                        $leadia_date = date('Y-m-d H:i:s',strtotime($item['leadia_date']));
                                    }
                                }else{
                                    $leadia_date='';
                                }
                                if(isset($item['vteleport_date'])){
                                    if(strtotime(date('Y-m-d')) == strtotime(date('Y-m-d',strtotime($item['vteleport_date']))) ){
                                        $vteleport_date = date('H:i:s',strtotime($item['vteleport_date']));
                                    }else{
                                        $vteleport_date = date('Y-m-d H:i:s',strtotime($item['vteleport_date']));
                                    }                                
                                }else{
                                    $vteleport_date='';
                                }                                
                                $status = 'L '.$item['leadia_status'].' ('.$leadia_date.') <br/> T '.$item['vteleport_status'].' ('.$vteleport_date.')';
                                
                                if(strtotime(date('Y-m-d')) == strtotime(date('Y-m-d',strtotime($item['create_date']))) ){
                                    $create_date = date('H:i:s',strtotime($item['create_date']));
                                }else{
                                    $create_date = date('Y-m-d H:i:s',strtotime($item['create_date']));
                                }
                                if($item['step'] == 3){
                                    $trclass = 'success';
                                }else{
                                    $trclass = 'default';
                                }
                                $settings='';
                                
                                echo '<tr class="'.$trclass.'">'
                                    . '<td></td>'
                                    . '<td>'.$site.'</td>'
                                    . '<td>'.$item['id'].'</td>'
                                    . '<td>'.$create_date.'</td>'    
                                    . '<td>'.$item['f'].' <br/>'.mb_substr($item['i'],0,1,"UTF-8").'. '.mb_substr($item['o'],0,1,"UTF-8").'.</td>'
                                    . '<td>'.$item['city'].'</td>'
                                    . '<td>'. date('d.m.Y', strtotime($item['birth'])).'</td>'
                                    . '<td>'.$item['email'].'</td>'
                                    . '<td>'.$item['phone'].'</td>'
                                    . '<td>'.$utm.'</td>'
                                    . '<td>'.$ad_id.'</td>'    
                                    . '<td>'.$item['step'].'</td>'
                                    . '<td>'.$status.'</td>'
                                    . '<td>'.$settings.'</td>'                                        
                                . '</tr>'; ?>
                            <?php } ?>
                            
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Объявления</div>
                    <div class="panel-body">
                        <table class="table-sm" data-toggle="table" data-url="" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="50" data-sort-name="id" data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true">State</th>
                                    <th data-field="site">Название</th>
                                    <th data-field="id" data-sortable="true">id</th>                                                                    
                                    <th data-field="status" data-sortable="true">Статус</th>
                                    <th data-field="approved" data-sortable="true">Одобрено</th>
                                    <th data-field="all_limit" data-sortable="true">Лимит</th>
                                    <th data-field="cost_type" data-visible="false">Плата за</th>                                  
                                    <th data-field="day_from" data-visible="false">От</th>
                                    <th data-field="day_to" data-visible="false">До</th>                                  
                                    <th data-field="impressions" data-visible="false">Просмотры</th>
                                    <th data-field="clicks" data-sortable="true">Клики</th>
                                    <th data-field="ad_c" data-sortable="true">Конверсии</th>
                                    <th data-field="cpc" data-sortable="true">Цена клика</th>
                                    <th data-field="spent" data-sortable="true">Потраченные средства</th>
                                    <th data-field="ad_cost" data-sortable="true">Цена конверсии</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $ad_count = array_count_values($ad)?>
                                <?php foreach($vk['Ads'] as $item) { ?>
                                    <?php
                                        if(isset($ad_count[$item['id']])){
                                            $ad_c = $ad_count[$item['id']];                                           
                                            $ad_cost = round($item['spent']/$ad_c,2);                                           
                                        }else{
                                            $ad_c = 0;
                                            $ad_cost = 0;
                                        }
                                        $clicks_sum += $item['clicks'];
                                        $ad_c_sum += $ad_c;
                                        $cpc_sum += $item['cpc'];
                                        $spent_sum += $item['spent'];
                                        $ad_cost_sum += $ad_cost;
                                        switch ($item['status']){
                                            case 0:
                                                $status = 'Остановлено';
                                                break;
                                            case 1:
                                                $status = 'Запущено';
                                                break;
                                            case 2:
                                                $status = 'Удалено';
                                                break;                                    
                                        }                                        
                                        switch ($item['approved']){
                                            case 0:
                                                $approved = 'Не проходило модерацию';
                                                break;
                                            case 1:
                                                $approved = 'Ожидает модерации';
                                                break;
                                            case 2:
                                                $approved = 'Одобрено';
                                                break;      
                                            case 3:
                                                $approved = 'Отклонено';
                                                break;                                            
                                        }                                        
                                        
                                        echo '<tr class="">'
                                            . '<td></td>'
                                            . '<td>'.$item['name'].'</td>'    
                                            . '<td>'.$item['id'].'</td>'                                                                                 
                                            . '<td>'.$status.'</td>'
                                            . '<td>'.$approved.'</td>'    
                                            . '<td>'.$item['all_limit'].'</td>'
                                            . '<td>'.$item['cost_type'].'</td>'                                           
                                            . '<td>'.$item['day_from'].'</td>'
                                            . '<td>'.$item['day_to'].'</td>'                                            
                                            . '<td>'.$item['impressions'].'</td>'
                                            . '<td>'.$item['clicks'].'</td>'
                                            . '<td>'.$ad_c.'</td>'
                                            . '<td>'.$item['cpc'].'</td>'    
                                            . '<td>'.$item['spent'].'</td>'
                                            . '<td>'.$ad_cost.'</td>'                                                
                                        . '</tr>';
                                    ?>                             
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><strong>Сумма</strong></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><strong><?=$clicks_sum?></strong></td>
                                    <td><strong><?=$ad_c_sum?></strong></td>
                                    <td><strong><?=$cpc_sum?></strong></td>
                                    <td><strong><?=$spent_sum?></strong></td>
                                    <td><strong><?=$ad_cost_sum?></strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>