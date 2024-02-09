<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (auth()->user()->role->name == 'manager')
                    <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                        <h2 class="text-xl">Savol beruvchi: <span class="text-yellow-500">{{$application->user->profile->first_name}} {{$application->user->profile->last_name}}</span></h2>
                        <h2 class="text-xl">Savol ID: <span class="text-yellow-500">#{{$application->id}}</span></h2>
                        <div class='max-w-md mx-auto space-y-6'>
                            <form action="{{ route('answer.store',['application'=>$application->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="page" value={{$_REQUEST["page"]}}>
                                <label class="uppercase text-sm font-bold opacity-70">Javobizgizni Yozing</label>
                                <textarea type="text" class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded" name="answer" required></textarea>
                                <input type="submit"
                                    class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300"
                                    value="Send">
                            </form>
                        </div>
                    </div>
                    @else
                        <div class="h-1/2 bg-red-700"><h1>Sahifa Topilmadi!</h1></div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
