<?php

namespace App\Controllers;

session_start();

use OneLogin\Saml2\Auth;
use OneLogin\Saml2\Error;
use OneLogin\Saml2\Utils;

class Sso extends BaseController
{
    // SSO Udinus   
    public function ssoLogin()
    {
        try {
            // Check if the user is already authenticated
            if (empty($_SESSION['samlUserdata'])) {
                $auth = new Auth();

                // Process the SAML response if available
                if (!empty($_REQUEST['SAMLResponse']) && !empty($_REQUEST['RelayState'])) {
                    $auth->processResponse(null);
                    $errors = $auth->getErrors();
                    if (empty($errors)) {
                        // User has authenticated successfully
                        $_SESSION['samlUserdata'] = $auth->getAttributes();

                        // Redirect to the home page after successful login
                        // $session = session();
                        // $ses_data = [
                        //     'isLoggedIn' => TRUE
                        // ];
                        // $session->set($ses_data);
                        header('Location: /home-sso');
                        
                        exit; // Ensure that the script stops here
                    }
                }

                // Initiate SSO login if needed
                $auth->login();
            } else {
                // Redirect to the home page if user is already authenticated
                // $session = session();
                // $ses_data = [
                //     'isLoggedIn' => TRUE
                // ];
                // $session->set($ses_data);
                header('Location: /home-sso');
            
                exit; // Ensure that the script stops here
            }

            // ---- old code ----
            // // Initialize the SAML authentication
            // $auth = new Auth();

            // // Check if the user is already authenticated
            // if ($auth->isAuthenticated()) {
            //     // Redirect to the intended page after successful SSO
            //     // return redirect()->to('home'); // Replace 'dashboard' with your desired URL
            //     return "Authenticated";
            // }

            // // Initiate the SSO process
            // $auth->login();

        } catch (\Exception $e) {
            // Handle any exceptions
            log_message('error', 'SSO Login Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage(); // Pass error message to view
            return view('errors/acs_error', $data); // Load the error view with data
        }
    }

    public function sp()
    {
        try {
            $auth = new Auth();
            $settings = $auth->getSettings();
            $metadata = $settings->getSPMetadata();
            $errors = $settings->validateMetadata($metadata);
            if (empty($errors)) {
                header('Content-Type: text/xml');
                echo $metadata;
            } else {
                throw new Error(
                    'Invalid SP metadata: '.implode(', ', $errors),
                    Error::METADATA_SP_INVALID
                );
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            log_message('error', 'ACS Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage(); // Pass error message to view
            return view('errors/acs_error', $data); // Load the error view with data
        }

        // ---- old code ----
        // $spBaseUrl = base_url(); 
        // $acsUrl = $spBaseUrl . 'sso/acs'; 

        /*
        $metadata = <<<XML
        <?xml version="1.0"?>
        <md:EntityDescriptor xmlns:md="urn:oasis:names:tc:SAML:2.0:metadata" entityID="$spBaseUrl">
            <md:SPSSODescriptor protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">
                <md:AssertionConsumerService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST" Location="$acsUrl" index="1"/>
            </md:SPSSODescriptor>
        </md:EntityDescriptor>
        XML;
        */

        // return $this->response->setContentType('text/xml')->setBody($metadata);
    }

    public function ssoAcs()
    {
        try {
            $auth = new Auth();

            if (isset($_SESSION) && isset($_SESSION['AuthNRequestID'])) {
                $requestID = $_SESSION['AuthNRequestID'];
            } else {
                $requestID = null;
            }

            $auth->processResponse($requestID);
            unset($_SESSION['AuthNRequestID']);

            $errors = $auth->getErrors();

            if (!empty($errors)) {
                echo '<p>', implode(', ', $errors), '</p>';
                exit();
            }

            if (!$auth->isAuthenticated()) {
                echo "<p>Not authenticated</p>";
                exit();
            }

            $_SESSION['samlUserdata'] = $auth->getAttributes();
            $_SESSION['samlNameId'] = $auth->getNameId();
            $_SESSION['samlNameIdFormat'] = $auth->getNameIdFormat();
            $_SESSION['samlNameidNameQualifier'] = $auth->getNameIdNameQualifier();
            $_SESSION['samlNameidSPNameQualifier'] = $auth->getNameIdSPNameQualifier();
            $_SESSION['samlSessionIndex'] = $auth->getSessionIndex();

            if (isset($_POST['RelayState']) && Utils::getSelfURL() != $_POST['RelayState']) {
                // To avoid 'Open Redirect' attacks, before execute the
                // redirection confirm the value of $_POST['RelayState'] is a // trusted URL.
                $auth->redirectTo($_POST['RelayState']);
            }

            $attributes = $_SESSION['samlUserdata'];
            $nameId = $_SESSION['samlNameId'];

            echo '<h1>Identified user: '. htmlentities($nameId) .'</h1>';

            if (!empty($attributes)) {
                echo '<h2>'._('User attributes:').'</h2>';
                echo '<table><thead><th>'._('Name').'</th><th>'._('Values').'</th></thead><tbody>';
                foreach ($attributes as $attributeName => $attributeValues) {
                    echo '<tr><td>' . htmlentities($attributeName) . '</td><td><ul>';
                    foreach ($attributeValues as $attributeValue) {
                        echo '<li>' . htmlentities($attributeValue) . '</li>';
                    }
                    echo '</ul></td></tr>';
                }
                echo '</tbody></table>';
            } else {
                echo _('No attributes found.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions
            log_message('error', 'ACS Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage(); // Pass error message to view
            return view('errors/acs_error', $data); // Load the error view with data
        }
            
            // ---- old code ----
            // $auth = new Auth();
            // $auth->getErrors();
            // $auth->processResponse(0);
            // $samlAttributes = $auth->getAttributes();
            // // echo "<br><br>SAML Attributes: " . $samlAttributes;

            // // Display the SAML attributes
            // echo "<br><br>SAML Attributes:<br>";
            // foreach ($samlAttributes as $attributeName => $attributeValues) {
            //     echo "$attributeName: ";
            //     foreach ($attributeValues as $value) {
            //         echo "$value, ";
            //     }
            //     echo "<br>";
            // }

            // // Get the SAML response object
            // $samlResponse = $auth->getLastResponseXML();
            // echo "<br><br>SAML Response: " . $samlResponse;

            // -----------

            // $samlRequestID = $auth->getLastRequestID();
            // echo "<br><br>SAML Request ID: " . $samlRequestID;

            // $samlMessageId = $auth->getLastMessageId();
            // echo "<br><br>SAML Message ID: " . $samlMessageId;

            // // 1. Decode the URL-encoded string
            // $decodedResponse = urldecode($samlResponse);

            // // 2. Split the response into different components
            // $responseComponents = explode('+', $decodedResponse);

            // // 3. Decode the base64-encoded and signed XML data
            // $base64Xml = $responseComponents[0];
            // $decodedXml = base64_decode($base64Xml);

            // // 4. Parse the XML to extract the desired information
            // $xml = new \SimpleXMLElement($decodedXml);

            // // Now, you can access different elements and attributes in the XML
            // $requestId = $xml->element->getAttribute('InResponseTo');
            // $subject = $xml->xpath('//saml:Subject/saml:NameID')[0];
            // $attributes = $xml->xpath('//saml:AttributeStatement/saml:Attribute');
            // // Extract more information as needed

            // // Print or use the extracted information
            // echo "Request ID: " . $requestId . "<br>";
            // echo "Subject: " . $subject . "<br>";
            // echo "Attributes: " . $attributes . "<br>";

        // --- ---- ---- ---- 
        // $auth = new Auth();
        // $rid = $auth->processResponse(0);
        // print("RID: " . print_r($rid, true));

        // $auth->processResponse($rid);
        // $auth->processResponse();

        // Access user attributes
        // $attributes = $auth->getAttributes();

        // if (isset($attributes['email'][0])) {
        //     $email = $attributes['email'][0];
        //     print_r($email);
        // } else {
        // }

        // print("Hello World");
        
        // error_log("Attributes received:");
        // error_log(print_r($attributes, true));
        // // $email = $attributes['email'][0];=

        // Debug: Print out the SAML response
        // $response = $auth->getLastResponseXML();
        // print("SAML Response: " . print_r($auth, true));
    }

    public function ssoSlo() {
        try {
            // Destroy the session
            session_destroy();

            $auth = new Auth();
            $auth->logout();
        } catch(\Exception $e) {
            // Handle any exceptions
            log_message('error', 'ACS Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage(); // Pass error message to view
            return view('errors/acs_error', $data); // Load the error view with data
        }
    }




    // // ----------------
    // // SSO Google OAuth
    // public function googleLogin()
    // {
    //     helper('url');
    //     $client = new \Google_Client();
    //     $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
    //     $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
    //     $client->setRedirectUri(getenv('GOOGLE_REDIRECT_URI'));
    //     $client->addScope('email');
    //     $client->addScope('profile');
    //     $client->setAccessType('offline');
    //     $client->setPrompt('select_account consent');
    //     $client->setIncludeGrantedScopes(true);

    //     return redirect()->to($client->createAuthUrl());
    // }

    // public function googleCallback()
    // {Logout failed
    //     helper('url');
    //     $client = new \Google_Client();
    //     $client->setClientId(getenv('GOOGLE_CLIENT_ID'));
    //     $client->setClientSecret(getenv('GOOGLE_CLIENT_SECRET'));
    //     $client->setRedirectUri(getenv('GOOGLE_REDIRECT_URI'));
    //     $client->addScope('email');
    //     $client->addScope('profile');
    //     $client->setAccessType('offline');
    //     $client->setIncludeGrantedScopes(true);

    //     if ($this->request->getVar('code')) {
    //         $token = $client->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
    //         $client->setAccessToken($token);

    //         if ($client->isAccessTokenExpired()) {
    //             $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    //         }

    //         $google_oauth = new \Google_Service_Oauth2($client);
    //         $google_account_info = $google_oauth->userinfo->get();

    //         // Lakukan sesuatu dengan data akun Google yang diterima
    //         var_dump($google_account_info);
    //     }
    // }
}