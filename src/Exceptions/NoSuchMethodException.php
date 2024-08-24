<?php

namespace devcoda25\Redtube\Exceptions;

/**
 * NoSuchMethod Exception
 *
 * @package devcoda25\Redtube\Exceptions
 * @author Lukáš Homza <lhomza@webland.company>
 */
class NoSuchMethodException extends \Exception
{

    /**
     * Redtubes original error code
     *
     * @var int $innerCode
     */
    protected $code = 1001;

}
