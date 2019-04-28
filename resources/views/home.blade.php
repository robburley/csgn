@extends('layout.web')

@section('title', '| Counter Strike Global News')

@section('content')
    <div class="flex flex-wrap -mx-4">
        @if($featured)
            <div class="flex w-full px-4 mb-4">
                <div class="w-full bg-black shadow-md">
                    <img src="https://via.placeholder.com/1200x600" class="w-full border-b-4 border-orange">

                    <div class="px-2 py-4 flex flex-col">
                        <a class="pb-2 font-normal text-grey text-sm no-underline hover:text-orange"
                           href="{{ url('/') }}"
                        >
                            {{ $featured->category->name }}
                        </a>

                        <a class="font-normal text-grey-lightest no-underline hover:text-orange text-xl"
                           href="{{ url('/') }}"
                        >
                            {{ $featured->title }}
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <div class="w-full px-4 mb-4">
            <h2>Latest Articles</h2>
        </div>

        @foreach($articles as $article)
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-4">
                <img src="https://via.placeholder.com/400x200"
                     alt="{{ $article->title }}"
                     class="w-full border-b-4 border-orange"
                >

                <div class="py-2 flex flex-col">
                    <a class="pb-2 font-normal text-grey text-sm no-underline hover:text-orange"
                       href="{{ url('/') }}"
                    >
                        {{ $article->category->name }}
                    </a>

                    <a class="font-normal text-black no-underline hover:text-orange text-xl"
                       href="{{ url('/') }}"
                    >
                        {{ $article->title }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection