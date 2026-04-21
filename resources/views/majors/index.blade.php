<x-default-layout title="Majors" section_title="Majors List">
    @if (session('success'))
        <div class="bg-green-50 border-green-500 text-green-500 px-3 py-2 mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex mb-4">
        <a href="{{ route('majors.create') }}" class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus"></i>
            <div>Add Major</div>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead>
                <tr class="border-b border-zinc-200 text-sm">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Code</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($majors as $major)
                    <tr class="border-b border-zinc-200 hover:bg-zinc-50">
                        <td class="py-3 px-6">{{ $loop->iteration }}</td>
                        <td class="py-3 px-6">{{ $major->code }}</td>
                        <td class="py-3 px-6">{{ $major->name }}</td>
                        <td class="py-3 px-6 flex justify-center gap-1">
                            <a href="{{ route('majors.show', $major->id) }}" class="bg-blue-50 border border-blue-500 p-2"><i class="ph ph-eye text-blue-500"></i></a>
                            <a href="{{ route('majors.edit', $major->id) }}" class="bg-yellow-50 border border-yellow-500 p-2"><i class="ph ph-note-pencil text-yellow-500"></i></a>
                            <form action="{{ route('majors.destroy', $major->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button class="bg-red-50 border border-red-500 p-2"><i class="ph ph-trash text-red-500"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-4">No majors found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-default-layout>