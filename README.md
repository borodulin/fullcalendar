FullCalendar widget for Yii2 framework
=================

## Description

FullCalendar is a jQuery plugin that provides a full-sized, drag & drop event calendar like the one below. It uses AJAX to fetch events on-the-fly and is easily configured to use your own feed format. It is visually customizable with a rich API.
For more information please visit [FullCalendar](http://fullcalendar.io/) 

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). 

To install, either run

```
$ php composer.phar require conquer/fullcalendar "*"
```
or add

```
"conquer/fullcalendar": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
use conquer\fullcalendar\FullCalendarWidget;

<?= FullCalendarWidget::widget([
    'weekends' => false
]); ?>

```

## License

**conquer/fullcalendar** is released under the MIT License. See the bundled `LICENSE.md` for details.