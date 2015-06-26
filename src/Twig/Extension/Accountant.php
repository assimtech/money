<?php

namespace Assimtech\Money\Twig\Extension;

use Twig_Extension;
use Twig_SimpleFunction;
use Assimtech\Money;

class Accountant extends Twig_Extension
{
    /**
     * @var Money\Accountant $accountant
     */
    protected $accountant;

    /**
     * @param Money\Accountant $accountant
     */
    public function __construct(Money\Accountant $accountant)
    {
        $this->accountant = $accountant;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('add_money', array($this, 'add')),
            new Twig_SimpleFunction('subtract_money', array($this, 'subtract')),
            new Twig_SimpleFunction('multiply_money', array($this, 'multiply')),
            new Twig_SimpleFunction('divide_money', array($this, 'divide')),
            new Twig_SimpleFunction('sum_monies', array($this, 'sum')),
        );
    }

    /**
     * $money1 + $money2
     *
     * @param Money\Money $money1
     * @param Money\Money $money2
     * @return Money\Money
     */
    public function add(Money\Money $money1, Money\Money $money2)
    {
        return $this->accountant->add($money1, $money2);
    }

    /**
     * $money1 - $money2
     *
     * @param Money\Money $money1
     * @param Money\Money $money2
     * @return Money\Money
     */
    public function subtract(Money\Money $money1, Money\Money $money2)
    {
        return $this->accountant->subtract($money1, $money2);
    }

    /**
     * $money * $fraction
     *
     * @param Money\Money $money
     * @param float|integer $fraction
     * @return Money\Money
     */
    public function multiply(Money\Money $money, $fraction)
    {
        return $this->accountant->multiply($money, $fraction);
    }

    /**
     * $money / $fraction
     *
     * @param Money\Money $money
     * @param float|integer $fraction
     * @return Money\Money
     */
    public function divide(Money\Money $money, $fraction)
    {
        return $this->accountant->divide($money, $fraction);
    }

    /**
     * @param Money\Money[] $monies
     * @return Money\Money
     */
    public function sum(array $monies)
    {
        return $this->accountant->sum($monies);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'assimtech_money_accountant';
    }
}
