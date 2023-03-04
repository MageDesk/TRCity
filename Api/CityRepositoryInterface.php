<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Api;

use Magento\Framework\Api\Search\SearchResultInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use MageDesk\TRCity\Api\Data\CityInterface;
use MageDesk\TRCity\Api\Data\CitySearchResultsInterface;
use Magento\Framework\Api\SearchResults;

interface CityRepositoryInterface
{
    /**
     * Get City by id
     *
     * @param int $id
     * @return \MageDesk\TRCity\Api\Data\CityInterface
     */
    public function get(int $id): \MageDesk\TRCity\Api\Data\CityInterface;

    /**
     * Get list of Cities
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return SearchResults
     */
    public function getList(SearchCriteriaInterface $criteria): SearchResults;

    /**
     * Save City
     *
     * @param \MageDesk\TRCity\Api\Data\CityInterface $entity
     * @return \MageDesk\TRCity\Api\Data\CityInterface
     */
    public function save(CityInterface $entity): \MageDesk\TRCity\Api\Data\CityInterface;

    /**
     * Delete City
     *
     * @param \MageDesk\TRCity\Api\Data\CityInterface $entity
     * @return bool
     */
    public function delete(CityInterface $entity): bool;

    /**
     * Delete City by id
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id): bool;
}
