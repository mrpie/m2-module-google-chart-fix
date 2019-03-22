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

namespace Onilab\GoogleChartsFix\Block\Dashboard;

class Diagrams extends \Magento\Backend\Block\Dashboard\Diagrams
{

    /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        $this->addTab(
            'orders',
            [
                'label' => __('Orders'),
                'content' => $this->getLayout()->createBlock('Onilab\GoogleChartsFix\Block\Dashboard\Tab\Orders')->toHtml(),
                'active' => true
            ]
        );

        $this->addTab(
            'amounts',
            [
                'label' => __('Amounts'),
                'content' => $this->getLayout()->createBlock('Onilab\GoogleChartsFix\Block\Dashboard\Tab\Amounts')->toHtml()
            ]
        );
        return parent::_prepareLayout();
    }
}
