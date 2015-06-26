# Money

Provides models for representing Money and an Accountant performing arithmetic on Money without causing rounding errors

## The Models

### Currency

    $usd = new Assimtech\Money\Currency('USD');
    echo (string)$usd; // Outputs USD
    echo $usd->getFractionDigits(); // Outputs 2

    $jpy = new Assimtech\Money\Currency('JPY');
    echo $jpy->getFractionDigits(); // Outputs 0

    $iqd = new Assimtech\Money\Currency('IQD');
    echo $iqd->getFractionDigits(); // Outputs 3


### Money

    // assuming Locale is en-US
    $money = new Money(pi(), $usd);
    echo (string)$money; // Outputs 3.14 USD
    echo $money->getFormattedAmount(); // Outputs 3.14
    echo $money->getFormattedAmount('de-DE'); // Outputs 3,14


## The Accountant

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
