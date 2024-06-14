@extends('layouts.new_app')
@section('title')
    List Admin
@endsection
@section('content')
    <!-- MAIN AREA -->
    <div class="mt-[134px]">
        <h1 class="text-neutral-50 text-4xl font-black ">ADMIN LIST</h1>
        <div>
            <div class="mt-[58px]">
                <div class="md:flex items-center justify-between block">
                    <p class="text-neutral-50 text-2xl font-black flex space-x-3">
                        <span>Admin</span>
                        <span
                            class="px-3 py-1.5 bg-neutral-700 rounded-3xl justify-center items-center gap-2 inline-flex  text-white text-sm font-semibold leading-tight">{{ count($admins) }}</span>
                    </p>
                    <div class="flex items-center mt-3 md:mt-0">
                        <div class="flex items-center px-4 py-2 bg-[#383838] rounded-md">
                            <img src="{{ asset('images/search.png') }}" alt="">
                            <input type="text" placeholder="Search" id="searchInput" 
                                class="placeholder:text-white placeholder:font-bold text-white  ml-2 w-full bg-transparent outline-none border-none">
                        </div>
                        <a href="{{ route('admin.admin.create') }}"
                            class=" hover:bg-white/95  ml-[29px] px-4 py-2 bg-white rounded-lg justify-start items-center gap-2 inline-flex text-black text-base font-bold   leading-normal">
                            <img src="{{ asset('images/plus.svg') }}" alt="">
                            <span>Add</span>
                        </a>
                    </div>
                </div>
            </div>


            <div class="mt-8  overflow-x-scroll xl:overflow-hidden ">
                <table class="table-auto w-[1000px] xl:w-full rounded-md " id="dataTable">
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
                                    <a href="{{ route('admin.admin.reset.password', ['id'=>$admin->id]) }}"
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
                                  <a href="{{ route('admin.admin.edit', ['id'=>$admin->id]) }}">
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
        </div>
    </div>
@endsection

@section('script')
    <script>
         document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('dataTable');
            const tbody = table.getElementsByTagName('tbody')[0];
            const rows = tbody.getElementsByTagName('tr');

            searchInput.addEventListener('keyup', function() {
                const filter = searchInput.value.toLowerCase();
                for (let i = 0; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    let rowContainsFilter = false;

                    for (let j = 0; j < cells.length; j++) {
                        if (cells[j]) {
                            const cellText = cells[j].textContent || cells[j].innerText;
                            if (cellText.toLowerCase().indexOf(filter) > -1) {
                                rowContainsFilter = true;
                                break;
                            }
                        }
                    }

                    if (rowContainsFilter) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>
@endsection