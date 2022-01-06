<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between text-center">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Property') }}
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-property.index')}}" class="fullwidth-btn bg-green-400">Back to Properties Dashboard</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form method="post" action="{{route('dashboard-property.store')}}" class="p-6 bg-white border-b border-gray-200" enctype="multipart/form-data">
                    @csrf
                   <div class="flex -mx-4 mb-6">
                       <div class="flex-1 px-4">
                            <label for="name" class="mseproperty-label">Title <span class="required-text">*</span></label>
                            <input type="text" class="mseproperty-input" id="name" name="name" value="{{old('name')}}" required>

                            @error('name')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="name_bn" class="mseproperty-label">Title - Bangla <span class="required-text">*</span></label>
                            <input type="text" class="mseproperty-input" id="name_bn" name="name_bn" value="{{old('name_bn')}}" required>

                            @error('name_bn')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>
                   </div>

                   {{-- Featured Image Start --}}

                   <div class="mb-6">
                        <label for="featured_image" class="mseproperty-label">Featured Image <span class="required-text">*</span></label>
                        <input type="file" class="mseproperty-input" id="featured_image" name="featured_image" required>

                        @error('featured_image')
                            <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                   </div>
                   {{-- Featured Image End --}}

                   <div class="mb-6">
                        <label for="gallery_images" class="mseproperty-label">Gallery Image <span class="required-text">*</span></label>
                        <input type="file" class="mseproperty-input" id="gallery_images" name="gallery_images[]" required multiple>

                        @error('gallery_images')
                            <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                   </div>
                   {{-- Gallery Image End --}}
                   {{-- Location Price Start --}}
                   <div class="flex -mx-4 mb-6">
                       <div class="flex-1 px-4">
                            <label for="location_id" class="mseproperty-label">Location <span class="required-text">*</span></label>
                            <select name="location_id" id="location_id">
                                <option value="">Select a Location</option>
                                @foreach($locations as $location)
                                <option {{old('location_id') == $location->id ? 'selected="selected"' : ''}} value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>

                            @error('location_id')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="price" class="mseproperty-label">Price <span class="required-text">*</span></label>
                            <input type="number" class="mseproperty-input" id="price" name="price" value="{{old('price')}}" required>

                            @error('price')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="sale" class="mseproperty-label">Service Type</label>
                            <select name="sale" id="sale">
                                <option value="">Select a Service Type</option>
                                <option {{old('sale') == '1' ? 'selected="selected"' : ''}} value="1">Buy</option>
                                <option {{old('sale') == '2' ? 'selected="selected"' : ''}} value="2">Rent</option>
                            </select>   

                            @error('sale')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="type" class="mseproperty-label">Property Type</label>
                            <select name="type" id="type">
                                <option value="">Select a Property</option>
                                <option {{old('type') == '2' ? 'selected="selected"' : ''}} value="2">Land</option>
                                <option {{old('type') == '1' ? 'selected="selected"' : ''}} value="1">Appartment</option>
                                <option {{old('type') == '3' ? 'selected="selected"' : ''}} value="3">Villa</option>
                            </select>   

                            @error('type')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>
                   </div> 

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="drawing_rooms">Drawing rooms</label>
                            <select class="mseproperty-input"  name="drawing_rooms" id="drawing_rooms">
                                <option value="">Select one</option>

                                @for($x = 0; $x <= 3; $x++)
                                <option {{old('drawing_rooms') == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('drawing_rooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="bedrooms">Bedrooms</label>
                            <select class="mseproperty-input"  name="bedrooms" id="bedrooms">
                                <option value="">Select one</option>

                                @for($x = 0; $x <= 8; $x++)
                                <option {{old('bedrooms') == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bedrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="kitchens">Kitchen</label>
                            <select class="mseproperty-input"  name="kitchens" id="kitchens">
                                <option value="">Select kitchens</option>
                                <option {{old('kitchens') == '1' ? 'selected="selected"' : ''}} value="0">No</option>
                                <option {{old('kitchens') == '2' ? 'selected="selected"' : ''}} value="1">Yes</option>
                            </select>

                            @error('kitchens')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="bathrooms">Bathrooms</label>
                            <select class="mseproperty-input"  name="bathrooms" id="bathrooms">
                                <option value="">Select one</option>
                                @for($x = 0; $x <= 6; $x++)
                                    <option {{old('bathrooms') == $x ? 'selected="selected"' : ''}} value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bathrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="net_sqm">Net square meeter <span class="required-text">*</span></label>
                            <input class="mseproperty-input" type="number" id="net_sqm" name="net_sqm" value="{{old('net_sqm')}}">

                            @error('net_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="gross_sqm">Gross square meeter</label>
                            <input class="mseproperty-input" type="number" id="gross_sqm" name="gross_sqm" value="{{old('gross_sqm')}}" >

                            @error('gross_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="pool">Pool</label>
                            <select class="mseproperty-input"  name="pool" id="pool">
                                <option value="">Select pool</option>
                                <option {{old('pool') == '0' ? 'selected="selected"' : ''}} value="0">No</option>
                                <option {{old('pool') == '1' ? 'selected="selected"' : ''}} value="1">Private</option>
                                <option {{old('pool') == '2' ? 'selected="selected"' : ''}} value="2">Public</option>
                                <option {{old('pool') == '3' ? 'selected="selected"' : ''}} value="3">Both</option>
                            </select>

                            @error('pool')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="overview">Overview <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="overview" id="overview" cols="30" rows="3">{{old('overview')}}</textarea>

                            @error('overview')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="overview_bn">Overview - BN <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="overview_bn" id="overview_bn" cols="30" rows="3">{{old('overview_bn')}}</textarea>

                            @error('overview_bn')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="why_buy">Why buy <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="why_buy" id="why_buy" cols="30" rows="5">{{old('why_buy')}}</textarea>

                            @error('why_buy')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="why_buy_bn">Why buy - BN <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="why_buy_bn" id="why_buy_bn" cols="30" rows="5">{{old('why_buy_bn')}}</textarea>

                            @error('why_buy_bn')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="description">Description <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>

                            @error('description')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="description_bn">Description - BN <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="description_bn" id="description_bn" cols="30" rows="10">{{old('description_bn')}}</textarea>

                            @error('description_bn')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <button class="btn" type="submit">Save Property</button>

                   {{-- Location Price End --}}  

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
