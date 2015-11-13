<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/ihover.css',
        'css/webvowl.app.css',
        'css/webvowl.css',
        'css/ungdungtoan.css',
        'css/khungchinh.css',
        'css/fullscreen.css',
        'css/languages.min.css'
    ];
    public $js = [
        'js/MathJax.js?config=TeX-AMS-MML_HTMLorMML',
        'js/matran.js',
        'js/latexit.js',
        'js/jspdf.debug.js',
        'js/fullscreen.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
