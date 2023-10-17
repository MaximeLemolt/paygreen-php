<?php

namespace Paygreen\Sdk\Payment\V3\Request\Wallet;

use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class WalletRequest extends \Paygreen\Sdk\Core\Request\Request
{
    /**     *
     * @return Request|RequestInterface
     */
    public function getListRequest($filters = [], $pagination = [])
    {
        return $this->requestFactory->create(
            '/account/wallets?' . $this->getListParameters($filters, $pagination),
            null,
            'GET'
        )->withAuthorization()->isJson()->getRequest();
    }

    /**
     * @param string $walletId
     *
     * @return Request|RequestInterface
     */
    public function getGetRequest($walletId)
    {
        return $this->requestFactory->create(
            '/account/wallets/' . urlencode($walletId),
            null,
            'GET'
        )->withAuthorization()->isJson()->getRequest();
    }
}