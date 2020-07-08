# Диспетчер событий

Надстройка над классом `Bitrix\Main\EventManager` для 1С-Битрикс.

Позволяет добавлять слушателей и подписчиков событий.

Вдохновлен компонентом [symfony/event-dispatcher](https://symfony.com/doc/current/components/event_dispatcher.html).

## Требования

- PHP `>=7.2.5`
- 1С-Битрикс `>=12.0.7`

## Установка

### Composer

```sh
composer require bsidev/bitrix-event-dispatcher
```

## Примеры конфигурации

```php
use Bsi\EventDispatcher\EventSubscriberInterface;

class MySubscriber implements EventSubscriberInterface
{
    public function onProlog(): void
    {
        // Code here...
    }

    public function onIblockElementAfterAdd(&$fields): void
    {
        // Code here...
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'main' => [
                'OnProlog' => ['onProlog', 1],
            ],
            'iblock' => [
                'OnAfterIBlockElementAdd' => 'onIblockElementAfterAdd',
            ],
        ];
    }
}
```

```php
// local/php_interface/init.php
$dispatcher = new Bsi\EventDispatcher\EventDispatcher();
$dispatcher->addSubscriber(new MySubscriber());
```
