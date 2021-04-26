<?php
function weather_average($weather_report){
    if((($weather_report['1'] +  $weather_report['2'] +  $weather_report['0'])/3) <= 1.5)
        return 'napos';
    elseif((($weather_report['1'] +  $weather_report['2'] +  $weather_report['0'])/3) <= 2.5)
        return 'felhős';    
    elseif((($weather_report['1'] +  $weather_report['2'] +  $weather_report['0'])/3) <= 3.5)
        return 'esős';
    else
        return 'viharos';    
}

function weather_value($weather_report, $num){
    if ($weather_report[$num] == '1')
        return 'napos';
    elseif ($weather_report[$num] == '2')
        return 'felhős';    
    elseif ($weather_report[$num] == '3')
        return 'esős';    
    else
        return 'viharos';
}

function weather_sum_average($reports){
    $rep_sum = 0;
    $c = count($reports);
    for ($i = 0; $i < $c; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $rep_sum = $reports[$i]->weather_report[$j];
        }
    }

    if (($rep_sum/$c) <= 1.5)
        return 'napos';
    elseif (($rep_sum/$c) <= 2.5)
        return 'felhős';    
    elseif (($rep_sum/$c) <= 3.5)
        return 'esős';
    else
        return 'viharos';    
}