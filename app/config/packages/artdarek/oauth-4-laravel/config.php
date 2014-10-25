<?php

return array(
    /*
      |--------------------------------------------------------------------------
      | oAuth Config
      |--------------------------------------------------------------------------
     */

    /**
     * Storage
     */
    'storage' => 'Session',
    /**
     * Consumers
     */
    'consumers' => array(
        /**
         * Facebook
         */
        'Stripe' => array(
            'client_id' => getenv('stripe.client.id'),
            'client_secret' => getenv('stripe.secret.key'),
        ),
    )
);
