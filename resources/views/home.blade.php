@extends('layout.web')

@section('title', '| Counter Strike Global News')

@section('content')
    <div class="flex flex-wrap -mx-4">
        @if($featured)
            <div class="flex w-full px-4 mb-8">
                <div class="w-full bg-black shadow-md">
                    <img src="https://via.placeholder.com/1200x600" class="w-full border-b-4 border-orange">

                    <div class="px-2 py-4">
                        <h3 class="font-normal text-grey-lightest">
                            {{ $featured->title }}
                        </h3>
                    </div>
                </div>
            </div>
        @endif

        @foreach($articles as $article)
            <div class="w-full sm:w-1/2 lg:w-1/4 px-4 mb-4">
                <img src="https://via.placeholder.com/400x200"
                     alt="{{ $article->title }}"
                     class="w-full border-b-4 border-orange"
                >

                <div class="py-2">
                    <p class="pb-2 font-normal text-grey text-sm">{{ $article->category->name }}</p>

                    <h3 class="font-normal text-grey-dark">
                        {{ $article->title }}
                    </h3>
                </div>
            </div>
        @endforeach
    </div>
@endsection