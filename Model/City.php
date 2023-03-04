<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use MageDesk\TRCity\Api\Data\CityInterface;
use MageDesk\TRCity\Api\Data\CityInterfaceFactory;

class City extends AbstractModel
{
    /**
     * @param Context $context
     * @param Registry $registry
     * @param DataObjectHelper $dataObjectHelper
     * @param CityInterfaceFactory $cityDataFactory
     * @param ResourceModel\City $resource
     * @param AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        private readonly DataObjectHelper $dataObjectHelper,
        private readonly  CityInterfaceFactory $cityDataFactory,
        ResourceModel\City $resource,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Get data model
     *
     * @return CityInterface
     */
    public function getDataModel(): CityInterface
    {
        $data = $this->getData();

        $dataObject = $this->cityDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $dataObject,
            $data,
            CityInterfaceFactory::class
        );

        return $dataObject;
    }
}
