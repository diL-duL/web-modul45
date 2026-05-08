<x-default-layout title="Career Analysis" section_title="Student Career AI">
    <div class="mb-6 flex items-center gap-4">
        <a href="{{ route('students.show', $student->id) }}"
           class="p-2 bg-zinc-100 border border-zinc-300 hover:bg-zinc-200 transition">
            <i class="ph ph-arrow-left block text-zinc-600"></i>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-zinc-800 leading-tight tracking-tight">
                Analysis for {{ $student->name }}
            </h2>
            <p class="text-zinc-500 text-sm">Prodi: {{ $student->major->name }} • NIM:
                {{ $student->student_id_number }}
            </p>
        </div>
    </div>

    <div class="bg-blue-50 border border-blue-200 shadow-sm overflow-hidden">
        <div class="bg-blue-500 px-6 py-3 flex items-center gap-2">
            <i class="ph ph-sparkle text-white text-lg"></i>
            <span class="text-white font-semibold uppercase tracking-wider text-sm">AI Career Recommendations</span>
        </div>

        <div class="p-8">
            <article class="prose max-w-none
                prose-headings:text-blue-900 prose-headings:font-bold prose-headings:mb-4
                prose-h3:text-xl prose-h3:mt-8 prose-h3:border-b prose-h3:border-blue-200
                prose-p:text-zinc-700 prose-p:leading-relaxed prose-p:mb-4
                prose-li:text-zinc-700 prose-li:mb-1
                prose-strong:text-blue-700">
                {!! Str::markdown($analysis) !!}
            </article>
        </div>
    </div>

    <div class="mt-8 p-4 bg-zinc-50 border border-zinc-200 text-zinc-500 text-xs italic">
        *Disclaimer: Analisis ini dihasilkan secara otomatis oleh kecerdasan buatan sebagai saran akademik dan karir.
    </div>
</x-default-layout>

