@extends('layouts.mainLayout')
@section('title', 'Books')
@section('content')
    {{-- bagian table start --}}
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Books Deleted List</h1>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-5">
        <a href="{{route('books')}}" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none absolute right-4 top-4">
            Back->
        </a>
         @if (session('success'))
            <div class="text-white bg-green-400 p-6">
                {{ session('success') }}
            </div>
        @endif
        <table class="w-full text-sm text-left rtl:text-right text-body mt-16">
            <thead class="text-sm text-body bg-neutral-secondary-soft border-b rounded-base border-default border">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Book code
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Book title
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booksDeleted as $item)
                <tr class="bg-neutral-primary border-b border-default">
                    <td class="px-6 py-4">
                        {{$loop->iteration}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{$item->book_code}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                        {{$item->title}}
                    </th>
                    <td class="px-6 py-4">
                        <a href="books-restore/{{$item->slug}}">Restore</a> |
                        <a href="books-delete/{{$item->slug}}" onclick="return confirm('yakin ingin mendelete {{$item->name}}?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- bagian table ends --}}
@endsection