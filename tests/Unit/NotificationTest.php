<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Notifications\NewMessage;
use App\Notifications\UpdateMessage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class NotificationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testNewmessage()
    {
        Notification::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NewMessage());
        Notification::assertSentTo(
            [$user], NewMessage::class
        );
    }
    public function testUpdatemessage()
    {
        Notification::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new UpdateMessage());
        Notification::assertSentTo(
            [$user], UpdateMessage::class
        );
    }
    public function testNewMessageNotification()
    {
        Mail::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new NewMessage());
        if (Mail::failures()) {
            self::assertTrue(false);
        } else {
            self::assertTrue(true);
        }
    }

    public function testUpdateMessageNotification()
    {
        Mail::fake();
        $user = $user = factory(\App\User::class)->make();
        $user->save();
        $user->notify(new UpdateMessage());
        if (Mail::failures()) {
            self::assertTrue(false);
        } else {
            self::assertTrue(true);
        }
    }
}

