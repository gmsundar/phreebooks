<?php
// +-----------------------------------------------------------------+
// Phreedom Language Translation File
// Generated: 2011-11-27 05:02:31
// Module/Method: payment-authorizenet
// ISO Language: nl_nl
// Version: 3.2
// +-----------------------------------------------------------------+
// Path: /modules/payment/methods/authorizenet/language/nl_nl/language.php

define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TITLE','Authorize.net');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_DESCRIPTION','Credit card betalingen accepteren via Authorize.net ');
define('MODULE_PAYMENT_AUTHORIZENET_LOGIN_DESC','de API Login ID voor de Authorize.net service');
define('MODULE_PAYMENT_AUTHORIZENET_TXNKEY_DESC','Transactie sleutel voor het versleutelen van de data<br />(bekijk uw Authorizenet Account->Security Settings->API Login ID and Transaction Key voor details.)');
define('MODULE_PAYMENT_AUTHORIZENET_MD5HASH_DESC','Versleutelingssleutel voor het valideren van ontvangen data(MAX 20 CHARTERS, Precies zoals u het heeft ingevoerd in Authorize.net account instellingen). Of laat leeg.');
define('MODULE_PAYMENT_AUTHORIZENET_TESTMODE_DESC','Transactie mode voor verwerken van orders');
define('MODULE_PAYMENT_AUTHORIZENET_AUTHORIZATION_TYPE_DESC','Wil u credit card transacties alleen autoriseren of autoriseren en vastleggen?');
define('MODULE_PAYMENT_AUTHORIZENET_USE_CVV_DESC','Wil u de klant vragen om zijn card\'s CVV nummer');
define('MODULE_PAYMENT_AUTHORIZENET_DEBUGGING_DESC','Wilt u de debug mode inschakelen?  Een compleet log van mislukte transacties kan gemaild worden naar de eigenaar.');


define('MODULE_PAYMENT_AUTHORIZENET_TEXT_AUTHENTICITY_WARNING','WAARSCHUWING: Veiligheid hash probleem. Neem dan onmiddellijk contact op met de winkel eigenaar. Uw bestelling is * niet * volledig is toegestaan.');
define('MODULE_PAYMENT_AUTHORIZENET_ENTRY_REFUND_BUTTON_TEXT','Doe een Teruggave');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_REFUND_CONFIRM_ERROR','Fout: U vroeg om een terugbetaling te doen, maar liet na het bevestiging vak te selecteren.');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_INVALID_REFUND_AMOUNT','Fout: U verzocht om een teruggave, maar heeft een ongeldige waarde ingevoerd.');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_CC_NUM_REQUIRED_ERROR','Fout: U verzocht om een teruggaaf, maar heeft de laatste 4 cijfers van het creditcard-nummer niet ingevoerd.');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_REFUND_INITIATED','Restitutie van start. Transactie-ID: %s - Auth Code: %s');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_TRANS_ID_REQUIRED_ERROR','Fout: U moet een transactie-ID op geven.');
define('MODULE_PAYMENT_AUTHORIZENET_ENTRY_VOID_BUTTON_TEXT','Laat vervallen');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_VOID_CONFIRM_ERROR','Fout: U vroeg om een verval, maar liet na de bevestiging vak te selecteren.');
define('MODULE_PAYMENT_AUTHORIZENET_TEXT_VOID_INITIATED','verval start. Transactie-ID:%s - Auth Code:%s');

?>
