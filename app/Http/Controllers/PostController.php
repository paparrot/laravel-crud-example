<?php

namespace App\Http\Controllers;

use App\Http\DTO\PostCreateDTO;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Resources\PostListResource;
use App\Http\Resources\PostViewResource;
use App\Http\Services\PostService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class PostController extends Controller
{
    private readonly PostService $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(PostListResource::collection($this->service->getAll()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $post = $this->service->create(
            dto: new PostCreateDTO(
                title: $request->post('title'),
                body: $request->post('body')
            )
        );

        return response()->json(PostViewResource::make($post));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = $this->service->getById($id);

        return response()->json(PostViewResource::make($post));
    }
}
