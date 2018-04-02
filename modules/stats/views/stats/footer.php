    <!-- jQuery -->
    <script src="/modules/jquery/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/modules/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- daterangepicker -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="/modules/metisMenu/metisMenu.min.js"></script>

    <!--  Charts JavaScript -->
    <script src="/modules/raphael/raphael.min.js"></script>
    <script src="/modules/morrisjs/morris.min.js"></script>
    <script>
        $(function() {
            Morris.Line({
              element: 'morris-area-chart',
              data: [                                       
                <?php foreach($data as $item) { ?>
                    <?php echo '{ y: "'.$item['date'] .'", a: '.$item['count'].', b: '.($item['count']-$item['duplicate']).'},' ?>
                <?php } ?> 
                
              ],
              xkey: 'y',
              ykeys: ['a', 'b'],
              labels: ['Всего анкет', 'Уникальных анкет'],
              pointSize: 2,
              hideHover: 'auto',
              resize: true
            });            
        });
    </script>    
    <script type="text/javascript">
    $(function() {
        $('#daterange').daterangepicker({
            "autoApply": true,
            "locale": {
                    "format": "YYYY-MM-DD",
                    "separator": " - ",
                    "daysOfWeek": [
                        "Вс",
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб"
                    ],
                    "monthNames": [
                        "Январь",
                        "Февраль",
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ],
                    "firstDay": 1
                }
        });
        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            location.href = '/stats/index/<?php if(empty($site)){echo 'all';}else{echo $site;}?>/'+picker.startDate.format('YYYY-MM-DD')+'/'+picker.endDate.format('YYYY-MM-DD');
        });
    });
    </script>
    <!-- Custom Theme JavaScript -->
    <script src="/modules/sb/sb-admin-2.js"></script>

</body>

</html>