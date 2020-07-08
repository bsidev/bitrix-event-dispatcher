<?php

namespace Bsi\EventDispatcher;

/**
 * @author Sergey Balasov <sbalasov@gmail.com>
 */
interface EventDispatcherInterface
{
    public function addListener(string $moduleId, string $eventName, $listener, int $priority = 100): void;

    public function addSubscriber(EventSubscriberInterface $subscriber): void;
}
