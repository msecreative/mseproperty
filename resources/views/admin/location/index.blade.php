<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between text-center">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Locations') }}
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-location.create')}}" class="fullwidth-btn bg-green-400">Add New Location</a>
            </div>
        </div>
       
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table class="w-full table-auto mb-6">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Location Name</th>
                                <th class="border px-4 py-2">Location Bangla</th>
                                <th width="250px" class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($locations as $location)
                            <tr>
                                <td class="border px-4 py-2">{{$location->name}}</td>
                                <td class="border px-4 py-2">{{$location->name_bn}}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{route('dashboard-location.edit', $location->id)}}" target="_blank" class="bg-blue-600 text-white px-4 py-2 text-xs rounded">Edit</a>
                                    <a href="{{--route('single-location', $location->id)--}}" target="_blank" class="bg-green-600 text-white px-4 py-2 text-xs rounded">View</a>
                                    <form onsubmit="return confirm('Do you realy want to delete the location item!!');" action="{{route('dashboard-location.destroy', $location->id)}}" method="post" class="inline-block">@csrf @method('delete')
                                        <button type="submit" class="bg-red-600 text-white px-4 py-2 text-xs rounded">Delete</button>
                                    
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$locations->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
