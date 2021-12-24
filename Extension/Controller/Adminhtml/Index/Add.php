<?php
namespace Vendor\Extension\Controller\Adminhtml\Index;

class Add extends \Magento\Backend\App\Action
{

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
         $resultPage->setActiveMenu('Vendor_Extension::view');
         $resultPage->addBreadcrumb(__('Add new record'), __('Add new record'));
         $resultPage->getConfig()->getTitle()->prepend(__('Add new record'));

         return $resultPage;
    }
}
