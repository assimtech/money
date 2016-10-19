# Money

[![Build Status](https://travis-ci.org/assimtech/money.svg?branch=master)](https://travis-ci.org/assimtech/money)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/assimtech/money/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/assimtech/money/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/assimtech/money/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/assimtech/money/?branch=master)

Provides models for representing Money and an Accountant performing arithmetic on Money without causing rounding errors

** THIS REPOSITORY HAS BEEN MOVED TO [Assimtech\Fiat](https://github.com/assimtech/fiat) **

The last version of `Assimtech\Money` is `1.1.3`, `Assimtech\Fiat` follows on from `2.0.0`. The move is due to the naming of `Assimtech\Money\Money`.


## The Models

### Currency

```php
$usd = new Assimtech\Money\Currency('USD');
echo (string)$usd; // Outputs USD
echo $usd->getFractionDigits(); // Outputs 2

$jpy = new Assimtech\Money\Currency('JPY');
echo $jpy->getFractionDigits(); // Outputs 0

$iqd = new Assimtech\Money\Currency('IQD');
echo $iqd->getFractionDigits(); // Outputs 3
```


### Money

```php
// assuming Locale is en-US
$money = new Money(pi(), $usd);
echo (string)$money; // Outputs 3.14 USD
echo $money->getFormattedAmount(); // Outputs 3.14
echo $money->getFormattedAmount('de-DE'); // Outputs 3,14
```


## The Accountant

```php
$accountant = new Assimtech\Money\Accountant();

$threeUSD = $accountant->add($oneUSD, $twoUSD);

$sixUSD = $accountant->subtract($tenUSD, $fourUSD);

$eightUSD = $accountant->multiply($fourUSD, 2);

$threeUSD = $accountant->divide($nineUSD, 3);

$sixUSD = $accountant->sum(array(
    $oneUSD,
    $twoUSD,
    $threeUSD,
));
```


## Twig extension

The accountant is also exposed as a Twig extension

```twig
{{ add_money(money1, money2) }}

{{ subtract_money(money1, money2) }}

{{ multiply_money(money, fraction) }}

{{ divide_money(money, fraction) }}

{{ sum_money([ money1, money2, money3 ]) }}
```


## Frameworks

Please see [MoneyBundle](https://github.com/assimtech/money-bundle) for integration with Symfony 2
