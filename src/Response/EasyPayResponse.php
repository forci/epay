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

class EasyPayResponse {

    protected $body;

    protected $idn;

    /**
     * EasyPayResponse constructor.
     *
     * @param $body
     * @param $idn
     */
    public function __construct($body, $idn) {
        $this->body = $body;
        $this->idn = $idn;
    }

    /**
     * @return mixed
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body) {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getIdn() {
        return $this->idn;
    }

    /**
     * @param mixed $idn
     */
    public function setIdn($idn) {
        $this->idn = $idn;
    }
}
