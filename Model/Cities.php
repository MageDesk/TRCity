<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Model;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Serialize\SerializerInterface;

/**
 * Class for Cities
 */
class Cities implements ConfigProviderInterface
{
    /** @var CityRepository  */
    private $romCityRepository;

    /** @var SearchCriteriaBuilder  */
    private $searchCriteria;

    /** @var SerializerInterface  */
    private $serializer;

    /**
     * @param CityRepository $romCityRepository
     * @param SearchCriteriaBuilder $searchCriteria
     * @param SerializerInterface $serializer
     */
    public function __construct(
        CityRepository $romCityRepository,
        SearchCriteriaBuilder $searchCriteria,
        SerializerInterface $serializer
    ) {
        $this->romCityRepository = $romCityRepository;
        $this->searchCriteria = $searchCriteria;
        $this->serializer = $serializer;
    }

    /**
     * Get config
     *
     * @return string[]
     */
    public function getConfig(): array
    {
        return [
            'cities' => $this->getCities()
        ];
    }

    /**
     * Get cities
     *
     * @return string
     */
    private function getCities(): string
    {
        $searchCriteriaBuilder = $this->searchCriteria;
        $searchCriteria = $searchCriteriaBuilder->create();

        $citiesList = $this->romCityRepository->getList($searchCriteria);
        $items = $citiesList->getItems();

        $return = [];

        /** @var RomCity $item */
        foreach ($items as $item) {
            $return[$item->getRegionId()][] = $item->getCity();
        }

        return $this->serializer->serialize($return);
    }
}
