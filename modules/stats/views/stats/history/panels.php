        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?=$form[0]['f'].' '.$form[0]['i'].' '.$form[0]['o']?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$count?></div>
                                    <div>Всего заполненных анкет за <?=1+((strtotime($date2) - strtotime($date1))/60/60/24)?> дней</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>               
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Повторы
                            <div class="pull-right">   
                                <input type="text" class="btn btn-default btn-xs" name="daterange" id="daterange" autocomplete="off" value="<?=$date1?> - <?=$date2?>"/>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class="table table-hover table-condensed"> 
                                <thead>
                                    <tr><th>#</th><th>Site</th><th>ID</th><th>ФИО</th><th>Referer</th><th>Телефон</th><th>Сумма</th><th>Период</th><th>Leadia</th><th>Teleport</th><th>Upfinance</th><th>Шаг формы</th><th>Дата создания</th></tr>
                                </thead>    
                                <?php
                                    $i=0;
                                    foreach ($form as $item){
                                        echo '<tr><td>'.++$i.'</td><td>'.$item['site'].'</td><td>'.$item['id'].'</td><td>'.$item['f'].' '.$item['i'].' '.$item['o'].'</td><td title="'.$item['referer'].'">'.substr($item['referer'],7,15).'</td><td>'.$item['phone'].'</td><td>'.$item['amount'].'</td><td>'.$item['period'].'</td><td>'.$item['leadia_status'].'<br/>'.$item['leadia_date'].'</td><td>'.$item['vteleport_status'].'<br/>'.$item['vteleport_date'].'</td><td>'.$item['upfinance_status'].'<br/>'.$item['upfinance_date'].'</td><td>'.$item['step'].'</td><td>'.$item['create_date'].'</td></tr>';
                                    }                          
                                ?>
                            </table>                                
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->