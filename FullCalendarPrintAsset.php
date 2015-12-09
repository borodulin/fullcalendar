<?php
/**
 * @link https://github.com/borodulin/yii2-fullcalendar
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-fullcalendar/blob/master/LICENSE.md
 */
namespace conquer\fullcalendar;

/**
 * @author Andrey Borodulin
 */
class FullCalendarPrintAsset extends \yii\web\AssetBundle
{
    // The files are not web directory accessible, therefore we need
    // to specify the sourcePath property. Notice the @bower alias used.
    public $sourcePath = '@bower/fullcalendar/dist';
    
    public $css = [
        'fullcalendar.print.css',
    ];
    
    public $cssOptions = [
        'media' => 'print'
    ];

}