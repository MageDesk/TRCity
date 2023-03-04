<?php

declare(strict_types=1);

namespace MageDesk\TRCity\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class City extends AbstractDb
{
    /**
     * Main table name
     */
    public const MAIN_TABLE = 'magedesk_trcity_city';

    /**
     * ID field name
     */
    public const ID_FIELD_NAME = 'entity_id';

    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(self::MAIN_TABLE, self::ID_FIELD_NAME);
    }
}
