<?php
namespace Vendor\Extension\Model\ResourceModel\Custom;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Vendor\Extension\Model\Custom', 'Vendor\Extension\Model\ResourceModel\Custom');
    }
}
