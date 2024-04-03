<?php

namespace App\Livewire;

use App\Services\BlogService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class BlogPostForm extends Component
{
    use WithFileUploads;

    public $body;
    public $image;
    public $tagString;
    public $tags = [];

    public function rules()
    {
        return [
            'body' => 'required|string|max:200|min:5',
            'image' => 'nullable|image|max:2048',
            'tagString' => 'nullable|string|max:120',
            'tags.*' => 'string|max:20'
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
        return view('livewire.blog-post-form');
    }

    public function save(BlogService $blogService)
    {
        if (Auth::check()) {
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
                    } else if (substr_count($tag, '#') > 1) {
                        $tagIndex = $tagIndex + 1;
                        $this->dispatch(
                            'alert',
                            type: 'error',
                            title: "Tag $tagIndex has more tags, please put a space or a comma (,) between them!",
                            position: 'center',
                            timer: 3000,
                        );
                    }
                }
            }
            $isSucessful = $blogService->createBlogPost($validated, $this->tags);
            if ($isSucessful) {
                $this->dispatch(
                    'alert',
                    type: 'success',
                    title: "Post created!",
                    position: 'center',
                    timer: 2000,
                    redirectUrl: route('blog.index'),
                );
            }
        }
    }
}
