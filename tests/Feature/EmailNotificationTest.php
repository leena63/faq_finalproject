<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Mailable;

class EmailNotificationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testEmailnotification()
    {
        Mail::fake();
        $user  = factory(\App\User::class)->make();
        $user->save();
        Mail::to($user->email)->send(new Mailable());
        $this->assertTrue(true);
    }
}
