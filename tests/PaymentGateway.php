<?php
class PaymentGateway
{
    public function charge(int $amount): bool
    {
        return true;
    }
}