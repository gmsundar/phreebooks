<?php
// +-----------------------------------------------------------------+
// Phreedom Language Translation File
// Generated: 2011-11-27 05:02:32
// Module/Method: payment-linkpoint_api
// ISO Language: nl_nl
// Version: 0.1
// +-----------------------------------------------------------------+
// Path: /modules/payment/methods/linkpoint_api/language/nl_nl/language.php

define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_VOID_SUFFIX','Vervallen moeten zijn afgerond voordat de oorspronkelijke transactie wordt afgewikkeld in de dagelijkse batch, die optreedt om 7:00 uur Pacific Time.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_VOID_DEFAULT_TEXT','Voer Transactie ID in');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_VOID_TEXT_COMMENTS','Merk op (verschijnt op Bestel Geschiedenis):');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_VOID_DEFAULT_MESSAGE','Transactie geannuleerd');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_TEXT_COMMENTS','Merkt op (verschijnt op Bestel Geschiedenis):');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_DEFAULT_MESSAGE','Afgewikkeld eerder geautoriseerde middelen.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_SUFFIX','Vast leggen moeten worden uitgevoerd binnen 2-10 dagen van de oorspronkelijke autorisatie, afhankelijk van de eisen van uw zakenbank . Je mag slechts EENMAAL een order vastleggen . <br /> Zorg ervoor dat het opgegeven bedrag juist is. <br /> Als u het bedrag leeg laat, Zal het oorspronkelijke bedrag worden gebruikt.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_VOID_TITLE','<strong>Vervallen Transacties</strong>');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_VOID','Je kan een transactie laten vervallen (preauth / vast te leggen / restitutie) die nog niet is afgewikkeld. Vul de originele Transactie ID <em> (ziet er gewoonlijk als volgt uit: <strong> 1193684363 </ strong>) </ em>:');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_VOID_CONFIRM_CHECK','Schakel dit selectievakje in om je intentie te bevestigen:');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_DEFAULT_TEXT','Voer Bestelnummer in');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_CAPTURE_CONFIRM_CHECK','Schakel dit selectievakje in om je intentie te bevestigen:');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_TRANS_ID','Voer de originele ordernummer in <em> (dat wil zeggen: <strong> 5138-i4wcYM </ strong>) </ em>:');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_TITLE','<strong>Vastleggen Transacties</strong>');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE','U kunt hier eerder toegekende fondsen vast leggen.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_AMOUNT_TEXT','Voer het bedrag in om vast te leggen:');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_SUFFIX','U kunt een bestelling terugstort tot het bedrag dat al is vastgelegd. Je moet de laatste 4 cijfers van het credit card nummer aan leveren welke voor de eerste bestelling werd gebruikt. <br /> Restituties niet kunnen niet worden uitgevoerd als de kaart is verlopen. Een verlopen kaart, een creditnota met behulp van de pin-terminal in plaats terug te betalen.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_TEXT_COMMENTS','Notities (verschijnt in Bestel Geschiedenis):');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_DEFAULT_MESSAGE','Restitutie verstuurd');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_TRANS_ID','Voer de originele Transactie ID <em> (die gewoonlijk als volgt uitziet: <strong> 1193684363 </ strong>) </ em>:');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_DEFAULT_TEXT','Voer Transactie ID in.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_CC_NUM_TEXT','Voer de laatste 4 cijfers van de creditcard in die u wilt terugbetalen.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_AMOUNT_TEXT','Voer het bedrag dat u wenst terug te betalen');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_REFUND_CONFIRM_CHECK','Selecteer deze box als bevestiging: ');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND','U kunt hier geld terugbetalen aan de oorspronkelijke gebruikte credit card.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_VOID_INITIATED','Vervallen van start. Transactie-ID: %s - Order-id: %s');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_TITLE','<strong>Restitutie Transacties</strong>');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_VOID_CONFIRM_ERROR','Fout: U vroeg om transacties Vervallen, maar liet na de bevestiging vak te selecteren.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_VOID_BUTTON_TEXT','Laat Vervallen');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_CAPT_INITIATED','Middelen vastleggen gestart. Bedrag: %s. Transactie-ID: %s - AuthCode: %s');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_TRANS_ID_REQUIRED_ERROR','Fout: U moet transacties transactie-ID op geven.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_INVALID_CAPTURE_AMOUNT','Fout: U vroeg om transacties vast te leggen, maar moet een bedrag in te voeren.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_CAPTURE_BUTTON_TEXT','Vast Leggen');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_REFUND_INITIATED','Restitutie van start. Transactie-ID: %s - Order-id: %s');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_CAPTURE_CONFIRM_ERROR','Fout: U vroeg om transacties vast te leggen te, maar liet na de bevestiging vak selecteren.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_CC_NUM_REQUIRED_ERROR','Fout: U verzocht om een restitutie, maar heeft niet in de laatste 4 cijfers van het creditcard-nummer ingevoerd.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_INVALID_REFUND_AMOUNT','Fout: U verzocht om een restitutie, maar heeft een ongeldige waarde op gegeven.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_REFUND_CONFIRM_ERROR','Fout: U vroeg om een terugbetaling te doen, maar liet na de bevestiging vak te selecteren.');
define('MODULE_PAYMENT_LINKPOINT_API_ENTRY_REFUND_BUTTON_TEXT','Doe Terugbetaling');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_ORDERTYPE','Order Type:');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_NO_MATCHING_ORDER_FOUND','Fout: Kon transactie details niet vinden voor het opgegeven record.');
define('MODULE_PAYMENT_LINKPOINT_API_FRAUD_SCORE','Fraude code:');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_TEST_MODE','<b>&nbsp;(OPMERKING: Module is in de testmodus)</b>');
define('MODULE_PAYMENT_LINKPOINT_API_TRANSACTION_REFERENCE_NUMBER','Referentie Nummer:');
define('MODULE_PAYMENT_LINKPOINT_API_MESSAGE','Reactie Bericht');
define('MODULE_PAYMENT_LINKPOINT_API_APPROVAL_CODE','De goedkeuring Code:');
define('MODULE_PAYMENT_LINKPOINT_API_LINKPOINT_ORDER_ID','Linkpoint Order ID:');
define('MODULE_PAYMENT_LINKPOINT_API_AVS_RESPONSE','AVS Reactie:');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_GENERAL_ERROR','Het spijt ons. Er was een systeem fout tijdens het verwerken van uw kaart. Uw informatie is veilig. Neem contact op met eigenaar van de winkel voor een alternatieve betaling.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_FAILURE_MESSAGE','Onze excuses voor het ongemak, maar we zijn momenteel niet in staat om de credit card maatschappij contact op voor een vergunning. Neem contact op met eigenaar van de winkel voor een alternatieve betaling.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_DUPLICATE_MESSAGE','Je hebt dubbele transactie gepost ');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_ERROR_CURL_NOT_FOUND','CURL-functies niet gevonden - die nodig zijn voor LinkPoint API betaling module');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_PEMFILE_MISSING','<b>&nbsp;De xyzxyz.pem certificaat bestand niet gevonden.</b>');
define('ALERT_LINKPOINT_API_TEST_FORCED_DECLINED','LET OP: Dit was een test transactie ... gedwongen tot een GEWEIGERD reactie te retourneren.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_NOT_CONFIGURED','<b>&nbsp;(OPMERKING: Module is nog niet geconfigureerd)</b>');

define('ALERT_LINKPOINT_API_TEST_FORCED_SUCCESSFUL','LET OP: Dit was een test transactie ... gedwongen tot een SUCCES reactie te retourneren.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_DECLINED_GENERAL_MESSAGE','Uw creditcard is geweigerd. Vul nogmaals uw creditcardgegevens, Probeer een andere kaart, of vraag de eigenaar van de winkel voor hulp.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_DECLINED_AVS_MESSAGE','Ongeldige factuuradres. Vul nogmaals uw creditcardgegevens, Probeer een andere kaart, of vraag de eigenaar van de winkel voor hulp.');


define('TEXT_DEV_TEST','Ontwikkeling - Test');
define('TEXT_OFF','Uit');
define('TEXT_FAIL_ALERTS','Storingsignaleringen alleen');
define('TEXT_LOG_FILE','Log Bestand');
define('TEXT_LOG_EMAIL','Log en Email');
define('TEXT_TEST_SUCCESS','Test - Retourneer Succes');
define('TEXT_TEST_FAIL','Test - Retourneer Decline / Geweigerd');
define('MODULE_PAYMENT_LINKPOINT_API_TRANSACTION_MODE_DESC','Transactie-modus wordt gebruikt voor het verwerken van orders');
define('MODULE_PAYMENT_LINKPOINT_API_AUTHORIZATION_MODE_DESC','Wilt u ingediende credit card transacties alleen worden toegestaan, of onmiddellijk ten laste / gevangen? <br /> In de meeste gevallen zult u wilt doen een <strong> directe kosten </ strong> om direct te vangen betaling. In sommige situaties kan je liever gewoon <strong> Machtig </ strong> transacties, en vervolgens handmatig gebruik je Merchant Terminal formeel vastleggen van de betalingen (esp indien de betaling bedragen kunnen fluctueren tussen de bestelling en het verzenden)');
define('MODULE_PAYMENT_LINKPOINT_API_FRAUD_ALERT_DESC','Wilt u op de hoogte gehouden worden via e-mail van vermoedelijke frauduleuze Creditcard activiteit? <br /> (stuurt naar winkel Eigenaar e-mailadres)');
define('MODULE_PAYMENT_LINKPOINT_API_STORE_DATA_DESC','Als u deze optie inschakelt, uitgebreide gegevens van elke transactie zal worden opgeslagen, zodat u effectiever audits uit te voeren van de frauduleuze activiteiten of zelfs track / wedstrijd om informatie tussen Zen Cart en uw LinkPoint records. U kunt deze gegevens bekijken in Admin-> Klanten-> LinkPoint CC Review.');
define('MODULE_PAYMENT_LINKPOINT_API_DEBUG_DESC','Wilt u in staat te stellen debug mode? Kiezen Alert modus zal e-mail logs van mislukte transacties naar de winkel eigenaar.');
define('MODULE_PAYMENT_LINKPOINT_API_TRANSACTION_MODE_RESPONSE_DESC','<strong> Productie: </ strong> Gebruik deze voor live winkels <br />, of deze opties selecteren als u de module te testen. <br /> <strong> Succesvolle: </ strong> gebruiken om te testen door het forceren van een succesvolle transactie <br /> <strong> Decline: </ strong> gebruiken om te testen het forceren van een falende transactieverwerking');
define('MODULE_PAYMENT_LINKPOINT_API_LOGIN_DESC','Gelieve uw LinkPoint / YourPay Merchant -nummer in te voeren. <br /> Dit is hetzelfde als het nummer in de .PEM digitaal certificaat bestandsnaam voor uw account.');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_INTRODUCTION','<a target="_blank" href="http://www.zen-cart.com/index.php?main_page=infopages&pages_id=30">Klik Hier om u in te schrijven voor een Account</a><br /><br /><a target="_blank" href="https://secure.linkpt.net/lpcentral/servlet/LPCLogin">Linkpoint/YourPay API Merchant Area</a><br /><br /><a target="_blank" href="http://tutorials.zen-cart.com/index.php?article=298">Klik hier voor <strong>SETUP/Troubleshooting Instructies</strong></a><br /><br /><strong>Vereisten:</strong><br /><hr />*<strong>LinkPoint uw YourPay Account</strong> (Zie link hier boven om in te schrijven)<br />*<strong>cURL is Vereist </strong>and MOET geinstalleerd zijn in PHP door uw hosting bedrijf<br />*<strong>Poort 1129</strong> wordt gebruikt voor twee richting communicatie, Deze moet dus open zijn op uw host router/firewall<br />*<strong>PEM RSA Key File </strong>Digitaal Certificaat:<br />Te verkrijgen en upload uw digitale certificaat sleutel (.PEM.): <br /> - Log in om je LinkPoint / Yourpay account op hun website <br /> - Klik op "Support" in het hoofdmenu <br /> -. Klik op het woord "Download Center" onder Downloads in het menu aan de zijkant Box <br /> -. Klik op het woord \\\"download\\\" naast de \\\"Store PEM-bestand\\\"op de rechterkant van de pagina <br />. - Toets de nodige informatie te downloaden te starten. U moet uw huidige sofinummer of BTW-nummer die u heeft opgegeven tijdens de merchant account instapprocedure <br /> -. Upload dit bestand naar includes / modules / betaling / linkpoint_api / XXXXXX.pem (verzorgd door LinkPoint - xxxxxx uw winkel id)');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_DESCRIPTION','Accepteer credit card betalingen via de LinkPoint / YourPay API betaling gateway');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_TITLE','LinkPoint Gateway');
define('MODULE_PAYMENT_LINKPOINT_API_TEXT_DESCRIPTION','Accepteer credit card betalingen via de LinkPoint / YourPay API betaling gateway');

?>
