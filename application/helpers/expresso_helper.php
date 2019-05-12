<?php
	define('START_NIGHT_HOUR','22');
	define('START_NIGHT_MINUTE','00');
	define('START_NIGHT_SECOND','00');
	define('END_NIGHT_HOUR','06');
	define('END_NIGHT_MINUTE','00');
	define('END_NIGHT_SECOND','00');

    define('START_DAY_HOUR','05');
    define('START_DAY_MINUTE','00');
    define('START_DAY_SECOND','00');
    define('END_DAY_HOUR','21');
    define('END_DAY_MINUTE','00');
    define('END_DAY_SECOND','00');

	
	function computeOvertime($position, $numberOfHours){
		$hrRate = getPositionHourRate($position);
		$ot = (float)(($hrRate * .10) + $hrRate) * $numberOfHours;
		return $ot;
	}
	function computeNightDiff($position, $numberOfHours){
		$hrRate = getPositionHourRate($position);
		$nightDiff = (float)(($hrRate * .25) + $hrRate) * $numberOfHours;
		return $nightDiff;
	}
	function computeNightDiffOvertime($position, $numberOfHours){
		$hrRate = getPositionHourRate($position);
		$nightDiffOvertime = (float)(($hrRate * .35) + $hrRate) * $numberOfHours;
		return $nightDiffOvertime;
	}
	function getPositionHourRate($position){
		$ci =& get_instance();
		$ci->db->where('position_id', $position);
		$pos = $ci->db->get('position_salary')->row();
		return $pos->per_hour_rate;
	}

	function night_difference($start_work,$end_work){
    $start_night = mktime(START_NIGHT_HOUR,START_NIGHT_MINUTE,START_NIGHT_SECOND,date('m',$start_work),date('d',$start_work),date('Y',$start_work));
    $end_night   = mktime(END_NIGHT_HOUR,END_NIGHT_MINUTE,END_NIGHT_SECOND,date('m',$start_work),date('d',$start_work) + 1,date('Y',$start_work));

    if($start_work >= $start_night && $start_work <= $end_night)
    {
        if($end_work >= $end_night)
        {
            return ($end_night - $start_work) / 3600;
        }
        else
        {
            return ($end_work - $start_work) / 3600;
        }
    }
    elseif($end_work >= $start_night && $end_work <= $end_night)
    {
        if($start_work <= $start_night)
        {
            return ($end_work - $start_night) / 3600;
        }
        else
        {
            return ($end_work - $start_work) / 3600;
        }
    }
    else
    {
        if($start_work < $start_night && $end_work > $end_night)
        {
            return ($end_night - $start_night) / 3600;
        }
        return 0;
    }
	}

    function day_difference($start_work,$end_work){
    $start_night = mktime(START_DAY_HOUR,START_DAY_MINUTE,START_DAY_SECOND,date('m',$start_work),date('d',$start_work),date('Y',$start_work));
    $end_night   = mktime(END_DAY_HOUR,END_DAY_MINUTE,END_DAY_SECOND,date('m',$start_work),date('d',$start_work) + 1,date('Y',$start_work));

    if($start_work >= $start_night && $start_work <= $end_night)
    {
        if($end_work >= $end_night)
        {
            return ($end_night - $start_work) / 3600;
        }
        else
        {
            return ($end_work - $start_work) / 3600;
        }
    }
    elseif($end_work >= $start_night && $end_work <= $end_night)
    {
        if($start_work <= $start_night)
        {
            return ($end_work - $start_night) / 3600;
        }
        else
        {
            return ($end_work - $start_work) / 3600;
        }
    }
    else
    {
        if($start_work < $start_night && $end_work > $end_night)
        {
            return ($end_night - $start_night) / 3600;
        }
        return 0;
    }
    }


    function computeTotalDayHours($time_in, $time_out){
        $datetime1 = new DateTime($time_in);
        $datetime2 = new DateTime($time_out);
        $diff = $datetime2->diff($datetime1);
        $hours = round($diff->s / 3600 + $diff->i / 60 + $diff->h + $diff->days * 24, 2);
        return $hours; //2
    }

?>