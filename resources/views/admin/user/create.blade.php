<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New User
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-user.index')}}" class="fullwidth-btn">Back User Dashboard</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route('dashboard-user.store')}}" method="post" class="p-6 bg-white border-b border-gray-200" enctype="multipart/form-data"> @csrf
                    <div class="mb-6">
                        <label class="mseproperty-label" for="name">Name <span class="required-text">*</span></label>
                        <input class="mseproperty-input" type="text" id="name" name="name" value="{{old('name')}}" required>

                        @error('name')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="mseproperty-label" for="email">Email <span class="required-text">*</span></label>
                        <input class="mseproperty-input" type="text" id="email" name="email" value="{{old('email')}}" required>

                        @error('email')
                        <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="password">Password <span class="required-text">*</span></label>
                            <input class="mseproperty-input" type="password" id="password" name="password" value="{{old('password')}}" required>

                            @error('password')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="password_confirmation">Confirm Password <span class="required-text">*</span></label>
                            <input class="mseproperty-input" type="password" id="password_confirmation" name="password_confirmation" value="{{old('password_confirmation')}}" required>

                            @error('password_confirmation')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <button class="btn" type="submit">Create User</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>