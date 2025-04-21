Installation
============

Composer
--------

.. code-block:: bash

    $ composer require Tamunoemi/laraplans

Service Provider
----------------

Add ``Tamunoemi\Laraplans\LaraplansServiceProvider::class`` to your application service providers file: ``config/app.php``.

.. code-block:: php

    'providers' => [
        /**
         * Third Party Service Providers...
         */
        Tamunoemi\Laraplans\LaraplansServiceProvider::class,
    ]

Config File and Migrations
--------------------------

Publish package config file and migrations with the following command:

.. code-block:: bash

    php artisan vendor:publish --provider="Tamunoemi\Laraplans\LaraplansServiceProvider"

Then run migrations:

.. code-block:: bash

    php artisan migrate

Traits and Contracts
--------------------

Add ``Tamunoemi\Laraplans\Traits\PlanSubscriber`` trait and ``Tamunoemi\Laraplans\Contracts\PlanSubscriberInterface`` contract to your ``User`` model.

See the following example:

.. code-block:: php

    namespace App\Models;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Tamunoemi\Laraplans\Contracts\PlanSubscriberInterface;
    use Tamunoemi\Laraplans\Traits\PlanSubscriber;

    class User extends Authenticatable implements PlanSubscriberInterface
    {
        use PlanSubscriber;
