<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between text-center">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Property') }}
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-property.index')}}" class="fullwidth-btn bg-green-400">Back to Properties Dashboard</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6">
                    <h3>Gallery Image</h3>
                    <div class="flex mt-3">
                        @foreach($property->gallery as $gallery)
                            <div style="min-width: 100px" class="mr-4 relative mb-4 border border-gray-100">
                                <div class="flex items-center justify-center h-full">
                                    <img style="max-width: 100px;" src="/uploads/{{$gallery->name}}" alt="">
                                </div>

                                <form method="post" action="{{route('delete-media', $gallery->id)}}" onsubmit="return confirm('Resmi gerçekten silmek istiyor musunuz?');" class="absolute right-0 top-0"> @csrf
                                    <button style="font-size: 8px" type="submit" class="text-white bg-red-600 px-3 py-1">Silmek</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    
                </div>          


                <form method="post" action="{{route('dashboard-property.update', $property->id)}}" class="p-6 bg-white border-b border-gray-200" enctype="multipart/form-data"> @csrf @method('put')
                    @csrf
                   <div class="flex -mx-4 mb-6">
                       <div class="flex-1 px-4">
                            <label for="name" class="mseproperty-label">Title</label>
                            <input type="text" class="mseproperty-input" id="name" name="name" value="{{$property->name}}" required>

                            @error('name')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="name_bn" class="mseproperty-label">Title - Bangla</label>
                            <input type="text" class="mseproperty-input" id="name_bn" name="name_bn" value="{{$property->name_bn}}" required>

                            @error('name_bn')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>
                   </div>

                   {{-- Featured Image Start --}}

                   <div class="mb-6">
                        <label for="featured_image" class="mseproperty-label">Featured Image</label>
                        <input type="file" class="mseproperty-input" id="featured_image" name="featured_image">
                        <div class="mt-3">
                            @if (file_exists(public_path('storage/uploads/' . $property->featured_image)))
                                <img style="max-width: 100px" src="/storage/uploads/{{$property->featured_image}}" alt="">
                            @endif
                        </div>                  

                        @error('featured_image')
                            <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                        @enderror
                   </div>
                   {{-- Featured Image End --}}

                   <div class="mb-6">
                        <label for="gallery_images" class="mseproperty-label">Gallery Image <span class="required-text">*</span></label>
                        <input type="file" class="mseproperty-input" id="gallery_images" name="gallery_images[]" multiple>

                        @error('gallery_images')
                            <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                        @enderror

                   {{-- Location Price Start --}}
                   <div class="flex -mx-4 mb-6">
                       <div class="flex-1 px-4">
                            <label for="location_id" class="mseproperty-label">Location</label>
                            <select name="location_id" id="location_id">
                                <option value="">Select a Location</option>
                                @foreach($locations as $location)
                                <option {{$property->location->id == $location->id ? 'selected="selected"': ''}} value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>

                            @error('location_id')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="price" class="mseproperty-label">Price</label>
                            <input type="number" class="mseproperty-input" id="price" name="price" value="{{$property->price}}">

                            @error('price')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="sale" class="mseproperty-label">Service Type <span class="required-text">*</span></label>
                            <select name="sale" id="sale" required>
                                <option value="">Select a Service Type</option>
                                <option {{$property->sale == '1' ? 'selected="selected"' : ''}} value="1">Buy</option>
                                <option {{$property->sale == '2' ? 'selected="selected"' : ''}} value="2">Rent</option>
                            </select>   

                            @error('sale')
                                <p class="text-red-500 mt-2 text-sm">{{ $message }}</p>
                            @enderror
                       </div>

                       <div class="flex-1 px-4">
                            <label for="type" class="mseproperty-label">Property Type <span class="required-text">*</span></label>
                            <select name="type" id="type" required>
                                <option value="">Select a Property</option>
                                <option {{$property->sale == '2' ? 'selected="selected"' : ''}} value="2">Land</option>
                                <option {{$property->sale == '1' ? 'selected="selected"' : ''}} value="1">Appartment</option>
                                <option {{$property->sale == '3' ? 'selected="selected"' : ''}} value="3">Villa</option>
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

                                @for($x = 0; $x <= 8; $x++) <option {{$property->bedrooms == $x ?
                                'selected="selected"' : ''}}
                                value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bedrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="bathrooms">Bathrooms</label>
                            <select class="mseproperty-input"  name="bathrooms" id="bathrooms">
                                <option value="">Select one</option>
                                @for($x = 0; $x <= 5; $x++) <option {{$property->bathrooms == $x ?
                                'selected="selected"' : ''}}
                                value="{{$x}}">{{$x}}</option>
                                @endfor
                            </select>

                            @error('bathrooms')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="net_sqm">Net square meeter <span class="required-text">*</span></label>
                            <input class="mseproperty-input" type="number" id="net_sqm" name="net_sqm" value="{{$property->net_sqm}}">

                            @error('net_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="gross_sqm">Gross square meeter</label>
                            <input class="mseproperty-input" type="number" id="gross_sqm" name="gross_sqm" value="{{$property->gross_sqm}}" >

                            @error('gross_sqm')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="pool">Pool</label>
                            <select class="mseproperty-input"  name="pool" id="pool">
                                <option value="">Select pool</option>
                                <option {{$property->pool == '1' ? 'selected="selected"' : ''}} value="1">No</option>
                                <option {{$property->pool == '2' ? 'selected="selected"' : ''}} value="2">Private</option>
                                <option {{$property->pool == '3' ? 'selected="selected"' : ''}} value="3">Public</option>
                                <option {{$property->pool == '4' ? 'selected="selected"' : ''}} value="4">Both</option>
                            </select>

                            @error('pool')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="overview">Overview <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="overview" id="overview" cols="30" rows="3" required>{{$property->overview}}</textarea>

                            @error('overview')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="overview_bn">Overview - BN <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="overview_bn" id="overview_bn" cols="30" rows="3" required>{{$property->overview_bn}}</textarea>

                            @error('overview_bn')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="why_buy">Why buy <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="why_buy" id="why_buy" cols="30" rows="5">{{$property->why_buy}}</textarea>

                            @error('why_buy')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="why_buy_bn">Why buy - BN <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="why_buy_bn" id="why_buy_bn" cols="30" rows="5">{{$property->why_buy_bn}}</textarea>

                            @error('why_buy_bn')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex -mx-4 mb-6">
                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="description">Description <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="description" id="description" cols="30" rows="10" required>{{$property->description}}</textarea>

                            @error('description')
                            <p class="text-red-500 mt-2 text-sm">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="flex-1 px-4">
                            <label class="mseproperty-label" for="description_bn">Description - BN <span class="required-text">*</span></label>
                            <textarea class="mseproperty-input" name="description_bn" id="description_bn" cols="30" rows="10" required>{{$property->description_bn}}</textarea>

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
