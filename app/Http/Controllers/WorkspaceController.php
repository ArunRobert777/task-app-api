<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkspaceCreateRequest;
use App\Models\Workspace;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    public function create(WorkspaceCreateRequest $request): JsonResponse
    {
        Workspace::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'isPrivate' => $request->isPrivate,
        ]);

        return response()->json([
            'message' => 'Workspace Created',
        ], 200);
    }
}
