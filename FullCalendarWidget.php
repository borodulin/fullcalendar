<?php
/**
 * @link https://github.com/borodulin/yii2-fullcalendar
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-fullcalendar/blob/master/LICENSE.md
 */
namespace conquer\fullcalendar;

use yii\helpers\Html;
use conquer\helpers\Json;
use conquer\momentjs\MomentjsAsset;

/**
 * 
 * @author Andrey Borodulin
 *
 */
class FullCalendarWidget extends \yii\base\Widget
{
	
	/**
	 * Customize the language and localization options for the calendar.
	 * @link http://fullcalendar.io/docs/text/lang/
	 * @var string
	 */
	public $language=false;
	
	/**
	 * You must first have a Google Calendar API Key
	 * @link http://fullcalendar.io/docs/google_calendar/
	 * @var boolean
	 */
	public $googleCalendar=false;
	
	/**
	 * General FullCalendar options
	 * @link http://fullcalendar.io/docs/
	 * @var array()
	 */
	public $options;
	
	/**
	 * 
	 * @var array()
	 */
	public $htmlOptions=[];
	
	/**
	 * 
	 * @var array()
	 */
	public $events;
	
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
		$htmlOptions=$this->htmlOptions;
		if(empty($htmlOptions['id']))
			$htmlOptions['id'] = $this->getId();
		$this->registerAssets($view);
		$options=$this->options;
		if($this->language && !isset($options['lang']))
			$options['lang']=$this->language;
		
		if($this->events)
			$options['events']=$this->events;
		
		$options=Json::encode($options);
		
		$view->registerJs("jQuery('#{$htmlOptions['id']}').fullCalendar($options);");
		
		return Html::tag('div', '', $htmlOptions);
	}

	
	public function registerAssets($view)
	{
		FullCalendarAsset::register($view);
		if($this->language){
			FullCalendarAsset::$language=$this->language;
			MomentjsAsset::$language=$this->language;
		}
		if($this->googleCalendar)
			FullCalendarAsset::$googleCalendar=true;
	}
}