@extends('layouts.mainLayout')
@section('title', 'User detail')
@section('content')
    <h1 class="font-bold my-5 text-3xl text-slate-800">#detail user</h1>
    <div class="flex gap-4">
        <div class="relative bg-neutral-primary-soft max-w-md w-full p-6 border border-default rounded-base shadow-xs">
            <div class="flex flex-col items-center">
                <img class="w-24 h-24 mb-6 rounded-full" src="{{asset('images/books/noprofile.jpg')}}" alt="profile user"/>
                <h5 class="mb-0.5 text-xl font-semibold tracking-tight text-heading">{{$user->username}}</h5>
                <span class="text-sm text-body">{{$user->phone}}</span>
                <span class="text-sm text-body">{{$user->address}}</span>
                <div class="flex mt-4 md:mt-6 gap-4">
                    <form action="{{route('users.update', $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @if ($user->status == 'inactive')
                        <button type="submit" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none cursor-pointer" onclick="return confirm('yakin approve ini user?')">
                            <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12h4m-2 2v-4M4 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/></svg>
                            Approve
                        </button>
                        @endif
                    </form>
                    <form action="{{route('users.delete', $user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                         <button type="submit" class="inline-flex self-start w-auto text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none cursor-pointer" onclick="return confirm('yakin ingin di banned?')">
                            Banned
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="relative bg-neutral-primary-soft max-w-md w-full p-6 border border-default rounded-base shadow-xs">
            @if ($user->ktp==null)
                <div class="flex justify-center items-center text-lg font-bold h-full">No Input ID Card</div>
            @else
                <img src="{{asset('storage/ktp/'. $user->ktp)}}" alt="">
            @endif
        </div>
    </div>
    <button type="button" class="text-white bg-green-500 box-border border border-transparent hover:bg-green-700 focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none mb-6 absolute z-10 mt-4"><a href="{{route('users')}}">Back</a></button>

@endsection