@extends('layout.web')

@section('title', '| Counter Strike Global News')

@section('content')
    <div class="flex flex-wrap -mx-4">
        @include('partials.breadcrumbs', ['breadcrumbs' => $article->category->getParents()])

        <h1 class="w-full pl-4 -ml-4 text-5xl mb-4 border-l-4 border-orange font-bold text-black">{{ $article->title }}</h1>

        <h3 class="w-full mb-4 border-l-4 border-transparent font-normal text-2xl text-grey-darker">{{ $article->title }}</h3>
        
        <div class="border-l-4 border-transparent">
            {{ $article->title }}
        </div>
    </div>
@endsection