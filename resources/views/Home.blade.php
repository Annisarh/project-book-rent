@extends('layouts.mainLayout')
@section('title', 'Dashboard')
@section('content')
    <h1 class="font-bold text-3xl text-slate-800 mb-3">#Daftar Buku</h1>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-2">
        @foreach ($books as $book)  
            <div class="bg-neutral-primary-soft block max-w-[300px] p-6 border border-default rounded-base shadow-xs">
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
                <p class="mb-6 text-body">In today’s fast-paced digital landscape, fostering seamless collaboration among Developers and IT Operations.</p>
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