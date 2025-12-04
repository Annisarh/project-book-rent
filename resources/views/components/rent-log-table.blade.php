<div>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-4">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Book
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Rent Date
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Return Date
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Actual Return Date
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rentLogs as $item)
                    <tr class="border-b border-default {{$item->actual_return_date == null ? '' : ($item->actual_return_date < $item->return_date ? 'bg-green-400 text-white' : 'bg-red-400 text-white' )}}">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$item->user->username}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->book->title}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->rent_date}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->return_date}}
                        </td>
                        <td class="px-6 py-4">
                            {{$item->actual_return_date}}
                        </td>
                    </tr>
                @empty
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap text-center" colspan="6">
                            Data Kosong
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
