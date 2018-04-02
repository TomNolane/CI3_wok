        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Трафик</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> График заполняемости формы <?=$site?>
                                <div class="pull-right">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <?php if(empty($site)){echo 'Все сайты';}else{echo $site;}?>
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li><a href="/stats/traffic/dengimo.ru/<?=$date1?>/<?=$date2?>">Dengimo</a></li>
                                            <li><a href="/stats/traffic/dengoman.ru/<?=$date1?>/<?=$date2?>">Dengoman</a></li>
                                            <li><a href="/stats/traffic/edenga.ru/<?=$date1?>/<?=$date2?>">Edenga</a></li>
                                            <li><a href="/stats/traffic/rublimo.ru/<?=$date1?>/<?=$date2?>">Rublimo</a></li>
                                            <li><a href="/stats/traffic/vkredito.ru/<?=$date1?>/<?=$date2?>">Vkredito</a></li>
                                            <li><a href="/stats/traffic/bzaim5.ru/<?=$date1?>/<?=$date2?>">Bzaim5</a></li>
                                            <li class="divider"></li>
                                            <li><a href="/stats/traffic/all/<?=$date1?>/<?=$date2?>">Все</a></li>
                                        </ul>
                                    </div>   
                                    <input type="text" class="btn btn-default btn-xs" name="daterange" id="daterange" autocomplete="off" value="<?=$date1?> - <?=$date2?>"/>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="chartdiv"></div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            <!-- /.row -->  
            <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bar-chart-o fa-fw"></i> UTM метки <?=$site?>                            
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div id="chartdivutm"></div>
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