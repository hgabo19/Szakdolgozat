<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\BlogService;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('blog.index');
    }

    public function adminList()
    {
        $posts = Post::paginate(10);
        return view('blog.admin-list', compact('posts'));
    }

    function adminDelete(Post $post, BlogService $blogService)
    {
        $this->authorize('delete', $post);
        $postToDelete = Post::findOrFail($post->id);
        $isSuccessful = $blogService->delete($postToDelete);
        if ($isSuccessful) {
            session()->flash('success', 'Post deleted successfully!');
            return redirect()->route('blog.admin-list');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('blog.show', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId, BlogService $blogService)
    {
        $postToDelete = Post::findOrFail($postId);
        $this->authorize('delete', $postToDelete);
        $isSuccessful = $blogService->delete($postToDelete);
        if ($isSuccessful) {
            session()->flash('success', 'Post deleted successfully!');
            return redirect()->route('blog.index');
        }
    }
}
