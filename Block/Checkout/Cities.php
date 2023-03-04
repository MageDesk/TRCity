<?php
declare(strict_types=1);

namespace MageDesk\TRCity\Block\Checkout;

use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Serialize\SerializerInterface;
use Magento\Framework\View\Element\Template;
use MageDesk\TRCity\Model\City;
use MageDesk\TRCity\Model\CityRepository;

/**
 * Class for Cities
 */
class Cities extends Template
{
    /** @var CityRepository */
    private $romCityRepository;

    /** @var SearchCriteriaBuilder */
    private $searchCriteria;

    /** @var SerializerInterface */
    private $serializer;

    /**
     * @param Template\Context $context
     * @param CityRepository $romCityRepository
     * @param SearchCriteriaBuilder $searchCriteria
     * @param SerializerInterface $serializer
     * @param array $data
     */
    public function __construct(
        Template\Context      $context,
        CityRepository     $romCityRepository,
        SearchCriteriaBuilder $searchCriteria,
        SerializerInterface   $serializer,
        array                 $data = []
    ) {
        $this->searchCriteria = $searchCriteria;
        $this->romCityRepository = $romCityRepository;
        $this->serializer = $serializer;
        parent::__construct($context, $data);
    }

    /**
     * Cities json
     *
     * @return bool|string
     */
    public function citiesJson()
    {
        $searchCriteriaBuilder = $this->searchCriteria;
        $searchCriteria = $searchCriteriaBuilder->create();

        $citiesList = $this->romCityRepository->getList($searchCriteria);
        $items = $citiesList->getItems();

        $return = [];

        /** @var RomCity $item */
        foreach ($items as $item) {
            $return[] = ['region_id' => $item->getRegionId(), 'city_name' => $item->getCity()];
        }
        asort($return);
        return $this->serializer->serialize($return);
    }
}
