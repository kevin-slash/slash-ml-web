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
        '_title' => 'Teng Lay Group | Cambodia',
        '_full_title' => 'The first leading Import Export and Transportation Company in Cambodia | Teng Lay Group',
        '_desc' => 'Teng Lay Group is the first leading Import Export and Transportation Company in Cambodia. Throughout many years, we have built international network of freight forwarding agents which able us to provide local and international transportation, Customs Clearance and Brokerage, Air Freight or Sea Freight, Logistics and Warehousing Management, Small and Heavy project Cargo services to most geographical areas of the world.',

        '_keywords' => 'company, logistic, Freight, Ocean, Broker, warehousing, distribution, quote, request quote, order, customer, transportation, transport, goods, product, logistic cambodia, import, export, trucking, international freight, customs clearance, brokerage, inland transportation, warehouse, supply chain mgt, container modification',
        '_author' => 'Flexitech Cambodia Team',
        '_developers' => 'Flexitech Cambodia Web Team, API Team, Design Team',
        '_developer' => 'Flexitech Cambodia Web Team',
        '_contact' => 'info@flexitech.io',
        '_img' => '/img/facebook-share-v1.jpg',
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