<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SEO Meta Defaults
    |--------------------------------------------------------------------------
    |
    | some default value for seo of meta tag for website
    |
    */

    'defaults' => [
        '_title' => 'Abstraction Layer',
        '_full_title' => 'Abstraction Layer',
        '_desc' => 'Abstraction Layer is learning and doing on AI.',

        '_keywords' => 'company, logistic, Freight, Ocean, Broker, warehousing, distribution, quote, request quote, order, customer, transportation, transport, goods, product, logistic cambodia, import, export, trucking, international freight, customs clearance, brokerage, inland transportation, warehouse, supply chain mgt, container modification',
        '_author' => 'Slash Cambodia Team',
        '_developers' => 'Slash Cambodia Web Team, API Team, Design Team',
        '_developer' => 'Slash Cambodia Web Team',
        '_contact' => 'info@flexitech.io',
        '_img' => '/img/cambodia_ai.jpg?v1',
    ],

    /*
    |--------------------------------------------------------------------------
    | SEO Meta - Social
    |--------------------------------------------------------------------------
    |
    | value for social meta tag like twiter, facebook or google ...
    |
    */
    'socials'   =>  [
        // https://dev.twitter.com/cards/getting-started
        '_twitter_card' => 'summary_large_image', //   The card type, which will be one of “summary”, “summary_large_image”, “app”, or “player”.
        '_twitter_site' => 'TenglayGroup', // twitter name
        '_twitter_creator' => 'TenglayGroup', // twitter creator

        // facebook option
        // https://developers.facebook.com/docs/reference/opengraph#object-type
        '_og_type'  => 'restaurant.restaurant',
        '_fb_app_id_dev'  => '', // hungry-hungry fb_id for development
        '_fb_app_id_prod'  => '', // hungry-hungry fb_id for production

        // window option
        '_window_color' =>  '#FFF',
    ],




    /*
    |--------------------------------------------------------------------------
    | Analytics
    |--------------------------------------------------------------------------
    |
    | Analytics option to tract the website
    |
    */
   
    'analytics'   =>  [
        'google_analytic_id'   =>   'UT-834783',
    ],

];