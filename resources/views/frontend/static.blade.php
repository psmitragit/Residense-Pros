@extends('frontend.layout.app')

@section('content')
    <div class="container">
        {!! $page?->content ?? '' !!}
    </div>
@endsection
