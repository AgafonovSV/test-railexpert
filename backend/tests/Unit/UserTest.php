<?php

namespace Tests\Unit;
use Tests\TestCase;


class UserTest extends TestCase
{
    /**
     * Has user description test.
     */
    public function test_has_user_description(): void
    {
        $this->assertDatabaseMissing('users', [
            'description' => '',
        ]);
    }
}
