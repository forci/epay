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

class ErrorResponse extends PaymentResponse {

    public function __construct($invoice) {
        parent::__construct($invoice, self::VALUE_ERROR);
    }
}
