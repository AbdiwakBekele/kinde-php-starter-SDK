<?php

namespace OpenAPIServer\Api;

use Psr\Http\Message\ResponseInterface;
use Slim\Logger;
use Slim\Psr7\Response;
use Slim\Views\PhpRenderer;

class KindeApiClient {

    private Logger $logger;


    private $subdomain;
    private $clientId;
    private $clientSecret;

    public function __construct($subdomain, $clientId, $clientSecret) {
        $this->subdomain = $subdomain;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;

        $this->logger = new Logger();
    }

    private function getAccessToken() {
        $url = 'https://' . $this->subdomain . '.kinde.com/oauth2/token';
        $data = [
            'grant_type' => 'client_credentials',
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'audience' => 'https://' . $this->subdomain . '.kinde.com/api',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/x-www-form-urlencoded',
        ]);

        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            curl_close($ch);
            return null;
        }
        curl_close($ch);

        $responseArray = json_decode($responseData, true);
        return $responseArray['access_token'] ?? null;
    }

    public function getOrganizations() {
        $token = $this->getAccessToken();
        if (!$token) {
            $this->logger->info("No Token");
            return (new Response())
                ->withStatus(401)
                ->withHeader('Authorization', 'Unauthorized');
        }
        $this->logger->info("Token Generated Successfully");

        // https://testabdiwak.kinde.com/api/v1/organizations
        $url = 'https://' . $this->subdomain . '.kinde.com/api/v1/organizations';

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "authorization: Bearer " . $token,
                "content-type: application/json",
                "accept: application/json"
            ],
        ]);

        $response = curl_exec($curl);

        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }

        $this->logger->info("Response: " . $response);
        return $response;
    }
}