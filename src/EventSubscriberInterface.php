<?php

namespace Bsi\EventDispatcher;

/**
 * @author Sergey Balasov <sbalasov@gmail.com>
 */
interface EventSubscriberInterface
{
    /**
     * Возвращает массив событий, которые прослушивает подписчик.
     *
     * Пример:
     *
     *  * ['moduleId' => ['eventName' => 'methodName']]
     *  * ['moduleId' => ['eventName' => ['methodName', $priority]]]
     *  * ['moduleId' => ['eventName' => [['methodName1', $priority], ['methodName2']]]]
     */
    public static function getSubscribedEvents(): array;
}
