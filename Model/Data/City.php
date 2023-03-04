<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use MageDesk\TRCity\Api\Data\CityExtensionInterface;
use MageDesk\TRCity\Api\Data\CityInterface;

class City extends AbstractExtensibleObject implements CityInterface
{
    /**
     * @inheritDoc
     *
     * @return int|null
     */
    public function getEntityId(): ?int
    {
        return $this->_get(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     *
     * @param int $entity_id
     * @return CityInterface
     */
    public function setEntityId(int $entity_id): CityInterface
    {
        return $this->setData(self::ENTITY_ID, $entity_id);
    }

    /**
     * @inheritDoc
     *
     * @return int|null
     */
    public function getRegionId(): ?int
    {
        return $this->_get(self::REGION_ID);
    }

    /**
     * @inheritDoc
     *
     * @param int $region_id
     * @return CityInterface
     */
    public function setRegionId(int $region_id): CityInterface
    {
        return $this->setData(self::REGION_ID, $region_id);
    }

    /**
     * @inheritDoc
     *
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->_get(self::CITY);
    }

    /**
     * @inheritDoc
     *
     * @param string $city
     * @return CityInterface
     */
    public function setCity(string $city): CityInterface
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * @inheritDoc
     *
     * @return int|null
     */
    public function getDistrictId(): ?int
    {
        return $this->_get(self::DISTRICT_ID);
    }

    /**
     * @inheritDoc
     *
     * @param int $district_id
     * @return CityInterface
     */
    public function setDistrictId(int $district_id): CityInterface
    {
        return $this->setData(self::DISTRICT_ID, $district_id);
    }

    /**
     * Get region_code
     *
     * @return string|null
     */
    public function getRegionCode(): ?string
    {
        return $this->_get(self::REGION_CODE);
    }

    /**
     * @inheritDoc
     *
     * @param string $region_code
     * @return CityInterface
     */
    public function setRegionCode(string $region_code): CityInterface
    {
        return $this->setData(self::REGION_CODE, $region_code);
    }

    /**
     * @inheritDoc
     *
     * @return CityExtensionInterface|null
     */
    public function getExtensionAttributes(): ?CityExtensionInterface
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * @inheritDoc
     *
     * @param CityExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        CityExtensionInterface $extensionAttributes
    ): static {
        return $this->_setExtensionAttributes($extensionAttributes);
    }
}
