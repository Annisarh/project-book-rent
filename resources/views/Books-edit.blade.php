@extends('layouts.mainLayout')
@section('title', 'Books')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- bagian form start --}}
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Book-edit</h1>
     <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-5">    
        <form class="w-3/4 space-y-4 p-8" action="{{route('books.update', $book->slug)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label for="book_code" class="block mb-2.5 text-sm font-medium text-heading">Book Code</label>
                <input type="text" id="book_code" name="book_code" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body @error('book_code') is-invalid @enderror" placeholder="inputkan book code" value="{{ old('book_code', $book->book_code) }}" required />
                @error('book_code')
                    <div class="text-left text-red-400 w-full">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="title" class="block mb-2.5 text-sm font-medium text-heading">Book Title</label>
                <input type="text" id="title" name="title" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body @error('title') is-invalid @enderror" placeholder="inputkan book code" value="{{ old('title', $book->title) }}" required />
                @error('title')
                    <div class="text-left text-red-400 w-full">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="countries" class="block mb-2.5 text-sm font-medium text-heading">Book Category</label>
                <select id="book_categories" name="categories[]" class="select-multiple block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body" multiple="multiple">
                   @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}"
                            {{ $book->categories->contains($category->id) ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="book_cover" class="block mb-2.5 text-sm font-medium text-heading">Book cover</label>
                <div class="max-w-[150px] mb-3">
                      @if ($book->cover !='')
                        <img src="{{asset('storage/cover/'. $book->cover)}}" alt="">
                      @else
                        <img src="{{asset('images/books/book_not_found.jpg')}}" alt="">
                      @endif
                </div>
                <input type="hidden" value="{{$book->cover}}" name="cover_old">
                <input type="file" id="book_cover" name="cover" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body @error('cover') is-invalid @enderror" placeholder="inputkan book cover"/>
                @error('cover')
                    <div class="text-left text-red-400 w-full">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none mt-3">Update</button>
            
        </form>
    </div>
    {{-- bagian form ends --}}

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select-multiple').select2();
    });
</script>
@endsection