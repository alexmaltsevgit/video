@extends('admin.layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-5xl">Ссылки</h2>

                    <div class="flex flex-col mt-14">
                        <div class="flex justify-between py-3 border-b-2 border-gray-300">
                            <div class="mx-2">
                                <h4 class="text-3xl">Номер телефона</h4>
                            </div>
                            <div class="mx-2">
                                <h4 class="text-3xl">Ссылка</h4>
                            </div>
                        </div>
                        @foreach(array_reverse($users) as $user)
                            <div class="flex justify-between py-3 border-b-2 border-gray-300">
                                <div class="mx-2">
                                    {{ $user['phone'] }}
                                </div>
                                <div class="mx-2">
                                    {{ $url = \Illuminate\Support\Facades\Request::root() . '/dashboard/' . $user['token'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
