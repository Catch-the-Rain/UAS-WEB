<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    public function boot()
    {
        $this->registerPolicies();

        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }

        if (! app()->runningInConsole()) {
            $roles = Role::with('permissions')->get();

            $permissionArray = []; // Inisialisasi variabel

            foreach ($roles as $role) {
                foreach ($role->permissions as $permission) {
                    if (!empty($permission->title)) { // Cek jika title tidak kosong
                        $permissionArray[$permission->title][] = $role->id;
                    }
                }
            }

            foreach ($permissionArray as $title => $roles) {
                Gate::define($title, function (User $user) use ($roles) {
                    // Mengembalikan boolean yang sesuai
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }
    }
}
