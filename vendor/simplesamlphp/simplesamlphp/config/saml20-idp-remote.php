<?php

/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

$metadata['https://myidp.roosevelt.edu'] = array (
  'entityid' => 'https://myidp.roosevelt.edu',
  'contacts' =>
  array (
  ),
  'metadata-set' => 'saml20-idp-remote',
  'SingleSignOnService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://idp.quicklaunchsso.com/samlsso?tenantDomain=roosevelt.edu',
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://idp.quicklaunchsso.com/samlsso?tenantDomain=roosevelt.edu',
    ),
  ),
  'SingleLogoutService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://idp.quicklaunchsso.com/samlsso?tenantDomain=roosevelt.edu',
      'ResponseLocation' => 'https://idp.quicklaunchsso.com/samlsso?tenantDomain=roosevelt.edu',
    ),
  ),
  'ArtifactResolutionService' =>
  array (
  ),
  'NameIDFormats' =>
  array (
    0 => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
  ),
  'keys' =>
  array (
    0 =>
    array (
      'encryption' => false,
      'signing' => true,
      'type' => 'X509Certificate',
      'X509Certificate' => '
MIICDzCCAXigAwIBAgIEW8ISVTANBgkqhkiG9w0BAQQFADBMMRYwFAYDVQQDEw1y b29zZXZlbHQuZWR1MQ0wCwYDVQQLEwROb25lMRQwEgYDVQQKEwtOb25lIEw9Tm9u ZTENMAsGA1UEBhMETm9uZTAeFw0xODA5MTUxMzQyMDdaFw0yODEwMTIxMzQyMDda MEwxFjAUBgNVBAMTDXJvb3NldmVsdC5lZHUxDTALBgNVBAsTBE5vbmUxFDASBgNV BAoTC05vbmUgTD1Ob25lMQ0wCwYDVQQGEwROb25lMIGfMA0GCSqGSIb3DQEBAQUA A4GNADCBiQKBgQCN86n6wfDmqU/2qAy2guzJiO7PkxpTZO6eQkaZaQHOdEjP8w5Y bdNM1rYnRVbHCPLVZaI7da4d/Ci2cLnn1v2/yEzAIW3ld6sNbo50luXIxRiU3m1D hnFxSvWhT7xMCDBxWycIUR6I2gbG8Mf+z/HnvCVSgZSQ38NqkZCFX+066QIDAQAB MA0GCSqGSIb3DQEBBAUAA4GBAF/JdMjoA02/QO3A1KSCJb2wNemlp84Krjb84RZs 4yv8T++aRhSf8OTC67UshLRdt8AB/yfc0TcsSC4WFI8MRuKOqBsY0b7KFu8CYlEX Gw2rn9c2UmWyITDhJUxGLMe9//aisnwdQZ63RfcHvdtMmEBsarRU5cZRx1+yjsXJ jPc0
',
    ),
  ),
);
