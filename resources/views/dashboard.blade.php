<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class=" flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Pedagog kadrlar attestasiyasi Murojatlar bo\'limi') }}
            </h2>
            @if (auth()->user()->role->name == 'manager')
                <form action="{{ route('main.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button
                        class="flex-2 text-white font-bold py-2 px-4 rounded-full bg-gradient-to-r from-pink-500 to-purple-800 border border-transparent transform hover:scale-110 hover:border-white transition-transform duration-3000 ease-in-out"
                        type="submit">Delete</button>
                </form>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role->name == 'manager')
                        @if (session()->has('message_tg_error'))
                            <div class="font-regular relative block w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
                                data-dismissible="alert">
                                {{ session()->get('message_tg_error') }}
                            </div>
                        @elseif(session()->has('message_tg_success'))
                            <div class="font-regular relative block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100"
                                data-dismissible="alert">
                                {{ session()->get('message_tg_success') }}
                            </div>
                        @endif
                        <h1 class="text-2xl font-bold py-2 text-indigo-500 ">Yuborilgan Savollar Soni: {{$applications->total()}} ta</h1>
                        @foreach ($applications as $application)
                            <x-card :application="$application" :currentpage="$applications->currentPage()"/>
                        @endforeach
                        {{ $applications->links() }}
                    @else
                        @if (session()->has('error'))
                            <div class="font-regular relative block w-full rounded-lg bg-pink-500 p-4 text-base leading-5 text-white opacity-100"
                                data-dismissible="alert">
                                {{ session()->get('error') }}
                            </div>
                        @endif

                        @if (session()->has('send_message'))
                            <div class="font-regular relative block w-full rounded-lg bg-green-500 p-4 text-base leading-5 text-white opacity-100"
                                data-dismissible="alert">
                                {{ session()->get('send_message') }}
                            </div>
                        @endif
                        <x-message-form />
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
