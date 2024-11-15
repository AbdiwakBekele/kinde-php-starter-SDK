<?php

/**
 * Kinde Management API
 * PHP version 7.4
 *
 * @package OpenAPIServer
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */

/**
 * Provides endpoints to manage your Kinde Businesses
 * The version of the OpenAPI document: 0.0.1
 * Contact: support@kinde.com
 * Generated by: https://github.com/openapitools/openapi-generator.git
 */

declare(strict_types=1);

/**
 * NOTE: This class is auto generated by the openapi generator program.
 * https://github.com/openapitools/openapi-generator
 * Do not edit the class manually.
 */

namespace OpenAPIServer\App;

use OpenAPIServer\Api\KindeApiClient;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Exception\HttpNotImplementedException;
use Slim\Views\PhpRenderer;
use Slim\Logger;

/**
 * RegisterRoutes Class Doc Comment
 *
 * @package OpenAPIServer
 * @author  OpenAPI Generator team
 * @link    https://github.com/openapitools/openapi-generator
 */
class RegisterRoutes {

    private Logger $logger;

    /** @var array[] list of all api operations */
    private $operations = [
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Main',
            'operationId' => 'index',
            'responses' => [
                '200' => [
                    'jsonSchema' => '{
                    "description" : "A successful response with a list of users or an empty list",
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                    "$ref" : "#/components/schemas/user"
                                }
                            }
                        }
                    }',
                ],
                '403' => [
                    'jsonSchema' => '{
                        "description" : "Invalid credentials"
                    }',
                ],
            ],
            'authMethods' => [
                // oauth2 security schema named 'oauth'
                [
                    'type' => 'oauth2',
                    'isBasic' => false,
                    'isBearer' => false,
                    'isApiKey' => false,
                    'isOAuth' => true,
                    'scopes' => [
                        'offline', // offline
                        'openid', // openid
                    ],
                ],
            ],
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/login',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Main',
            'operationId' => 'login',
            'responses' => [
                '200' => [
                    'jsonSchema' => '{
                    "description" : "A successful response with a list of users or an empty list",
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                    "$ref" : "#/components/schemas/user"
                                }
                            }
                        }
                    }',
                ],
                '403' => [
                    'jsonSchema' => '{
                        "description" : "Invalid credentials"
                    }',
                ],
            ],
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/callback',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Main',
            'operationId' => 'callback',
            'responses' => [
                '200' => [
                    'jsonSchema' => '{
                    "description" : "A successful response with a list of users or an empty list",
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                    "$ref" : "#/components/schemas/user"
                                }
                            }
                        }
                    }',
                ],
                '403' => [
                    'jsonSchema' => '{
                        "description" : "Invalid credentials"
                    }',
                ],
            ],
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/profile',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Main',
            'operationId' => 'getProfile',
            'responses' => [
                '200' => [
                    'jsonSchema' => '{
                    "description" : "A successful response with a list of users or an empty list",
                    "content" : {
                        "application/json" : {
                            "schema" : {
                                    "$ref" : "#/components/schemas/user"
                                }
                            }
                        }
                    }',
                ],
                '403' => [
                    'jsonSchema' => '{
                        "description" : "Invalid credentials"
                    }',
                ],
            ],
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/register',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Main',
            'operationId' => 'register',
            'responses' => [],
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/logout',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Main',
            'operationId' => 'logout',
            'responses' => [],
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/create-user',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'ManagementUser',
            'operationId' => 'index',
            'responses' => [],
        ],
        [
            'httpMethod' => 'POST',
            'basePathWithoutHost' => '',
            'path' => '/save-user',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'ManagementUser',
            'operationId' => 'save',
            'responses' => [],
        ],
        [
            'httpMethod' => 'GET',
            'basePathWithoutHost' => '',
            'path' => '/playground',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Playground',
            'operationId' => 'index',
            'responses' => [],
        ],
        [
            'httpMethod' => 'POST',
            'basePathWithoutHost' => '',
            'path' => '/playground',
            'apiPackage' => 'OpenAPIServer\Api',
            'classname' => 'AbstractUserApi',
            'userClassname' => 'Playground',
            'operationId' => 'playground',
            'responses' => [],
        ],
    ];

    /**
     * Add routes to Slim app.
     *
     * @param \Slim\App $app Pre-configured Slim application instance
     *
     * @throws HttpNotImplementedException When implementation class doesn't exists
     */
    public function __invoke(\Slim\App $app): void {
        $app->options('/{routes:.*}', function (ServerRequestInterface $request, ResponseInterface $response) {
            // CORS Pre-Flight OPTIONS Request Handler
            return $response;
        });

        // create mock middleware factory
        /** @var \Psr\Container\ContainerInterface */
        $container = $app->getContainer();
        /** @var \OpenAPIServer\Mock\OpenApiDataMockerRouteMiddlewareFactory|null */
        $mockMiddlewareFactory = null;
        if ($container->has(\OpenAPIServer\Mock\OpenApiDataMockerRouteMiddlewareFactory::class)) {
            // I know, anti-pattern. Don't retrieve dependency directly from container
            $mockMiddlewareFactory = $container->get(\OpenAPIServer\Mock\OpenApiDataMockerRouteMiddlewareFactory::class);
        }

        foreach ($this->operations as $operation) {
            $callback = function (ServerRequestInterface $request) use ($operation) {
                $message = "How about extending {$operation['classname']} by {$operation['apiPackage']}\\{$operation['userClassname']} class implementing {$operation['operationId']} as a {$operation['httpMethod']} method?";
                throw new HttpNotImplementedException($request, $message);
            };
            $middlewares = [];

            if (class_exists("\\{$operation['apiPackage']}\\{$operation['userClassname']}")) {
                // Notice how we register the controller using the class name?
                // PHP-DI will instantiate the class for us only when it's actually necessary
                $callback = ["\\{$operation['apiPackage']}\\{$operation['userClassname']}", $operation['operationId']];
            }

            if ($mockMiddlewareFactory) {
                $mockSchemaResponses = array_map(function ($item) {
                    return json_decode($item['jsonSchema'], true);
                }, $operation['responses']);
                $middlewares[] = $mockMiddlewareFactory->create($mockSchemaResponses);
            }

            $route = $app->map(
                [$operation['httpMethod']],
                "{$operation['basePathWithoutHost']}{$operation['path']}",
                $callback
            )->setName($operation['operationId']);

            foreach ($middlewares as $middleware) {
                $route->add($middleware);
            }
        }

        $app->get('/get-organizations', function (ServerRequestInterface $request, $response) {
            $subdomain = 'testabdiwak';
            $clientId = '6c599763716a4899a96399bdc8ee4569';
            $clientSecret = 'm5dpBv8JdbAwrzp49jNeHSXXCEhhEE14gEO5a9TIDcmK9NZyS';

            $kindeApiClient = new KindeApiClient($subdomain, $clientId, $clientSecret);

            // Call the getOrganizations method
            $organizations = $kindeApiClient->getOrganizations();

            // Check if response is valid
            if ($organizations === null) {
                return $response->withStatus(500, 'Failed to retrieve organizations');
            }

            return $response;
        });
    }
}