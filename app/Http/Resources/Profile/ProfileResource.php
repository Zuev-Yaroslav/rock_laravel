<?php

namespace App\Http\Resources\Profile;

use App\Http\Resources\Permission\PermissionResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => [
                'email' => $this->user->email
            ],
            'gender' => $this->gender,
            'roles' => $this->roles,
            'permissions' => PermissionResource::collection($this->user->permissions),
            'birthed_at' => $this->birthed_at,
            'avatar_path' => $this->avatar_path,
            'is_active' => $this->is_active,
            'first_name' => $this->first_name,
            'second_name' => $this->second_name,
            'third_name' => $this->third_name,
            'login' => $this->login,
        ];
    }
}
