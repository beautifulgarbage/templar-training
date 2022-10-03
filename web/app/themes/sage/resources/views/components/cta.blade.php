<a class="flex items-center my-4 text-lg font-bold font-karla" href="{{ $href }}">
    <div class="flex items-center justify-center w-12 h-12 mr-4 rounded-full {{ $inverse ? 'bg-white' : 'bg-brand' }}">@svg('images/arrow')</div>
    {{ $message ?? $slot }}
</a>
