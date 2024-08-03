<?php

declare(strict_types=1);

namespace App\Http\DTO;

final class PostCreateDTO
{
    public function __construct(
        public string $title,
        public string $body = '',
    )
    {
    }
}
