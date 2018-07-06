<?php
class DateFormatter {

    public static function toDatabase($dateBr) {
        $arrDate = explode("/", $dateBr);
        return $arrDate[2] . "-" . $arrDate[1] . "-" . $arrDate[0];
    }

    public static function toView($dateDb) {
        $arrDateDb = explode(" ", $dateDb);
        $arrDate = explode("-", $arrDateDb[0]);
        return $arrDate[2] . "/" . $arrDate[1] . "/" . $arrDate[0];
    }

}