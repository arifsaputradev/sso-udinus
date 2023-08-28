<?php

namespace Config;

class CustomSettings {
    public $settings = array(
        'strict' => true,
        'debug' => false,
        'baseurl' => null,
        'sp' => array(
            'entityId' => 'http://localhost:8080/sso/sp',
            'assertionConsumerService' => array(
                'url' => 'http://localhost:8080/sso/acs',
                'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            ),
            'attributeConsumingService' => array(
                'serviceName' => 'SP Udinus',
                'serviceDescription' => 'SAML2 Service Provider Universitas Dian Nuswantoro Semarang',
                'requestedAttributes' => array(
                    array(
                        'name' => 'Attribute1Name',
                        'isRequired' => false,
                        'nameFormat' => 'urn:oasis:names:tc:SAML:2.0:attrname-format:unspecified',
                        'friendlyName' => 'Attribute1FriendlyName',
                        'attributeValue' => array(),
                    ),
                ),
            ),
            'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
            'x509cert' => '-----BEGIN CERTIFICATE-----
    MIIDkTCCAnkCFBunegwltCBQIFSL3l3qHRO2emNDMA0GCSqGSIb3DQEBCwUAMIGE
    MQswCQYDVQQGEwJJRDEVMBMGA1UECAwMQ2VudHJhbCBKYXZhMREwDwYDVQQHDAhT
    ZW1hcmFuZzEPMA0GA1UECgwGVWRpbnVzMQwwCgYDVQQLDANVREkxDTALBgNVBAMM
    BEFyaWYxHTAbBgkqhkiG9w0BCQEWDmFyaWZAdWRpbnVzLmlkMB4XDTIzMDgyNDA2
    NDcwOVoXDTI0MDgyMzA2NDcwOVowgYQxCzAJBgNVBAYTAklEMRUwEwYDVQQIDAxD
    ZW50cmFsIEphdmExETAPBgNVBAcMCFNlbWFyYW5nMQ8wDQYDVQQKDAZVZGludXMx
    DDAKBgNVBAsMA1VESTENMAsGA1UEAwwEQXJpZjEdMBsGCSqGSIb3DQEJARYOYXJp
    ZkB1ZGludXMuaWQwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQCbU6Cu
    kW2u/jwhXqMnmc6AP+01Uz3h4wLaA1ygEA35dU3eksGsChNQDimabzwY+C/NXp5N
    nG2atgMixmCij9RRKH+4WCfkp49PU9eug2qFavsUYA8y45T9ukgVtiIGW7h1xtxt
    Uh8RFrlDrLNp8166z4zURLr50VrbpHg5wEN4lO7ITEtgr4hZlcnOqNSHXsYc/6oW
    pArlV78YfilLQOiSEZ6KY+RKGzZwN9L7IVkQXHAeO/CAUCj5A1inugF+y5JhH97P
    tN26s5Yk0opIV6+XyctJrpevl9TrLOFzqdX/SONWU2NsLGo45jZ0KV4vAmbmMwLm
    fYmYV/O72fdqhs3PAgMBAAEwDQYJKoZIhvcNAQELBQADggEBAESN0gtYBgWp5wwK
    18nkok0vwIkmD+yDmIC6+QAkpPXhe79590n33XsvvLLY2571+a86uSW3OoK2eEXc
    OVoByuUcmot/Tq2fOCfUpa5XR1wsO57wzkFE4PJUuqGubyTY6tRPD533VHJ/JeAz
    gkG+3t8OZoip1kLgMZ0Z4zmOKV4FgMjj/99tHj6Xntv1BL+DybH80t7/gQ0pAUMS
    x3zyYv8syxUW1qAFsIi9GIGNAALesHCWfSdkyS1+gJaE/5wBeQuEllg7u18pnthX
    Pfz62Ws7CyZo3BscHWwwzYeTWbCQcnIXUKYgzIk41zKefwkTqHqi0XIRXLYkBqFP
    bghSy9c=
    -----END CERTIFICATE-----
    ',
            'privateKey' => '-----BEGIN PRIVATE KEY-----
    MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQCbU6CukW2u/jwh
    XqMnmc6AP+01Uz3h4wLaA1ygEA35dU3eksGsChNQDimabzwY+C/NXp5NnG2atgMi
    xmCij9RRKH+4WCfkp49PU9eug2qFavsUYA8y45T9ukgVtiIGW7h1xtxtUh8RFrlD
    rLNp8166z4zURLr50VrbpHg5wEN4lO7ITEtgr4hZlcnOqNSHXsYc/6oWpArlV78Y
    filLQOiSEZ6KY+RKGzZwN9L7IVkQXHAeO/CAUCj5A1inugF+y5JhH97PtN26s5Yk
    0opIV6+XyctJrpevl9TrLOFzqdX/SONWU2NsLGo45jZ0KV4vAmbmMwLmfYmYV/O7
    2fdqhs3PAgMBAAECggEADJpQ98kR+rhjHZwFpfFrWWmWcBS0eS8HrLPIIK6cy6hS
    bKRAtZpNrdmwU3kCCc6dZk7ujkKKfBqXj4tEDPyZkAo2rrjsZ7eWv6uAXQcJrhCb
    lbAjm4/up1Wlgql4AkcP5PKBMReQML1Ew/JvzkFyZrrvZMu81gdAFYE3RgxNDSv7
    /aXuO6iBkAxJHfDAuSORc6rMbuwl39CWu1hd2XIFBNWINUbp0gPBCSGTaB8o8L3k
    H83i0QSrE8EIfVazWjgKDa+fbo8LlgGRhaKMJhnLr5tzu85TWuwXwio0QAlagZTN
    r5sRPqQy6GuFnnhJkPEdhhFpe6vJahT7EPcU/RdwqQKBgQDQfnZSvEWhg7tjf5vv
    NlhrF/9y44pE3TZBYUTZcWh7Aaj3mUPjR2GnMbTeaU6p0wEBMCZF8jFGwZUJZatH
    nQoaEi8rubxJTq7YjPAK2FRiyjHstYfht4wxWnUFrurDTuISc69omqUnPoR1c2rr
    pqKF7Kb0ZpAwjtSGihwUjKo1aQKBgQC+t+TzDaqq2L++nbjg5H8kSzSKygZbkMMg
    8o4nilHSdGMdGATGQXOU1ZQj+xu9CZBAp79Q6uq3WVefX8CnNM64YDDkeMLq4lit
    KrF5gkMA3MBp2AF9E31LsSsXuA5EHGU24WaUpi2qT6V3DkbPfFR+olCxpu8Z1PJE
    u5eEvSbqdwKBgAQqEnjyk713IR4KpXWwszFoaEzGKLPZa0UBCVwCfODAFrzjTczT
    Vyr8vi0XE2Am+8UnTgxlmwBby3tFkZc7lsEQjeqkqhMYxDtFDWJaEc1rVnXw5kbm
    4KD3upCjfsLp53AQ6XcAZ74R7Jlf9cnBKUvdfzQwfD7MC4ioZ4ktihTJAoGASqiE
    SJ1F/SFiVkU51Ve9acDC7b3OJVQS/rfU7Ceahi8niYEYhV+j1lSRbFBleGfg/15r
    Z0q+3U1tHqeGLC5g6g5FtXqMmxRGMGuxE+bpQdIoxIZZdtQFTXcqbluPwhv3hzdP
    R8uRvsT0+hktoRWDohr6ScEWgl85A60H0F+Xd1sCgYBXS+BkvboXInMCqd02Bqsv
    PUoQGeSfBdNqMqu/PJvo9vBUnhfkj84x6Pj3WtUIq1yOWH8Jo5xZGUAnxK3LSvfn
    ScHCuzObtjJrQZTYyVMVMwOZWRsHXfVa/Udw/G+oTuwUcneIEficjtl9sniMOKeu
    myjMSbipSvD0RsHZLEMQ0Q==
    -----END PRIVATE KEY-----
    ',
        ),
        'idp' => array(
            'entityId' => 'http://localhost:9993/realms/udinus',
            'singleSignOnService' => array(
                'url' =>  'http://localhost:9993/realms/udinus/protocol/saml',
                'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            ),
            'singleLogoutService' => array(
                'url' =>  'http://localhost:9993/realms/udinus/protocol/saml',
                'responseUrl' => 'http://localhost:8080/',
                'binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            ),
            'x509cert' => 'MIICmzCCAYMCBgGJzulazzANBgkqhkiG9w0BAQsFADARMQ8wDQYDVQQDDAZ1ZGludXMwHhcNMjMwODA3MDczMDQ2WhcNMzMwODA3MDczMjI2WjARMQ8wDQYDVQQDDAZ1ZGludXMwggEiMA0GCSqGSIb3DQEBAQUAA4IBDwAwggEKAoIBAQDTMUc8aAE4KXWu0O2gs7u0A1UKqC+iOIxzrfFmTbOIJPfDt5i3TJSHMsb5aA82qr4cEpyLRM1PzBxd4tdqOfcndnukQaLPrVMB2arho7oqtXrca6wHzHOIkQG4q+x8Hhvl+P/flEdE0EDTBALuoZKUq3Kg3cFYE4WoL1gtV4pFXZbASTsmmZFgkrpH/glRJorrpctIlNHDOQssrfWmyMdPVFnwEBsqJtfy4qnsfY1u31hwjfMo2sLsL7n92aIIGyzdwHnhoTubwtE33AbXzblaMGkZzyyDn4/Emrb1MCCmkz4W02jpyUxXjX7nRJnDrN7xN8JtZQ/W/NW+O0BE6aK/AgMBAAEwDQYJKoZIhvcNAQELBQADggEBAHA8uzkdyiCJsRtUiVqCPc//4g6yz74CsnUucZVq/F3xWDl3PzGpl4twb01F3Vm9yqR7kM5SRfRsT3y8+wfTTGeMKkdgzEI9exvtORDq8cN0ZSRT4gexcQb0l4rX76D6oQsgnP6Xzz83A3PlwVqKy8S86rKX1sr45Sf/77INejDsJAALAh4rGwEjF2D/BeC4edJcLHpi5cH06dNXyEeLXWJzakWrN8DgPCgFe7cTQCtffv+dqyw5YN9nSkJ+Tkj1qat2zEdVI9gJEhb1NCFaDRsjDsykKEFoGxnu/95MwQEcY6d8Cpfr+Wp2S9nsSlXRq8ntk8MMPm/30W9B+KgSNiw=',
        ),
    );


    public $advancedSettings = array(

        // Compression settings
        // Handle if the getRequest/getResponse methods will return the Request/Response deflated.
        // But if we provide a $deflate boolean parameter to the getRequest or getResponse
        // method it will have priority over the compression settings.
        'compress' => array(
            'requests' => true,
            'responses' => true
        ),

        // Security settings
        'security' => array(

            /** signatures and encryptions offered */

            // Indicates that the nameID of the <samlp:logoutRequest> sent by this SP
            // will be encrypted.
            'nameIdEncrypted' => false,

            // Indicates whether the <samlp:AuthnRequest> messages sent by this SP
            // will be signed.              [The Metadata of the SP will offer this info]
            'authnRequestsSigned' => false,

            // Indicates whether the <samlp:logoutRequest> messages sent by this SP
            // will be signed.
            'logoutRequestSigned' => false,

            // Indicates whether the <samlp:logoutResponse> messages sent by this SP
            // will be signed.
            'logoutResponseSigned' => false,

            /* Sign the Metadata
            False || True (use sp certs) || array (
                                                        'keyFileName' => 'metadata.key',
                                                        'certFileName' => 'metadata.crt'
                                                )
                                        || array (
                                                        'x509cert' => '',
                                                        'privateKey' => ''
                                                )
            */
            'signMetadata' => false,


            /** signatures and encryptions required **/

            // Indicates a requirement for the <samlp:Response>, <samlp:LogoutRequest> and
            // <samlp:LogoutResponse> elements received by this SP to be signed.
            'wantMessagesSigned' => false,

            // Indicates a requirement for the <saml:Assertion> elements received by
            // this SP to be encrypted.
            'wantAssertionsEncrypted' => false,

            // Indicates a requirement for the <saml:Assertion> elements received by
            // this SP to be signed.        [The Metadata of the SP will offer this info]
            'wantAssertionsSigned' => false,

            // Indicates a requirement for the NameID element on the SAMLResponse received
            // by this SP to be present.
            'wantNameId' => true,

            // Indicates a requirement for the NameID received by
            // this SP to be encrypted.
            'wantNameIdEncrypted' => false,

            // Authentication context.
            // Set to false and no AuthContext will be sent in the AuthNRequest,
            // Set true or don't present this parameter and you will get an AuthContext 'exact' 'urn:oasis:names:tc:SAML:2.0:ac:classes:PasswordProtectedTransport'
            // Set an array with the possible auth context values: array('urn:oasis:names:tc:SAML:2.0:ac:classes:Password', 'urn:oasis:names:tc:SAML:2.0:ac:classes:X509'),
            'requestedAuthnContext' => false,

            // Allows the authn comparison parameter to be set, defaults to 'exact' if
            // the setting is not present.
            'requestedAuthnContextComparison' => 'exact',

            // Indicates if the SP will validate all received xmls.
            // (In order to validate the xml, 'strict' and 'wantXMLValidation' must be true).
            'wantXMLValidation' => true,

            // If true, SAMLResponses with an empty value at its Destination
            // attribute will not be rejected for this fact.
            'relaxDestinationValidation' => false,

            // If true, Destination URL should strictly match to the address to
            // which the response has been sent.
            // Notice that if 'relaxDestinationValidation' is true an empty Destintation
            // will be accepted.
            'destinationStrictlyMatches' => false,

            // If true, the toolkit will not raised an error when the Statement Element
            // contain atribute elements with name duplicated
            'allowRepeatAttributeName' => false,

            // If true, SAMLResponses with an InResponseTo value will be rejectd if not
            // AuthNRequest ID provided to the validation method.
            'rejectUnsolicitedResponsesWithInResponseTo' => false,

            // Algorithm that the toolkit will use on signing process. Options:
            //    'http://www.w3.org/2000/09/xmldsig#rsa-sha1'
            //    'http://www.w3.org/2000/09/xmldsig#dsa-sha1'
            //    'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256'
            //    'http://www.w3.org/2001/04/xmldsig-more#rsa-sha384'
            //    'http://www.w3.org/2001/04/xmldsig-more#rsa-sha512'
            // Notice that rsa-sha1 is a deprecated algorithm and should not be used
            'signatureAlgorithm' => 'http://www.w3.org/2001/04/xmldsig-more#rsa-sha256',

            // Algorithm that the toolkit will use on digest process. Options:
            //    'http://www.w3.org/2000/09/xmldsig#sha1'
            //    'http://www.w3.org/2001/04/xmlenc#sha256'
            //    'http://www.w3.org/2001/04/xmldsig-more#sha384'
            //    'http://www.w3.org/2001/04/xmlenc#sha512'
            // Notice that sha1 is a deprecated algorithm and should not be used
            'digestAlgorithm' => 'http://www.w3.org/2001/04/xmlenc#sha256',

            // Algorithm that the toolkit will use for encryption process. Options:
            // 'http://www.w3.org/2001/04/xmlenc#tripledes-cbc'
            // 'http://www.w3.org/2001/04/xmlenc#aes128-cbc'
            // 'http://www.w3.org/2001/04/xmlenc#aes192-cbc'
            // 'http://www.w3.org/2001/04/xmlenc#aes256-cbc'
            // 'http://www.w3.org/2009/xmlenc11#aes128-gcm'
            // 'http://www.w3.org/2009/xmlenc11#aes192-gcm'
            // 'http://www.w3.org/2009/xmlenc11#aes256-gcm';
            // Notice that aes-cbc are not consider secure anymore so should not be used
            'encryption_algorithm' => 'http://www.w3.org/2009/xmlenc11#aes128-gcm',

            // ADFS URL-Encodes SAML data as lowercase, and the toolkit by default uses
            // uppercase. Turn it True for ADFS compatibility on signature verification
            'lowercaseUrlencoding' => false,
        ),

        // Contact information template, it is recommended to suply a technical and support contacts
        'contactPerson' => array(
            'technical' => array(
                'givenName' => 'Arif Saputra',
                'emailAddress' => 'arif.sptrra@gmail.com'
            ),
            'support' => array(
                'givenName' => 'Arif Saputra',
                'emailAddress' => 'arif.sptra@gmail.com'
            ),
        ),

        // Organization information template, the info in en_US lang is recomended, add more if required
        'organization' => array(
            'en-US' => array(
                'name' => 'Universitas Dian Nuswantoro Semarang',
                'displayname' => 'UDINUS',
                'url' => 'https://dinus.ac.id'
            ),
        ),
    );
}