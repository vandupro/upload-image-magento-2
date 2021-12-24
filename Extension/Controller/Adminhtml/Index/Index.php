<?php
namespace Vendor\Extension\Controller\Adminhtml\Index;

class Index extends \Magento\Backend\App\Action
{
    const ADMIN_RESOURCE = 'Vendor_Extension::view';

    const PAGE_TITLE = 'Manage grid';

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
       \Magento\Backend\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
         /** @var \Magento\Framework\View\Result\Page $resultPage */
         $resultPage = $this->_pageFactory->create();
         $resultPage->setActiveMenu(static::ADMIN_RESOURCE);
         $resultPage->addBreadcrumb(__(static::PAGE_TITLE), __(static::PAGE_TITLE));
          $resultPage->getConfig()->getTitle()->prepend(__(static::PAGE_TITLE));
         return $resultPage;
    }

}