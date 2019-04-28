@extends('layout.web')

@section('title', '| Counter Strike Global News')

@section('content')
    <div class="flex flex-wrap -mx-4">
        @include('partials.breadcrumbs', ['breadcrumbs' => $article->category->getParents()])

        <h1 class="w-full pl-4 -ml-4 text-5xl mb-4 border-l-4 border-orange font-bold text-black">{{ $article->title }}</h1>

        <h3 class="w-full mb-4 border-l-4 border-transparent font-normal text-2xl text-grey-darker">{{ $article->headline }}</h3>

        <div class="w-full pl-1 flex border-t border-b border-grey-light py-4 mb-4">
            <div class="flex items-center text-lg">
                <h4 class="mr-2">Share</h4>

                <a href="" class="no-underline text-white">
                    <i class="fab fa-facebook-f px-5 py-4 mr-2 bg-blue-darker rounded-full hover:shadow-lg"></i>
                </a>

                <a href="" class="no-underline text-white">
                    <i class="fab fa-twitter p-4 mr-2 bg-blue-light rounded-full hover:shadow-lg"></i>
                </a>

                <a href="" class="no-underline text-white">
                    <i class="fab fa-linkedin px-4 py-4 mr-2 bg-blue-dark rounded-full hover:shadow-lg"></i>
                </a>

            </div>

            <div class="ml-auto pl-4 border-l border-grey-light">
                <div class="">
                    By <span class="font-bold">{{ $article->creator->name }}</span>
                </div>

                <div class="text-xs">
                    <span class="font-bold">Updated</span> {{ $article->updated_at->format('d F Y H:i') }}
                </div>
            </div>
        </div>

        <div class="w-full pl-1 mb-4 flex">
            <div class="text-lg flex-1 pr-4">
                {!! $article->content !!}
            </div>

            <div class="w-1/4 hidden lg:block">
                <h4 class="pb-4">Recommended</h4>

                @foreach($article->relatedArticles() as $relatedArticle)
                    <div class="flex flex-wrap w-full mb-4 pb-2 border-b-2 border-grey-light">
                        <a class="w-full mr-4" href="{{ route('articles.show', $relatedArticle) }}">
                            <img src="https://via.placeholder.com/400x200"
                                 alt="{{ $relatedArticle->title }}"
                                 class="w-full border-b-4 border-orange hover:border-black"
                            >
                        </a>

                        <div class="flex flex-1">
                            <a class="font-normal text-black no-underline hover:text-orange text-sm"
                               href="{{ route('articles.show', $relatedArticle) }}"
                            >
                                {{ $relatedArticle->title }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        @if($article->tags->count())
            <div class="w-full pl-1 mb-4">
                <h4 class="mb-4 flex items-center">
                    <img src="{{ asset('images/counter-strike.png') }}" class="pr-2" style="height: 25px;">

                    More About
                </h4>

                <div class="flex p-4 pb-2 bg-grey-light border-2 border-grey-light">
                    @foreach($article->tags as $tag)
                        <a href="/"
                           class="mr-2 mb-2 px-4 py-2 bg-orange text-black no-underline tracking-wide hover:bg-orange-light">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection