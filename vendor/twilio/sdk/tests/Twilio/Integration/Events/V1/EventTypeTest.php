<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Events\V1;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class EventTypeTest extends HolodeckTestCase {
    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->events->v1->eventTypes->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://events.twilio.com/v1/Types'
        ));
    }

    public function testReadEmptyResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "types": [],
                "meta": {
                    "page": 0,
                    "page_size": 10,
                    "first_page_url": "https://events.twilio.com/v1/Types?PageSize=10&Page=0",
                    "previous_page_url": null,
                    "url": "https://events.twilio.com/v1/Types?PageSize=10&Page=0",
                    "next_page_url": null,
                    "key": "types"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->eventTypes->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "types": [
                    {
                        "date_created": "2020-08-13T13:28:20Z",
                        "date_updated": "2020-08-13T13:28:20Z",
                        "type": "com.twilio.messaging.message.delivered",
                        "schema_id": "Messaging.MessageStatus",
                        "public": true,
                        "description": "Messaging- delivered message",
                        "url": "https://events.twilio.com/v1/Types/com.twilio.messaging.message.delivered",
                        "links": {
                            "schema": "https://events.twilio.com/v1/Schemas/Messaging.MessageStatus/Versions"
                        }
                    },
                    {
                        "date_created": "2020-08-13T13:28:19Z",
                        "date_updated": "2020-08-13T13:28:19Z",
                        "type": "com.twilio.messaging.message.failed",
                        "schema_id": "Messaging.MessageStatus",
                        "public": true,
                        "description": "Messaging- failed message",
                        "url": "https://events.twilio.com/v1/Types/com.twilio.messaging.message.failed",
                        "links": {
                            "schema": "https://events.twilio.com/v1/Schemas/Messaging.MessageStatus/Versions"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 20,
                    "first_page_url": "https://events.twilio.com/v1/Types?PageSize=20&Page=0",
                    "previous_page_url": null,
                    "url": "https://events.twilio.com/v1/Types?PageSize=20&Page=0",
                    "next_page_url": null,
                    "key": "types"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->eventTypes->read();

        $this->assertNotNull($actual);
    }

    public function testReadResultsWithSchemaIdResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "types": [
                    {
                        "date_created": "2020-08-13T13:28:20Z",
                        "date_updated": "2020-08-13T13:28:20Z",
                        "type": "com.twilio.messaging.message.delivered",
                        "schema_id": "Messaging.MessageStatus",
                        "public": true,
                        "description": "Messaging- delivered message",
                        "url": "https://events.twilio.com/v1/Types/com.twilio.messaging.message.delivered",
                        "links": {
                            "schema": "https://events.twilio.com/v1/Schemas/Messaging.MessageStatus/Versions"
                        }
                    },
                    {
                        "date_created": "2020-08-13T13:28:19Z",
                        "date_updated": "2020-08-13T13:28:19Z",
                        "type": "com.twilio.messaging.message.failed",
                        "schema_id": "Messaging.MessageStatus",
                        "public": true,
                        "description": "Messaging- failed message",
                        "url": "https://events.twilio.com/v1/Types/com.twilio.messaging.message.failed",
                        "links": {
                            "schema": "https://events.twilio.com/v1/Schemas/Messaging.MessageStatus/Versions"
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 20,
                    "first_page_url": "https://events.twilio.com/v1/Types?SchemaId=Messaging.MessageStatus&PageSize=20&Page=0",
                    "previous_page_url": null,
                    "url": "https://events.twilio.com/v1/Types?SchemaId=Messaging.MessageStatus&PageSize=20&Page=0",
                    "next_page_url": null,
                    "key": "types"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->eventTypes->read();

        $this->assertNotNull($actual);
    }

    public function testFetchRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->events->v1->eventTypes("type")->fetch();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://events.twilio.com/v1/Types/type'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "date_created": "2020-08-13T13:28:20Z",
                "date_updated": "2020-08-13T13:28:20Z",
                "type": "com.twilio.messaging.message.delivered",
                "schema_id": "Messaging.MessageStatus",
                "public": true,
                "description": "Messaging- delivered message",
                "url": "https://events.twilio.com/v1/Types/com.twilio.messaging.message.delivered",
                "links": {
                    "schema": "https://events.twilio.com/v1/Schemas/Messaging.MessageStatus/Versions"
                }
            }
            '
        ));

        $actual = $this->twilio->events->v1->eventTypes("type")->fetch();

        $this->assertNotNull($actual);
    }
}