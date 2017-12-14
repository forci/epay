<?php

/*
 * This file is part of the Forci Epay package.
 *
 * (c) Martin Kirilov <wucdbm@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Forci\Component\Epay\Response;

/**
 * Response line for a single payment.
 */
abstract class PaymentResponse {

    const PARAM_INVOICE = 'INVOICE';
    const PARAM_STATUS = 'STATUS';

    const VALUE_OK = 'OK';
    const VALUE_ERROR = 'ERR';
    const VALUE_MISSING_PAYMENT = 'NO';

    protected $invoice;

    protected $status;

    public function toString() {
        $fields = [
            self::PARAM_INVOICE => $this->getInvoice(),
            self::PARAM_STATUS => $this->getStatus()
        ];
        $line = [];
        foreach ($fields as $field => $value) {
            $line[] = implode('=', [
                $field,
                $value
            ]);
        }

        return implode(':', $line);
    }

    /**
     * EpayResponse constructor.
     *
     * @param $invoice
     * @param $status
     */
    public function __construct($invoice, $status) {
        $this->invoice = $invoice;
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getInvoice() {
        return $this->invoice;
    }

    /**
     * @param mixed $invoice
     */
    public function setInvoice($invoice) {
        $this->invoice = $invoice;
    }
}
