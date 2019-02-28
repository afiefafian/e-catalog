<?php

namespace Tests\Feature\Auth;

use Auth;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    //dapat melihat halaman login ketika tidak auth
    public function test_userAdminCanViewLoginForm_whenNotAuthenticated()
    {
        $response = $this->get('/admin/login');
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    //redirect home ketika sudah auth mengakse hal login
    public function test_userAdminCannotViewLoginForm_whenAuthenticated_redirectHome()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/admin/login');
        $response->assertRedirect('/home/');
    }

    //redirect home ketika menuju url yang wajib auth
    public function test_userAdminCannotEnterSystem_whenNotAuthenticated_redirectLogin()
    {
        $response = $this->get('/admin/home/');
        $response->assertRedirect('/admin/login');
        $this->assertGuest();
    }
    
    //cek login dan redirect ke home
    public function test_userAdminLogin()
    {
        $user = factory(User::class)->create([
            'id' => random_int(1, 100),
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        
        $response = $this->post('/admin/login', [
            'email' => $user->email,
            'password' => $password
        ]);

        $response->assertRedirect('/admin/home');
        $this->assertAuthenticatedAs($user);
    }

    //cek ketika user / password salah
    public function test_userAdminLogin_whenPasswordNotTrue_redirectLogin()
    {
        $user = factory(User::class)->make([
            'password' => bcrypt('i-love-laravel'),
        ]);
        
        $response = $this->from('/admin/login')->post('/login', [
            'email' => $user->email,
            'password' => 'invalid-password',
        ]);
        
        
        $response->assertRedirect('/admin/login');
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    //check remember me
    public function test_rememberMeFunctionality()
    {
        $user = factory(User::class)->create([
            'id' => random_int(1, 100),
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        
        $response = $this->post('/admin/login', [
            'email' => $user->email,
            'password' => $password,
            'remember' => 'on',
        ]);
        
        $response->assertRedirect('/admin/home');
        // cookie assertion goes here
        $this->assertAuthenticatedAs($user);
        $response->assertCookie(Auth::guard()->getRecallerName(), vsprintf('%s|%s|%s', [
            $user->id,
            $user->getRememberToken(),
            $user->password,
        ]));

    }
}
