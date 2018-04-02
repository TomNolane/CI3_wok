<?php
    $theme = $this->config->item('themes');
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
	<ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Обратная связь</li>
	</ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Обратная связь</div>
                <div class="panel-body">
                    <table class="table-sm" data-toggle="table" data-show-columns="true" data-select-item-name="toolbar1" data-pagination="true" data-page-size="10" data-sort-name="date" data-sort-order="desc">
                        <thead>
                            <tr>
			        <th data-field="state" data-checkbox="true">State</th>  
                                <th data-field="site" data-sortable="true">Сайт</th> 
			        <th data-field="name" data-sortable="true">Имя</th>                              
                                <th data-field="email" data-sortable="true">Email</th>
                                <th data-field="text" data-sortable="true">Сообщение</th>
                                <th data-field="date" data-sortable="true">Дата</th>
			    </tr>
			</thead>
                        <tbody>
                            <?php foreach($data as $item) { ?>
                                <?php
                                echo '<tr class="'.$trclass.'">'
                                    . '<td></td>'
                                    . '<td><img src="/templates/'.$theme[$item['site']].'/img/favicon.png" title="'.$item['site'].'"></td>'    
                                    . '<td>'.$item['name'].'</td>'
                                    . '<td>'.$item['email'].'</td>'
                                    . '<td>'.$item['comment'].'</td>'
                                    . '<td>'.$item['create_date'].'</td>'
                                    . '</tr>'; ?>
                            <?php } ?>                           
                        </tbody>
                    </table>
		</div>
            </div>
	</div>
    </div><!--/.row-->
</div><!--/.main-->
