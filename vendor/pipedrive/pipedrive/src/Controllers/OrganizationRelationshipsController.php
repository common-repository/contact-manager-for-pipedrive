<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Controllers;

use Pipedrive\APIException;
use Pipedrive\APIHelper;
use Pipedrive\Configuration;
use Pipedrive\Models;
use Pipedrive\Exceptions;
use Pipedrive\Http\HttpRequest;
use Pipedrive\Http\HttpResponse;
use Pipedrive\Http\HttpMethod;
use Pipedrive\Http\HttpContext;
use Pipedrive\OAuthManager;
use Pipedrive\Servers;
use Pipedrive\Utils\CamelCaseHelper;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class OrganizationRelationshipsController extends BaseController
{
    /**
     * @var OrganizationRelationshipsController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return OrganizationRelationshipsController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Gets all of the relationships for a supplied organization id.
     *
     * @param integer $orgId  ID of the organization to get relationships for
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getAllRelationshipsForOrganization(
        $orgId
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/organizationRelationships';

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'org_id' => $orgId,
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }

    /**
     * Creates and returns an organization relationship.
     *
     * @param object $body (optional) TODO: type description here
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createAnOrganizationRelationship(
        $body = null
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/organizationRelationships';

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'content-type'  => 'application/json; charset=utf-8',
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $_bodyJson);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }

    /**
     * Deletes an organization relationship and returns the deleted id.
     *
     * @param integer $id ID of the organization relationship
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function deleteAnOrganizationRelationship(
        $id
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/organizationRelationships/{id}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'id' => $id,
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::DELETE, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::delete($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }

    /**
     * Finds and returns an organization relationship from its ID.
     *
     * @param  array  $options    Array with all options for search
     * @param integer $options['id']     ID of the organization relationship
     * @param integer $options['orgId']  (optional) ID of the base organization for the returned calculated values
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getOneOrganizationRelationship(
        $options
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/organizationRelationships/{id}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'id'     => $this->val($options, 'id'),
            ));

        //process optional query parameters
        APIHelper::appendUrlWithQueryParameters($_queryBuilder, array (
            'org_id' => $this->val($options, 'orgId'),
        ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }

    /**
     * Updates and returns an organization relationship.
     *
     * @param  array  $options    Array with all options for search
     * @param integer $options['id']                ID of the organization relationship
     * @param integer $options['orgId']             (optional) ID of the base organization for the returned calculated
     *                                              values
     * @param string  $options['type']              (optional) The type of organization relationship.
     * @param integer $options['relOwnerOrgId']     (optional) The owner of this relationship. If type is 'parent',
     *                                              then the owner is the parent and the linked organization is the
     *                                              daughter.
     * @param integer $options['relLinkedOrgId']    (optional) The linked organization in this relationship. If type is
     *                                              'parent', then the linked organization is the daughter.
     * @return void response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function updateAnOrganizationRelationship(
        $options
    ) {
        //check or get oauth token
        OAuthManager::getInstance()->checkAuthorization();

        //prepare query string for API call
        $_queryBuilder = '/organizationRelationships/{id}';

        //process optional query parameters
        $_queryBuilder = APIHelper::appendUrlWithTemplateParameters($_queryBuilder, array (
            'id'                => $this->val($options, 'id'),
            ));

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl(Configuration::getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'      => BaseController::USER_AGENT,
            'Authorization' => sprintf('Bearer %1$s', Configuration::$oAuthToken->accessToken)
        );

        //prepare parameters
        $_parameters = array (
            'org_id'            => $this->val($options, 'orgId'),
            'type'            => APIHelper::prepareFormFields($this->val($options, 'type')),
            'rel_owner_org_id'  => $this->val($options, 'relOwnerOrgId'),
            'rel_linked_org_id' => $this->val($options, 'relLinkedOrgId')
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::PUT, $_headers, $_queryUrl, $_parameters);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::put($_queryUrl, $_headers, Request\Body::Form($_parameters));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return CamelCaseHelper::keysToCamelCase($response->body);
    }


    /**
    * Array access utility method
     * @param  array          $arr         Array of values to read from
     * @param  string         $key         Key to get the value from the array
     * @param  mixed|null     $default     Default value to use if the key was not found
     * @return mixed
     */
    private function val($arr, $key, $default = null)
    {
        if (isset($arr[$key])) {
            return is_bool($arr[$key]) ? var_export($arr[$key], true) : $arr[$key];
        }
        return $default;
    }
}
