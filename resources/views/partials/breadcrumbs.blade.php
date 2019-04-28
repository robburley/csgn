<ul class="flex items-center list-reset mb-4">
    @foreach($breadcrumbs as $breadcrumb)
        <li class="pr-2">
            <img src="{{ asset('images/counter-strike.png') }}" style="height: 25px;">
        </li>

        <li class="pr-2">
            <a href="{{ $breadcrumb->path() }}" class="text-orange hover:text-black no-underline">
                {{ $breadcrumb->{$name ?? 'name'} }}
            </a>
        </li>
    @endforeach
</ul>
