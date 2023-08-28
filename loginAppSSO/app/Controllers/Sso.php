<?php

namespace App\Controllers;

session_start();

use OneLogin\Saml2\Auth;
use OneLogin\Saml2\Utils;
use OneLogin\Saml2\Error;

use Config\CustomSettings;

class Sso extends BaseController {
    private $customSettings;

    public function __construct() {
        $this->customSettings = new CustomSettings();
    }

	public function sp() {
        try {
            $spBaseUrl = base_url(); 
            $acsUrl = $spBaseUrl . 'sso/acs'; 

            $metadata = <<<XML
            <?xml version="1.0"?>
            <md:EntityDescriptor xmlns:md="urn:oasis:names:tc:SAML:2.0:metadata" entityID="$spBaseUrl">
                <md:SPSSODescriptor protocolSupportEnumeration="urn:oasis:names:tc:SAML:2.0:protocol">
                    <md:AssertionConsumerService Binding="urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST" Location="$acsUrl" index="1"/>
                </md:SPSSODescriptor>
            </md:EntityDescriptor>
            XML;

            return $this->response->setContentType('text/xml')->setBody($metadata);
        } catch (\Exception $e) {
            // Handle any exceptions
            log_message('error', 'ACS Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage();
            return view('errors/acs_error', $data);
        }
	}

    public function acs() {
        try {
            $auth = new Auth($this->customSettings->settings, true);

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

            // $attributes = $_SESSION['samlUserdata'];
            // $nameId = $_SESSION['samlNameId'];

            // echo '<h1>Identified user: '. htmlentities($nameId) .'</h1>';

            // if (!empty($attributes)) {
            //     echo '<h2>'._('User attributes:').'</h2>';
            //     echo '<table><thead><th>'._('Name').'</th><th>'._('Values').'</th></thead><tbody>';
            //     foreach ($attributes as $attributeName => $attributeValues) {
            //         echo '<tr><td>' . htmlentities($attributeName) . '</td><td><ul>';
            //         foreach ($attributeValues as $attributeValue) {
            //             echo '<li>' . htmlentities($attributeValue) . '</li>';
            //         }
            //         echo '</ul></td></tr>';
            //     }
            //     echo '</tbody></table>';
            // } else {
            //     echo _('No attributes found.');
            // }
        } catch (\Exception $e) {
            // Handle any exceptions
            log_message('error', 'ACS Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage();
            return view('errors/acs_error', $data);
        }
    }

    public function login() {
        try {
            // Check if the user is already authenticated
            if (empty($_SESSION['samlUserdata'])) {
                $auth = new Auth($this->customSettings->settings, true);

                // Process the SAML response if available
                if (!empty($_REQUEST['SAMLResponse']) && !empty($_REQUEST['RelayState'])) {
                    $auth->processResponse(null);
                    $errors = $auth->getErrors();
                    if (empty($errors)) {
                        // User has authenticated successfully
                        $_SESSION['samlUserdata'] = $auth->getAttributes();

                        header('Location: /home');
                        
                        exit;
                    }
                }

                // Initiate SSO login if needed
                $auth->login();
            } else {
                header('Location: /home');
            
                exit;
            }

        } catch (\Exception $e) {
            // Handle any exceptions
            log_message('error', 'SSO Login Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage(); // Pass error message to view
            return view('errors/acs_error', $data); // Load the error view with data
        }
    }

    public function slo() {
        try {
            // Destroy the session
            session_destroy();

            $auth = new Auth($this->customSettings->settings, true);
            $auth->logout();
        } catch(\Exception $e) {
            // Handle any exceptions
            log_message('error', 'ACS Error: ' . $e->getMessage());
            $data['errorMessage'] = $e->getMessage(); // Pass error message to view
            return view('errors/acs_error', $data); // Load the error view with data
        }
    }
}