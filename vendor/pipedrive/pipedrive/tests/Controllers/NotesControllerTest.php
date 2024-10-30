<?php
/*
 * Pipedrive
 *
 * This file was automatically generated by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace Pipedrive\Tests;

use Pipedrive\APIException;
use Pipedrive\Exceptions;
use Pipedrive\APIHelper;
use Pipedrive\Models;
use Pipedrive\Utils\DateTimeHelper;

class NotesControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Pipedrive\Controllers\NotesController Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass()
    {
        $client = new \Pipedrive\Client();
        self::$controller = $client->getNotes();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Returns all notes.
     */
    public function testTestGetAllNotes()
    {
        // Parameters for the API call
        $input = array();
        $input['userId'] = null;
        $input['dealId'] = null;
        $input['personId'] = null;
        $input['orgId'] = null;
        $input['start'] = 0;
        $input['limit'] = null;
        $input['sort'] = null;
        $input['startDate'] = null;
        $input['endDate'] = null;
        $input['pinnedToDealFlag'] = null;
        $input['pinnedToOrganizationFlag'] = null;
        $input['pinnedToPersonFlag'] = null;

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->getAllNotes($input);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = 'application/json' ;

        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertTrue(
            TestHelper::isJsonObjectProperSubsetOf(
                "{\"success\":true,\"data\":[{\"id\":1,\"active_flag\":true,\"add_time\":\"2019-12-09 13:59:21\",\"co" .
                "ntent\":\"abc\",\"deal\":{\"title\":\"Deal title\"},\"deal_id\":1,\"last_update_user_id\":1,\"org_id" .
                "\":1,\"organization\":{\"name\":\"Organization name\"},\"person\":{\"name\":\"Person name\"},\"perso" .
                "n_id\":1,\"pinned_to_deal_flag\":true,\"pinned_to_organization_flag\":false,\"pinned_to_person_flag" .
                "\":false,\"update_time\":\"2019-12-09 14:26:11\",\"user\":{\"email\":\"user@email.com\",\"icon_url\"" .
                ":\"https://iconurl.net/profile_120x120_123.jpg\",\"is_you\":true,\"name\":\"User Name\"},\"user_id\"" .
                ":1}],\"additional_data\":{\"limit\":100,\"more_items_in_collection\":false,\"start\":0}}",
                $this->httpResponse->getResponse()->getRawBody(),
                false,
                true,
                false
            ),
            "Response body does not match in keys"
        );
    }
}
