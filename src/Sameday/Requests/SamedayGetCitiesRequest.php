<?php

namespace Sameday\Requests;

use Sameday\Http\SamedayRequest;
use Sameday\Requests\Traits\SamedayRequestPaginationTrait;

/**
 * Request to get cities list.
 *
 * @package Sameday
 */
class SamedayGetCitiesRequest implements SamedayPaginatedRequestInterface
{
    use SamedayRequestPaginationTrait;

    /**
     * @var int|null
     */
    protected $countyId;

    /**
     * @var string|null
     */
    protected $name;

    /**
     * @var string|null
     */
    protected $postalCode;

    /**
     * @var string|null
     */
    protected $countryCode;

    /**
     * SamedayGetCitiesRequest constructor.
     *
     * @param int|null $countyId
     * @param string|null $name
     * @param string|null $postalCode
     * @param string|null $countryCode
     */
    public function __construct($countyId = null, $name = null, $postalCode = null, $countryCode = null)
    {
        $this->countyId = $countyId;
        $this->name = $name;
        $this->postalCode = $postalCode;
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
            '/api/geolocation/city',
            array_merge(
                [
                    'county' => $this->countyId,
                    'name' => $this->name,
                    'postalCode' => $this->postalCode,
                    'countryCode' => $this->countryCode,
                ],
                $this->buildPagination()
            )
        );
    }

    /**
     * @return int|null
     */
    public function getCountyId()
    {
        return $this->countyId;
    }

    /**
     * @param int|null $countyId
     *
     * @return $this
     */
    public function setCountyId($countyId)
    {
        $this->countyId = $countyId;

        return $this;
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
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string|null $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

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
