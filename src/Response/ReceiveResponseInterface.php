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

interface ReceiveResponseInterface {

    /**
     * @return string
     */
    public function toString();
}
