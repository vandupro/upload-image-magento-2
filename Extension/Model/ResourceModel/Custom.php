<?php
namespace Vendor\Extension\Model\ResourceModel;

class Custom extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('magecomp_customtable', 'id');
    }
}
