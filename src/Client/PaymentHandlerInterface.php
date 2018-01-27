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

namespace Forci\Component\Epay\Client;

use Forci\Component\Epay\Exception\EpayException;
use Forci\Component\Epay\Exception\InvoiceNotFoundException;
use Forci\Component\Epay\Payment\PaymentParams;
use Forci\Component\Epay\Response\PaymentResponse;

interface PaymentHandlerInterface {

    /**
     * @param EpayException $ex
     */
    public function onError(EpayException $ex);

    /**
     * @param $encoded string
     * @param $decoded string
     * @param $checksum string
     * @param $checksumMatches boolean
     */
    public function onReceive($encoded, $decoded, $checksum, $checksumMatches);

    /**
     * @param PaymentParams $params
     *
     * @throws InvoiceNotFoundException
     */
    public function onPayment(PaymentParams $params);

    /**
     * @param PaymentParams $params
     *
     * @return PaymentResponse|void
     */
    public function handlePaid(PaymentParams $params);

    /**
     * @param PaymentParams $params
     *
     * @return PaymentResponse|void
     */
    public function handleDenied(PaymentParams $params);

    /**
     * @param PaymentParams $params
     *
     * @return PaymentResponse|void
     */
    public function handleExpired(PaymentParams $params);
}
