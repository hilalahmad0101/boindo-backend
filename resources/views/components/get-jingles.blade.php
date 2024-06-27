<div class="mt-8 overflow-x-scroll xl:overflow-hidden">
    <table class="table-auto w-[1000px] xl:w-full rounded-md" id="dataTable">
        <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
            <tr class="rounded-md">
                <th class="px-6 py-3 text-left text-white border-b border-r border-t rounded-tl-md border-[#FFFFFF33]">
                    Name</th>
                <th class="px-6 py-3 text-left text-white border-b border-[#FFFFFF33]">Date</th>
                <th class="px-6 py-3 text-left text-white border-b border-[#FFFFFF33]">Viewed</th>
                <th class="px-6 py-3 text-left text-white border-b border-[#FFFFFF33]">Edit</th>
                <th class="px-6 py-3 text-left text-white border-b border-[#FFFFFF33]">Sus</th>
                <th class="px-6 py-3 text-left text-white border-b border-[#FFFFFF33]">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-[#383838]">
            @foreach ($jingles as $jingle)
                <tr class="jingle-row">
                    <td class="border border-[#FFFFFF33] text-white px-6 py-4 space-x-3">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $jingle->image) }}"
                                class="w-[100px] h-[100px] object-fill" alt="">
                            <span>{{ $jingle->title }}</span>
                        </div>
                    </td>
                    <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                        {{ date('Y M d', strtotime($jingle->created_at)) }}</td>
                    <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">{{ $jingle->views }}</td>
                    <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                        <a href="{{ route('admin.jingle.edit', ['id' => $jingle->id]) }}">
                            <img src="{{ asset('images/edit.svg') }}" alt="">
                        </a>
                    </td>
                    <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                        @if ($jingle->status == 0)
                            <a href="{{ route('admin.jingle.suspend', ['id' => $jingle->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="white" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 7.5V18M15 7.5V18M3 16.811V8.69c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811Z" />
                                </svg>
                            </a>
                        @else
                            <a href="{{ route('admin.jingle.suspend', ['id' => $jingle->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20"
                                    viewBox="0 0 14 20" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M2 0H4C5.10457 0 6 0.89543 6 2V18C6 19.1046 5.10457 20 4 20H2C0.89543 20 0 19.1046 0 18V2C0 0.89543 0.89543 0 2 0ZM10 0H12C13.1046 0 14 0.89543 14 2V18C14 19.1046 13.1046 20 12 20H10C8.89543 20 8 19.1046 8 18V2C8 0.89543 8.89543 0 10 0ZM2 2V18H4V2H2ZM10 2V18H12V2H10Z"
                                        fill="white" />
                                </svg>
                            </a>
                        @endif
                    </td>
                    <td class="border-b border-[#FFFFFF33] px-6 py-4">
                        <a href="{{ route('admin.jingle.delete', $jingle->id) }}">
                            <img src="{{ asset('images/trash.svg') }}" alt="">
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-[45px] mb-[50px]" id="pagination">
{{ $jingles->links() }}
</div>