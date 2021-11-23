@php
    $admin_phone = "7999999999";
    $client_phone = $phone;
    $text = "Здравствуйте! Я хочу зарегистрироваться в системе. Мой номер телефона: " . $client_phone;
    $url = "https://wa.me/" . $admin_phone . "?text=" . $text;
@endphp

<x-guest-layout>
    <x-auth-card>
        <div class="text-2xl text-center">
            <div>Чтобы войти в систему, обратитесь к администратору в WhatsApp</div>
            <a href="{{ $url }}" target="_blank" class="block mt-5 py-3 px-2 bg-green-700 text-white">В WhatsApp</a>
        </div>
    </x-auth-card>
</x-guest-layout>
