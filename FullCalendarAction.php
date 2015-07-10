<?php
/**
 * @link https://github.com/borodulin/yii2-fullcalendar
 * @copyright Copyright (c) 2015 Andrey Borodulin
 * @license https://github.com/borodulin/yii2-fullcalendar/blob/master/LICENSE.md
 */

namespace conquer\fullcalendar;

use yii\web\Response;
use yii\base\InvalidConfigException;

/**
 *
 * @author Andrey Borodulin
 */
class FullCalendarAction extends \yii\base\Action
{

    /**
     * @var callable PHP callback function to retrieve filtered data
     * @example function ($start, $end) { return Events::find()->where(['>','start',$start])->andWhere(['<','end',$end])->all(); }
     */
    public $dataCallback;
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $this->controller->enableCsrfValidation = false;
    }

    public function run($start, $end, $_)
    {
        $request = \Yii::$app->request;
        
        if (!is_callable($this->dataCallback)) {
            throw new InvalidConfigException('"' . get_class($this) . '::dataCallback" should be a valid callback.');
        }
        
        return call_user_func($this->dataCallback, $start, $end);        
    }
}