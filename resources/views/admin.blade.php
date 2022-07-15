<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <x-jet-welcome /> This is the body text -->
                
                <div class="container">
                   <!-- A form to add sellers/users -->
                    <form action="{{url('/addseller')}}" method="POST">
                        <!-- cross-site request forgery -->
                        @csrf
                        <label for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter name" required="">
                        <br>
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter email" required="">
                        <br>
                        <label for="password">Password</label>
                        <input type="password" name="password" required="">
                        <br><br>
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
