<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Chats') }}
        </h2>
    </x-slot>
    @foreach ($chats as $chat)
    <a href="{{ route('chat.show', ['id_publication' => $chat->id_publication, 'id_user_guest' => $chat->id_user_guest]) }}">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <section>
                            <div>
                                <h2>{{$chat->title}}</h2>
                                <p>{{$chat->name}}</p>
                            </div>
                        </section> 
                    </div>
                </div>
            </div>   
        </div>
    </a>
    @endforeach
</x-app-layout>
