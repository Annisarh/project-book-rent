@extends('layouts.mainLayout')
@section('title', 'Book return')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- bagian table start --}}
    <h1 class="font-bold my-5 text-3xl text-slate-800">#Book-return</h1>
    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-5">
         @if (session('message'))
            <div class="text-white bg-red-400 p-6">
                {{ session('message') }}
            </div>
        @endif
        @if (session('success'))
        <div class="text-white bg-green-400 p-6">
            {{ session('success') }}
        </div>
    @endif
         <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mb-5">    
            <form class="w-3/4 space-y-4 p-8" action="" method="POST">
                @csrf
                <div>
                    <label for="user" class="block mb-2.5 text-sm font-medium text-heading">Name User</label>
                    <select id="user" name="user_id" class="select-multiple block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body select" required>
                        <option value="">-- pilih usernya --</option>
                        @foreach ($user as $item)
                            <option value="{{$item->id}}">{{$item->username}}</option>
                        @endforeach
                    </select>
                    @error('user')
                        <div class="text-left text-red-400 w-full">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="book_id" class="block mb-2.5 text-sm font-medium text-heading">Name Book</label>
                    <select id="book" name="book_id" class="select-multiple block w-full px-3 py-2.5 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand shadow-xs placeholder:text-body select" required>
                        <option value="">-- pilih bukunya --</option>
                    </select>
                    @error('user')
                        <div class="text-left text-red-400 w-full">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium rounded-base text-sm px-4 py-2.5 focus:outline-none mt-3">Submit</button>
                </div>
            </form>
         </div>
    </div>
    {{-- bagian table ends --}}

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.select').select2();
    });
</script>
<script>
    $('#user').on('change', function () {
        let userId = $(this).val();

        $('#book').html('<option value="">Loading...</option>');

        $.ajax({
            url: '/book-return/' + userId,
            type: 'GET',
            success: function (data) {
                $('#book').empty();
                $('#book').append('<option value="">-- Pilih book --</option>');
                let all = true; // asumsi semua sudah dikembalikan
                data.forEach(function (book) {
                    if(book.actual_return_date == null){
                        all = false
                        $('#book').append(
                            `<option value="${book.book_id}">${book.book.title}</option>`
                        );
                    }
                });
                if(all){
                     $('#book').append('<option value="">semua buku telah dikembalikan</option>');
                }
            }
        });
    });
</script>
@endsection
