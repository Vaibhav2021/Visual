<?php

if (!function_exists('theme')) {
    function theme()
    {
        return app(App\Core\Theme::class);
    }
}

if (!function_exists('addHtmlAttribute')) {
    /**
     * Add HTML attributes by scope
     *
     * @param $scope
     * @param $name
     * @param $value
     *
     * @return void
     */
    function addHtmlAttribute($scope, $name, $value)
    {
        theme()->addHtmlAttribute($scope, $name, $value);
    }
}

if (!function_exists('addHtmlAttributes')) {
    /**
     * Add multiple HTML attributes by scope
     *
     * @param $scope
     * @param $attributes
     *
     * @return void
     */
    function addHtmlAttributes($scope, $attributes)
    {
        theme()->addHtmlAttributes($scope, $attributes);
    }
}

if (!function_exists('addHtmlClass')) {
    /**
     * Add HTML class by scope
     *
     * @param $scope
     * @param $value
     *
     * @return void
     */
    function addHtmlClass($scope, $value)
    {
        theme()->addHtmlClass($scope, $value);
    }
}

if (!function_exists('printHtmlAttributes')) {
    /**
     * Print HTML attributes for the HTML template
     *
     * @param $scope
     *
     * @return string
     */
    function printHtmlAttributes($scope)
    {
        return theme()->printHtmlAttributes($scope);
    }
}

if (!function_exists('printHtmlClasses')) {
    /**
     * Print HTML classes for the HTML template
     *
     * @param $scope
     * @param $full
     *
     * @return string
     */
    function printHtmlClasses($scope, $full = true)
    {
        return theme()->printHtmlClasses($scope, $full);
    }
}

if (!function_exists('getGlobalAssets')) {
    /**
     * Get the global assets
     *
     * @param $type
     *
     * @return array
     */
    function getGlobalAssets($type = 'js')
    {
        return theme()->getGlobalAssets($type);
    }
}

if (!function_exists('addVendors')) {
    /**
     * Add multiple vendors to the page by name. Refer to settings THEME_VENDORS
     *
     * @param $vendors
     *
     * @return void
     */
    function addVendors($vendors)
    {
        theme()->addVendors($vendors);
    }
}

if (!function_exists('addVendor')) {
    /**
     * Add single vendor to the page by name. Refer to settings THEME_VENDORS
     *
     * @param $vendor
     *
     * @return void
     */
    function addVendor($vendor)
    {
        theme()->addVendor($vendor);
    }
}

if (!function_exists('addJavascriptFile')) {
    /**
     * Add custom javascript file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addJavascriptFile($file)
    {
        theme()->addJavascriptFile($file);
    }
}

if (!function_exists('addCssFile')) {
    /**
     * Add custom CSS file to the page
     *
     * @param $file
     *
     * @return void
     */
    function addCssFile($file)
    {
        theme()->addCssFile($file);
    }
}

if (!function_exists('getVendors')) {
    /**
     * Get vendor files from settings. Refer to settings THEME_VENDORS
     *
     * @param $type
     *
     * @return array
     */
    function getVendors($type)
    {
        return theme()->getVendors($type);
    }
}

if (!function_exists('getCustomJs')) {
    /**
     * Get custom js files from the settings
     *
     * @return array
     */
    function getCustomJs()
    {
        return theme()->getCustomJs();
    }
}

if (!function_exists('getCustomCss')) {
    /**
     * Get custom css files from the settings
     *
     * @return array
     */
    function getCustomCss()
    {
        return theme()->getCustomCss();
    }
}

if (!function_exists('getHtmlAttribute')) {
    /**
     * Get HTML attribute based on the scope
     *
     * @param $scope
     * @param $attribute
     *
     * @return array
     */
    function getHtmlAttribute($scope, $attribute)
    {
        return theme()->getHtmlAttribute($scope, $attribute);
    }
}

if (!function_exists('isUrl')) {
    /**
     * Get HTML attribute based on the scope
     *
     * @param $url
     *
     * @return mixed
     */
    function isUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }
}

if (!function_exists('image')) {
    /**
     * Get image url by path
     *
     * @param $path
     *
     * @return string
     */
    function image($path)
    {
        return asset('assets/' . $path);
    }
}

if(!function_exists('encode')) {
    function encode($id, $key = "")
    {
        $len = 10;
        $md5_key = (!empty($key) ? md5($key) : md5('!7l@S*3h7_s54P-e543lp'));
        $len_jobid = 16;
        $sub_md5key1 = substr($md5_key, 0, $len);
        $sub_md5key2 = substr($md5_key, $len);
        return $sub_md5key1 . $id . $sub_md5key2;
    }
}

if (!function_exists('decode')) {
    function decode($encodeid, $vauletype = 'integer')
    {
        $strRet = "";
        $len = 10;
        $sub_md5key1 = substr($encodeid, 0, $len);
        $sub_md5key2 = substr($encodeid, -1 * (32 - $len));
        $strRet = str_replace(array($sub_md5key1, $sub_md5key2), '', $encodeid);
        if ($vauletype == 'integer')
            $strRet = (int) $strRet;
        else
            $strRet = $strRet;

        return $strRet;
    }
}

if(!function_exists('pageTitle')) {
    function pageTitle()
    {
        return explode('/', $_SERVER['REQUEST_URI']);
    }   
}

if(!function_exists('storage_url')) {
    function storage_url($url)
    {
        return asset('storage/'.$url);
    }   
}





