<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class UserResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'can' => [
				'createUser' => Auth::user()->can('create', User::class),
				'editUser' => Auth::user()->can('update', [Auth::user(), User::class])
			],
			'links' => [
				'path' => url('/profiles/'.$this->id),
			],
			$this->mergeWhen(Auth::user()->is($this->resource), ['email' => $this->email])
		];
	}
}
