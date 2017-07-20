<?php
/**
 * Created by PhpStorm.
 * User: apavlov
 * Date: 29.06.2017
 * Time: 13:59
 */

class EventData {
	/**
	 * Экземпляр контроллера, инициировавший событие
	 * @var BaseController
	 */
	public $sender;

	/**
	 * Имя события
	 * @var string
	 */
	public $name;
	/**
	 * Группа к которой относится событие (нэймспейс)
	 * @var string
	 */
	public $group;
	/**
	 * Массив с произвольными аргументами
	 * @var array
	 */
	public $arguments;

}

$eventData = new EventData();

$eventData->sender = $controller;
$eventData->name = 'onDelete';
$eventData->group = 'global';
$eventData->arguments = array('id' => 15);

$eventDispatcher->triggerEvent($eventData);

/**
 * Обработчик события удаления
 * @param EventData $eventData
 */
protected function onDelete($eventData) {
	$eventData->sender->model->deleteChilds();
}
