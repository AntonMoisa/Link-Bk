<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/bootstrap.css',
        'css/main.css',
        'css/bootstrap-grid.min.css',
        'https://fonts.googleapis.com/css?family=Barlow+Condensed',
        '/assets/de03df7d/css/bootstrap.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/popper.min.js',
        'js/jquery.accordion.js',
        'js/jquery.cookie.js',
        'js/bootstrap.js',
        'js/my.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
