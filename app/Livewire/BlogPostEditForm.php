<?php

namespace App\Livewire;

use App\Models\Post;
use App\Services\BlogService;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class BlogPostEditForm extends Component
{
    use WithFileUploads;

    public $post;

    public $body;
    public $image;
    public $tagString;
    public $tags = [];


    public function mount()
    {
        $this->body = $this->post->body;
        // dd($this->post->categories);
        $this->tags = $this->post->categories;
        foreach ($this->tags as $tagIndex => $tag) {
            if ($tagIndex + 1 == count($this->tags)) {
                $this->tagString .= $tag->name;
            } else {
                $this->tagString .= $tag->name . ", ";
            }
        }
    }

    public function rules()
    {
        return [
            'body' => 'required|string|max:200|min:5',
            'image' => 'nullable|image|max:2048',
            'tagString' => 'nullable|string|max:120',
        ];
    }

    public function messages()
    {
        return [
            'body.required' => 'Please give a description to your post!',
            'content.min' => 'The :attribute is too short.',
        ];
    }

    public function render()
    {
        return view('livewire.blog-post-edit-form');
    }

    public function save(BlogService $blogService)
    {
        $post = Post::find($this->post->id);
        $this->authorize('edit', $post);

        $validated = $this->validate();
        if ($validated['tagString'] != null) {
            $validTagString = $blogService->normalizeString($validated['tagString']);
            $this->tags = explode(',', $validTagString);
            foreach ($this->tags as $tagIndex => $tag) {
                $this->tags[$tagIndex] = preg_replace('/[^a-zA-Z#]+/', '', $tag);
            }
            $this->tags = array_filter($this->tags);
            $this->tags = array_values($this->tags);

            foreach ($this->tags as $tagIndex => $tag) {
                if (strpos($tag, '#') !== 0) {
                    $this->dispatch(
                        'alert',
                        type: 'error',
                        title: "Tag named $tag is missing the # character",
                        position: 'center',
                        timer: 2500,
                    );
                    return;
                } else if (substr_count($tag, '#') > 1) {
                    $tagIndex = $tagIndex + 1;
                    $this->dispatch(
                        'alert',
                        type: 'error',
                        title: "Tag $tagIndex has more tags, please put a space or a comma (,) between them!",
                        position: 'center',
                        timer: 3000,
                    );
                    return;
                }
            }
        }
        if ($blogService->hasChanged($validated, $post, $this->tagString)) {
            $isSucessful = $blogService->updateBlogPost($validated, $this->tags, $post);
            if ($isSucessful) {
                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: "Post updated!",
                    position: 'center',
                    timer: 2000,
                    redirectUrl: route('blog.index'),
                );
            }
        } else {
            $this->dispatch(
                'alert',
                type: 'error',
                title: "Please change something to update!",
                position: 'center',
                timer: 2500,
            );
        }
    }
}
