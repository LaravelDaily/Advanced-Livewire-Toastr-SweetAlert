<div>
    <form wire:submit.prevent="storePost" class="border-b-2 pb-10">
        <div>
            <label class="block font-medium text-sm text-gray-700" for="title">
                Title
            </label>
            <input wire:model="title" type="text"
                   class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400" />
        </div>

        <div class="flex items-center mt-4">
            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Add Post
            </button>

        </div>
    </form>

    <h3 class="font-bold text-xl mt-10 mb-5">Latest 5 Posts</h3>

    <table class="min-w-full">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Name</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider w-1/4"></th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($posts as $post)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $post->title }}</td>
            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                <button type="button" wire:click="deleteConfirm({{ $post->id }})" class="inline-flex items-center px-2 py-1 bg-red-500 border border-transparent rounded-md font-medium text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
