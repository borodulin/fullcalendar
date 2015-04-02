<?php
/**
 * @link https://github.com/borodulin/yii2-fullcalendar
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-fullcalendar/blob/master/LICENSE.md
 */
namespace conquer\fullcalendar;

use yii\helpers\Json;
use yii\helpers\Html;

class FullCalendarWidget extends \yii\base\Widget
{
	
	
	public $language=false;
	
	public $googleCalendar=false;
	
	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		parent::init();
	}
	
	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$view = $this->view;
		FullCalendarAsset::register($view);
		if($this->language){
			FullCalendarAsset::$language=$this->language;
			conquer\momentjs\MomentjsAsset::$language=$this->language;
		}

		if($this->googleCalendar)
			FullCalendarAsset::$googleCalendar=true;
	}	
}