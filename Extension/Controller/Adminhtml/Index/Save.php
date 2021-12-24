<?php

namespace Vendor\Extension\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    protected $customFactory;
    protected $adapterFactory;
    protected $uploader;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Vendor\Extension\Model\CustomFactory $customFactory
    ) {

        parent::__construct($context);

        $this->customFactory = $customFactory;
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        try {
            $model = $this->customFactory->create();
            $newData = [
                "name" => $data['name'],
                "content" => $data['content'],
                "title" => $data['title'],
            ];
            // $model->addData([
            //     "name" => $data['name'],
            //     "content" => $data['content'],
            //     "title" => $data['title'],
            // ]);
            if (isset($data['image']) && is_array($data['image'])) {
                $strpos = strpos($data['image'][0]['url'],'/media/');
                $data['image'][0]['url'] = substr($data['image'][0]['url'],$strpos + 6);
                $data['image'][0]['url'] = trim($data['image'][0]['url'],'/');
                $newData['image'] = json_encode($data['image']);
            }

            $saveData = $model->addData($newData)->save();

            if ($saveData) {
                $this->messageManager->addSuccess(__('Insert data Successfully !'));
            }
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }

        $this->_redirect('*/*/index');
    }
}
