<?php

namespace COG\Config;

class Configuration
{
    public static function setting():array
    {
        // better approach is defining it in ENV
        return [
            'root' => __DIR__ . '/../'
        ];
    }
}
