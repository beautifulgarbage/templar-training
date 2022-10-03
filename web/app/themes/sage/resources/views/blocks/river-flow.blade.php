<div class="py-32">
    <div class="container pb-24 text-center">
        <h1 class="font-sans text-3xl font-bold uppercase">{{ $headline }}</h1>
        <div class="text-base">
            {!! $content !!}
        </div>
    </div>
    @if(count($sections) > 0)
        @foreach($sections as $item)
            <div class="md:flex md:flex-wrap
                @if($start_image_on=='Right')
                    {{ $loop->index % 2 == 0 ? 'md:flex-row-reverse' : '' }}
                @else
                    {{ $loop->index % 2 != 0 ? 'md:flex-row-reverse' : '' }}
                @endif
                ">
                <div class="relative bg-center bg-cover md:w-1/2 min-h-64" style="background-image: url({{ glide($item['image']['url']) }});"></div>
                <div class="py-32 md:w-1/2 lg:px-8">
                    <div>
                        <h2 class="text-2xl">{{ $item['headline'] }}</h2>
                        <div>{{ $item['content'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>