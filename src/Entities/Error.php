<?php

namespace devcoda25\Redtube\Entities;

use JMS\Serializer\Annotation as JMS;
use devcoda25\Redtube\Exceptions\NoInputParametersSpecifiedException;
use devcoda25\Redtube\Exceptions\NoSuchDataProviderException;
use devcoda25\Redtube\Exceptions\NoSuchMethodException;
use devcoda25\Redtube\Exceptions\NotFoundException;


/**
 * Error
 *
 * @package devcoda25\Redtube\Entities
 * @author Lukáš Homza <lhomza@webland.company>
 *
 * @JMS\XmlRoot("error")
 */
class Error
{

    /**
     * @var string $message
     *
     * @JMS\XmlElement()
     * @JMS\Type("string")
     * @JMS\SerializedName("message")
     */
    protected $message;

    /**
     * @var int $code
     *
     * @JMS\XmlElement()
     * @JMS\Type("integer")
     * @JMS\SerializedName("code")
     */
    protected $code;

    /**
     * Map of APIs error codes to exceptions
     *
     * @var array $exceptionMap
     *
     * @JMS\Exclude()
     */
    private $exceptionMap = [
        1001 => NoSuchMethodException::class,
        1002 => NoSuchDataProviderException::class,
        1003 => NoInputParametersSpecifiedException::class,
    ];

    /**
     * Get the corresponding exception mapped to APIs error code
     *
     * @return NotFoundException
     */
    public function getException()
    {
        if (isset($this->exceptionMap[$this->code])) {
            $exception = new $this->exceptionMap[$this->code];
        } else {
            $exception = new NotFoundException($this->message, $this->code);
        }

        return $exception;
    }

}
