<?php

namespace Assimtech\Money;

use Locale;
use NumberFormatter;

class Money
{
    /**
     * @var float $amount
     */
    private $amount;

    /**
     * @var Currency $currency
     */
    private $currency;

    /**
     * @param float|integer $amount
     * @param Currency|string $currency iso4217 currency
     */
    public function __construct($amount, Currency $currency)
    {
        $this->currency = $currency;
        $this->setAmount($amount);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            '%s %s',
            $this->getFormattedAmount(),
            $this->currency
        );
    }

    /**
     * @param float $amount
     * @return self
     */
    public function setAmount($amount)
    {
        $this->amount = round($amount, $this->currency->getFractionDigits());

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param string|null $locale if null, defaults to Locale::getDefault
     * @return string
     */
    public function getFormattedAmount($locale = null)
    {
        if ($locale === null) {
            $locale = Locale::getDefault();
        }

        $numberFormatter = new NumberFormatter($locale, NumberFormatter::DECIMAL);
        $fractionDigits = $this->currency->getFractionDigits();
        $numberFormatter->setAttribute(NumberFormatter::MIN_FRACTION_DIGITS, $fractionDigits);
        $numberFormatter->setAttribute(NumberFormatter::MAX_FRACTION_DIGITS, $fractionDigits);

        return $numberFormatter->format($this->amount);
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
