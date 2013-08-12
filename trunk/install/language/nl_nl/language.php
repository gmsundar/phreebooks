<?php
// +-----------------------------------------------------------------+
// Phreedom Language Translation File
// Generated: 2011-11-27 05:02:30
// Module/Method: install
// ISO Language: nl_nl
// Version: 3.3
// +-----------------------------------------------------------------+
// Path: /Iinstall/language/nl_nl/language.php

define('LANGUAGE','Nederlands (NL)');
define('HTML_PARAMS','lang="nl-NL" xml:lang="nl-NL"');
define('CHARSET','UTF-8');
define('LANGUAGE_TEXT','Beschikbare Talen: ');
define('TITLE_WELCOME','Welkom - Phreedom Klein Bedrijf oplossingen');
define('TEXT_AGREE','Akkoord');
define('TEXT_DISAGREE','Niet Akkoord');
define('DESC_AGREE','Ik heb de licentie door gelezen en ga akkoord met de voorwaarden');
define('DESC_DISAGREE','Ik heb de Licentie door gelezen en ga niet akkoord met de voorwaarden.');
define('TITLE_INSPECT','Controleer - Phreedom Klein Bedrijf Oplossingen');
define('INSTALL_ERROR_PHP_VERSION','Uw php versie moet 5.0 of hoger zijn');
define('INSTALL_ERROR_REGISER_GLOBALS','Register globals moet ingesteld zijn op off.');
define('INSTALL_ERROR_SAFE_MODE','In uw php configuratie is safe mode ingesteld op \"on\". Deze moet u instellen op \"off\" om Phreedom te kunnen installeren.');
define('INSTALL_ERROR_SESSION_SUPPORT','Uw php configuratie is geïnstalleerd  zonder session support. Dit is vereist om met Phreedom te werken.');
define('INSTALL_ERROR_OPENSSL','Uw server moet openssl geinstalleerd hebben.');
define('INSTALL_ERROR_CURL','Uw servers php applicatie is geïnstalleerd  zonder cURL support. cURL support is voor beveiligde communicatie tussen applications van derden.');
define('INSTALL_ERROR_UPLOADS','Uw servers php applicatie is geïnstalleerd  zonder file upload support. Upload support is vereist om bestanden te kunnen importeren in Phreedom.');
define('INSTALL_ERROR_UPLOAD_DIR','Ik kan geen tijdelijke upload directory vinden op deze server.');
define('INSTALL_ERROR_XML','Uw servers php applicatie is geïnstalleerd  zonder XML support. Sommige modules kunnen niet werken zonder deze optie.');
define('INSTALL_ERROR_FTP','Uw server php applicatie is geïnstalleerd zonder FTP support. Sommige modules kunnen niet werken zonder deze optie.');
define('INSTALL_ERROR_INCLUDES_DIR','De directory /includes is niet beschrijfbaar. We hebben toegang nodig om hier uw configuratie bestand op te slaan.');
define('INSTALL_ERROR_MY_FILES_DIR','De directory /my_files is niet beschrijfbaar. We hebben toegang nodig om hier uw bedrijfsbestanden te kunnen opslaan.');
define('TEXT_RECHECK','Her-Controleer');
define('TEXT_INSTALL','Installeer');
define('TITLE_INSTALL','Installeer - Phreedom Klein Bedrijf Oplossingen');
define('MSG_INSTALL_INTRO','Vul alstublieft wat informatie over uw bedrijf, administrator, web server en database.');
define('TEXT_COMPANY_INFO','Bedrijf Informatie');
define('TEXT_ADMIN_INFO','Administrator Informatie');
define('TEXT_SRVR_INFO','Server Informatie');
define('TEXT_DB_INFO','Database Informatie');
define('TEXT_FISCAL_INFO','Fiscale Informatie');
define('TEXT_COMPANY_NAME','Voer een korte naam in voor uw bedrijf. Dit wordt getoond in een keuze menu tijdens het inloggen.');
define('TEXT_INSTALL_DEMO_DATA','Wil u voor iedere module demo data installeren? Aantekening: Als u Ja selecteert, worden de tabellen geleegd voordat de demodata wordt opgeslagen.');
define('TEXT_USER_NAME','Voer de gebruikersnaam in van de adminstrator');
define('TEXT_USER_PASSWORD','Voer het wachwoord in voor de administrator');
define('TEXT_UER_PW_CONFIRM','Voer nog maals het wachtwoord in.');
define('TEXT_USER_EMAIL','Voer het email adres van de administrator in');
define('TEXT_HTTP_SRVR','Voer de server http URL in naar de root directory (normaal is de standaard ingestelde waarde goed)');
define('TEXT_USE_SSL','Gebruik SSL om verbinding te maken met uw bedrijf (aantekening: een valide SSL certificaat moet geïnstalleerd zijn op de server). Dit kan later veranderd worden als SSL nu nog niet nodig is.');
define('TEXT_HTTPS_SRVR','Voer de server https URL toe aan de root directory voor beveiligde transacties (gebruikelijk is de standaard ingestelde waarde goed)');
define('TEXT_DB_HOST','Voer de database host naam in');
define('TEXT_DB_NAME','Voer de database naam in (De database moet bestaan op de server)');
define('TEXT_DB_PREFIX','Als de database gedeeld wordt met een andere applicatie, gebruik dan een voorvoegsel voor de installatie (gebruik alleen alfabetische karakters en underscore):');
define('TEXT_DB_USER','Voer de database gebruikersnaam in');
define('TEXT_DB_PASSWORD','Voer de database wachtwoord in');
define('TEXT_FY_MONTH_INFO','Selecteer een start maand om in te stellen als uw eerste boekhoud periode. PhreeBooks zal standaard beginnen aan op de eerste dag van de maand.');
define('TEXT_FY_YEAR_INFO','Selecteer een start jaar om als uw eerste Boek jaar in te stellen. Er kunnen dan geen boekingen gemaakt worden eerder dan de geselecteerde jaar en maand.');
define('ERROR_TEXT_ADMIN_COMPANY_ISEMPTY','De bedrijfsnaam is leeg');
define('ERROR_TEXT_ADMIN_USERNAME_ISEMPTY','Admin gebruikersnaam is leeg');
define('ERROR_TEXT_ADMIN_EMAIL_ISEMPTY','Admin email leeg');
define('ERROR_TEXT_LOGIN_PASS_ISEMPTY','Admin wachtwoord is leeg');
define('ERROR_TEXT_LOGIN_PASS_NOTEQUAL','Wachtwoorden komen niet overeen');
define('ERROR_TEXT_DB_PREFIX_NODOTS','Database Tabel-voorvoegsel mag geen van deze tekens bevatten: / of \\ of . ');
define('ERROR_TEXT_DB_HOST_ISEMPTY','DB Host is leeg');
define('ERROR_TEXT_DB_NAME_ISEMPTY','DB naam is leeg');
define('ERROR_TEXT_DB_USERNAME_ISEMPTY','DB Gebruikersnaam is leeg');
define('ERROR_TEXT_DB_PASSWORD_ISEMPTY','De database wachtwoord kan niet leeg zijn.');
define('MSG_ERROR_MODULE_INSTALL','Er hebben zich fouten voorgedaan bij het installeren van module: %s. Zie de bovenstaande melding voor meer details.');
define('MSG_ERROR_CANNOT_CONNECT_DB','Ik kon geen verbinding maken met de database, controleer alstublieft uw instellingen. de ontvangen fout: ');
define('MSG_ERROR_CONFIGURE_EXISTS','Het bestand includes/configure.php bestaat al, dit kan duiden op dat Phreedom al geïnstalleerd is. Dit bestand moet verwijderd worden om de installatie succes vol te kunnen afronden!');
define('TITLE_FINISH','Afronden - Phreedom Klein Bedrijf Oplossingen');
define('TEXT_GO_TO_COMPANY','Ga Naar Uw Bedrijf');

?>
