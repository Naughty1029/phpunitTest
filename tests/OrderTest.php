<?php

use PHPUnit\Framework\TestCase;

class PaymentGateway {
    public function charge($amount) {}
}

class OrderTest extends TestCase
{
    public function tearDown() : void {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock()
    {
        $order = new Order(3, 1.99);
        
        $this->assertEquals(5.97, $order->amount);
    
        /**
         * @var \Mockery\LegacyMockInterface&\Mockery\MockInterface|PaymentGateway $gateway_mock
         */
        $gateway_mock = Mockery::mock('PaymentGateway');
        
        $gateway_mock->shouldReceive('charge')
                     ->once()
                     ->with(5.97);
        
        $order->process($gateway_mock);
    }
    
    public function testOrderIsProcessedUsingASpy()
    {
        $order = new Order(3, 1.99);
        
        $this->assertEquals(5.97, $order->amount);
    
        /**
         * @var \Mockery\LegacyMockInterface&\Mockery\MockInterface|PaymentGateway $gateway_spy
         */
        $gateway_spy = Mockery::spy('PaymentGateway');
        
        $order->process($gateway_spy);
        
        $gateway_spy->shouldHaveReceived('charge')  // shouldReceiveではなくshouldHaveReceivedを使用
                    ->times(1)
                    ->with(5.97);
    }
}