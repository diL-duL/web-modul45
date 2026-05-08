<x-default-layout title="Major Insights" section_title="Academic Auditor AI">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-1">
            <h3 class="text-lg font-bold mb-4 flex items-center gap-2 text-zinc-800">
                <i class="ph ph-chart-bar block"></i> Raw Statistics
            </h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-zinc-200">
                    <thead>
                        <tr class="bg-zinc-50 border-b border-zinc-200 text-xs uppercase text-zinc-600">
                            <th class="py-3 px-4 text-left">Major</th>
                            <th class="py-3 px-4 text-center">Status</th>
                            <th class="py-3 px-4 text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody class="text-zinc-700 text-sm font-light">
                        @foreach($stats as $s)
                            <tr class="border-b border-zinc-100 hover:bg-zinc-50">
                                <td class="py-3 px-4">{{ $s->major->name }}</td>
                                <td class="py-3 px-4 text-center">
                                    <span
                                        class="px-2 py-0.5 rounded-full text-[10px] font-bold uppercase
                                        {{ $s->status == 'Active' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $s->status }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-center font-bold">{{ $s->total }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="lg:col-span-2">
            <div class="bg-indigo-50 border border-indigo-200 shadow-sm">
                <div class="bg-indigo-600 px-6 py-3 flex justify-between items-center">
                    <div class="flex items-center gap-2 text-white font-semibold tracking-wide text-sm uppercase">
                        <i class="ph ph-magic-wand text-lg"></i> AI Academic Insight
                    </div>
                </div>
                <div class="p-8">
                    <article class="prose max-w-none
                        prose-headings:text-indigo-900 prose-headings:font-bold
                        prose-h3:text-xl prose-h3:mt-6 prose-h3:border-b prose-h3:border-indigo-200
                        prose-p:text-zinc-700 prose-p:leading-relaxed
                        prose-strong:text-indigo-700
                        prose-ul:list-disc prose-ul:ml-5">
                        {!! Str::markdown($insight) !!}
                    </article>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>

