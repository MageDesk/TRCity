<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface CitySearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Items
     *
     * @return \MageDesk\TRCity\Api\Data\CityInterface[]
     */
    public function getItems(): array;

    /**
     * Set Items
     *
     * @param \MageDesk\TRCity\Api\Data\CityInterface[] $items
     */
    public function setItems(array $items): static;
}
