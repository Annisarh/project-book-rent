@extends('layouts.mainLayout')
@section('title', 'Category')
@section('content')
    {{-- bagian form start --}}
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Category-edi</h1>
     <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-5">    
        <form class="w-3/4 space-y-4 p-8 flex items-center gap-6" action="{{route('category.update', $data->slug)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex-1">
                <label for="visitors" class="block mb-2.5 text-sm font-medium text-heading">Name Category</label>
                <input type="text" id="visitors" name="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-2.5 py-2 shadow-xs placeholder:text-body @error('name') is-invalid @enderror" placeholder="inputkan name category" value="{{$data->name}}" required />
                @error('name')
                    <div class="text-left text-red-400 w-full">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none mt-3">Submit</button>
            </div>
        </form>
    </div>
    {{-- bagian form ends --}}
@endsection