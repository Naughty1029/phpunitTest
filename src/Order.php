<?php

/**
 * Order
 *
 * An example order class
 */
class Order
{
    public $amount;
    private $quantity;
    private $unit_price;

    public function __construct($quantity, $unit_price)
    {
        $this->quantity = $quantity;
        $this->unit_price = $unit_price;
        $this->amount = $this->quantity * $this->unit_price;
    }

    public function process(PaymentGateway $gateway)
    {
        $gateway->charge($this->amount);
    }
}