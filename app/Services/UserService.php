<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function deleteUser($user)
    {
        DB::transaction(function () use ($user) {
            foreach ($user->posts as $post) {
                if ($post->categories) {
                    $post->categories()->detach();
                }
                if ($post->image_path) {
                    Storage::delete($post->image_path);
                }

                $post->delete();
            }
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $user->delete();
        }, 5);
        return true;
    }
}
