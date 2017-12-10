# RatsitBundle
Symfony Bundle for jongotlin/ratsit

## Installation
Install with composer and your favourite http adapter (in this case Guzzle 6)
```bash
$ composer require php-http/client-implementation:^1.0 php-http/discovery:^1.0 php-http/guzzle6-adapter:^1.0 php-http/httplug:^1.0 php-http/message:^1.0 jongotlin/ratsit-bundle:^1.0
```

In services.yaml
```yaml
services:
    httplug.client:
        class: Http\Adapter\Guzzle6\Client
        arguments:
            - '@client'

    client:
        class: GuzzleHttp\Client
```

In config.taml
```yaml
ratsit:
    token: '*************'
    http_client: 'httplug.client'
```

In AppKernel.php
```php
$bundles = array(
    // ...
    new JGI\RatsitBundle\RatsitBundle(),
);
```

## Usage

```php
/** @var \JGI\Ratsit\Ratsit $ratsit */
$ratsit = $this->get('jgi.ratsit');
$persons = $ratsit->searchPerson('Per Fredrik', 'EKEBY');
$person = $ratsit->findPersonBySocialSecurityNumber('194107081111');
```

