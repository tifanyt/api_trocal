<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TransactionsTest extends DuskTestCase
{
    /**
     * @test Log in.
     *
     * @return void
     */
    public function log_in()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/login')
                ->type('email', 'madeleine.yu@gmail.com')
                ->type('password', 'talos1')
                ->click('.btn-primary');
      });
    }

    /**
     * @test List of transactions.
     *
     * @return void
     */
    public function list_transactions()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/transactions')
                ->assertSee('Total transactions');
      });
    }

    /**
     * @test Add an object form.
     *
     * @return void
     */
    public function add_transaction_form()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/transactions/add')
                ->assertSee('Ajouter une transaction')
                ->assertVisible('label[for=buyer_id]')
                ->assertVisible('label[for=seller_id]')
                ->assertVisible('label[for=buyer_object_id]')
                ->assertVisible('label[for=seller_object_id]')
                ->assertVisible('label[for=state]');
      });
    }

    /**
     * @test Edit an object form.
     *
     * @return void
     */
    public function edit_object_form()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/transactions/2/edit')
                ->assertSee('Éditer une transaction')
                ->assertVisible('label[for=buyer_id]')
                ->assertVisible('label[for=seller_id]')
                ->assertVisible('label[for=buyer_object_id]')
                ->assertVisible('label[for=seller_object_id]')
                ->assertVisible('label[for=state]');
      });
    }

    /**
     * @test Delete validation.
     *
     * @return void
     */
    public function show_delete_message()
    {
      $this->browse(function (Browser $browser) {
        $browser->visit('/transactions/2/delete')
                ->assertVisible('.alert-danger');
      });
    }
}
