@extends('layout.web')

@section('title', '| Counter Strike Global News')

@section('content')
    <div class="flex flex-wrap -mx-4">
        @if($featured)
            <div class="flex w-full px-4 mb-6">
                <div class="w-full bg-black shadow-md">
                    <a class="w-full" href="{{ url('/') }}">
                        <img src="https://via.placeholder.com/1200x600" class="w-full border-b-4 border-orange">
                    </a>

                    <div class="px-2 py-4 flex flex-col">
                        <div class="flex justify-between items-end pb-2 ">
                            <a class="font-normal text-grey text-sm no-underline hover:text-orange"
                               href="{{ url('/') }}"
                            >
                                {{ $featured->category->name }}
                            </a>

                            <a class="text-grey-lightest text-sm flex items-center no-underline hover:text-orange"
                               href="{{ url('/') }}"
                            >
                                {{ $featured->comments_count }}
                                <i class="fa fa-comment text-orange pl-1"></i>
                            </a>
                        </div>

                        <a class="font-normal text-grey-lightest no-underline hover:text-orange text-xl"
                           href="{{ url('/') }}"
                        >
                            {{ $featured->title }}
                        </a>
                    </div>
                </div>
            </div>
        @endif

        <div class="w-full px-4 mb-6">
            <h2>Latest Articles</h2>
        </div>

        @foreach($articles as $article)
            <div class="w-full lg:w-1/3 px-4 mb-4 flex flex-row lg:flex-col">
                <a class="w-1/2 lg:w-full mr-4 lg:mr-0" href="{{ url('/') }}">
                    <img src="https://via.placeholder.com/400x200"
                         alt="{{ $article->title }}"
                         class="w-full border-b-4 border-orange"
                    >
                </a>

                <div class="flex flex-col w-1/2 lg:w-full py-2">
                    <div class="flex justify-between items-end pb-2 text-sm">
                        <a class="font-normal text-grey no-underline hover:text-orange"
                           href="{{ url('/') }}"
                        >
                            {{ $article->category->name }}
                        </a>

                        <div class="text-grey flex items-center">
                            {{ $featured->comments_count }} <i class="fa fa-comment text-orange pl-1"></i>
                        </div>
                    </div>

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