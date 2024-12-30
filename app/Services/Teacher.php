<?php

namespace App\Services;

class Teacher
{
    public function __construct(
        public string $name,
        public string $phone,
    )
    {
    }

    public function test()
    {
        return 'Bu test uchun edi';
    }
}
