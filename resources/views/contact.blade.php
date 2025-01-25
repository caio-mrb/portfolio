@extends('layout.app')

@section('title', 'Contact')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="text-neutral-800 dark:text-slate-400">
        <h1 class="text-3xl font-bold mb-4">Contact</h1>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-xl font-bold mb-2">Contact Information</h2>
                <p class="mb-4">Feel free to contact me between 8am-6pm (8:00-18:00) via phone call. For other hours, please use the form or email.</p>
                
                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Phone</h3>
                    <p>+351 963 852 691</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold">Email</h3>
                    <p>caiomaxwel@hotmail.com</p>
                </div>
            </div>

            <div>
                <h2 class="text-xl font-bold mb-4">Send me a Message</h2>
                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                    @csrf
                    {{ csrf_field() }}
                    
                    <div>
                        <label for="name" class="block mb-2">Name</label>
                        <input type="text" id="name" name="name" 
                               class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror"
                               value="{{ old('name') }}" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block mb-2">Email</label>
                        <input type="email" id="email" name="email" 
                               class="w-full px-3 py-2 border rounded @error('email') border-red-500 @enderror"
                               value="{{ old('email') }}" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="phone" class="block mb-2">Phone (Optional)</label>
                        <input type="tel" id="phone" name="phone" 
                               class="w-full px-3 py-2 border rounded @error('phone') border-red-500 @enderror"
                               value="{{ old('phone') }}">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="message" class="block mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" 
                                  class="w-full px-3 py-2 border rounded @error('message') border-red-500 @enderror"
                                  required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection