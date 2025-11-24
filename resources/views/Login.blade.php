<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    @vite('resources/css/app.css')
  </head>
  <body>
    <div class="min-h-screen flex justify-center items-center box-border">
        <div class="min-w-md border rounded">
            <form action="{{route('auth.process')}}" method="POST" class="p-8 space-y-4">
                @csrf
                <h1 class="text-center text-2xl mb-8 font-bold">Login</h1>
                <div class="flex justify-between items-center gap-6">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="border bg-gray-100 px-2 py-1 w-full" required autocomplete="off">
                </div>
                <div class="flex justify-between items-center gap-7">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="border bg-gray-100 px-2 py-1 w-full" required autocomplete="off">
                </div>
                <button type="submit" class="bg-blue-800 text-white w-full px-8 py-2 mt-4">Login</button>
                <span>Belum ada akun? <a href="{{route('auth.register')}}" class="text-blue-500 underline">Sign up</a></span>
                @if (session('error'))
                     <div class="text-red-400">
                        {{ session('error') }}
                      </div>
                @endif
            </form>
        </div>
    </div>
  </body>
</html>