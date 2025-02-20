<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Filters extends BaseConfig
{
    public $globals = [
        'before' => [
            'csrf' => ['except' => ['create-order']], // ✅ Correct placement
        ],
        'after' => [],
    ];
}
