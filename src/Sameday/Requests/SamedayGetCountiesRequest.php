<?php

namespace Sameday\Requests;

use Sameday\Http\SamedayRequest;
use Sameday\Requests\Traits\SamedayRequestPaginationTrait;

/**
 * Request to get counties list.
 *
 * @package Sameday
 */
class SamedayGetCountiesRequest implements SamedayPaginatedRequestInterface
{
    use SamedayRequestPaginationTrait;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $countryCode;

    /**
     * SamedayGetCountiesRequest constructor.
     *
     * @param string|null $name
     * @param string|null $countryCode
     */
    public function __construct($name, $countryCode = null)
    {
        $this->name = $name;
        $this->countryCode = $countryCode;
    }

    /**
     * @inheritdoc
     */
    public function buildRequest()
    {
        return new SamedayRequest(
            true,
            'GET',
            '/api/geolocation/county',
            array_merge(
                [
                    'name' => $this->name,
                    'countryCode' => $this->countryCode,
                ],
                $this->buildPagination()
            )
        );
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param string|null $countryCode
     *
     * @return $this
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;

        return $this;
    }
}
