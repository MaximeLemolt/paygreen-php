<?php

namespace Paygreen\Tests\Unit\Payment\V3;

use PHPUnit\Framework\TestCase;

class WalletTest extends TestCase
{
    use ClientTrait;

    public function testRequestGetWallet()
    {
        $this->client->getWallet('wa_123456');

        $request = $this->client->getLastRequest();

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/account/wallets/wa_123456', $request->getUri()->getPath());
    }

    public function testRequestListOperation()
    {
        $this->client->listWallet(
            [
                'shop_id' => 'sh_123456'
            ],
            [
                'max_per_page' => 5,
                'page' => 2,
            ]
        );

        $request = $this->client->getLastRequest();

        $this->assertEquals('GET', $request->getMethod());
        $this->assertEquals('/account/wallets?shop_id=sh_123456&max_per_page=5&page=2',
            $request->getUri()->getPath() . '?' . $request->getUri()->getQuery()
        );
    }
}