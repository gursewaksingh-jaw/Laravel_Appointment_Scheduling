<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\FlexApi\V1\Interaction\InteractionChannel;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Serialize;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class InteractionChannelParticipantTest extends HolodeckTestCase {
    public function testCreateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->participants->create("supervisor", []);
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Type' => "supervisor", 'MediaProperties' => Serialize::jsonObject([]), ];

        $this->assertRequest(new Request(
            'post',
            'https://flex-api.twilio.com/v1/Interactions/KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Participants',
            null,
            $values
        ));
    }

    public function testCreateResponse(): void {
        $this->holodeck->mock(new Response(
            201,
            '
            {
                "sid": "UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "channel_sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "type": "customer",
                "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants/UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1"
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->participants->create("supervisor", []);

        $this->assertNotNull($actual);
    }

    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->participants->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://flex-api.twilio.com/v1/Interactions/KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Participants'
        ));
    }

    public function testReadResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "participants": [
                    {
                        "sid": "UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                        "channel_sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                        "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "type": "customer",
                        "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants/UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1"
                    },
                    {
                        "sid": "UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa2",
                        "channel_sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                        "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "type": "agent",
                        "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants/UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa2"
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "participants"
                }
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->participants->read();

        $this->assertNotNull($actual);
    }

    public function testUpdateRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                      ->participants("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("closed");
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $values = ['Status' => "closed", ];

        $this->assertRequest(new Request(
            'post',
            'https://flex-api.twilio.com/v1/Interactions/KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Channels/UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/Participants/UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX',
            null,
            $values
        ));
    }

    public function testUpdateResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "channel_sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "type": "agent",
                "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants/UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1"
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->participants("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("closed");

        $this->assertNotNull($actual);
    }

    public function testUpdateStatusClosedResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "sid": "UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "channel_sid": "UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1",
                "interaction_sid": "KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                "type": "agent",
                "url": "https://flex-api.twilio.com/v1/Interactions/KDaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/Channels/UOaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1/Participants/UTaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa1"
            }
            '
        ));

        $actual = $this->twilio->flexApi->v1->interaction("KDXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->channels("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                            ->participants("UOXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")->update("closed");

        $this->assertNotNull($actual);
    }
}