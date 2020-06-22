---
title: Upgrading from 2.x
extends: _layouts.documentation
section: content
---

# Upgrading from 2.x

> This hasn't been tested yet and might not be 100% right. It *should* work well, but note the todo at the bottom of the script for updating the `domains` table.

Note that most of the package's code is different now, which means that you will have to update all of the places where you interact with the package's classes.

That said, automatic tenancy will still work the same way.

- Move all `_tenancy_` prefixed keys in tenant storage to `tenancy_` prefixed keys

    Run this **with 2.x code** (but put application down first, this will break your app and require that you update to 3.x immediately after). Of course make a backup of the DB first.

    (Note: You may want to make this part of a migration)

    ```php
    use Stancl\Tenancy\Tenant;
    use Illuminate\Support\Str; 

    tenancy()
        ->all()
        ->each(function (Tenant $tenant) {
            $keys = array_keys($tenant->data);
            $keys = array_filter($keys, function ($key) {
                return Str::startsWith($key, '_tenancy_');
            });

            foreach ($keys as $key) {
                $value = $tenant->data[$key];
                unset($tenant->data[$key]);
                $tenant->data[str_replace('_tenancy_', 'tenancy_', $key)] = $value;
            }

            $tenant->save();
        });

    ```

- Create migration file with `php artisan make:migration upgrade_tenancy_package`

    ```php
    <?php

    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class UpgradeTenancyPackage extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('domains', function (Blueprint $table) {
                $table->dropPrimary();
            });

            Schema::table('domains', function (Blueprint $table) {
                $table->increments('id')->first();
                $table->unique('domain');
                $table->timestamps();
            });

            Schema::table('tenants', function (Blueprint $table) {
                $table->json('data')->nullable()->change();
                $table->timestamps();
            });

            DB::table('domains')->update([
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('domains', function (Blueprint $table) {
                $table->dropColumn('id');
                $table->dropUnique(['domain']);
                $table->dropTimestamps();
                $table->primary('domain');
            });

            Schema::table('tenants', function (Blueprint $table) {
                $table->json('data')->nullable(false)->change();
                $table->dropTimestamps();
            });
        }
    }

    ```

- Replace your Http Kernel with a stock version (copy it from laravel/laravel: [https://github.com/laravel/laravel/blob/master/app/Http/Kernel.php](https://github.com/laravel/laravel/blob/master/app/Http/Kernel.php)) and add back in any changes you made. The package now doesn't necessitate any Kernel changes, so remove all of the 2.x ones.
- Delete config, publish it & the new files using `php artisan tenancy:install`. Register the new provider (see instructions on the [Installation]({{ $page->link('installation') }}) page)
- Create Tenant model, as instructed on the [Tenants]({{ $page->link('tenants') }}) page
- Update routes to use the correct middleware, see the [Routes]({{ $page->link('routes') }}) page
