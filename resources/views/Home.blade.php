@extends('layouts.mainLayout')
@section('title', 'Dashboard')
@section('content')
    <h1 class="font-bold text-3xl text-slate-800 mb-3">#Daftar Buku</h1>
    <div class="flex items-center md:order-2 mb-4">
        <form class="relative flex flex-col md:flex-row gap-4 w-full" method="GET">
            <div class="relative w-full">
                <select id="categories" name="category" class="block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:choose a category">
                    <option>choose the category</option>
                    @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="relative w-full">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/></svg>
                </div>
                <input type="text" name="title" id="input-group-1" class="block w-full ps-9 pe-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand px-2.5 shadow-xs placeholder:text-body" placeholder="Search books title">
            </div>
            <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">Search</button>
        </form>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-2 w-full">
        @foreach ($books as $book)  
            <div class="bg-neutral-primary-soft block max-w-[300px] p-6 border border-default rounded-base shadow-xs w-full mx-auto">
                <a href="#">
                    @if ($book->cover == null)
                        <img class="rounded-base h-25" src="{{asset('images/books/book_not_found.jpg')}}" alt="" draggable="false" />
                    @else
                        <img class="rounded-base h-25" src="{{asset('storage/cover/'. $book->cover)}}" alt="" draggable="false" />
                    @endif
                </a>
                <a href="#">
                    <h5 class="mt-3 mb-2 text-2xl font-semibold tracking-tight text-heading">{{$book->title}}</h5>
                </a>
                <div class="mb-6 text-body">
                    @foreach ($book->categories as $category)
                        <span>| {{$category->name}}</span> 
                    @endforeach
                </div>
                <div class="flex justify-between items-center">
                    <a href="#" class="inline-flex items-center bg-blue-500 text-white box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        Pinjam
                        <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                    </a>
                    <span class="bg-green-400 text-white rounded px-2">{{$book->status}}</span>
                </div>
            </div>
        @endforeach
    </div>
@endsection