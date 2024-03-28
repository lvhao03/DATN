<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('countTable')) {
    function countTable($table)
    {
        if ($table) {
            return DB::table($table)->count();
        }
        return 0;
    }
}
function getImage($image)
{
    $urlComponents = parse_url($image);
    if (isset($urlComponents['scheme']) && in_array($urlComponents['scheme'], ['http', 'https'])) {
        return $image;
    } else {
        $basePath = env('APP_URL');

        if (strpos($image, '/') === 0) {
            return $basePath . '/' . ltrim($image, '/');
        } else {
            return $basePath . '/' . $image;
        }
    }
}

function addCommas($number) {
    return number_format($number);
}