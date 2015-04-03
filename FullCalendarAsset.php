<?php
/**
 * @link https://github.com/borodulin/yii2-fullcalendar
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-fullcalendar/blob/master/LICENSE.md
 */
namespace conquer\fullcalendar;


class FullCalendarAsset extends \yii\web\AssetBundle
{
	// The files are not web directory accessible, therefore we need
	// to specify the sourcePath property. Notice the @bower alias used.
	public $sourcePath = '@bower/fullcalendar/dist';
	
	public $css=[
		'fullcalendar.min.css',
	];
	
	public $js=[
		'fullcalendar.min.js',
	];
	
	public $depends= [
		'conquer\fullcalendar\FullCalendarPrintAsset',
		'conquer\momentjs\MomentjsAsset',
	];
	
	public static $language=false;
	
	public static $googleCalendar=false;
	
	public function registerAssetFiles($view)
	{
		if(self::$googleCalendar)
			$this->js[]='gcal.js';
		if(self::$language)
			$this->js[]='lang-all.js';
		parent::registerAssetFiles($view);
	}
	
}