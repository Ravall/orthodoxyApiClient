<?php
namespace OrthodoxyClient
{
    /**
     * класс содержащий методы для популярных решений
     */
    class Adapter
    {
        /**
         *  получим иконы из апи на день
         *  по одной иконе на событие
         */
        public static function getUnicIconsByDay($apiGetDayResult)
        {
            $icons = array();
            if (!$apiGetDayResult) {
                return $icons;
            }
            foreach ($apiGetDayResult->events as $event) {
                if (isset($event->icons)) {
                    $icons[] = $event->icons[0];
                }
            }
            return $icons;
        }
    }
}
