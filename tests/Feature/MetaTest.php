<?php

namespace PaulhenriL\LaravelHasMeta\Tests\Feature;

use PaulhenriL\LaravelHasMeta\Tests\Fakes\Patient;
use PaulhenriL\LaravelHasMeta\Tests\Fakes\User;
use PaulhenriL\LaravelHasMeta\Tests\TestCase;

class MetaTest extends TestCase
{
    public function test_meta_can_be_set_and_get()
    {
        $user = new User();
        $user->setMeta('preferences.billing.send_invoices', true);
        $user->save();

        $this->assertTrue(
            $user->fresh()->getMeta('preferences.billing.send_invoices')
        );
    }

    public function test_meta_set_with_do_notation_results_in_an_array()
    {
        $user = new User();
        $user->setMeta('preferences.billing.send_invoices', true);
        $user->save();

        $this->assertEquals([
            'preferences' => [
                'billing' => [
                    'send_invoices' => true
                ]
            ]
        ], $user->fresh()->meta);
    }

    public function test_meta_can_be_set_and_get_with_encryption()
    {
        $user = new User();
        $user->setEncryptedMeta('preferences.billing.send_invoices', true);
        $user->save();

        $this->assertTrue(
            $user->fresh()->getEncryptedMeta('preferences.billing.send_invoices')
        );

        $this->assertNotTrue(
            $user->fresh()->meta['preferences']['billing']['send_invoices']
        );
    }

    public function test_custom_column_can_be_used()
    {
        $patient = new Patient();
        $patient->setMeta('hello', 'world');
        $patient->save();

        $this->assertEquals(['hello' => 'world'], $patient->fresh()->data);
    }
}
