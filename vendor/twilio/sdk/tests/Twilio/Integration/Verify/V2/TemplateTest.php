<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Verify\V2;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class TemplateTest extends HolodeckTestCase {
    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->verify->v2->templates->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://verify.twilio.com/v2/Templates'
        ));
    }

    public function testListVerificationTemplatesResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "templates": [
                    {
                        "sid": "HJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "Base Verification Template 2 with do not share",
                        "channels": [
                            "sms"
                        ],
                        "translations": {
                            "en": {
                                "is_default_translation": true,
                                "status": "approved",
                                "locale": "en",
                                "text": "Your {{friendly_name}} verification code is: {{code}}. Do not share this code with anyone.",
                                "date_updated": "2021-07-29T20:38:28.759979905Z",
                                "date_created": "2021-07-29T20:38:28.165602325Z"
                            }
                        }
                    },
                    {
                        "sid": "HJaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaab",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "friendly_name": "Base Verification Template 3",
                        "channels": [
                            "sms",
                            "voice"
                        ],
                        "translations": {
                            "en": {
                                "is_default_translation": true,
                                "status": "approved",
                                "locale": "en",
                                "text": "Your verification code is: {{code}}. Do not share it.",
                                "date_updated": "2021-07-29T20:38:28.759979905Z",
                                "date_created": "2021-07-29T20:38:28.165602325Z"
                            }
                        }
                    }
                ],
                "meta": {
                    "page": 0,
                    "page_size": 50,
                    "first_page_url": "https://verify.twilio.com/v2/Templates?PageSize=50&Page=0",
                    "previous_page_url": null,
                    "url": "https://verify.twilio.com/v2/Templates?PageSize=50&Page=0",
                    "next_page_url": null,
                    "key": "templates"
                }
            }
            '
        ));

        $actual = $this->twilio->verify->v2->templates->read();

        $this->assertNotNull($actual);
    }
}