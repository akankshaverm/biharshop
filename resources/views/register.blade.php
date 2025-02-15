@extends('layout')
@section('content')

<div class=" flex flex-1 justify-center items-center h-screen">


    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="{{route('auth.register')}}" method="post">
            @csrf
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Register to our platform</h5>
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g John Aliya" required />
                @error('name')
                <p class=" text-red-400 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Contact</label>
                <input type="number" name="contact" id="contact" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="e.g 9876543210" required />
                @error('contact')
                <p class=" text-red-400 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required />
                @error('email')
                <p class=" text-red-400 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                @error('passowrd')
                <p class=" text-red-400 text-xs font-semibold">{{$message}}</p>
                @enderror
            </div>

            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create an Account</button>
            <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                Already an account? <a href="{{route('login')}}" class="text-blue-700 hover:underline dark:text-blue-500">Login Here</a>
            </div>
        </form>
    </div>

</div>

@endsection