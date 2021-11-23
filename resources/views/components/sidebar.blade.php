@props(['token', 'modules'])

<div>
    <nav>
        <ul>
            <li class="mb-12">
                <a href="{{ '/dashboard/' . $token }}" class="text-3xl">{{ __('Главная') }}</a>
            </li>
            @foreach($modules as $module)
                <li class="mb-12">
                    <a href="{{ '/dashboard/' . $token . '/module/' . $module }}" class="text-3xl hover:text-gray-600 transition-colors">
                        {{ __('Модуль ' . $module) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
</div>
