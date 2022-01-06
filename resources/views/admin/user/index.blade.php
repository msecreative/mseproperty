<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between text-center">
             <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>

            <div class="min-w-max">
                <a href="{{route('dashboard-user.create')}}" class="fullwidth-btn bg-green-400">Add New User</a>
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
                                <th class="border px-4 py-2">User Name</th>
                                <th class="border px-4 py-2">User Email</th>
                                <th class="border px-4 py-2">User Password</th>
                                <th width="250px" class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{$user->name}}</td>
                                <td class="border px-4 py-2">{{$user->email}}</td>
                                <td class="border px-4 py-2">{{$user->password}}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a href="{{route('dashboard-user.edit', $user->id)}}" target="_blank" class="bg-blue-600 text-white px-4 py-2 text-xs rounded">Edit</a>
                                    <form onsubmit="return confirm('Do you realy want to delete the location item!!');" action="{{route('dashboard-user.destroy', $user->id)}}" method="post" class="inline-block">@csrf @method('delete')
                                        <button type="submit" class="bg-red-600 text-white px-4 py-2 text-xs rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
