<?php
return array(
    'base_url'          => 'http://example.com',        // Address from where this is shop is accessible.
    'backend_url'       => 'http://localhost:2009',     // Address used for API calls.
    'frontend_url'      => 'http://checkout.localhost', // Address used to redirect users to the gateway page.
    'invoice_secret'    => 'SECRET',                    // This secret is required to create new invoices.
    'mysql' => array(                                   // MySQL connection (required to store orders)
        'host'          => 'localhost',
        'port'          => 3306,
        'username'      => 'libreshop',
        'password'      => 'PASSWORD',
        'database'      => 'libreshop'
    )
);
