<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between text-center">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Location') }}
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-location.index')}}" class="fullwidth-btn bg-green-400">Back to Locations Dashboard</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{route('dashboard-location.store')}}" class="p-6 bg-white border-b border-gray-200">
                    @csrf
                   <div class="flex -mx-4 mb-6">
                       <div class="flex-1 px-4">
                            <label for="name" class="mseproperty-label">Locaton Name <span class="required-text">*</span></label>
                            <input type="text" class="mseproperty-input" id="name" name="name" value="{{old('name')}}" required>

                            @error('name')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="name_bn" class="mseproperty-label">Location - Bangla <span class="required-text">*</span></label>
                            <input type="text" class="mseproperty-input" id="name_bn" name="name_bn" value="{{old('name_bn')}}" required>

                            @error('name_bn')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>
                   </div>


                    <button class="btn" type="submit">Add Location</button>

                   {{-- Location Price End --}}  

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
