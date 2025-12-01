<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Page</title>
    @vite('resources/css/app.css')
  </head>
  <body>
    <div class="min-h-screen flex justify-center items-center box-border">
        <div class="min-w-md border rounded">
            <form action="{{route('auth.register.store')}}" method="POST" class="p-4 space-y-2" enctype="multipart/form-data">
                @csrf
                @if (session('success'))
                     <div class="text-green-300">
                        {{ session('success') }}
                      </div>
                @endif
                <h1 class="text-center text-2xl font-bold">Register</h1>
                <div class="flex flex-col justify-between items-center gap-2">
                    <label for="username" class="w-full">Username</label>
                    <input type="text" id="username" name="username" class="border bg-gray-100 px-2 py-1 w-full @error('username') is-invalid @enderror" required autocomplete="off" value="{{old('username')}}">
                    @error('username')
                        <div class="text-left text-red-400 w-full">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col justify-between items-center gap-2">
                    <label for="password" class="w-full">Password</label>
                    <input type="password" id="password" name="password" class="border bg-gray-100 px-2 py-1 w-full @error('password') is-invalid @enderror" required autocomplete="off">
                    @error('password')
                        <div class="text-left text-red-400 w-full">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col justify-between items-center gap-2">
                    <label for="phone" class="w-full">Phone Number</label>
                    <input type="text" id="phone" name="phone" class="border bg-gray-100 px-2 py-1 w-full @error('phone') is-invalid @enderror" autocomplete="off" value="{{old('phone')}}">
                    @error('phone')
                        <div class="text-left text-red-400 w-full">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col justify-between items-center gap-2">
                    <label for="address" class="w-full">Address</label>
                    <textarea type="text" id="address" name="address" class="border bg-gray-100 px-2 py-1 w-full @error('address') is-invalid @enderror" required autocomplete="off">{{old('address')}}</textarea>
                    @error('address')
                        <div class="text-left text-red-400 w-full">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex flex-col justify-between items-center gap-2">
                    <label for="address" class="w-full">User Identity (KTP)</label>
                   <input type="file" id="ktp" name="ktp" class="border bg-gray-100 px-2 py-1 w-full @error('ktp') is-invalid @enderror">
                   @error('ktp')
                       <div class="text-left text-red-400 w-full">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="bg-blue-800 text-white w-full px-8 py-2 mt-4 cursor-pointer">Register</button>
                <span>sudah punya akun? <a href="{{route('login')}}" class="text-blue-500 underline">Sign in</a></span>
            </form>
        </div>
    </div>
  </body>
</html>