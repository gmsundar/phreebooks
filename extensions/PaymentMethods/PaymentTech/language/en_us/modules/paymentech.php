<?php
/**
 * Paymentech Payment Module V.1.0 created by s_mack - 09/18/2007 Released under GPL
 *
 * @package languageDefines
 * @copyright Portions Copyright 2007 s_mack
 * @copyright Portions Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 */


// Admin Configuration Items
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_TITLE', 'Paymentech'); // Payment option title as displayed in the admin
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_DESCRIPTION', 'Credit Card processing via Chase Orbital/Paymentech gateway');

// Catalog Items
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_CATALOG_TITLE', 'Credit Card');  // Payment option title as displayed to the customer
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_CREDIT_CARD_TYPE', 'Credit Card Type:');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_CREDIT_CARD_OWNER', 'Credit Card Owner:');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_CREDIT_CARD_NUMBER', 'Credit Card Number:');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_CREDIT_CARD_EXPIRES', 'Credit Card Expiry Date:');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_CVV', 'CVV Number (<a href="javascript:popupWindowCvv()">' . 'More Info' . '</a>)');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_POPUP_CVV_LINK', 'What\'s this?');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_JS_CC_OWNER', '* The owner\'s name of the credit card must be at least ' . CC_OWNER_MIN_LENGTH . ' characters.\n');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_JS_CC_NUMBER', '* The credit card number must be at least ' . CC_NUMBER_MIN_LENGTH . ' characters.\n');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_JS_CC_CVV', '* The 3 or 4 digit CVV number must be entered from the back of the credit card.\n');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_GATEWAY_ERROR', 'An unexpected credit card gateway error occured. Your order was not processed.');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_DECLINED_MESSAGE', 'Your credit card could not be authorized for this reason: <i>Declined (%s)</i>.');
  define('MODULE_PAYMENT_PAYMENTECH_NO_DUPS','The credit card was not processed because it has already been processed. To recharge a credit card, the credit card must be valid and not contain any * characters.');
  define('MODULE_PAYMENT_PAYMENTECH_TEXT_ERROR', 'Credit Card Error!');
  define('MODULE_PAYMENT_PAYMENTECH_TEST_URL_PRIMARY', 'https://orbitalvar1.paymentech.net');
  define('MODULE_PAYMENT_PAYMENTECH_PRODUCTION_URL_PRIMARY', 'https://orbital1.paymentech.net/authorize');
  define('MODULE_PAYMENT_PAYMENTECH_EMAIL_GATEWAY_ERROR_SUBJECT', 'Paymentech Gateway Problem');
  define('MODULE_PAYMENT_PAYMENTECH_EMAIL_SYSTEM_ERROR_SUBJECT', 'Paymentech System Problem');
  define('MODULE_PAYMENT_PAYMENTECH_EMAIL_DECLINED_SUBJECT', 'Paymentech Transaction Declined');
?>