@extends('master')

@section('content')
  <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
          <div class="sm:mx-auto sm:w-full sm:max-w-sm">
              <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Click on the button to log in</h2>
          </div>
          <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
              <a href="{{ route('login.index') }}" class="flex justify-center w-full rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Go to Login Page</a>
          </div>
  </div>
@endsection