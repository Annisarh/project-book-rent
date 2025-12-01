@extends('layouts.mainLayout')
@section('title', 'Users')
@section('content')
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Users</h1>
    {{-- <div class="w-full relative h-[50px]">
        <button type="button" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none mb-6 absolute right-1 z-10"><a href="#">View Banned User</a></button>
        <button type="button" class="text-white bg-green-500 box-border border border-transparent hover:bg-green-700 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none mb-6 absolute right-36 z-10"><a href="#">New Register User</a></button>
    </div> --}}
    @if (session('success'))
        <div class="text-white bg-green-400 p-6">
            {{ session('success') }}
        </div>
    @endif
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-4">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <h1 class="text-xl font-bold px-5 pt-2 mb-3">Data User Active</h1>
            <hr class="font-bold text-slate-600 h-1 mb-3">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($userActive as $item)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$item->username}}
                        </th>
                        <td class="px-6 py-4">
                            @if ($item->phone==null)
                                -
                            @else
                            {{$item->phone}}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-blue-600 text-white rounded">{{$item->status}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('users.detail', $item->id)}}" class="bg-green-500 px-2 py-1 rounded text-white">Detail</a> |
                            <a href="#" class="bg-red-500 px-2 py-1 rounded text-white">Banned</a>
                        </td>
                    </tr>
                @empty
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap text-center" colspan="5">
                            Data Kosong
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- anactive users --}}
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-4">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <h1 class="text-xl font-bold px-5 pt-2 mb-3">Data User Inactive</h1>
            <hr class="font-bold text-slate-600 h-1 mb-3">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Username
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($userInactive as $item)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$item->username}}
                        </th>
                        <td class="px-6 py-4">
                            @if ($item->phone==null)
                                -
                            @else
                            {{$item->phone}}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-2 py-1 bg-red-400 text-white rounded">{{$item->status}}</span>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{route('users.detail', $item->id)}}" class="bg-green-500 px-2 py-1 rounded text-white">Detail</a> 
                        </td>
                    </tr>
                @empty
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap text-center" colspan="5">
                            Data Kosong
                        </th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection