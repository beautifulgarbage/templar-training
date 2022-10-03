<div class="w-full h-screen flex items-center justify-center
  @if($hero['scrim'])
    bg-black
    text-white
  @else
    bg-gray-500
    text-black
  @endif
  "
  @if($hero['background_image'])
    style="background-image: url({{ glide($hero['background_image'], 'hero') }})"
  @endif
  >
  <div class="text-center">
    <h1 class="w-full text-4xl">{!! $headline !!}</h1>
    <div class="w-full">{!! $subtitle !!}</div>
    @foreach($hero['ctas'] as $cta)
      {{ $cta['link'] }}
    @endforeach
  </div>
</div>
