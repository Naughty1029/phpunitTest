<?php

use PHPUnit\Framework\TestCase;

interface PaymentGateway
{
    public function charge(int $amount): bool;
}

class OrderTest extends TestCase
{
    public function tearDown() : void {
        Mockery::close();
    }

    public function testOrderIsProcessed()
    {
        $gateway = $this->getMockBuilder('PaymentGateway')
                        ->onlyMethods(['charge'])
                        ->getMock();
        
        $gateway->expects($this->once())
                ->method('charge')
                ->with($this->equalTo(200))
                ->willReturn(true);
        
        $order = new Order($gateway);

        $order->amount = 200;
        
        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery()
    {
        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
                ->once()
                ->with(200)
                ->andReturn(true);
    
        $order = new Order($gateway);

        $order->amount = 200;
        
        $this->assertTrue($order->process());
    }
}