FullCalendar widget for Yii2 framework
=================

## Description

FullCalendar is a jQuery plugin that provides a full-sized, drag & drop event calendar like the one below. It uses AJAX to fetch events on-the-fly and is easily configured to use your own feed format. It is visually customizable with a rich API.
For more information please visit [FullCalendar](http://codeseven.github.io/toastr/) 

## Installation

The preferred way to install this extension is through [composer](http://fullcalendar.io/). 

To install, either run

```
$ php composer.phar require conquer/fullCalendar "*"
```
or add

```
"conquer/fullCalendar": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
use conquer\fullCalendar\FullCalendarWidget;

FullCalendarWidget::widget();

```

## License

**conquer/fullCalendar** is released under the MIT License. See the bundled `LICENSE.md` for details.