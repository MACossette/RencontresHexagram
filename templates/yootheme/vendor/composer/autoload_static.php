<?php

// autoload_static.php @generated by Composer

namespace YOOtheme\Autoload;

class ComposerStaticInit56f81e4713582f8f1271f0cc8e8cab46
{
    public static $files = array (
        '1f242f6815d6f7147403767412d1145b' => __DIR__ . '/..' . '/yootheme/application/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YOOtheme\\Wordpress\\' => 19,
            'YOOtheme\\Theme\\Wordpress\\' => 25,
            'YOOtheme\\Theme\\Joomla\\' => 22,
            'YOOtheme\\Theme\\' => 15,
            'YOOtheme\\Joomla\\' => 16,
            'YOOtheme\\Http\\Message\\' => 22,
            'YOOtheme\\GraphQL\\' => 17,
            'YOOtheme\\Builder\\Wordpress\\Source\\' => 34,
            'YOOtheme\\Builder\\Wordpress\\' => 27,
            'YOOtheme\\Builder\\Templates\\' => 27,
            'YOOtheme\\Builder\\Newsletter\\' => 28,
            'YOOtheme\\Builder\\Joomla\\Source\\' => 31,
            'YOOtheme\\Builder\\Joomla\\' => 24,
            'YOOtheme\\Builder\\' => 17,
            'YOOtheme\\' => 9,
        ),
        'P' => 
        array (
            'Psr\\Http\\Message\\' => 17,
            'Psr\\Container\\' => 14,
        ),
        'G' => 
        array (
            'GraphQL\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YOOtheme\\Wordpress\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/platform-wordpress/src',
        ),
        'YOOtheme\\Theme\\Wordpress\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/theme-wordpress/src',
            1 => __DIR__ . '/..' . '/yootheme/theme-wordpress-editor/src',
            2 => __DIR__ . '/..' . '/yootheme/theme-wordpress-posts/src',
            3 => __DIR__ . '/..' . '/yootheme/theme-wordpress-woocommerce/src',
        ),
        'YOOtheme\\Theme\\Joomla\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/theme-joomla/src',
            1 => __DIR__ . '/..' . '/yootheme/theme-joomla-articles/src',
            2 => __DIR__ . '/..' . '/yootheme/theme-joomla-editor/src',
            3 => __DIR__ . '/..' . '/yootheme/theme-joomla-finder/src',
            4 => __DIR__ . '/..' . '/yootheme/theme-joomla-menus/src',
            5 => __DIR__ . '/..' . '/yootheme/theme-joomla-modules/src',
        ),
        'YOOtheme\\Theme\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/styler/src',
            1 => __DIR__ . '/..' . '/yootheme/theme-analytics/src',
            2 => __DIR__ . '/..' . '/yootheme/theme-cookie/src',
            3 => __DIR__ . '/..' . '/yootheme/theme-highlight/src',
            4 => __DIR__ . '/..' . '/yootheme/theme-settings/src',
            5 => __DIR__ . '/..' . '/yootheme/theme-wordpress-widgets/src',
        ),
        'YOOtheme\\Joomla\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/platform-joomla/src',
        ),
        'YOOtheme\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/http-message/src',
        ),
        'YOOtheme\\GraphQL\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/graphql/src',
        ),
        'YOOtheme\\Builder\\Wordpress\\Source\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/builder-wordpress-source/src',
        ),
        'YOOtheme\\Builder\\Wordpress\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/builder-wordpress/src',
        ),
        'YOOtheme\\Builder\\Templates\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/builder-templates/src',
        ),
        'YOOtheme\\Builder\\Newsletter\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/builder-newsletter/src',
        ),
        'YOOtheme\\Builder\\Joomla\\Source\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/builder-joomla-source/src',
        ),
        'YOOtheme\\Builder\\Joomla\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/builder-joomla/src',
        ),
        'YOOtheme\\Builder\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/builder-source/src',
        ),
        'YOOtheme\\' => 
        array (
            0 => __DIR__ . '/..' . '/yootheme/application/src',
            1 => __DIR__ . '/..' . '/yootheme/builder/src',
            2 => __DIR__ . '/..' . '/yootheme/configuration/src',
            3 => __DIR__ . '/..' . '/yootheme/container/src',
            4 => __DIR__ . '/..' . '/yootheme/database/src',
            5 => __DIR__ . '/..' . '/yootheme/encryption/src',
            6 => __DIR__ . '/..' . '/yootheme/http-server/src',
            7 => __DIR__ . '/..' . '/yootheme/image/src',
            8 => __DIR__ . '/..' . '/yootheme/theme/src',
            9 => __DIR__ . '/..' . '/yootheme/translation/src',
            10 => __DIR__ . '/..' . '/yootheme/utils/src',
            11 => __DIR__ . '/..' . '/yootheme/view/src',
            12 => __DIR__ . '/..' . '/yootheme/view-metadata/src',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'GraphQL\\' => 
        array (
            0 => __DIR__ . '/..' . '/webonyx/graphql-php/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit56f81e4713582f8f1271f0cc8e8cab46::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit56f81e4713582f8f1271f0cc8e8cab46::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
