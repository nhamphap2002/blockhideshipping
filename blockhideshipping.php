<?php

/*
 * 2007-2015 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 *  @author PrestaShop SA <contact@prestashop.com>
 *  @copyright  2007-2015 PrestaShop SA
 *  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *  International Registered Trademark & Property of PrestaShop SA
 */

if (!defined('_PS_VERSION_'))
    exit;

class BlockHideShipping extends Module {

    public function __construct() {
        $this->name = 'blockhideshipping';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Tran Trong Thang';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('blockhideshipping');
        $this->description = $this->l('blockhideshipping');
        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    public function install() {
        if (!parent::install() || !$this->registerHook('footer'))
            return false;
        return true;
    }

    public function uninstall() {
        return parent::uninstall() && $this->removeMyAccountBlockHook();
    }

    public function hookFooter($params) {
        if (!$this->isCached('blockhideshipping.tpl', $this->getCacheId()))
            $this->smarty->assign(array(
                'customer_id' => $this->context->customer->id
            ));
        return $this->display(__FILE__, 'blockhideshipping.tpl', $this->getCacheId());
    }

}
