<?php

namespace Bsi\EventDispatcher;

use Bitrix\Main\EventManager;

/**
 * @author Sergey Balasov <sbalasov@gmail.com>
 */
class EventDispatcher implements EventDispatcherInterface
{
    public function addListener(string $moduleId, string $eventName, $listener, int $priority = 100): void
    {
        EventManager::getInstance()->addEventHandler($moduleId, $eventName, $listener, false, $priority);
    }

    public function addSubscriber(EventSubscriberInterface $subscriber): void
    {
        foreach ($subscriber->getSubscribedEvents() as $moduleId => $events) {
            foreach ($events as $eventName => $params) {
                if (\is_string($params)) {
                    $this->addListener($moduleId, $eventName, [$subscriber, $params]);
                } elseif (\is_string($params[0])) {
                    $this->addListener($moduleId, $eventName, [$subscriber, $params[0]], $params[1] ?? 0);
                } else {
                    foreach ($params as $listener) {
                        $this->addListener($moduleId, $eventName, [$subscriber, $listener[0]], $listener[1] ?? 0);
                    }
                }
            }
        }
    }
}
