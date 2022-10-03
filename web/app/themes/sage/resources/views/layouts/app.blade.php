<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {!! wp_head() !!}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ glide(\Roots\asset('/images/apple-touch-icon.png')) }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ glide(\Roots\asset('/images/favicon-32x32.png')) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ glide(\Roots\asset('/images/favicon-16x16.png')) }}">
    <link rel="manifest" href="{{ \Roots\asset('/mix-manifest.json') }}">
    <link rel="mask-icon" href="{{ glide(\Roots\asset('/images/safari-pinned-tab.svg')) }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>
<body {!! body_class() !!}>
    {!! wp_body_open() !!}
    {!! do_action('get_header') !!}


    @include('partials.header')

    <main>
      @yield('content')
    </main>

    @hasSection('sidebar')
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    @endif

    @include('partials.footer')

    {!! do_action('get_footer') !!}
    {!! wp_footer() !!}
</body>
