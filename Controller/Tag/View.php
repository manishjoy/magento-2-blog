<?php
/**
 * Mageplaza
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Mageplaza.com license that is
 * available through the world-wide-web at this URL:
 * https://www.mageplaza.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    Mageplaza
 * @package     Mageplaza_Blog
 * @copyright   Copyright (c) 2016 Mageplaza (http://www.mageplaza.com/)
 * @license     https://www.mageplaza.com/LICENSE.txt
 */
namespace Mageplaza\Blog\Controller\Tag;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Store\Model\StoreManagerInterface;
use Mageplaza\Blog\Helper\Data as HelperBlog;
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Model\Url as CustomerUrl;
use Magento\Customer\Model\Session;
use Magento\Framework\Controller\Result\ForwardFactory;

class View extends Action
{
	public $resultPageFactory;
	public $helperBlog;
	public $accountManagement;
	public $customerUrl;
	public $session;
	public $storeManager;
	/**
	 * @type \Magento\Framework\Controller\Result\ForwardFactory
	 */
	protected $resultForwardFactory;

    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        HelperBlog $helperBlog,
        PageFactory $resultPageFactory,
        AccountManagementInterface $accountManagement,
		ForwardFactory $resultForwardFactory,
        CustomerUrl $customerUrl,
        Session $customerSession
    ) {
        parent::__construct($context);
        $this->storeManager      = $storeManager;
        $this->helperBlog      = $helperBlog;
        $this->resultPageFactory = $resultPageFactory;
        $this->accountManagement = $accountManagement;
        $this->customerUrl       = $customerUrl;
        $this->session           = $customerSession;
		$this->resultForwardFactory = $resultForwardFactory;
    }

    public function execute()
    {
		$id = $this->getRequest()->getParam('id');
		return ($id) ? $this->resultPageFactory->create() : $this->resultForwardFactory->create()->forward('noroute');
    }
}
