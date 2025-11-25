@extends('layouts.mainLayout')
@section('title', 'Dashboard')
@section('content')
    {{-- bagian card start --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
        <div class="bg-neutral-primary-soft max-w-sm p-6 border border-default rounded-base shadow-xs h-full flex flex-col justify-between">
            <div>
                <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Books</h5>
                <p class="text-body mb-6">We provide a lot category books so you can enjoy reading and finish it.</p>
                <h3 class="mb-3 text-xl font-semibold tracking-tight text-heading leading-8">{{$bookCount}} Books</h3>
            </div>
            <a href="#" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-fit">
                See more books
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
            </a>
        </div>
        <div class="bg-neutral-primary-soft max-w-sm p-6 border border-default rounded-base shadow-xs h-full flex flex-col justify-between">
            <div>
                <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Categories</h5>
                <p class="text-body mb-6">Here are the biggest technology acquisitions of 2025 so far, in reverse chronological order.</p>
                <h3 class="mb-3 text-xl font-semibold tracking-tight text-heading leading-8">{{$categoriesCount}} Categories</h3>
            </div>
            <a href="#" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-fit">
                see more categories
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
            </a>
        </div>
        <div class="bg-neutral-primary-soft max-w-sm p-6 border border-default rounded-base shadow-xs h-full flex flex-col justify-between">
            <div>
                <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Users</h5>
                <p class="text-body mb-6">Here are the biggest technology acquisitions of 2025 so far, in reverse chronological order.</p>
                <h3 class="mb-3 text-xl font-semibold tracking-tight text-heading leading-8">{{$userCount}} Users</h3>
            </div>
            <a href="#" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none w-fit">
                see more users
                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
            </a>
        </div>
    </div>
    {{-- bagaian card ends --}}

    {{-- bagian table start --}}
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Rent Log</h1>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-5">
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
                        Book Title
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
                    <th scope="col" class="px-6 py-3 font-medium">
                        status
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        Apple MacBook Pro 17"
                    </th>
                    <td class="px-6 py-4">
                        Silver
                    </td>
                    <td class="px-6 py-4">
                        Laptop
                    </td>
                    <td class="px-6 py-4">
                        $2999
                    </td>
                    <td class="px-6 py-4">
                        231
                    </td>
                    <td class="px-6 py-4">
                        231/11/2025
                    </td>
                    <td class="px-6 py-4">
                        23/11/2025
                    </td>
                </tr>
                <tr class="bg-neutral-primary border-b border-default">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        Microsoft Surface Pro
                    </th>
                    <td class="px-6 py-4">
                        White
                    </td>
                    <td class="px-6 py-4">
                        Laptop PC
                    </td>
                    <td class="px-6 py-4">
                        $1999
                    </td>
                    <td class="px-6 py-4">
                        423
                    </td>
                     <td class="px-6 py-4">
                        231/11/2025
                    </td>
                    <td class="px-6 py-4">
                        23/11/2025
                    </td>
                </tr>
                <tr class="bg-neutral-primary">
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        Magic Mouse 2
                    </th>
                    <td class="px-6 py-4">
                        Black
                    </td>
                    <td class="px-6 py-4">
                        Accessories
                    </td>
                    <td class="px-6 py-4">
                        $99
                    </td>
                    <td class="px-6 py-4">
                        121
                    </td>
                     <td class="px-6 py-4">
                        231/11/2025
                    </td>
                    <td class="px-6 py-4">
                        23/11/2025
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    {{-- bagian table ends --}}
@endsection