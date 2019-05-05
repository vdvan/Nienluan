<?php 

require 'model/parameter.class.php';

$parameter_class = new Parameter;


echo date_format(date_create('2018/05/30'), 'Y/m/d');

//$date = date_create('2018/05/30');
//date_sub($date,date_interval_create_from_date_string("40 days"));
//echo date_format($date, 'Y/m/d');

echo '<pre>';
print_r($parameter_class->getRangeDateTime('2018/05/31', '00:15', '00:50'));
echo '</pre>';
