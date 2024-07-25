<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\IndexRequest;
use App\Http\Requests\Api\Profile\StoreRequest;
use App\Http\Requests\Api\Profile\UpdateRequest;
use App\Http\Resources\Profile\ProfileResource;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    public function index(IndexRequest $request)
    {
        $data = $request->validated();

        $profiles = Profile::filter($data)->get();

        return ProfileResource::collection($profiles)->resolve();
    }
    public function show(Profile $profile)
    {
        return ProfileResource::make($profile)->resolve();
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $profile = Profile::create($data);
        return ProfileResource::make($profile)->resolve();
    }
    public function update(UpdateRequest $request, Profile $profile)
    {
        $data = $request->validated();
        $profile->update($data);
        return ProfileResource::make($profile)->resolve();
    }
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
