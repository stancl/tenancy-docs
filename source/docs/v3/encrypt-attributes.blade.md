---
title: Encrypt Attributes
extends: _layouts.documentation
section: content
---

# Encrypt Tenant Attributes {#encrypt}

We can encrypt the tenant attributes if needed. In the example below, We will encrypt the database username and password.

# Encrypt Tenant Username And Password {#encrypt-username-password}

When resolving the tenant's database configuration, this package uses the values in the `data` column stored as `tenancy_db_username` and `tenancy_db_password` to create the values used in the DB config as `username` and `password`, 
respectively. So the Tenancy package looks in the [Virtual Column](https://github.com/archtechx/virtualcolumn) for `tenancy_db_username` and `tenancy_db_password`.

The package provides a place in the migrations for your own custom columns and a method to tell the model that it should look for the data in an actual database column instead of the virtual column.

This means, we can do this:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary();

            // Your custom columns
            $table->string('tenancy_db_username', 512);
            $table->string('tenancy_db_password', 512);
            
            $table->timestamps();
            $table->json('data')->nullable();
        });
    }
}
```

To create the columns in the database. Then let the model know about them And combine this with [Laravel encrypted casts](https://laravel.com/docs/9.x/eloquent-mutators#encrypted-casting) 
(or, better yet, a custom cast) to encrypt and decrypt these when needed:

```php
<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;
    
    /**
     * The attributes that sould be cast.
     *
     * @var string[]
     */
    protected $casts = [
        'tenancy_db_username' => 'encrypted',
        'tenancy_db_password' => 'encrypted',
    ];
    
    /**
     * Define custom columns for this model (that shouldn't be accessed via 'data' property).
     *
     * @return array
     */
    public static function getCustomColumns(): array
    {
        return [
            'id',
            'tenancy_db_username',
            'tenancy_db_password',
        ];
    }
}
```