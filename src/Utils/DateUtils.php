<?php namespace AsaP\Utils;

class DateUtils
{
    public static function getHowMuchTimeSince($date)
    {
        $now = new \DateTime();
        $date = new \DateTime($date);

        $interval = $now->diff($date);

        $years = $interval->y;
        $months = $interval->m;
        $days = $interval->d;
        $hours = $interval->h;
        $minutes = $interval->i;
        $seconds = $interval->s;

        $result = "Il y a ";

        if ($years > 0) {
            return $result . $years . " an" . ($years > 1 ? "s" : "");
        } else if ($months > 0) {
            return $result . $months . " mois";
        } else if ($days > 0) {
            return $result . $days . " jour" . ($days > 1 ? "s" : "");
        } else if ($hours > 0) {
            return $result . $hours . " heure" . ($hours > 1 ? "s" : "");
        } else if ($minutes > 0) {
            return $result . $minutes . " minute" . ($minutes > 1 ? "s" : "");
        } else if ($seconds > 0) {
            return $result . $seconds . " seconde" . ($seconds > 1 ? "s" : "");
        } else {
            return "À l'instant";
        }
    }
}