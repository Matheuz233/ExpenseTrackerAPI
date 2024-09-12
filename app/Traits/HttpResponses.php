<?php

namespace App\Traits;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\MessageBag;

trait HttpResponses
{
  public function response(string $message, string|int $status, array|Model|JsonResource $data = [])
  {
    return response()->json([
      'message' => $message,
      'stratus' => $status,
      'data' => $data
    ], $status);
  }

  public function error(string $message, string|int $status, array|MessageBag $error = [], array $data = [])
  {
    return response()->json([
      'message' => $message,
      'status' => $status,
      'error' => $error,
      'data' => $data
    ], $status);
  }
}