<x-default-layout title="Major Detail" section_title="Major detail">
    <div class="flex flex-col gap-4 px-6 py-4 bg-white border border-l-4 border-zinc-300 shadow max-w-2xl">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="font-bold">Code</p>
                <p class="px-3 py-2 border border-zinc-300">{{ $major->code }}</p>
            </div>
            <div>
                <p class="font-bold">Name</p>
                <p class="px-3 py-2 border border-zinc-300">{{ $major->name }}</p>
            </div>
        </div>
        <div>
            <p class="font-bold">Description</p>
            <p class="px-3 py-2 border border-zinc-300">{{ $major->description }}</p>
        </div>
        <div class="flex gap-2 mt-4">
            <a href="{{ route('majors.index') }}" class="border border-slate-500 px-3 py-2">Back</a>
            <a href="{{ route('majors.edit', $major->id) }}" class="bg-yellow-500 text-white px-3 py-2">Edit</a>
            <form method="POST" action="{{ route('majors.insights', $major->id) }}">
                    @csrf
                    <button type="submit"
                        class="bg-indigo-500 border border-indigo-500 text-white px-3 py-2 flex items-center gap-2 cursor-pointer">
                        <i class="ph ph-magic-wand"></i>
                        <span>Major Insights</span>
                    </button>
        </div>
    </div>
</x-default-layout>