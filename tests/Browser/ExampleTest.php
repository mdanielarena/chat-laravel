<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function ($first, $second) {
        $first->loginAs(User::find(1))
              ->visit('/chat')
              ->waitFor('.chat-composer');

        $second->loginAs(User::find(2))
               ->visit('/chat')
               ->waitFor('.chat-composer')
               ->type('#message', 'Hey Taylor')
               ->press('Send');

        $first->waitForText('Hey Taylor')
              ->assertSee('Jeffrey Way');
      });
    }
}
