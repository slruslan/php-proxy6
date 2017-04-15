# Proxy6.net PHP API wrapper

[![Latest Version on Packagist](https://img.shields.io/packagist/v/slruslan/php-proxy6.svg?style=flat-square)](https://packagist.org/packages/slruslan/php-proxy6)
![License GPL](http://img.shields.io/badge/license-GPL-blue.svg?style=flat-square)

Простая PHP обертка для API сервиса Proxy6.net.

Написана в соответствии с [официальной документацией](https://proxy6.net/developers).

## Установка

С помощью Composer: 

``` bash
$ composer require slruslan/php-proxy6
```

## Использование

Чтобы начать использование API, потребуется сгенерировать API ключ.
Сделать это можно на странице https://proxy6.net/user/developers.

Инициализируйте библиотеку, передав этот ключ в конструктор: 
```php
$api = new \Slruslan\Proxy6\Wrapper('API_KEY');
```
Использование библиотеки:
```php

// Получение списка всех прокси:
$api->getProxy(ProxyState::ALL);

// Получение списка активных прокси:
$api->getProxy(ProxyState::ACTIVE);

// Смена типа прокси с ID 1, 2 и 3 на SOCKS5:
$api->setType([1, 2, 3], ProxyType::SOCKS5);

// Смена типа прокси с ID 1, 2 и 3 на HTTPS:
$api->setType([1, 2, 3], ProxyType::HTTPS);

// Покупка 1 нового российского IPv6 прокси на 30 дней на сервисе:
$api->buy(1, 30, 'ru', ProxyVersion::IPV6);

// Продление прокси с ID 1, 2 и 3 на 30 дней:
$api->prolong(30, [1, 2, 3]);
```

Все ответы возвращаются в виде разобранного JSON в формате stdObject.
Примеры ответов можно найти на странице официальной документации - https://proxy6.net/developers.

В примерах приведены не все доступные функции, для просмотра остальных функций прочитайте код библиотеки напрямую.

## Поддержка

В случае возникновения каких-либо проблем, напишите в Issue tracker, я постараюсь помочь в зависимости от загрузки, но ничего не обещаю. Библиотека будет допиливаться по мере личной необходимости. 

Если кто-то поможет с написанием корректной документации и доработкой самой библиотеки - в частности, обработкой ошибок, более удобным представлением ответов и т.д. - приму любые pull requests и буду очень сильно благодарен :)

## Лицензия

GNU General Public License v3.0 (GPL). Полное описание доступно в файле [LICENSE](LICENSE).

## Контакты для связи:

По всем вопросам можно писать сюда:

Email: me@slinkov.xyz
VK: vk.com/slruslan 
