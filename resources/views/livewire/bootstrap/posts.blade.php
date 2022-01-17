<div>
    <form wire:submit.prevent="storePost">
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

            <div class="col-md-6">
                <input wire:model="title"
                       type="text"
                       class="form-control @error('title') is-invalid @enderror"
                       autofocus>

                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Add Post
                </button>
            </div>
        </div>
    </form>

    <hr />

    <h3>Latest 5 Posts</h3>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th class="w-25"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td><button class="btn btn-sm btn-danger" wire:click="deleteConfirm({{ $post->id }})">Delete</button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
