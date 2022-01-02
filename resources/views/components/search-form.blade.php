<form action="{{route('properties')}}" method="GET" class="flex justify-between">
                    <div class="flex w-7/12 justify-between items-center">
                        <div class="flex flex-col mx-2">
                            <select name="sale" class="border-0 focus:ring-0">
                                <option value="">Buy or Rent</option>
                                <option {{request('sale') == 'sale' ? 'selected="selected"' : ''}} value="sale">Buy</option>
                                <option {{request('sale') == 'rent' ? 'selected="selected"' : ''}} value="rent">Rent</option>
                            </select>
                        </div>

                        <div class="py-3 self-center border-gray-500 border"></div>
                        <div class="flex flex-col mx-2">
                        <label for="location">Location</label>
                            <select id="location" name="location" class="border-0 focus:ring-0">
                                <option value="">Location</option>
                                @foreach($locations as $location)
                                    <option {{request('location') == $location->id ? 'selected="selected"' : ''}} value="{{$location->id}}">{{$location->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="py-3 self-center border-gray-500 border"></div>
                        <div class="flex flex-col mx-2">
                            <select name="type" class="border-0 focus:ring-0">
                                <option value="">Type</option>
                                <option {{request('type') == 'land' ? 'selected="selected"' : ''}} value="land">Land</option>
                                <option {{request('type') == 'appartment' ? 'selected="selected"' : ''}} value="appartment">Apartment</option>
                                <option {{request('type') == 'villa' ? 'selected="selected"' : ''}} value="villa">Villa</option>
                            </select>
                        </div>
                        <div class="py-3 self-center border-gray-500 border"></div>
                        <div class="flex flex-col mx-2">
                            <select name="price" class="border-0 focus:ring-0">
                                <option value="">Price</option>
                                <option {{request('price') == '100000' ? 'selected="selected"' : ''}} value="100000">0 - 100000</option>
                                <option {{request('price') == '200000' ? 'selected="selected"' : ''}} value="200000">100000 - 200000</option>
                                <option {{request('price') == '300000' ? 'selected="selected"' : ''}} value="300000">200000 - 300000</option>
                                <option {{request('price') == '400000' ? 'selected="selected"' : ''}} value="400000">300000 - 400000</option>
                                <option {{request('price') == '500000' ? 'selected="selected"' : ''}} value="500000">400000 - 500000</option>
                                <option {{request('price') == '500000+' ? 'selected="selected"' : ''}} value="500000+">500000 + </option>
                            </select>
                        </div>
                        <div class="py-3 self-center border-gray-500 border"></div>
                        <div class="flex flex-col mx-2">
                            <select name="bedrooms" class="border-0 focus:ring-0">
                                <option value="">Bedrooms</option>
                                <option {{request('bedrooms') == '1' ? 'selected="selected"' : ''}} value="1">1</option>
                                <option {{request('bedrooms') == '2' ? 'selected="selected"' : ''}} value="2">2</option>
                                <option {{request('bedrooms') == '3' ? 'selected="selected"' : ''}} value="3">3</option>
                                <option {{request('bedrooms') == '4' ? 'selected="selected"' : ''}} value="4">4</option>
                                <option {{request('bedrooms') == '5' ? 'selected="selected"' : ''}} value="5">5</option>
                            </select>
                        </div>
                    </div>
                    <div class="flex justify-between items-center w-3/12 ml-3">
                        <input name="property_name" value="{{request('property_name')}}" type="search" placeholder="Try to search for something" class="rounded-lg px-4 py-2 w-full mr-4 focus:border-gray-700 focus:ring-0">
                        <button type="submit" class="btn">Search</button>
                    </div>
                </form>