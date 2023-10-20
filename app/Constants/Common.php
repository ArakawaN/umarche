<?php

namespace App\Constants;

class Common
{
    const PRODUCT_ADD = '1';
    const PRODUCT_REDUCE = '2';

    const PRODUCT_LIST = [
        'add' => self::PRODUCT_ADD, //constを選択するとき、selfを使う
        'reduce' => self::PRODUCT_REDUCE
    ];
}
