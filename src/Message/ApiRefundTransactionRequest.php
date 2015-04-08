<?php

namespace Omnipay\NetPay\Message;

/**
 * NetPay Refund Request
 */
class ApiRefundTransactionRequest extends AbstractTransactionRequest
{
    protected $operationType = 'REFUND';

    public function getData()
    {
        $this->validate('transactionReference', 'amount', 'currency', 'transactionId', 'description');

        $data = [
            'merchant' => $this->getMerchantData(),
            'transaction' => $this->getTransactionData(),
            'order' => [
                'order_id' => $this->getTransactionReference(),
            ],
        ];

        return $data;
    }
}
