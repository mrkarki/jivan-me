<?php


namespace App\AppHelper\Support;


/**
 * Class ProductType
 * @package App\AppHelper\Support
 */
final class ProductType
{
    /**
     * Product Type Hot
     */
    const Product_TYPE_HOT = 1;

    /**
     * Product Type Feature
     */
    const Product_TYPE_FEATURE = 2;

    /**
     * Product Type New
     */
    const Product_TYPE_NEW = 3;

    /**
     * @var $current
     */
    public static $current = [
        self::Product_TYPE_HOT           => 'hot',
        self::Product_TYPE_FEATURE       => 'feature',
        self::Product_TYPE_NEW           => 'new',
    ];

}
