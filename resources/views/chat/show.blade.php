<x-app-layout>    
    <div style="overscroll-behavior: none;">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chat') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                </div>
            </div>   
        </div>
    </div>
      <div
        class="fixed w-full bg-blue-400 h-16 pt-2 text-white flex justify-between shadow-md"
        style="top:0px; overscroll-behavior: none;"
      >
        <!-- back button -->
        <a>
          <svg
            xmlns="#"
            viewBox="0 0 24 24"
            class="w-12 h-12 my-1 text-blue-100 ml-2"
          >
            <path
              class="text-blue-100 fill-current"
              d="M9.41 11H17a1 1 0 0 1 0 2H9.41l2.3 2.3a1 1 0 1 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 0 1 1.42 1.4L9.4 11z"
            />
          </svg>
        </a>
        <div class="my-3 text-blue-100 font-bold text-lg tracking-wide">Nombre del usuario a quien escriben</div>
        <!-- 3 dots -->
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          class="icon-dots-vertical w-8 h-8 mt-2 mr-2"
        >
          <path
            class="text-blue-100 fill-current"
            fill-rule="evenodd"
            d="M12 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
          />
        </svg>
      </div>

      <div class="mt-20 mb-16">
        <div class="clearfix">
          <div
            class="bg-gray-300 w-3/4 mx-4 my-2 p-2 rounded-lg"
          >this is a basic mobile chat layout, build with tailwind css</div>
        </div>

        <div class="clearfix">
          <div
            class="bg-gray-300 w-3/4 mx-4 my-2 p-2 rounded-lg clearfix"
          >It will be used for a full tutorial about building a chat app with vue, tailwind and firebase.</div>
        </div>
        <div class="clearfix">
          <div
            class="bg-blue-300 float-right w-3/4 mx-4 my-2 p-2 rounded-lg clearfix"
          >check my twitter to see when it will be released.</div>
        </div>
      </div>
    </div>

    <div class="fixed w-full flex justify-between bg-blue-100" style="bottom: 0px;">
      <textarea
        class="flex-grow m-2 py-2 px-4 mr-1 rounded-full border border-gray-300 bg-gray-200 resize-none"
        rows="1"
        placeholder="Message..."
        style="outline: none;"
      ></textarea>
      <button class="m-2" style="outline: none;">
        <svg
          class="svg-inline--fa text-blue-400 fa-paper-plane fa-w-16 w-12 h-12 py-2 mr-2"
          aria-hidden="true"
          focusable="false"
          data-prefix="fas"
          data-icon="paper-plane"
          role="img"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 512 512"
        >
          <path
            fill="currentColor"
            d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"
          />
        </svg>
      </button>
    </div>
</x-app-layout>
