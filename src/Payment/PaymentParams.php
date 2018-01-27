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

namespace Forci\Component\Epay\Payment;

class PaymentParams {

    const STATUS_PAID = 'PAID';
    const STATUS_DENIED = 'DENIED';
    const STATUS_EXPIRED = 'EXPIRED';

    const PARAM_STATUS = 'STATUS';
    const // STATUS - one of the self::STATUS_ constants
        PARAM_INVOICE = 'INVOICE';
    const // Invoice ID
        PARAM_PAY_TIME = 'PAY_TIME';
    const // YmdHis
        PARAM_STAN = 'STAN';
    const // Номер транзакция
        PARAM_BCODE = 'BCODE';
    const // Авторизационен код на БОРИКА
        PARAM_AMOUNT = 'AMOUNT';
    const // Платена сума, подава се САМО при отстъпка
        PARAM_BIN = 'BIN'; // БИН на карта, подава се САМО при отстъпка

    protected $line;

    protected $status;

    protected $invoice;

    protected $payTime;

    /**
     * @var \DateTime|null
     */
    protected $payDateTime;

    protected $stan;

    protected $bCode;

    protected $amount;

    protected $bin;

    protected $params;

    public function __construct($line) {
        $params = [];

        foreach (explode(':', $line) as $param) {
            list($param, $value) = explode('=', $param);
            $params[$param] = $value;
        }

        $this->line = $line;
        $this->status = $params[self::PARAM_STATUS];
        $this->invoice = $params[self::PARAM_INVOICE];
        $this->payTime = isset($params[self::PARAM_PAY_TIME]) ? $params[self::PARAM_PAY_TIME] : null;
        if ($this->payTime) {
            $this->payDateTime = \DateTime::createFromFormat('YmdHis', $this->payTime);
        }
        $this->stan = isset($params[self::PARAM_STAN]) ? $params[self::PARAM_STAN] : null;
        $this->bCode = isset($params[self::PARAM_BCODE]) ? $params[self::PARAM_BCODE] : null;
        $this->amount = isset($params[self::PARAM_AMOUNT]) ? $params[self::PARAM_AMOUNT] : null;
        $this->bin = isset($params[self::PARAM_BIN]) ? $params[self::PARAM_BIN] : null;
        $this->params = $params;
    }

    /**
     * @return mixed
     */
    public function getLine() {
        return $this->line;
    }

    /**
     * @param mixed $line
     */
    public function setLine($line) {
        $this->line = $line;
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

    public function getPayTime() {
        return $this->payTime;
    }

    /**
     * @param null $payTime
     */
    public function setPayTime($payTime) {
        $this->payTime = $payTime;
    }

    /**
     * @return \DateTime|null
     */
    public function getPayDateTime() {
        return $this->payDateTime;
    }

    /**
     * @param \DateTime|null $payDateTime
     */
    public function setPayDateTime($payDateTime) {
        $this->payDateTime = $payDateTime;
    }

    public function getStan() {
        return $this->stan;
    }

    /**
     * @param null $stan
     */
    public function setStan($stan) {
        $this->stan = $stan;
    }

    public function getBCode() {
        return $this->bCode;
    }

    /**
     * @param null $bCode
     */
    public function setBCode($bCode) {
        $this->bCode = $bCode;
    }

    public function getAmount() {
        return $this->amount;
    }

    /**
     * @param null $amount
     */
    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getBin() {
        return $this->bin;
    }

    /**
     * @param null $bin
     */
    public function setBin($bin) {
        $this->bin = $bin;
    }

    /**
     * @return array
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @param array $params
     */
    public function setParams($params) {
        $this->params = $params;
    }
}
