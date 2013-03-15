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
            $icons = array(
                'unic'  => array(),
                'other' => array(),
            );
            if (!$apiGetDayResult) {
                return $icons;
            }
            # выделим в параметр unic по одной иконе от каждого события
            foreach ($apiGetDayResult->icons as $icon) {
                $icons[in_array(
                    $icon->event_id,
                    array_map(
                        create_function('$x', 'return $x->event_id;'),
                        $icons['unic']
                    )
                ) ? 'other' : 'unic'][] = $icon;
            }
            return $icons['unic'];
        }
    }
}