<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class BlogService
{
    public function createBlogPost($validated, $tags)
    {
        DB::transaction(function () use ($validated, $tags) {
            try {
                $post = new Post();

                if ($validated['image'] != null) {
                    $filePath = $validated['image']->store('images/posts', 'public');
                    $post->image_path = $filePath;
                }
                $post->user_id = Auth::id();
                $post->body = $validated['body'];
                $post->created_at = now()->timezone('Europe/Budapest');
                $post->save();

                foreach ($tags as $tagName) {
                    $tag = Category::firstOrCreate(['name' => $tagName]);
                    $post->categories()->attach($tag->id);
                }
            } catch (Exception $e) {
                throw new Exception($e . 'Failed to create!');
            }
        });
        return true;
    }
}
