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
                <div class="panel-heading">
                    Очередь анкет <span class="label label-success"><?=count($data)?> анкеты </span>&nbsp;<span class="label label-info"><?=floor((time() - strtotime($data[0]['create_date'])) / 60)?> минут</span>
                      <div class="btn-group navbar-right" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Шлюз
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="https://dengimo.ru/dashboard_new/turn/vteleport">Телепорт</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/turn/leadia">Лидия</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/turn/leadgid">Лидгид</a></li>                     
                            <li><a href="https://dengimo.ru/dashboard_new/turn/leadgid1">Лидгид1</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/turn/unicom">Юником</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/turn/firano">Фирано</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/turn/linkprofit">Линкпрофит</a></li>
                            <li><a href="https://dengimo.ru/dashboard_new/turn/linkprofit1">Линкпрофит1</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="https://dengimo.ru/dashboard_new/turn/">Все</a></li>
                        </ul>
                      </div>
                </div>
                <div class="panel-body">
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
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="50" data-sort-name="id" data-sort-order="desc">
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
                                <th data-field="step">Шаг</th>
                                <th data-field="status">Статус</th>
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
                                $status = 'L '.$item['leadia_status'].' ('.$leadia_date.') <br/> T '.$item['vteleport_status'].' ('.$vteleport_date.') <br/> U '.$item['upfinance_status'].' ('.$upfinance_date.')';
                                
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