<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Api\Data;

use Magento\Framework\Api\ExtensibleDataInterface;

interface CityInterface extends ExtensibleDataInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    public const ENTITY_ID = 'entity_id';
    public const REGION_ID = 'region_id';
    public const CITY = 'city';
    public const DISTRICT_ID = 'district_id';
    public const REGION_CODE = 'region_code';

    /**
     * Get entity_id
     *
     * @return int|null
     */
    public function getEntityId(): ?int;

    /**
     * Set entity_id
     *
     * @param int $entity_id
     * @return \MageDesk\TRCity\Api\Data\CityInterface
     */
    public function setEntityId(int $entity_id): \MageDesk\TRCity\Api\Data\CityInterface;

    /**
     * Get region_id
     *
     * @return int|null
     */
    public function getRegionId(): ?int;

    /**
     * Set region_id
     *
     * @param int $region_id
     * @return \MageDesk\TRCity\Api\Data\CityInterface
     */
    public function setRegionId(int $region_id): \MageDesk\TRCity\Api\Data\CityInterface;

    /**
     * Get city
     *
     * @return string|null
     */
    public function getCity(): ?string;

    /**
     * Set city
     *
     * @param string $city
     * @return \MageDesk\TRCity\Api\Data\CityInterface
     */
    public function setCity(string $city): \MageDesk\TRCity\Api\Data\CityInterface;

    /**
     * Get district_id
     *
     * @return int|null
     */
    public function getDistrictId(): ?int;

    /**
     * Set district_id
     *
     * @param int $district_id
     * @return \MageDesk\TRCity\Api\Data\CityInterface
     */
    public function setDistrictId(int $district_id): \MageDesk\TRCity\Api\Data\CityInterface;

    /**
     * Get region_code
     *
     * @return string|null
     */
    public function getRegionCode(): ?string;

    /**
     * Set region_code
     *
     * @param string $region_code
     * @return \MageDesk\TRCity\Api\Data\CityInterface
     */
    public function setRegionCode(string $region_code): \MageDesk\TRCity\Api\Data\CityInterface;

    /**
     * Retrieve existing extension attributes object or create a new one.
     *
     * @return \MageDesk\TRCity\Api\Data\CityExtensionInterface|null
     */
    public function getExtensionAttributes(): ?\MageDesk\TRCity\Api\Data\CityExtensionInterface;

    /**
     * Set an extension attributes object.
     *
     * @param \MageDesk\TRCity\Api\Data\CityExtensionInterface $extensionAttributes
     * @return static
     */
    public function setExtensionAttributes(
        \MageDesk\TRCity\Api\Data\CityExtensionInterface $extensionAttributes
    ): static;
}
