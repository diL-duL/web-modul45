<x-default-layout title="Add Major" section_title="Add new major">
    <form action="{{ route('majors.store') }}" method="POST" class="flex flex-col gap-4 px-6 py-4 bg-white border border-zinc-300 shadow max-w-2xl">
        @csrf
        <div class="flex flex-col gap-2">
            <label>Major Code</label>
            <input type="text" name="code" class="px-3 py-2 border border-zinc-300 bg-slate-50" value="{{ old('code') }}">
            @error('code') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label>Major Name</label>
            <input type="text" name="name" class="px-3 py-2 border border-zinc-300 bg-slate-50" value="{{ old('name') }}">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex flex-col gap-2">
            <label>Description</label>
            <textarea name="description" class="px-3 py-2 border border-zinc-300 bg-slate-50">{{ old('description') }}</textarea>
            @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="self-end flex gap-2 mt-4">
            <a href="{{ route('majors.index') }}" class="border border-slate-500 px-3 py-2">Cancel</a>
            <button type="submit" class="bg-blue-50 border border-blue-400 text-blue-400 px-3 py-2 flex items-center gap-2">
                <i class="ph ph-floppy-disk"></i> Save
            </button>
        </div>
    </form>
</x-default-layout>