<?php
namespace Lrntlp\Slider\Controller\Index;
class Index extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        echo 'Execute Action Index_Index OK';
        die();
    }

//    public function execute()
//    {
//        $this->_view->loadLayout();
//        $this->_view->getLayout()->initMessages();
//        $this->_view->renderLayout();
//    }
}