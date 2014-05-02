<?php 

// Datetime
function between_days($date_ini, $date_end)
{
    $days = abs(strtotime($date_ini)-strtotime($date_end))/86400; 
    return floor($days);
}

function between_hours($date_ini, $date_end)
{
    $hours = abs(strtotime($date_ini)-strtotime($date_end))/3600; 
    return floor($hours);
}

function between_minutes($date_ini, $date_end)
{
    $minutes = abs(strtotime($date_ini)-strtotime($date_end))/60;
    return floor($minutes);
}

function add_hours($date, $hours)
{
    $date = new DateTime($date);
    $date->add(new DateInterval("PT{$hours}H"));
    return $date->format('Y-m-d H:i:s');
}

function format_date($format, $date)
{
    $date = new DateTime($date);
    return $date->format($format);
}

function date_literal($date)
{
    $month_names = array('01' => 'cal_january', '02' => 'cal_february', '03' => 'cal_march', '04' => 'cal_april', '05' => 'cal_mayl', '06' => 'cal_june', '07' => 'cal_july', '08' => 'cal_august', '09' => 'cal_september', '10' => 'cal_october', '11' => 'cal_november', '12' => 'cal_december');

    $date = explode(' ', $date);
    $date = explode('-', $date[0]);
    return  $date[2] . ' de ' . lang($month_names[$date[1]]) . ' de ' . $date[0];
}

function datetime_literal($date)
{
    $month_names = array('01' => 'cal_january', '02' => 'cal_february', '03' => 'cal_march', '04' => 'cal_april', '05' => 'cal_mayl', '06' => 'cal_june', '07' => 'cal_july', '08' => 'cal_august', '09' => 'cal_september', '10' => 'cal_october', '11' => 'cal_november', '12' => 'cal_december');
    $day_names = array('cal_sunday', 'cal_monday', 'cal_tuesday', 'cal_wednesday', 'cal_thursday', 'cal_friday', 'cal_saturday');

    $day_literal = date('w', strtotime($date));
    $date = explode(' ', $date);
    $time = explode(':', $date[1]);
    $date = explode('-', $date[0]);
    return  strtolower(lang($day_names[$day_literal])) . ', ' . $date[2] . ' de ' . lang($month_names[$date[1]]) . ' de ' . $date[0] . ' a la(s) ' . $time[0] . ':' . $time[1];
}

function time_literal($date)
{
    $date = explode(' ', $date);
    $time = explode(':', $date[1]);

    return $time[0] . ':' . $time[1];
}

function is_yesterday($date, $hours)
{
    $date = explode(' ', $date);
    $time = explode(':', $date[1]);

    return $hours >= (int) $time[0];
}

function between_two_dates_literal($date) {
    $days = days_between_two_dates($date, date("Y-m-d H:i:s"));
    if ($days > 31) {
        return date_literal($date);
    } else {
        if ($days > 7) {
            $semanas = (int)( $days / 7 );
            return "Hace " . $semanas . " semana" . ($semanas > 1 ? 's' : '');
        } else {
            if ($days >= 1) {
                return "Hace $days día" . ($days > 1 ? 's' : '');
            } else {
                $hours = hours_between_two_dates($date, date("Y-m-d H:i:s"));
                if (is_yesterday($date, $hours)) {
                    return "Ayer a las " . time_literal($date);
                } else {
                    
                    if ($hours > 1) {
                        return "Hace $hours horas";
                    } else {
                        $minutes = minutes_between_two_dates($date, date("Y-m-d H:i:s"));
                        if ($minutes > 1) {
                            return "Hace $minutes minutos"; 
                        } else {
                            $seconds = seconds_between_two_dates($date, date("Y-m-d H:i:s"));
                            return "Hace $seconds segundos";
                        }
                    }
                }
            }
        }        
    }
}

function seconds_between_two_dates($date1, $date2, $absolute = false) {
    return between_two_dates($date1, $date2, "s", $absolute);
}

function minutes_between_two_dates($date1, $date2, $absolute = false) {
    return between_two_dates($date1, $date2, "i", $absolute);
}

function hours_between_two_dates($date1, $date2, $absolute = false) {
    return between_two_dates($date1, $date2, "h", $absolute);
}

function days_between_two_dates($date1, $date2, $absolute = false) {
    return between_two_dates($date1, $date2, "a", $absolute);
}

function between_two_dates($date1, $date2, $format, $absolute) {
    if (!$date1 instanceof DateTime) {
        $date1 = new DateTime($date1);
    }
    if (!$date2 instanceof DateTime) {
        $date2 = new DateTime($date2);
    }
    return $date1->diff($date2, $absolute)->format("%$format");
}