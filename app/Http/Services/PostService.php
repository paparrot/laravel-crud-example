<?php

declare(strict_types=1);

namespace App\Http\Services;

use App\Http\DTO\PostCreateDTO;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

final class PostService
{
    public function __construct()
    {
    }

    public function getAll(): Collection
    {
        return Post::all();
    }

    public function create(PostCreateDTO $dto): Post
    {
        return Post::query()->create([
            'title' => $dto->title,
            'body' => $dto->body,
            'slug' => Str::slug($dto->title),
//            TODO)))
            'author_id' => 1
        ]);
    }

    public function getById(int $id): Post
    {
        return Post::query()->findOrFail($id);
    }
}
