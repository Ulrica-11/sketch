<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreQuoteTest extends TestCase
{
    /** @test */
    public function an_authorised_user_can_create_quote()
    {
        $user = $this->actingAs(factory('App\Models\User')->create(), 'api');

        $body = "testtesttest";
        $request = $this->post('api/quote', ['body' => $body]);

        $response = $request->send();

        $this->assertEquals(200, $response->getStatusCode());

        $body = "testtesttest";
        $request = $this->post('api/quote', ['body' => $body]);

        $response = $request->send();

        $this->assertEquals(422, $response->getStatusCode());//出现重复的题头
    }

    /** @test */
    public function a_guest_can_not_create_quote()
    {
        $body = "test8";
        $request = $this->post('api/quote', ['body' => $body]);

        $response = $request->send();

        $this->assertEquals(401, $response->getStatusCode());
    }
}
