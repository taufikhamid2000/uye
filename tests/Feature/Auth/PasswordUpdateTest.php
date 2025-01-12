<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that a user can successfully update their password.
     */
    public function test_password_can_be_updated()
    {
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword'), // Correctly hash the password
        ]);

        $response = $this->actingAs($user)->patch('/profile', [
            'current_password' => 'oldpassword', // Use the correct current password
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertRedirect('/profile');
        $response->assertSessionHas('status', 'Profile updated successfully.');

        $user->refresh();
        $this->assertTrue(Hash::check('newpassword', $user->password)); // Check if the password is updated
    }

    /**
     * Test that the correct current password must be provided to update the password.
     */
    public function test_correct_password_must_be_provided_to_update_password()
    {
        $user = User::factory()->create([
            'password' => Hash::make('oldpassword'), // Correctly hash the password
        ]);

        $response = $this->actingAs($user)->patch('/profile', [
            'current_password' => 'wrongpassword', // Use an incorrect current password
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertSessionHasErrors(['current_password']); // Expect an error on current_password
        $response->assertRedirect('/profile');

        $user->refresh();
        $this->assertFalse(Hash::check('newpassword', $user->password)); // Ensure the password is unchanged
    }
}
