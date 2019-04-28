@extends('layout.web')

@section('title', '| Counter Strike Global News')

@section('content')
    <div class="flex flex-wrap -mx-4">
        <div class="w-full px-4 mb-6">
            <h2>{{ $article->title }}</h2>
        </div>
    </div>
@endsection