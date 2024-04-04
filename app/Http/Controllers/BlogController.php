<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        // dd($postId);
        $postToDelete = Post::findOrFail($postId);
        $this->authorize('delete', $postToDelete);
        if ($postToDelete->image_path) {
            Storage::delete($postToDelete->image_path);
        }
        if ($postToDelete->categories()) {
            $postToDelete->categories()->detach();
        }
        $postToDelete->delete();
        session()->flash('success', 'Post deleted successfully!');
        return redirect()->route('blog.index');
    }
}
