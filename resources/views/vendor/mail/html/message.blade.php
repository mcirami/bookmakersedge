@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            {{ config('app.name') }}
        @endcomponent
    @endslot

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endisset

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer', ['user' => $user])
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
            <p><a href="https://bookmakersedge.com/unsubscribe/{{ isset($user) ? $user : 'no-id' }}">Unsubscribe</a>
                to stop these notifications
            </p>
        @endcomponent
    @endslot
@endcomponent
