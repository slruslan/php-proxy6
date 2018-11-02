<?php

namespace Slruslan\Proxy6;

use InvalidArgumentException;
use stdClass;

class ProxyOrder
{
    /** @var int */
    private $quantity = 1;

    /** @var int */
    private $period;

    /**
     * @var string Код страны (ISO 3166-1 alpha-2)
     * @see https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
     */
    private $country;

    /**
     * @var int
     * @see ProxyVersion
     */
    private $ip_version = ProxyVersion::IPV4;

    /**
     * @var string
     * @see ProxyType
     */
    private $type = ProxyType::HTTPS;

    /** @var string */
    private $description = '';

    /** @var bool */
    private $auto_prolongation = false;

    /** @var bool */
    private $return_list_as_array = false;

    /**
     * @param Wrapper $apiClient
     *
     * @return stdClass
     * @throws InvalidArgumentException
     */
    public function process(Wrapper $apiClient)
    {
        $required_params = ['quantity', 'period', 'country'];

        // Validate order object
        foreach ($required_params as $param) {
            if ( ! $this->{$param}) {
                throw new InvalidArgumentException("Param `{$param}` is required");
            }
        }

        $request_data = [];

        if ($this->auto_prolongation) {
            $request_data["auto_prolong"] = 1;
        }

        if ($this->return_list_as_array) {
            $request_data['nokey'] = 1;
        }

        return $apiClient->buy(
            $this->quantity,
            $this->period,
            $this->country,
            $this->ip_version,
            $this->type,
            $this->description,
            $request_data
        );
    }

    /**
     * @param int $ip_version
     * @return ProxyOrder
     */
    public function setIpVersion($ip_version)
    {
        $this->ip_version = $ip_version;

        return $this;
    }

    /**
     * @param string $type
     * @return ProxyOrder
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param string $description
     * @return ProxyOrder
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param bool $auto_prolongation
     * @return ProxyOrder
     */
    public function setAutoProlongation($auto_prolongation)
    {
        $this->auto_prolongation = $auto_prolongation;

        return $this;
    }

    /**
     * Returns list without keys (JSON Array instead of JSON Object)
     *
     * @param bool $return_list_as_array
     * @return ProxyOrder
     */
    public function setReturnListArray($return_list_as_array)
    {
        $this->return_list_as_array = $return_list_as_array;

        return $this;
    }

    /**
     * @param string $country
     * @return ProxyOrder
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @param int $quantity
     * @return ProxyOrder
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param int $period
     * @return ProxyOrder
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }
}
