<?php

/*
 * This file is part of the Forci Epay package.
 *
 * Copyright (c) Forci Web Consulting Ltd.
 *
 * Author Martin Kirilov <martin@forci.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Forci\Component\Epay\Response;

/**
 * Response for all payments.
 */
class ReceiveResponse implements ReceiveResponseInterface {

    /**
     * @var PaymentResponse[]
     */
    protected $paymentResponses;

    public function toString() {
        $responses = [];
        /** @var PaymentResponse $response */
        foreach ($this->paymentResponses as $response) {
            $responses[] = $response->toString();
        }

        return implode("\n", $responses);
    }

    /**
     * ReceiveResponse constructor.
     *
     * @param PaymentResponse[] $paymentResponses
     */
    public function __construct(array $paymentResponses) {
        $this->paymentResponses = $paymentResponses;
    }

    /**
     * @return PaymentResponse[]
     */
    public function getPaymentResponses() {
        return $this->paymentResponses;
    }

    /**
     * @param PaymentResponse[] $paymentResponses
     */
    public function setPaymentResponses($paymentResponses) {
        $this->paymentResponses = $paymentResponses;
    }
}
