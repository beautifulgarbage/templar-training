<article>
    @foreach($blocks as $index => $block)
        @include('blocks.' . $block['acf_fc_layout'])
    @endforeach
</article>
