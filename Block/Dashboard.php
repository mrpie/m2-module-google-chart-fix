<?php
/**
 * Onilab GoogleChartFix
 *
 * @category   Onilab
 * @package    Onilab_GoogleChartFix
 * @version    1.0.0
 *
 * Release with version 1.0.0
 *
 * @author     Onilab https://onilab.com/
 * @copyright  Copyright (c) 2019 Onilab LLC
 */

namespace Onilab\GoogleChartsFix\Block;

class Dashboard extends \Magento\Backend\Block\Dashboard
{
    /**
     * @return void
     */
    protected function _prepareLayout()
    {
        $this->addChild('lastOrders', \Magento\Backend\Block\Dashboard\Orders\Grid::class);

        $this->addChild('totals', \Magento\Backend\Block\Dashboard\Totals::class);

        $this->addChild('sales', \Magento\Backend\Block\Dashboard\Sales::class);

        $isChartEnabled = $this->_scopeConfig->getValue(
            self::XML_PATH_ENABLE_CHARTS,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        if ($isChartEnabled) {
            $block = $this->getLayout()->createBlock(\Magento\Backend\Block\Dashboard\Diagrams::class);
        } else {
            $block = $this->getLayout()->createBlock(
                \Magento\Backend\Block\Template::class
            )->setTemplate(
                'dashboard/graph/disabled.phtml'
            )->setConfigUrl(
                $this->getUrl(
                    'adminhtml/system_config/edit',
                    ['section' => 'admin', '_fragment' => 'admin_dashboard-link']
                )
            );
        }
        $this->setChild('diagrams', $block);

        $this->addChild('grids', \Magento\Backend\Block\Dashboard\Grids::class);

        parent::_prepareLayout();
    }
}
