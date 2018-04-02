<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Анкеты</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Анкеты</div>
                <div class="panel-body">
                    <div id="toolbar" class="btn-group">
                        <input type="text" class="btn btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date1) ? $date1 : date('Y-m-d');?> - <?=isset($date2) ? $date2 : date('Y-m-d');?>"/>
                    </div>
                    <!--
                    <table class="table-sm" data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="50" data-sort-name="id" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="site">Сайт</th>
                                <th data-field="direct" data-sortable="true">Direct</th>
                                <th data-field="mytarget" data-sortable="true">Mytarget</th>
			        <th data-field="vk" data-sortable="true">VK</th>
                                <th data-field="adwords" data-sortable="true">Adwords</th>
                                <th data-field="SendPulse" data-sortable="true">SendPulse</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($site as $s => $d) { ?>
                                <?php                               
                                    echo '<tr>'
                                        . '<td></td>'
                                        . '<td>'.$s.'</td>'
                                        . '<td>'.$d['direct']['count'].'<br/><span style="color: green;">'.$d['direct']['3'].'</span> <span style="color: orange;">'.$d['direct']['2'].'</span> <span style="color: red;">'.$d['direct']['1'].'</span></td>'
                                        . '<td>'.$d['mytarget']['count'].'<br/><span style="color: green;">'.$d['mytarget']['3'].'</span> <span style="color: orange;">'.$d['mytarget']['2'].'</span> <span style="color: red;">'.$d['mytarget']['1'].'</span></td>'
                                        . '<td>'.$d['vk']['count'].'<br/><span style="color: green;">'.$d['vk']['3'].'</span> <span style="color: orange;">'.$d['vk']['2'].'</span> <span style="color: red;">'.$d['vk']['1'].'</span></td>'
                                        . '<td>'.$d['adwords']['count'].'<br/><span style="color: green;">'.$d['adwords']['3'].'</span> <span style="color: orange;">'.$d['adwords']['2'].'</span> <span style="color: red;">'.$d['adwords']['1'].'</span></td>'
                                        . '<td>'.$d['sendpulse']['count'].'<br/><span style="color: green;">'.$d['sendpulse']['3'].'</span> <span style="color: orange;">'.$d['sendpulse']['2'].'</span> <span style="color: red;">'.$d['sendpulse']['1'].'</span></td>'    
                                        . '</tr>';
                                ?>
                            <?php } ?>
                        </tbody>
                    </table>
                    -->
                    <table class="table-sm" data-toggle="table" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="50" data-sort-name="id" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="site">Сайт</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="create_date" data-sortable="true">Создано</th>
			        <th data-field="fio">ФИО</th>
                                <th data-field="city" data-visible="false">Город</th>
                                <th data-field="birthday" data-visible="false">ДР</th>
                                <th data-field="email" data-visible="false">Email</th>
                                <th data-field="phone" data-visible="false">Телефон</th>                               
                                <th data-field="utm">UTM</th>
                                <th data-field="step">Шаг</th>
                                
                                <th data-field="ledia">Ledia</th>
                                <th data-field="leadgid">Leadgid</th>
                                <th data-field="leadgid1">Leadgid1</th>                                
                                <th data-field="teleport">Teleport</th>
                                <th data-field="unicom">Unicom</th>
                                <th data-field="firano">Firano</th>
                                <th data-field="linkprofit">Linkprofit</th>
                                <th data-field="linkprofit1">Linkprofit1</th>
                                
                                <th data-field="settings" data-visible="false">Действия</th>
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
                                $theme = $this->config->item('themes');
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
                                if(isset($item['upfinance_date'])){
                                    if(strtotime(date('Y-m-d')) == strtotime(date('Y-m-d',strtotime($item['upfinance_date']))) ){
                                        $upfinance_date = date('H:i:s',strtotime($item['upfinance_date']));
                                    }else{
                                        $upfinance_date = date('Y-m-d H:i:s',strtotime($item['upfinance_date']));
                                    }                                
                                }else{
                                    $upfinance_date='';
                                }                                
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
                                    . '<td>'.date('d.m.Y', strtotime($item['birth'])).'</td>'
                                    . '<td>'.$item['email'].'</td>'
                                    . '<td>'.$item['phone'].'</td>'
                                    . '<td>'.$utm.'</td>'
                                    . '<td>'.$item['step'].'</td>'
                                        
                                    . '<td>'.status($item['leadia_status']).'<br/>'.$item['leadia_date'].'</td>'
                                    . '<td>'.status($item['leadgid_status']).'<br/>'.$item['leadgid_date'].'</td>'
                                    . '<td>'.status($item['leadgid1_status']).'<br/>'.$item['leadgid1_date'].'</td>'                                        
                                    . '<td>'.status($item['vteleport_status']).'<br/>'.$item['vteleport_date'].'</td>'
                                    . '<td>'.status($item['unicom_status']).'<br/>'.$item['unicom_date'].'</td>'
                                    . '<td>'.status($item['firano_status']).'<br/>'.$item['firano_date'].'</td>'    
                                    . '<td>'.status($item['linkprofit_status']).'<br/>'.$item['linkprofit_date'].'</td>'
                                    . '<td>'.status($item['linkprofit1_status']).'<br/>'.$item['linkprofit1_date'].'</td>'
                                        
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
<?php
function status($status){
    switch ($status) {
        case 1:
            $return = "Ok";
            break;
        case 2:
            $return = "Error";
            break;
        default:
            $return = " ";
            break;
    }    
    return $return;
}
?>