<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Seller Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in as a SELLER!
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::guard('seller')->user()->name }}</td>
                                <td>{{ Auth::guard('seller')->user()->email }}</td>
                                <td><a href="{{ route('seller.logout') }}" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{ route('seller.logout') }}" method="post" class="d-none" id="logout-form">
                                    @csrf
                                </form>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>