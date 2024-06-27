<div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
    <table class="table-auto w-[1000px] xl:w-full rounded-md " id="dataTable">
        <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
            <tr class="rounded-md">
                <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">User Email</th>
                <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Song</th>
                <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Star</th>
                <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Message</th>
                <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Date</th>
                <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-[#383838]">
            @foreach ($reviews as $review)
                <tr>
                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $review->user->email }}</td>
                    @if ($review->content)
                        <td class="border border-[#FFFFFF33] text-white  px-6 py-4">
                            {{ $review->contents->title }}
                        </td>
                    @endif
                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $review->star }}</td>
                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $review->content }}</td>
                    <td class="border-b border-[#FFFFFF33] text-white px-6 py-4">
                        {{ date('Y M d', strtotime($review->created_at)) }}</td>
                    <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                        <a href="{{ route('admin.review.delete', ['id' => $review->id]) }}">
                            <img src="{{ asset('images/trash.svg') }}" alt="">
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-[45px] mb-[50px]">
    {{ $reviews->links() }} 
</div>