<?php

//package Type array 

if (!function_exists('getPackageType')){
    function getPackageType() {
        $package_types = ['monthly', 'weekly', 'everyday',];
        return $package_types;
    }
}