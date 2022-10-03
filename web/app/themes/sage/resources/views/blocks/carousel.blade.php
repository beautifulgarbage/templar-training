<div class="bg-{{ $block['background_color'] }} py-32">
    <div class="container pb-8">
        <h1 class="font-sans font-bold uppercase text-3xl">{{ $block['headline'] }}</h1>
        <div class="text-base">
            {!! $block['content'] !!}
        </div>
    </div>
    @if(count($block['carousel_items']) > 0)
        <div class="container">
            <div class="md:flex md:flex-wrap md:-mx-3">
                @foreach($block['carousel_items'] as $items)
                    <div class="px-3 relative lg:w-1/{{ count($block['carousel_cards']) > 5 ? '5' : count($block['carousel_cards']) }}">
                        <div class="shadow-lg bg-white rounded-lg h-full overflow-hidden">
                            <img data-src="{{ glide($items['image']['url'], 'carousel-image-sm') }}" class="lazy" />
                            <div class="p-2">
                                <h2 class="text-lg">{{ $items['title'] }}</h2>
                                <div>{{ $items['content'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>