# CafeApi Teste

[![Maintainer](http://img.shields.io/badge/maintainer-@iaematt-blue.svg?style=flat-square)](https://instagram.com/iaematt_)
[![Source Code](http://img.shields.io/badge/source-iaematt/cafeapi-blue.svg?style=flat-square)](https://github.com/iaematt/cafeapi)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/iaematt/cafeapi.svg?style=flat-square)](https://packagist.org/packages/iaematt/cafeapi)
[![Latest Version](https://img.shields.io/github/release/iaematt/cafeapi.svg?style=flat-square)](https://github.com/iaematt/cafeapi/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/iaematt/cafeapi.svg?style=flat-square)](https://scrutinizer-ci.com/g/iaematt/cafeapi)
[![Quality Score](https://img.shields.io/scrutinizer/g/iaematt/cafeapi.svg?style=flat-square)](https://scrutinizer-ci.com/g/iaematt/cafeapi)
[![Total Downloads](https://img.shields.io/packagist/dt/iaematt/cafeapi.svg?style=flat-square)](https://packagist.org/packages/iaematt/cafeapi)

CaféApi Library é um pequeno conjunto de classes desenvolvidas na formação Full Stack PHP Developer da UpInside para integração ao web service de uma plataforma SaaS desenvolvida no curso.

###### CaféApi Library is a small set of classes developed in UpInside's Full Stack PHP Developer training for integration into the web service of a SaaS platform developed in the course..

### Highlights

-   Instalação simples
-   Abstração de todos os métodos da API
-   EFácil autenticação com e-mail e senha
-   Pronto para o composer e compatível com PSR-2

## Instalação

Instalação possivel via composer:

```bash
"iaematt/cafeapi": "^1.0"
```

ou rode

```bash
composer require iaematt/cafeapi
```

## Documentação

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. Ele funciona assim:

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

#### User endpoint

```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use iaematt\CafeApi\Me;

$me = new Me('api.site.com', 'nome@servidor.com.br', '123@mudar');

/** Me */
$user = $me->me();

/** Update */
$user->update([
    'first_name' => 'Robson',
    'last_name' => 'Leite',
    'genre' => 'male',
    'date_birth' => '1980-01-02',
    'document' => '888888888',
]);

/** Photo */
$user->photo($_FILES['photo']);

/** Test and result */
if ($user->error()) {
    $user->error(); /** Object */
} else {
    $user->response(); /** Object */
}
```

#### Invoices endpoint:

```php
<?php

require __DIR__ . '/../vendor/autoload.php';

use RobsonVLeite\CafeApi\Invoices;

$invoices = new Invoices('api.site.com', 'nome@servidor.com.br', '123@mudar');

/** Index */
$index = $invoices->index(null);

/** Index filter */
$index = $invoices->index([
    'wallet_id' => 23,
    'type' => 'fixed_income',
    'status' => 'paid',
    'page' => 2,
]);

/** Create */
$invoices->create([
    'wallet_id' => 23,
    'category_id' => 3,
    'description' => 'Pagamento Cartão',
    'type' => 'expense',
    'value' => '25000.20',
    'due_at' => '2019-10-02',
    'repeat_when' => 'single',
    'period' => 'month',
    'enrollments' => '1',
]);

/** Read */
$invoices->read(91);

/** Update */
$invoiceId = 91;
$invoices->update($invoiceId, [
    'wallet_id' => 23,
    'category_id' => 3,
    'description' => 'Pagamento Cartão',
    'value' => '25000.20',
    'due_day' => 25,
    'status' => 'paid',
]);

/** Delete */
$invoices->delete(91);

/** Test and result */
if ($invoices->error()) {
    $invoices->error(); /** Object */
} else {
    $invoices->response(); /** Object */
}
```

### Outros

Você também conta com classes para os endpoints de carteiras e assinaturas, toda documentação de uso com exemplos práticos está disponível na pasta examples desta biblioteca. Por favor, consulte lá.

###### You also have classes for endpoints of portfolios and signatures, all the documentation of use with practical examples is available in the examples folder library. Please check there.

## Contribuir

Por favor veja [CONTRIBUTING](https://github.com/iaematt/cafeapi/blob/master/CONTRIBUTING.md) para detalhes.

## Suporte

Se você descobrir algum problema relacionado à segurança, envie um e-mail para matheusbastos@outlook.com em vez de usar o rastreador de problemas.

###### Security: If you discover any security related issues, please email matheusbastos@outlook.com instead of using the issue tracker.

Obrigado

## Creditos

-   [Matheus Bastos](https://github.com/iaematt) (Desenvolvedor)
-   [UpInside Treinamentos](https://github.com/upinside) (Time)
-   [All Contributors](https://github.com/iaematt/cafeapi/contributors) (This Rock)

## Licença

The MIT License (MIT). Please see [License File](https://github.com/iaematt/cafeapi/blob/master/LICENSE) for more information.
