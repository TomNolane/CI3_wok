<?php
    $theme = $this->config->item('themes');
    $ad = array();
?>
<!--
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="/dashboard_new/"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Источники анкет</li>
	</ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Анкеты</div>
                <div class="panel-body">
                    
                    <div id="toolbar" class="btn-group">
                        <input type="text" class="btn btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date1) ? $date1 : date('Y-m-d');?> - <?=isset($date2) ? $date2 : date('Y-m-d');?>"/>
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
                                if((isset($output['campaign_id'])) && ($item['step'] == 3)){
                                    $ad_id = $output['campaign_id'];
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
    </div>
</div>
<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="/dashboard_new/"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Источники анкет</li>
	</ol>
    </div>    
    
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Объявления</div>
                    <div class="panel-body">
                        
                        <div id="toolbar" class="btn-group">
                            <input type="text" class="btn btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date1) ? $date1 : date('Y-m-d');?> - <?=isset($date2) ? $date2 : date('Y-m-d');?>"/>
                        </div>                        
                        
                        <table class="table-sm" data-toggle="table" data-url="" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="50" data-sort-name="date" data-sort-order="desc" data-toolbar="#toolbar">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true">State</th>
                                    <th data-field="token" data-sortable="true">Сайт</th>
                                    <th data-field="id" data-sortable="true" data-visible="false">id</th>
                                    <th data-field="date" data-sortable="true" data-visible="false">Дата</th>
                                    <th data-field="ShowsSearch" data-sortable="true" data-visible="false">Показы (поиск)</th>
                                    <th data-field="ShowsContext" data-sortable="true">Показы (РСЯ)</th>
                                    <th data-field="ClicksSearch" data-sortable="true" data-visible="false">Клики (поиск)</th>
                                    <th data-field="ClicksContext" data-sortable="true" >Клики (РСЯ)</th>
                                    <th data-field="SumSearch" data-sortable="true" data-visible="false">Стоимость кликов (поиск)</th>
                                    <th data-field="SumContext" data-sortable="true">Стоимость кликов (РСЯ)</th>
                                    <th data-field="Conversion" data-sortable="true">Конверсии (РСЯ)</th>
                                    <th data-field="ConversionCost" data-sortable="true">Цена конверсии (РСЯ)</th>
                                </tr>
                            </thead>
                            <tbody>                             
                            <?php foreach($direct as $item) { ?>
                                <?php $ad_count = array_count_values($ad)?>
                                <?php
                                echo '<tr class="">'
                                    . '<td></td>'
                                    . '<td>'.$item['name'].'</td>'    
                                    . '<td>'.$item['campaignid'].'</td>'
                                    . '<td>'.$item['statdate'].'</td>'
                                    . '<td>'.$item['showssearch'].'</td>'
                                    . '<td>'.$item['showscontext'].'</td>'
                                    . '<td>'.$item['clickssearch'].'</td>'
                                    . '<td>'.$item['clickscontext'].'</td>'
                                    . '<td>'.$item['sumsearch'].'</td>'
                                    . '<td>'.round($item['sumcontext'],2).'</td>'
                                    . '<td>'.floor($item['clickscontext']*$item['goalconversioncontext']/100).'</td>'
                                    . '<td>'.round($item['sumcontext']/floor($item['clickscontext']*$item['goalconversioncontext']/100), 2).'</td>'
                                . '</tr>'; ?>
                            <?php } ?>                                
 
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>