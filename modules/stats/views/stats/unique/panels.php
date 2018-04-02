        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Форма</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-line-chart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=$count?></div>
                                    <div>Всего анкет за <?=1+((strtotime($date2) - strtotime($date1))/60/60/24)?> дней</div>
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
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-star fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?=count($p).' ('.round(100/($count/(count($p)))).'%)'?></div>
                                    <div>Повторы</div>
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
                            <i class="fa fa-bar-chart-o fa-fw"></i> Повторы <?=$site?>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <?php if(empty($site)){echo 'Все сайты';}else{echo $site;}?>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="/stats/unique/dengimo.ru/<?=$date1?>/<?=$date2?>">Dengimo</a></li>
                                        <li><a href="/stats/unique/dengoman.ru/<?=$date1?>/<?=$date2?>">Dengoman</a></li>
                                        <li><a href="/stats/unique/edenga.ru/<?=$date1?>/<?=$date2?>">Edenga</a></li>
                                        <li><a href="/stats/unique/rublimo.ru/<?=$date1?>/<?=$date2?>">Rublimo</a></li>
                                        <li><a href="/stats/unique/vkredito.ru/<?=$date1?>/<?=$date2?>">Vkredito</a></li>
                                        <li class="divider"></li>
                                        <li><a href="/stats/unique/all/<?=$date1?>/<?=$date2?>">Все</a></li>
                                    </ul>
                                </div>   
                                <input type="text" class="btn btn-default btn-xs" name="daterange" id="daterange" autocomplete="off" value="<?=$date1?> - <?=$date2?>"/>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class="table table-hover table-condensed"> 
                                <thead>
                                    <tr><th>#</th><th>ID</th><th>ФИО</th></tr>
                                </thead>    
                                <?php
                                    $i=0;
                                    $n=0;
                                    $phone=0;                            
                                    foreach ($form as $item){
                                        foreach ($p as $key => $value){
                                            if($key == $item['id']){
                                                echo '<tr><td><a href="/stats/history/'.$item['phone'].'/">'.++$i.'</a></td><td><a href="/stats/history/'.$item['phone'].'/">'.$item['id'].'</a></td><td><a href="/stats/history/'.$item['phone'].'/">'.$item['f'].' '.$item['i'].' '.$item['o'].'</a></td></tr>';                                    
                                            }
                                        }
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