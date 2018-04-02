<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Анкеты</li>
	</ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Анкеты</div>
                <div class="panel-body">
                    
                    <div id="toolbar" class="btn-group">
                        <input type="text" class="btn btn-default" name="daterange" id="daterange" autocomplete="off" value="<?=isset($date) ? $date : date('Y-m-d');?>"/>
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?=($utm <> 'all') ? $utm : 'Все источники'?> <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="https://bzaim5.ru/analytics/index/vk/<?=$date?>">VK</a></li>
                            <li><a href="https://bzaim5.ru/analytics/index/direct/<?=$date?>">direct</a></li>
                            <li><a href="https://bzaim5.ru/analytics/index/mytarget/<?=$date?>">mytarget</a></li>
                            <li><a href="https://bzaim5.ru/analytics/index/google/<?=$date?>">google</a></li>
                            <li><a href="https://bzaim5.ru/analytics/index/google_cms/<?=$date?>">google_cms</a></li>
                            
                            <li role="separator" class="divider"></li>
                            <li><a href="https://bzaim5.ru/analytics/index/all/<?=$date?>">Все источники</a></li>
                          </ul>
                        </div>
                    </div>
                    
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-search="true" data-page-size="150" data-sort-name="create_date" data-sort-order="desc" data-toolbar="#toolbar">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="site">Сайт</th>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th data-field="create_date" data-sortable="true">Создано</th>
			        <th data-field="fio" data-visible="false">ФИО</th>
                                <th data-field="f" data-visible="false">Фамилия</th>
                                <th data-field="i" data-visible="false">Имя</th>
                                <th data-field="o" data-visible="false">Отчество</th>
                                <th data-field="city" data-visible="false">Город</th>
                                <th data-field="birthday" data-visible="false">ДР</th>
                                <th data-field="email" data-visible="false">Email</th>
                                <th data-field="phone" data-visible="false">Телефон</th>                               
                                <th data-field="utm" data-visible="false">UTM</th>
                                <th data-field="step">Шаг</th>
  
                                <th data-field="teleport">Teleport</th>                               
                                <th data-field="leadia">Leadia</th>
                                <th data-field="leadgid">Leadgid</th>
                                <th data-field="leadgid1">Leadgid1</th>                                
                                <th data-field="unicom">Unicom</th>
                                <th data-field="firano">Firano</th>
                                <th data-field="linkprofit">Linkprofit</th>
                                <th data-field="linkprofit1">Linkprofit1</th>
                                <th data-field="admitad">Admitad</th>
                                <th data-field="bystradengi">Быстроденьги</th>                                
                                <th data-field="leads">Лидс</th>
                                
                                <th data-field="settings" data-visible="false">Действия</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php foreach($item as $i) { ?>
                                    <?php
                                    
                                        parse_str($i['referer'], $output);
                                        if(isset($output['utm_source'])){
                                            $utm = $output['utm_source']; 
                                        }else{
                                            $utm = ''; 
                                        }
                                        echo ' 
                                            <tr>
                                                <td></td>
                                                <td>'.$i['site'].'</td>
                                                <td><a href="/analytics/formstat/'.$i['id'].'/'.$i['site'].'" target="_blank">'.$i['id'].'</a></td>
                                                <td>'.$i['create_date'].'</td>
                                                <td>'.$i['f'].' '.$i['i'].' '.$i['o'].'</td>
                                                <td>'.$i['f'].'</td>
                                                <td>'.$i['i'].'</td>
                                                <td>'.$i['o'].'</td>
                                                <td>'.$i['city'].'</td>
                                                <td>'.$i['birth'].'</td>
                                                <td>'.$i['email'].'</td>
                                                <td>'.$i['phone'].'</td>
                                                <td>'.$utm.'</td>
                                                <td class="'.stepclass($i['step']).'">'.$i['step'].'</td>
                                                    
                                                <td class="'.sclass($i['vteleport_status']).'"> <a href="#" title="vteleport">'.status($i['vteleport_status']).'</a><br/>'.$i['vteleport_date'].'</td>
                                                <td class="'.sclass($i['leadia_status']).'"> <a href="#" title="leadia">'.status($i['leadia_status']).'</a><br/>'.$i['leadia_date'].'</td>
                                                <td class="'.sclass($i['leadgid_status']).'"> <a href="#" title="leadgid">'.status($i['leadgid_status']).'</a><br/>'.$i['leadgid_date'].'</td>
                                                <td class="'.sclass($i['leadgid1_status']).'"> <a href="#" title="leadgid1">'.status($i['leadgid1_status']).'</a><br/>'.$i['leadgid1_date'].'</td>
                                                <td class="'.sclass($i['unicom_status']).'"> <a href="#" title="unicom">'.status($i['unicom_status']).'</a><br/>'.$i['unicom_date'].'</td>
                                                <td class="'.sclass($i['firano_status']).'"> <a href="#" title="firano">'.status($i['firano_status']).'</a><br/>'.$i['firano_date'].'</td>
                                                <td class="'.sclass($i['linkprofit_status']).'"> <a href="#" title="linkprofit">'.status($i['linkprofit_status']).'</a><br/>'.$i['linkprofit_date'].'</td>
                                                <td class="'.sclass($i['linkprofit1_status']).'"> <a href="#" title="linkprofit1">'.status($i['linkprofit1_status']).'</a><br/>'.$i['linkprofit1_date'].'</td>
                                                <td class="'.sclass($i['admitad_status']).'"> <a href="#" title="admitad">'.status($i['admitad_status']).'</a><br/>'.$i['admitad_date'].'</td>
                                                <td class="'.sclass($i['admitad_bystradengi_status']).'"> <a href="#" title="admitad_bystradengi">'.status($i['admitad_bystradengi_status']).'</a><br/>'.$i['admitad_bystradengi_date'].'</td>
                                                <td class="'.sclass($i['leads_status']).'"> <a href="#" title="leads">'.status($i['leads_status']).'</a><br/>'.$i['leads_date'].'</td>    
                                                <td></td>
                                            </tr>
                                        ';
                                    ?>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div>
</div>
<?php
function stepclass($status){
    switch ($status) {
        case 3:
            $return = "success";
            break;
        case 2:
            $return = "warning";
            break;
        default:
            $return = "";
            break;
    }    
    return $return;
}                                        
function sclass($status){
    switch ($status) {
        case 1:
            $return = "success";
            break;
        case 2:
            $return = "danger";
            break;
        default:
            $return = "";
            break;
    }    
    return $return;
}
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