@props(['application','currentpage'])

{{-- <div class='min-h-screen'> --}}
<div class="rounded-xl border p-5 shadow-md w-9/12 bg-white w-full mb-2 ">
    <div class="flex w-full items-center justify-between border-b pb-3">
        <div class="flex items-center space-x-3">
            <div class="h-8 w-8 rounded-full bg-slate-400">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                  </svg>

            </div>
            <a href="{{route('profile.index',['application'=>$application->id])}}" class="text-lg font-bold text-slate-700">{{ $application->user->profile->first_name }} {{ $application->user->profile->last_name }}</a>
            <p
                class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xm font-semibold">Savol ID:#{{ $application->id }}</p>
        </div>
        <div class="flex items-center space-x-8">
            <p class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xm font-semibold">Malaka Toifasi: <span class="italic text-green-400">{{ $application->subject }}</span></p>
            <div class=" flex items-center space-x-1 rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">
                <img src="/photos/telegram.png" width="20" height="20" alt="">
            <p>{{ $application->user->profile->tg_id }}</p>
            </div>
            <div class="text-xs text-neutral-500">{{ $application->created_at }}</div>
        </div>
    </div>

    <div class="mt-4 mb-6 ">
        <div class="mb-3 text-xl font-bold bg-gradient-to-r from-purple-500 to-purple-900 bg-clip-text text-transparent">
            {{-- {{ $application->subject }} --}}
        </div>
        <div class="text-xl text-neutral-600 text-slate-500">{{ $application->message }}</div>
    </div>

    <div>
        <div class="flex items-center justify-between text-slate-500">
            <div class="flex space-x-4 md:space-x-8">
                <div class="flex cursor-pointer items-center transition hover:text-slate-600">
                    @if ($application->file_url)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m.75 12 3 3m0 0 3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                        </svg>
                    @endif
                    <span>{{ $application->file_url }}</span>
                </div>
            </div>
        </div>
        @if (isset($application->answer->body))
            <div class="bg-gradient-to-r from-fuchsia-500 to-cyan-500 rounded-xl">
                <div class="h-8 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    <span class="ml-2">Manager</span>
                </div>
                <span class="text-white ">{{ $application->answer->body }}</span>
            </div>
        @else
            <div class="flex justify-end">
                <a href="/applications/{{$application->id}}/answer?page={{$currentpage}}"
                    class="small none center mr-4 rounded-lg bg-green-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    data-ripple-light="true">
                    answer
                </a>
            </div>
        @endif
    </div>
</div>
{{-- </div> --}}
