<?php

/*
 * This file is part of the Forci Epay package.
 *
 * (c) Martin Kirilov <wucdbm@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Forci\Component\Epay\Exception;

class EasyPayGetIdnError extends \Exception {

    protected $body;

    protected $error;

    public function __construct($body) {
        $this->body = $body;

        $error = $body;
        if (0 === strpos($body, 'ERR=')) {
            $error = str_replace('ERR=', '', $body);
        }

        parent::__construct(sprintf('Getting EasyPay IDN failed with error: "%s"', $error));
    }

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @return mixed
     */
    public function getError() {
        return $this->error;
    }
}
