---
title: Tenant attribute encryption
extends: _layouts.documentation
section: content
---

# Tenant attribute encryption {#encrypt}

To encrypt the attributes, you must store them in [custom columns](https://tenancyforlaravel.com/docs/v3/tenants/#custom-columns). For example, we'll encrypt the tenant's database credentials (which are stored using the [Virtual Column](https://github.com/archtechx/virtualcolumn) as `tenancy_db_username` and `tenancy_db_password` by default) in a few steps.

Add custom columns to the tenants migration (we recommend making the string size at least 512 characters, so it's big enough to contain the encrypted data):

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

Define the custom columns in the Tenant model:

```php
public static function getCustomColumns(): array
{
    return [
        'id',
        'tenancy_db_username',
        'tenancy_db_password',
    ];
}
```

Then cast the attributes (using [Laravel's encrypted casts](https://laravel.com/docs/9.x/eloquent-mutators#encrypted-casting), or your custom casts) to encrypt and decrypt the attributes when needed:

```php
protected $casts = [
    'tenancy_db_username' => 'encrypted',
    'tenancy_db_password' => 'encrypted',
];
```
