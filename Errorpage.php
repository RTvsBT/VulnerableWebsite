<?php

// $config_file = __DIR__ . DIRECTORY_SEPARATOR ."DDOS_IS_HAPPENING";
$config = parse_ini_file('config.ini', true);
if(isset($_POST['attack']) && $_POST['attack'] == 'on')
{
  $config["main"]["ddos"] = "on";
}elseif(isset($_POST['attack']) && $_POST['attack'] == 'off'){
  $config["main"]["ddos"] = "off";
}

write_ini_file('config.ini', $config);

if($config["main"]["ddos"] === 'on'){
  $perc = rand(1,100);

	if ($perc < 75) {
		$value = true;
	}
	elseif ($perc > 20) {
		$value = false;
	}
  if(!$value){?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Geen verbinding gemaakt: mogelijk beveiligingsprobleem</title>
    <link rel="stylesheet" href="assets/external/aboutNetError-new.css" type="text/css" media="all" />
    <!-- If the location of the favicon is changed here, the FAVICON_ERRORPAGE_URL symbol in
         toolkit/components/places/src/nsFaviconService.h should be updated. -->
    <link rel="icon" id="favicon" href="assets/external/warning.svg" />
  </head>

  <body data-new-error-pages-enabled="true" dir="ltr" class="badStsCert certerror" code="SEC_ERROR_UNKNOWN_ISSUER">
    <!-- ERROR ITEM CONTAINER (removed during loading to avoid bug 39098) -->
    <div id="errorContainer">
      <div id="errorPageTitlesContainer">
        <span id="ept_nssBadCert">Waarschuwing: mogelijk beveiligingsrisico</span>
        <span id="ept_nssBadCert_sts">Geen verbinding gemaakt: mogelijk beveiligingsprobleem</span>
        <span id="ept_captivePortal">Aanmelden bij netwerk</span>
        <span id="ept_dnsNotFound">Server niet gevonden</span>
        <span id="ept_malformedURI">Ongeldige URL</span>
        <span id="ept_blockedByPolicy">Geblokkeerde pagina</span>
      </div>
      <div id="errorTitlesContainer">
        <h1 id="et_generic">Oeps.</h1>
        <h1 id="et_captivePortal">Aanmelden bij netwerk</h1>
        <h1 id="et_dnsNotFound">Hmm. We kunnen die website niet vinden.</h1>
        <h1 id="et_fileNotFound">Bestand niet gevonden</h1>
        <h1 id="et_fileAccessDenied">Toegang tot het bestand is geweigerd</h1>
        <h1 id="et_malformedURI">Hmm. Dat adres ziet er niet goed uit.</h1>
        <h1 id="et_unknownProtocolFound">Het adres werd niet begrepen</h1>
        <h1 id="et_connectionFailure">Kan geen verbinding maken</h1>
        <h1 id="et_netTimeout">De wachttijd voor de verbinding is verstreken</h1>
        <h1 id="et_redirectLoop">De pagina verwijst niet op een juiste manier door</h1>
        <h1 id="et_unknownSocketType">Onverwacht antwoord van server</h1>
        <h1 id="et_netReset">De verbinding werd geherinitialiseerd</h1>
        <h1 id="et_notCached">Document verlopen</h1>
        <h1 id="et_netOffline">Offlinemodus</h1>
        <h1 id="et_netInterrupt">De verbinding werd onderbroken</h1>
        <h1 id="et_deniedPortAccess">Dit adres heeft beperkte toegang</h1>
        <h1 id="et_proxyResolveFailure">Kan de proxyserver niet vinden</h1>
        <h1 id="et_proxyConnectFailure">De proxyserver weigert verbindingen</h1>
        <h1 id="et_contentEncodingError">Inhoudcoderingsfout</h1>
        <h1 id="et_unsafeContentType">Onveilig bestandstype</h1>
        <h1 id="et_nssFailure2">Beveiligde verbinding mislukt</h1>
        <h1 id="et_nssBadCert">Waarschuwing: mogelijk beveiligingsrisico</h1>
        <h1 id="et_nssBadCert_sts">Geen verbinding gemaakt: mogelijk beveiligingsprobleem</h1>
        <h1 id="et_cspBlocked">Geblokkeerd door inhoudsbeveiligingsbeleid</h1>
        <h1 id="et_remoteXUL">Remote XUL</h1>
        <h1 id="et_corruptedContentErrorv2">Beschadigde-inhoudsfout</h1>
        <h1 id="et_sslv3Used">Kan geen beveiligde verbinding maken</h1>
        <h1 id="et_inadequateSecurityError">Uw verbinding is niet beveiligd</h1>
        <h1 id="et_blockedByPolicy">Geblokkeerde pagina</h1>
        <h1 id="et_mitm">Software voorkomt dat Firefox een beveiligde verbinding met deze website kan maken</h1>
        <h1 id="et_clockSkewError">Uw computerklok geeft de verkeerde tijd aan</h1>
        <h1 id="et_networkProtocolError">Netwerkprotocolfout</h1>
      </div>
      <div id="errorDescriptionsContainer">
        <div id="ed_generic">
<p>Firefox kan deze pagina om de een of andere reden niet laden.</p>
</div>
        <div id="ed_captivePortal">
<p>U moet zich aanmelden bij dit netwerk voordat u toegang hebt tot het internet.</p>
</div>
        <div id="ed_dnsNotFound">
<strong>Als het adres juist is, kunt u drie andere dingen proberen:</strong>
<ul>
  <li>Probeer het later opnieuw.</li>
  <li>Controleer uw netwerkverbinding.</li>
  <li>Als u verbinding hebt maar zich achter een firewall bevindt, controleer dan of Firefox toegang heeft tot het web.</li>
</ul>
</div>
        <div id="ed_fileNotFound">
<ul>
  <li>Controleer de bestandsnaam op grote/kleine letters of andere typefouten.</li>
  <li>Controleer of het bestand is verplaatst, hernoemd of verwijderd.</li>
</ul>
</div>
        <div id="ed_fileAccessDenied">
<ul>
  <li>Het kan zijn verwijderd, verplaatst, of bestandsmachtigingen kunnen toegang tegengaan.</li>
</ul>
</div>
        <div id="ed_malformedURI"></div>
        <div id="ed_unknownProtocolFound">
<ul>
  <li>Misschien moet u andere software installeren om dit adres te openen.</li>
</ul>
</div>
        <div id="ed_connectionFailure">
<ul>
  <li>Misschien is de website tijdelijk niet beschikbaar of overbelast. Probeer het
    over enkele ogenblikken opnieuw.</li>
  <li>Als u geen enkele pagina kunt laden, controleer dan de netwerkverbinding
    van uw computer.</li>
  <li>Als uw computer of netwerk wordt beveiligd door een firewall of proxy,
    zorg er dan voor dat Firefox toegang heeft tot het web.</li>
</ul>
</div>
        <div id="ed_netTimeout">
<ul>
  <li>Misschien is de website tijdelijk niet beschikbaar of overbelast. Probeer het
    over enkele ogenblikken opnieuw.</li>
  <li>Als u geen enkele pagina kunt laden, controleer dan de netwerkverbinding
    van uw computer.</li>
  <li>Als uw computer of netwerk wordt beveiligd door een firewall of proxy,
    zorg er dan voor dat Firefox toegang heeft tot het web.</li>
</ul>
</div>
        <div id="ed_redirectLoop">
<ul>
  <li>Dit probleem kan soms worden veroorzaakt door het uitschakelen of weigeren
    van cookies.</li>
</ul>
</div>
        <div id="ed_unknownSocketType">
<ul>
  <li>Zorg ervoor dat de persoonlijke beveiligingsbeheerder op uw systeem
    is geïnstalleerd.</li>
  <li>Dit kan het gevolg zijn van een niet-standaard configuratie van de server.</li>
</ul>
</div>
        <div id="ed_netReset">
<ul>
  <li>Misschien is de website tijdelijk niet beschikbaar of overbelast. Probeer het
    over enkele ogenblikken opnieuw.</li>
  <li>Als u geen enkele pagina kunt laden, controleer dan de netwerkverbinding
    van uw computer.</li>
  <li>Als uw computer of netwerk wordt beveiligd door een firewall of proxy,
    zorg er dan voor dat Firefox toegang heeft tot het web.</li>
</ul>
</div>
        <div id="ed_notCached"><p>Het opgevraagde document is niet beschikbaar in de buffer van Firefox.</p><ul><li>Als beveiligingsmaatregel vraagt Firefox gevoelige documenten niet automatisch opnieuw op.</li><li>Klik op Opnieuw proberen om het document opnieuw van de website op te vragen.</li></ul></div>
        <div id="ed_netOffline">
<ul>
  <li>Klik op ‘Opnieuw proberen’ om naar de onlinemodus over te schakelen en de pagina opnieuw te laden.</li>
</ul>
</div>
        <div id="ed_netInterrupt">
<ul>
  <li>Misschien is de website tijdelijk niet beschikbaar of overbelast. Probeer het
    over enkele ogenblikken opnieuw.</li>
  <li>Als u geen enkele pagina kunt laden, controleer dan de netwerkverbinding
    van uw computer.</li>
  <li>Als uw computer of netwerk wordt beveiligd door een firewall of proxy,
    zorg er dan voor dat Firefox toegang heeft tot het web.</li>
</ul>
</div>
        <div id="ed_deniedPortAccess"></div>
        <div id="ed_proxyResolveFailure">
<ul>
  <li>Controleer of uw proxyinstellingen juist zijn.</li>
  <li>Controleer of uw computer een werkende netwerkverbinding heeft.</li>
  <li>Als uw computer of netwerk wordt beveiligd door een firewall of proxy,
    zorg er dan voor dat Firefox toegang heeft tot het web.</li>
</ul>
</div>
        <div id="ed_proxyConnectFailure">
<ul>
  <li>Controleer of uw proxyinstellingen juist zijn.</li>
  <li>Neem contact op met uw netwerkbeheerder om te controleren of de proxyserver
    werkt.</li>
</ul>
</div>
        <div id="ed_contentEncodingError">
<ul>
  <li>Neem contact op met de website-eigenaars om ze over dit probleem te informeren.</li>
</ul>
</div>
        <div id="ed_unsafeContentType">
<ul>
  <li>Neem contact op met de website-eigenaars om ze over dit probleem te informeren.</li>
</ul>
</div>
        <div id="ed_nssFailure2">
<ul>
  <li>De pagina die u wilt bekijken kan niet worden weergegeven, omdat de echtheid van de ontvangen gegevens niet kon worden geverifieerd.</li>
  <li>Neem contact op met de website-eigenaars om ze over dit probleem te informeren.</li>
</ul>
</div>
        <div id="ed_nssBadCert">Firefox heeft een mogelijk beveiligingsrisico gedetecteerd en is niet doorgegaan naar <span class="hostname">https://mijn.defensie.nl</span>. Als u deze website bezoekt, zouden aanvallers gegevens kunnen proberen te stelen, zoals uw wachtwoorden, e-mailadressen of creditcardgegevens.</div>
        <div id="ed_nssBadCert_sts">Firefox heeft een mogelijk beveiligingsrisico gedetecteerd en is niet doorgegaan naar <span class="hostname">https://mijn.defensie.nl</span>, omdat deze website een beveiligde verbinding vereist.</div>
        <div id="ed_nssBadCert_SEC_ERROR_EXPIRED_CERTIFICATE">Firefox heeft een probleem gedetecteerd en is niet doorgegaan naar <span class="hostname">https://mijn.defensie.nl</span>. Of de website is onjuist geconfigureerd, of uw computerklok is op de verkeerde tijd ingesteld.</div>
        <div id="ed_mitm"><span class="hostname">https://mijn.defensie.nl</span> is zeer waarschijnlijk een veilige website, maar er kon geen beveiligde verbinding tot stand worden gebracht. Dit probleem wordt veroorzaakt door <span class="mitm-name"></span>, dat software op uw computer of op uw netwerk betreft.</div>
        <div id="ed_cspBlocked"><p>Firefox heeft voorkomen dat de pagina op deze manier werd geladen, omdat de pagina een inhoudsbeveiligingsbeleid heeft dat dit niet toestaat.</p></div>
        <div id="ed_remoteXUL"><p><ul><li>Neem contact op met de website-eigenaars om ze over dit probleem te informeren.</li></ul></p></div>
        <div id="ed_corruptedContentErrorv2"><p>De pagina die u wilt bekijken kan niet worden weergegeven, omdat er een fout in de gegevensoverdracht is gedetecteerd.</p><ul><li>Neem contact op met de website-eigenaars om ze over dit probleem te informeren.</li></ul></div>
        <div id="ed_sslv3Used">Geavanceerde info: SSL_ERROR_UNSUPPORTED_VERSION</div>
        <div id="ed_inadequateSecurityError"><p><span class="hostname">https://mijn.defensie.nl</span> gebruikt verouderde beveiligingstechnologie die kwetsbaar is voor aanvallen. Een aanvaller kan eenvoudig gegevens onthullen waarvan u dacht dat deze veilig waren. De websitebeheerder dient eerst de server in orde te maken voordat u de website kunt bezoeken.</p><p>Foutcode: NS_ERROR_NET_INADEQUATE_SECURITY</p></div>
        <div id="ed_blockedByPolicy"></div>
        <div id="ed_clockSkewError">Uw computer denkt dat het <span id="wrongSystemTime_systemDate1"></span> is, waardoor Firefox geen beveiligde verbinding met <span class="hostname">https://mijn.defensie.nl</span> kan maken. Werk uw computerklok bij naar de huidige datum, tijd en tijdzone in uw systeeminstellingen, en vernieuw daarna de pagina om <span class="hostname">https://mijn.defensie.nl</span> te bezoeken.</div>
        <div id="ed_networkProtocolError"><p>De pagina die u wilt bekijken kan niet worden weergegeven, omdat een fout in het netwerkprotocol is gedetecteerd.</p><ul><li>Neem contact op met de website-eigenaars om ze over dit probleem te informeren.</li></ul></div>
      </div>
      <div id="errorDescriptions2Container">
          <div id="ed2_nssBadCert_SEC_ERROR_EXPIRED_CERTIFICATE">Waarschijnlijk is het certificaat van de website verlopen, waardoor Firefox geen beveiligde verbinding kan maken. Als u deze website bezoekt, zouden aanvallers gegevens kunnen proberen te stelen, zoals uw wachtwoorden, e-mailadressen of creditcardgegevens.</div>
          <div id="ed2_nssBadCert_SEC_ERROR_EXPIRED_CERTIFICATE_sts">Waarschijnlijk is het certificaat van de website verlopen, waardoor Firefox geen beveiligde verbinding kan maken.</div>
      </div>
      <div id="whatCanYouDoAboutItTitleContainer">
        <div id="edd_nssBadCert"><strong>Wat kunt u hieraan doen?</strong></div>
      </div>
      <div id="whatCanYouDoAboutItContainer">
        <div id="es_nssBadCert_SEC_ERROR_UNKNOWN_ISSUER">
<p>Het probleem ligt zeer waarschijnlijk bij de website, en u kunt niets doen om dit te verhelpen.</p>
<p>Als u zich op een zakelijk netwerk bevindt of antivirussoftware gebruikt, kunt u contact opnemen met de ondersteuningsafdelingen voor assistentie. U kunt ook de beheerder van de website over het probleem informeren.</p>
</div>
        <div id="es_nssBadCert_SEC_ERROR_EXPIRED_CERTIFICATE">
<p>Uw computerklok is ingesteld op <span id="wrongSystemTime_systemDate2"></span>. Zorg ervoor dat uw computer op de juiste datum, tijd en tijdzone is ingesteld in uw systeeminstellingen, en vernieuw daarna <span class="hostname">https://mijn.defensie.nl</span>.</p>
<p>Als uw klok al op de juiste tijd is ingesteld, is de website waarschijnlijk onjuist geconfigureerd, en kunt u niets doen om het probleem te verhelpen. U kunt wel de beheerder van de website over het probleem informeren.</p>
</div>
        <div id="es_nssBadCert_SEC_ERROR_EXPIRED_ISSUER_CERTIFICATE">
<p>Uw computerklok is ingesteld op <span id="wrongSystemTime_systemDate2"></span>. Zorg ervoor dat uw computer op de juiste datum, tijd en tijdzone is ingesteld in uw systeeminstellingen, en vernieuw daarna <span class="hostname">https://mijn.defensie.nl</span>.</p>
<p>Als uw klok al op de juiste tijd is ingesteld, is de website waarschijnlijk onjuist geconfigureerd, en kunt u niets doen om het probleem te verhelpen. U kunt wel de beheerder van de website over het probleem informeren.</p>
</div>
        <div id="es_nssBadCert_MOZILLA_PKIX_ERROR_NOT_YET_VALID_CERTIFICATE">
<p>Uw computerklok is ingesteld op <span id="wrongSystemTime_systemDate2"></span>. Zorg ervoor dat uw computer op de juiste datum, tijd en tijdzone is ingesteld in uw systeeminstellingen, en vernieuw daarna <span class="hostname">https://mijn.defensie.nl</span>.</p>
<p>Als uw klok al op de juiste tijd is ingesteld, is de website waarschijnlijk onjuist geconfigureerd, en kunt u niets doen om het probleem te verhelpen. U kunt wel de beheerder van de website over het probleem informeren.</p>
</div>
        <div id="es_nssBadCert_MOZILLA_PKIX_ERROR_NOT_YET_VALID_ISSUER_CERTIFICATE">
<p>Uw computerklok is ingesteld op <span id="wrongSystemTime_systemDate2"></span>. Zorg ervoor dat uw computer op de juiste datum, tijd en tijdzone is ingesteld in uw systeeminstellingen, en vernieuw daarna <span class="hostname">https://mijn.defensie.nl</span>.</p>
<p>Als uw klok al op de juiste tijd is ingesteld, is de website waarschijnlijk onjuist geconfigureerd, en kunt u niets doen om het probleem te verhelpen. U kunt wel de beheerder van de website over het probleem informeren.</p>
</div>
        <div id="es_nssBadCert_SSL_ERROR_BAD_CERT_DOMAIN">
<p>Het probleem ligt zeer waarschijnlijk bij de website, en u kunt niets doen om dit te verhelpen. U kunt wel de beheerder van de website over het probleem informeren.</p>
</div>
        <div id="es_nssBadCert_MOZILLA_PKIX_ERROR_MITM_DETECTED">
          <ul>
            <li>Als uw antivirussoftware een functie bevat die versleutelde verbindingen scant (vaak ‘webscanning’ of ‘https-scanning’ genoemd), kunt u die functie uitschakelen. Als dat niet werkt, kunt u de antivirussoftware verwijderen en opnieuw installeren.</li>
            <li>Als u zich op een zakelijk netwerk bevindt, kunt u contact opnemen met uw IT-afdeling.</li>
            <li id="mitmWhatCanYouDoAboutIt3">Als u niet bekend bent met <span xmlns="http://www.w3.org/1999/xhtml" class="mitm-name"></span>, kan dit een aanval zijn, en is er niets wat u kunt doen om de website te bezoeken.</li>
          </ul>
        </div>
      </div>
      <!-- Stores an alternative text for when we don't want to add "Recommended" to the
           return button. This is one of many l10n atrocities in this file and should be
           removed when we finally switch to Fluent. -->
      <span id="stsReturnButtonText">Terug</span>
      <span id="stsMitmWhatCanYouDoAboutIt3">Als u niet bekend bent met <span class="mitm-name"></span>, kan dit een aanval zijn, en is er niets wat u kunt doen om de website te bezoeken.</span>
    </div>

    <!-- PAGE CONTAINER (for styling purposes only) -->
    <div id="errorPageContainer" class="container">
      <div id="text-container" style="margin-top: calc(-228.5px + 50vh);">
        <!-- Error Title -->
        <div class="title">
          <h1 class="title-text">Geen verbinding gemaakt: mogelijk beveiligingsprobleem</h1>
        </div>

        <!-- LONG CONTENT (the section most likely to require scrolling) -->
        <div id="errorLongContent">

          <!-- Short Description -->
          <div id="errorShortDesc">
            <p id="errorShortDescText">Firefox heeft een mogelijk beveiligingsrisico gedetecteerd en is niet doorgegaan naar <span xmlns="http://www.w3.org/1999/xhtml" class="hostname">https://mijn.defensie.nl</span>, omdat deze website een beveiligde verbinding vereist.</p>
          </div>

          <div id="errorShortDesc2">
              <p id="errorShortDescText2"></p>
          </div>

          <div id="errorWhatToDoTitle">
              <p id="errorWhatToDoTitleText"><strong xmlns="http://www.w3.org/1999/xhtml">Wat kunt u hieraan doen?</strong></p>
          </div>

          <div id="errorWhatToDo">
              <p id="badStsCertExplanation"><span class="hostname">https://mijn.defensie.nl</span> heeft een beveiligingsbeleid met de naam HTTP Strict Transport Security (HSTS), wat betekent dat Firefox alleen een beveiligde verbinding ermee kan maken. U kunt geen uitzondering toevoegen om deze website te bezoeken.</p>
              <p id="errorWhatToDoText">
<p xmlns="http://www.w3.org/1999/xhtml">Het probleem ligt zeer waarschijnlijk bij de website, en u kunt niets doen om dit te verhelpen.</p>
<p xmlns="http://www.w3.org/1999/xhtml">Als u zich op een zakelijk netwerk bevindt of antivirussoftware gebruikt, kunt u contact opnemen met de ondersteuningsafdelingen voor assistentie. U kunt ook de beheerder van de website over het probleem informeren.</p>
</p>
          </div>

          <div id="errorWhatToDo2">
              <p id="errorWhatToDoText2"></p>
              <p id="badStsCertExplanation" hidden="true"><span class="hostname">https://mijn.defensie.nl</span> heeft een beveiligingsbeleid met de naam HTTP Strict Transport Security (HSTS), wat betekent dat Firefox alleen een beveiligde verbinding ermee kan maken. U kunt geen uitzondering toevoegen om deze website te bezoeken.</p>
          </div>

          <div id="wrongSystemTimePanel">
            <p> Firefox heeft geen verbinding met <span id="wrongSystemTime_URL"></span> gemaakt, omdat de klok van uw computer de verkeerde tijd lijkt aan te geven, en dit voorkomt een beveiligde verbinding.</p> <p>Uw computer is ingesteld op <span id="wrongSystemTime_systemDate"></span>, terwijl dit <span id="wrongSystemTime_actualDate"></span> zou moeten zijn. Wijzig uw datum- en tijdinstellingen naar de juiste tijd om dit probleem te verhelpen.</p>
          </div>

          <div id="wrongSystemTimeWithoutReferencePanel">
            <p>Firefox heeft geen verbinding met <span id="wrongSystemTimeWithoutReference_URL"></span> gemaakt, omdat de klok van uw computer de verkeerde tijd lijkt aan te geven, en dit voorkomt een beveiligde verbinding.</p> <p>Uw computer is ingesteld op <span id="wrongSystemTimeWithoutReference_systemDate"></span>. Wijzig uw datum- en tijdinstellingen naar de juiste tijd om dit probleem te verhelpen.</p>
          </div>

          <!-- Long Description (Note: See netError.dtd for used XHTML tags) -->
          <div id="errorLongDesc"></div>

          <div id="learnMoreContainer" style="display: block;">
            <p><a href="https://support.mozilla.org/kb/what-does-your-connection-is-not-secure-mean" id="learnMoreLink" target="new" data-telemetry-id="learn_more_link">Meer info…</a></p>
          </div>
        </div>

        <!-- UI for option to report certificate errors to Mozilla. Removed on
             init for other error types .-->
        <div id="prefChangeContainer" class="button-container">
          <p>Het lijkt erop dat dit door uw netwerkbeveiligingsinstellingen wordt veroorzaakt. Wilt u de standaardinstellingen herstellen?</p>
          <button id="prefResetButton" class="primary" autocomplete="off">Standaardinstellingen herstellen</button>
        </div>

        <div id="certErrorAndCaptivePortalButtonContainer" class="button-container"><button id="returnButton" class="primary" autocomplete="off" data-telemetry-id="return_button_top" autofocus="true">Terug</button>
          
          <button id="openPortalLoginPageButton" class="primary" autocomplete="off">Aanmeldingspagina voor netwerk openen</button>
          <button id="errorTryAgain" class="primary" autocomplete="off">Opnieuw proberen</button>
          <button id="advancedButton" data-telemetry-id="advanced_button" autocomplete="off">Geavanceerd…</button>
          <button id="moreInformationButton" autocomplete="off">Meer informatie</button>
        </div>
      </div>

      <div id="netErrorButtonContainer" class="button-container">
        <button id="errorTryAgain" class="primary" autocomplete="off">Opnieuw proberen</button>
      </div>

      <div id="advancedPanelContainer">
        <div id="badCertAdvancedPanel" class="advanced-panel" style="display: block;">
          <p id="badCertTechnicalInfo">Iemand kan proberen de website na te bootsen, en u kunt beter niet verdergaan.

Websites bewijzen hun identiteit via certificaten. Firefox vertrouwt https://mijn.defensie.nl niet, omdat de uitgever van het certificaat onbekend is, het certificaat zelfondertekend is, of de server niet de juiste tussencertificaten stuurt.


Foutcode: <a title="SEC_ERROR_UNKNOWN_ISSUER" id="errorCode" data-telemetry-id="error_code_link" href="javascript:void(0)">SEC_ERROR_UNKNOWN_ISSUER</a></p>
          <a id="viewCertificate" href="javascript:void(0)">Certificaat bekijken</a>
          <div id="advancedPanelButtonContainer" class="button-container">
            <button id="advancedPanelReturnButton" class="primary" autocomplete="off" data-telemetry-id="return_button_adv">Terug</button>
            <button id="advancedPanelErrorTryAgain" class="primary" autocomplete="off">Opnieuw proberen</button>
            <div class="exceptionDialogButtonContainer">
              <button id="exceptionDialogButton" data-telemetry-id="exception_button" hidden="true">Het risico aanvaarden en doorgaan</button>
            </div>
          </div>
        </div>

        <div id="certificateErrorReporting" style="display: block;">
            <p class="toggle-container-with-text">
                <input type="checkbox" id="automaticallyReportInFuture" role="checkbox" data-telemetry-id="auto_report_cb" />
                <label for="automaticallyReportInFuture" id="automaticallyReportInFuture">Fouten als deze rapporteren om Mozilla te helpen kwaadwillende websites te herkennen en te blokkeren</label>
            </p>
        </div>

        <div id="certificateErrorDebugInformation" style="display: none;">
          <button id="copyToClipboard" data-telemetry-id="clipboard_button_top">Tekst naar klembord kopiëren</button>
          <div id="certificateErrorText">https://support.mozilla.org/kb/what-does-your-connection-is-not-secure-mean

Uitgever van certificaat van peer wordt niet herkend.

HTTP Strict Transport Security: true
HTTP Public Key Pinning: false

Certificaatketen:

-----BEGIN CERTIFICATE-----
MIIDjjCCAnagAwIBAgIEHAmh5TANBgkqhkiG9w0BAQsFADCBijEUMBIGA1UEBhML
UG9ydFN3aWdnZXIxFDASBgNVBAgTC1BvcnRTd2lnZ2VyMRQwEgYDVQQHEwtQb3J0
U3dpZ2dlcjEUMBIGA1UEChMLUG9ydFN3aWdnZXIxFzAVBgNVBAsTDlBvcnRTd2ln
Z2VyIENBMRcwFQYDVQQDEw5Qb3J0U3dpZ2dlciBDQTAeFw0xNDEyMDUyMjI3NDRa
Fw0zODEyMDUyMjI3NDRaMGMxFDASBgNVBAYTC1BvcnRTd2lnZ2VyMRQwEgYDVQQK
EwtQb3J0U3dpZ2dlcjEXMBUGA1UECxMOUG9ydFN3aWdnZXIgQ0ExHDAaBgNVBAMT
E3N1cHBvcnQubW96aWxsYS5vcmcwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEK
AoIBAQC5kVzschxiKrLTOvktC73bR+DNk49w8pCbsqPJ0QgiFOKy7/73YBk2J+AZ
+aliH7D1DnS+LE7a8+ymjCE9JM3K2N/X6Gq2t6oEO/re9QVHuE7Yz1AzTVoRpcVx
kf4NQqHTBEqUAFX5X77z7ehOGWXhGHbgX9KYH5sUr/e2vpX89IYrUnX9t6QVgRNf
1TTERhfur1kW9Jl1vdWIusUyxBZKDOJK7KQo46oRdtKmRN/4OFQS58EGoJgJzoPN
TBwkYRyxDbfH69ZiujKW3nfLpP/c3scWD5B8/K4RvVU1B0cOEgGiIV90Q24m9JYs
93gz+Q8mmBLrb9UadDFur4qWomn5AgMBAAGjIjAgMB4GA1UdEQQXMBWCE3N1cHBv
cnQubW96aWxsYS5vcmcwDQYJKoZIhvcNAQELBQADggEBAH89U+Z/FA4ZY4Gk1FE7
VxxwK+xNjVrQLf9tUs7sNzprXq/CNAD5fi2XITdzb25X3dtJ8KFjObc3MmlAjC+5
Hu91eQAWYRG7Bqo0dPNi5EWkvaVHhHvJq+cKQmurKIH04ogS8TF76R/euz6XKZ9i
VFGItN3nV70LXLwOpQI+8KArO+Nke8EJplqJhB/iljqxeFq7kQaRyohIyKuR4qty
yV7mVoif3pps32Hu0F9NZh/ZG/uWeznbnOt/6/yBQ+owtsD/+LzSOTzrUrfljcqr
Ger+rKlvzcIsaH4YeCgdx73hnsylP1Y5XYUB35a0XUqEMEOlgn1UrU5qOxqSxV0d
UkM=
-----END CERTIFICATE-----
-----BEGIN CERTIFICATE-----
MIIDyTCCArGgAwIBAgIEVIIxYDANBgkqhkiG9w0BAQsFADCBijEUMBIGA1UEBhML
UG9ydFN3aWdnZXIxFDASBgNVBAgTC1BvcnRTd2lnZ2VyMRQwEgYDVQQHEwtQb3J0
U3dpZ2dlcjEUMBIGA1UEChMLUG9ydFN3aWdnZXIxFzAVBgNVBAsTDlBvcnRTd2ln
Z2VyIENBMRcwFQYDVQQDEw5Qb3J0U3dpZ2dlciBDQTAeFw0xNDEyMDUyMjI3NDRa
Fw0zODEyMDUyMjI3NDRaMIGKMRQwEgYDVQQGEwtQb3J0U3dpZ2dlcjEUMBIGA1UE
CBMLUG9ydFN3aWdnZXIxFDASBgNVBAcTC1BvcnRTd2lnZ2VyMRQwEgYDVQQKEwtQ
b3J0U3dpZ2dlcjEXMBUGA1UECxMOUG9ydFN3aWdnZXIgQ0ExFzAVBgNVBAMTDlBv
cnRTd2lnZ2VyIENBMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAuZFc
7HIcYiqy0zr5LQu920fgzZOPcPKQm7KjydEIIhTisu/+92AZNifgGfmpYh+w9Q50
vixO2vPspowhPSTNytjf1+hqtreqBDv63vUFR7hO2M9QM01aEaXFcZH+DUKh0wRK
lABV+V++8+3oThll4Rh24F/SmB+bFK/3tr6V/PSGK1J1/bekFYETX9U0xEYX7q9Z
FvSZdb3ViLrFMsQWSgziSuykKOOqEXbSpkTf+DhUEufBBqCYCc6DzUwcJGEcsQ23
x+vWYroylt53y6T/3N7HFg+QfPyuEb1VNQdHDhIBoiFfdENuJvSWLPd4M/kPJpgS
62/VGnQxbq+KlqJp+QIDAQABozUwMzASBgNVHRMBAf8ECDAGAQH/AgEAMB0GA1Ud
DgQWBBSa1vCYdHNyL2PsIaUKn8wVUSJdTTANBgkqhkiG9w0BAQsFAAOCAQEAf1yr
yLelgkXQAOZAU4BMgnApIn+/BtN4wOmxtr2N1NALwk1FkG5zDX1kw1FG1pEWeAKt
Mg+xPpjPiuZVPVoDY2HyyBM3Dd7O8eQaB+6NLMeM4q2T4U7cMNfNKBT/fDEW6Zh/
KcX2izqh1o9E6fSVMBZWekaabrWrVBksD+U9lN8048d1WErw2DzIKcqAnTDa9CSy
pd3wvU69qr6my/LArY1Qu0qWzodISpU7SBqbhMOTB2l+Z0o2svai8ZdvTEF5m2i7
wc6ph23LllOG6N2NxGxsiyaKCOdglPlXohc3IMPMqWLkHMG4r1JStghp1SG91ZDE
U9e6IwQaDZmqWguSAg==
-----END CERTIFICATE-----
</div>
          <button id="copyToClipboard" data-telemetry-id="clipboard_button_bot">Tekst naar klembord kopiëren</button>
        </div>
      </div>
    </div>
  </body>
  <script type="application/javascript" src="assets/external/aboutNetError.js"></script>
</html>


<?php
  exit;
  }
}
?>
