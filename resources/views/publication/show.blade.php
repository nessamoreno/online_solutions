<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Posts') }}
        </h2>
    </x-slot>
    @foreach ($publications as $publication)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <section>
                            <div>
                                <h2>{{$publication -> title}}</h2>
                                <p>{{$publication -> created_at}}</p>
                            </div>
                            <div>
                                <h3>{{ $publication -> user -> name }}</h3>
                            </div>
                            <div>
                                <div>{{$publication -> imagen}}</div>
                                <div>{{$publication -> description}}</div>
                            </div>
                            <div>
                                <a href="#"><button>Chat</button></a>
                            </div>
                        </section> 
                    </div>
                </div>
            </div>   
        </div>
        @endforeach
</x-app-layout>
