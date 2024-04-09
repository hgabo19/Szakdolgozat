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

                if (count($tags) > 0) {
                    foreach ($tags as $tagName) {
                        $tag = Category::firstOrCreate(['name' => $tagName]);
                        $post->categories()->attach($tag->id);
                    }
                }
            } catch (Exception $e) {
                throw new Exception($e . 'Failed to create!');
            }
        });
        return true;
    }

    public function updateBlogPost($validated, $tags, $post)
    {
        DB::transaction(function () use ($validated, $tags, $post) {
            try {
                $post = Post::find($post->id);

                if ($validated['postImage'] != null) {
                    try {
                        $filePath = $validated['postImage']->store('images/posts', 'public');
                        if ($post->image_path) {
                            Storage::delete($post->image_path);
                        }
                        $post->image_path = $filePath;
                    } catch (Exception $e) {
                        throw new Exception($e);
                    }
                }
                $post->body = $validated['body'];
                $post->updated_at = now()->timezone('Europe/Budapest');
                $post->save();

                if (count($tags) > 0) {
                    $post->categories()->detach();
                    foreach ($tags as $tagName) {
                        $tag = Category::firstOrCreate(['name' => $tagName]);
                        $post->categories()->attach($tag->id);
                    }
                }
            } catch (Exception $e) {
                throw new Exception($e . 'Failed to create!');
            }
        });
        return true;
    }

    public function normalizeString($tagStr)
    {
        $tagStr = trim($tagStr);

        // replace whitespace characters or dots directly after a # character
        $tagStr = preg_replace('/#\s*[.\s]+/', '#', $tagStr);
        // /: The regex pattern is enclosed within forward slashes
        // [\s.]: This is a character class [...] that matches any whitespace character \s or a literal dot .
        $tagStr = preg_replace('/[\s.]+/', ',', $tagStr);
        return $tagStr;
    }

    public function hasChanged($validated, $post, $tagString)
    {
        if (
            $validated['body'] != $post->body ||
            $validated['tagString'] != $tagString ||
            $validated['postImage'] instanceof TemporaryUploadedFile
        )
            return true;
        else return false;
    }
}
