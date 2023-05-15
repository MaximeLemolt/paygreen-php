<?php

namespace Paygreen\Tests\Unit\Payment\V3;

use PHPUnit\Framework\TestCase;

class OperationTest extends TestCase
{
    use ClientTrait;

    public function testRequestGetOperation()
    {
        $this->client->getOperation('op_123456');

        $request = $this->client->getLastRequest();

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/payment/operations/op_123456', $request->getUri()->getPath());
    }

    public function testRequestListOperation()
    {
        $this->client->listOperation(
            'ins_123456',
            10,
            2
        );

        $request = $this->client->getLastRequest();

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/payment/operations?instrument_id=ins_123456&max_per_page=10&page=2',
            $request->getUri()->getPath() . '?' . $request->getUri()->getQuery()
        );
    }
}