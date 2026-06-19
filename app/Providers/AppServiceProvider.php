<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;
use App\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
     }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Prevent errors during initial migration or when table is missing
        if (!app()->runningInConsole() || Schema::hasTable('permissions')) {
            try {
                if (Schema::hasTable('permissions')) {
                    // Super-admin bypasses all gates
                    Gate::before(function ($user, $ability) {
                        if ($user->hasRole('super-admin')) {
                            return true;
                        }
                    });

                    // Load permissions with roles to prevent N+1 query
                    $permissions = Permission::with('roles')->get();

                    foreach ($permissions as $permission) {
                        Gate::define($permission->name, function ($user) use ($permission) {
                            return $user->hasPermission($permission->name);
                        });
                    }
                }
            } catch (\Exception $e) {
                // Fail-safe if database connection is not established yet
            }
        }
    }
}
