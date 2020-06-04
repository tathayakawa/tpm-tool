<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleUserTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function ユーザーを作成しそのユーザーでログイン()
    {
        $email = $this->faker->email;
        $password = $this->faker->password;

        User::create([
            'name' => $this->faker->name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $success = Auth::attempt([
            'email' => $email,
            'password' => $password,
        ]);

        $this->assertTrue($success);
    }
}
