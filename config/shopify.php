<?php

return [

    'key' =>'',
    'secret' => '',
    'redirectURL' => 'https://storname.studygyan.com/oauth/authorize',
    /*
     * scopes and endpoints from Shopify
    */
    'scopes' => [
            'read_content', 'write_content', 'read_themes', 'write_themes',
            'read_products', 'write_products', 'read_customers', 'write_customers',
            'read_orders', 'write_orders', 'read_draft_orders', 'write_draft_orders',
            'read_script_tags', 'write_script_tags', 'read_fulfillments', 'write_fulfillments',
            'read_shipping', 'write_shipping', 'read_analytics', 'read_users', 'write_users',
            'read_checkouts', 'write_checkouts', 'read_reports', 'write_reports'
        ],

    /*

     * The following is an example of endpoints defined.

     * You can also add your own endpoints, following

     * the example

     *

     */

    'endpoints' => [

        'products' => ['images', 'variants', 'metafields'],



        'themes' => ['assets'],



        'smartCollections' => [],



        'customCollections' => [],



        'collects' => [],



        'collectionListings' => [],



        'scriptTags' => [],



        'pages' => ['metafields'],



        'orders' => [

            'financial_status', 'transactions', 'fulfillments', 'risks', 'tier3' => ['fulfillments' => 'events']

        ],



        'blogs' => [ 'articles' ],



        'articles' => [],



        'metafields' => [],

        

        'webhooks' => [],



        'checkouts' => [],

		'carrier_services'=>[],



    ],



    'tierTwoWithoutId' => [ 'themesAssets'],



];

