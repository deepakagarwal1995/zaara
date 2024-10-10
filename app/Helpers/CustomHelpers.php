<?php

use App\Models\local_cities;


if (!function_exists('get_local_price')) {
    function get_local_price($cab_id, $name)
    {
        $city = local_cities::where('name', $name)->where('cab_id', $cab_id)->first();

        if ($city) {
            return $city;
        } else {
            return null;
        }
    }
}