<div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
    <table class="table-auto w-[1000px] xl:w-full rounded-md ">
        <thead class="bg-[#FFFFFF33] rounded-tl-lg rounded-tr-lg">
            <tr class="rounded-md">
                <th
                    class="px-6 py-3 text-left  text-white border-b border-r border-t rounded-tl-md border-[#FFFFFF33]">
                    Name</th>
                <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">Email</th>
                <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">Password</th>
                <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">Reset Password</th>
                <th class="px-6 py-3 text-left  text-white border border-[#FFFFFF33]">Date</th>
                <th class="px-6 py-3 text-left  text-white border-b border-[#FFFFFF33]">Edit</th>
                <th class="px-6 py-3 text-left   text-white border-b border-[#FFFFFF33]">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-[#383838]">
            @foreach ($admins as $admin)
                <tr>
                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $admin->name }}</td>
                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">{{ $admin->email }}</td>
                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">*********</td>
                    <td class="border border-[#FFFFFF33] text-white  px-6 py-4">
                        <a href="{{ route('admin.admin.reset.password', ['id' => $admin->id]) }}"
                            class="Frame2 w-28 h-9 px-4 py-2 bg-[#FFFFFF26] rounded-3xl justify-start items-start gap-2 inline-flex">
                            <div
                                class="Reset w-20 text-center text-white text-base font-semibold  leading-tight">
                                Reset
                            </div>
                        </a>
                    </td>
                    <td class="border border-[#FFFFFF33] text-white px-6 py-4">
                        {{ date('Y M d', strtotime($admin->created_at)) }}</td>
                    <td class=" border-b border-[#FFFFFF33] text-white px-6 py-4">
                        <a href="{{ route('admin.admin.edit', ['id' => $admin->id]) }}">
                            <img src="../images/edit.svg" alt="">
                        </a>
                    </td>
                    <td class="border-b border-[#FFFFFF33] px-6 py-4">
                        <a href="{{ route('admin.admin.delete', $admin->id) }}">
                            <img src="../images/trash.svg" alt="">
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-[45px] mb-[50px]">
    {{ $admins->links() }}
</div>