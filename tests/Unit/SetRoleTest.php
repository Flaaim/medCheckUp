<?php

namespace Tests\Unit;

use Tests\TestCase;

use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SetRoleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_what_user_role_is_setting()
    {
        
        $user = User::factory()->create();
        $role = Role::factory()->create();
        $user->setRole($user->id, $role->id);

        $this->assertDatabaseHas('role_user', ['role_id'=>$role->id, 'user_id' => $user->id]);
    }

}
