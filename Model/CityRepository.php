<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Model;

use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use MageDesk\TRCity\Api\Data\CityInterface;
use MageDesk\TRCity\Api\Data\CityInterfaceFactory;
use MageDesk\TRCity\Api\Data\CitySearchResultsInterface;
use MageDesk\TRCity\Api\Data\CitySearchResultsInterfaceFactory;
use MageDesk\TRCity\Api\CityRepositoryInterface;
use MageDesk\TRCity\Model\ResourceModel\City as ResourceCity;
use MageDesk\TRCity\Model\ResourceModel\City\CollectionFactory as CityCollectionFactory;
use Magento\Framework\Api\SearchResults;

class CityRepository implements CityRepositoryInterface
{
    /**
     * @param ResourceCity $resource
     * @param CityFactory $cityFactory
     * @param CityCollectionFactory $cityCollectionFactory
     * @param CitySearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        private readonly ResourceCity $resource,
        private readonly CityFactory $cityFactory,
        private readonly CityCollectionFactory $cityCollectionFactory,
        private readonly CitySearchResultsInterfaceFactory $searchResultsFactory,
        private readonly CollectionProcessorInterface $collectionProcessor,
        private readonly JoinProcessorInterface $extensionAttributesJoinProcessor,
        private readonly ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
    }

    /**
     * Save City data
     *
     * @param CityInterface $entity
     * @return CityInterface
     * @throws CouldNotSaveException
     */
    public function save(CityInterface $entity): CityInterface
    {
        $cityData = $this->extensibleDataObjectConverter->toNestedArray(
            $entity,
            [],
            CityInterface::class
        );

        $cityModel = $this->cityFactory->create()->setData($cityData);

        try {
            $this->resource->save($cityModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the city: %1',
                $exception->getMessage()
            ));
        }
        return $cityModel->getDataModel();
    }

    /**
     * Load City data by given City Identity
     *
     * @param int $id
     * @return CityInterface
     * @throws NoSuchEntityException
     */
    public function get(int $id): CityInterface
    {
        $city = $this->cityFactory->create();
        $this->resource->load($city, $id);
        if (!$city->getId()) {
            throw new NoSuchEntityException(__('City with id "%1" does not exist.', $id));
        }
        return $city->getDataModel();
    }

    /**
     * Load City data collection by given search criteria
     *
     * @param SearchCriteriaInterface $criteria
     * @return SearchResults
     */
    public function getList(SearchCriteriaInterface $criteria): SearchResults
    {
        $collection = $this->cityCollectionFactory->create();

        $this->extensionAttributesJoinProcessor->process(
            $collection,
            CityInterface::class
        );

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Delete City
     *
     * @param CityInterface $city
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(CityInterface $city): bool
    {
        try {
            $cityModel = $this->cityFactory->create();
            $this->resource->load($cityModel, $city->getEntityId());
            $this->resource->delete($cityModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the City: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * Delete City by given City Identity
     *
     * @param int $id
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById(int $id): bool
    {
        return $this->delete($this->get($id));
    }
}
