<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
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

    function adminDelete(Post $post)
    {
        $this->authorize('delete', $post);
        $postToDelete = Post::findOrFail($post->id);
        $this->postDelete($postToDelete);
        session()->flash('success', 'Post deleted successfully!');
        return redirect()->route('blog.admin-list');
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
    public function destroy($postId)
    {
        $postToDelete = Post::findOrFail($postId);
        $this->authorize('delete', $postToDelete);
        $this->postDelete($postToDelete);
        session()->flash('success', 'Post deleted successfully!');
        return redirect()->route('blog.index');
    }

    public function postDelete($post)
    {
        if ($post->image_path) {
            Storage::delete($post->image_path);
        }
        if ($post->categories()) {
            $post->categories()->detach();
        }
        $post->delete();
    }
}
