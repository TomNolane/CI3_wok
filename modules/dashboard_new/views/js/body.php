<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Настройки сайта</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">POPUP</div>
                <div class="panel-body">                                                     
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-page-size="50" data-sort-name="id" data-sort-order="desc">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>                               
			        <th data-field="date" data-sortable="true">Сайт</th>
                                <th data-field="sum" data-sortable="true">Popup</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php                                
                                    $item['popup']? $popup = '<button type="button" id="popup'.$item['id'].'" class="btn btn-default btn-sm popup-settings" data-id="0"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button>' : $popup = '<button type="button" id="popup'.$item['id'].'" class="btn btn-default btn-sm popup-settings" data-id="1"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';                                    
                                ?>                            
                                <?php
                                echo '<tr class="">'
                                    . '<td></td>'
                                    . '<td>'.$item['site'].'</td>'
                                    . '<td>'.$popup.'</td>'
                                    . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>        
    </div><!--/.row-->
</div><!--/.main-->
