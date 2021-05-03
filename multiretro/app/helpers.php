<?php
//időjárás jelentés átlag
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

//időjárás jelentés érték visszaadás
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

//időjárás jelentés összesített átlag
function weather_sum_average($reports){
    $rep_sum = 0;
    $c = count($reports);
    for ($i = 0; $i < $c; $i++) {
        for ($j = 0; $j < 3; $j++) {
            $rep_sum += $reports[$i]->weather_report[$j];
        }
    }    
    
    if (($rep_sum/($c*3)) <= 1.5)
        return 'napos';
    elseif (($rep_sum/($c*3)) <= 2.5)
        return 'felhős';    
    elseif (($rep_sum/($c*3)) <= 3.5)
        return 'esős';
    else
        return 'viharos';    
}

//kanban oszlop érték visszaadás
function get_status($stat) {
    if ($stat == 'to_do') 
        return 'Megvalósításra vár';    
    elseif ($stat == 'doing') 
        return 'Megvalósítása folyamatban';    
    else 
        return 'Megvalósítva';    
}

//plusz-mínusz érték visszaadás
function get_feeling($feel) {
    if ($feel == '0')
        return 'pozitív';
    else
        return 'negatív';
}

//űrlap összesített átlag
function form_sum_average($forms) {
    $forms_sum = 0;
    $c = count($forms);
    for ($i = 0; $i < $c; $i++) {
        for ($j = 0; $j < 5; $j++) {
            $forms_sum += $forms[$i]->form[$j];
        }
    }

    return ($forms_sum/($c*5)); 
}

//űrlap összesített átlag - kommunikáció
function form_sum_average_com($forms) {
    $forms_sum = 0;
    $c = count($forms);
    for ($i = 0; $i < $c; $i++) {        
        $forms_sum += $forms[$i]->form[0];        
    }

    return ($forms_sum/($c)); 
}

//űrlap összesített átlag - egymás segítése
function form_sum_average_help($forms) {
    $forms_sum = 0;
    $c = count($forms);
    for ($i = 0; $i < $c; $i++) {        
        $forms_sum += $forms[$i]->form[1];        
    }

    return ($forms_sum/($c)); 
}

//űrlap összesített átlag - tisztelet
function form_sum_average_respect($forms) {
    $forms_sum = 0;
    $c = count($forms);
    for ($i = 0; $i < $c; $i++) {        
        $forms_sum += $forms[$i]->form[2];        
    }

    return ($forms_sum/($c)); 
}

//űrlap összesített átlag - tehermegosztás
function form_sum_average_share($forms) {
    $forms_sum = 0;
    $c = count($forms);
    for ($i = 0; $i < $c; $i++) {        
        $forms_sum += $forms[$i]->form[3];        
    }

    return ($forms_sum/($c)); 
}

//űrlap összesített átlag - munkavégzés sebessége
function form_sum_average_speed($forms) {
    $forms_sum = 0;
    $c = count($forms);
    for ($i = 0; $i < $c; $i++) {        
        $forms_sum += $forms[$i]->form[4];        
    }

    return ($forms_sum/($c)); 
}
