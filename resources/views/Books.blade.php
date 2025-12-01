@extends('layouts.mainLayout')
@section('title', 'Books')
@section('content')
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Books</h1>
    <div class="w-full relative h-[50px]">
        <button type="button" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none mb-6 absolute right-1 z-10"><a href="books-add">Tambah Data</a></button>
        <button type="button" class="text-white bg-green-500 box-border border border-transparent hover:bg-green-700 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none mb-6 absolute right-36 z-10"><a href="{{route('books.deleted')}}">Restore Data</a></button>
    </div>
    @if (session('success'))
        <div class="text-white bg-green-400 p-6">
            {{ session('success') }}
        </div>
    @endif
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-4">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Books Code
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Book Title
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Book Category
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Book Status
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $item)
                    <tr class="bg-neutral-primary border-b border-default">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$loop->iteration}}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{$item->book_code}}
                        </th>
                        <td class="px-6 py-4">
                            {{$item->title}}
                        </td>
                        <td class="px-6 py-4">
                            @foreach ($item->categories as $category)
                                <span>{{$category->name}} |</span>
                            @endforeach
                        </td>
                        <td class="px-6 py-4">
                            {{$item->status}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="books-edit/{{$item->slug}}" class="bg-yellow-400 px-2 py-1 rounded text-white">Edit</a> |
                            <a href="{{route('books.delete', $item->slug)}}" class="bg-red-400 px-2 py-1 rounded text-white" onclick="return confirm('yakin ingin delete data ini?')">Delete</a>
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