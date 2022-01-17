<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{
    public $title;

    protected $rules = [
        'title' => 'required|max:100'
    ];

    protected $listeners = ['delete'];

    public $designTemplate = 'tailwind';

    public function render()
    {
        $posts = Post::latest('id')->take(5)->get();

        return view('livewire.'.$this->designTemplate.'.posts', compact('posts'));
    }

    public function storePost()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
        ]);

        $this->dispatchBrowserEvent('swal:modal', [
            'type' => 'success',
            'title' => 'Record added successfully',
            'text' => '',
        ]);

        $this->dispatchBrowserEvent('toastr:info', [
            'message' => 'Record added successfully',
        ]);

        $this->title = '';
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
    }
}
