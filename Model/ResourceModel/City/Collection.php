<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Model\ResourceModel\City;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use MageDesk\TRCity\Model\City;

class Collection extends AbstractCollection
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(City::class, \MageDesk\TRCity\Model\ResourceModel\City::class);
    }
}
