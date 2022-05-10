@extends('main.layout.layout')
@section('title', 'Home')

@section(('content'))
    <div class="container">
        <h1>| ArmJob</h1>
    </div>
    @include('main.include.header')

    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col jobs-in-usa"></div>
                    <div class="col jobs-in-canada"></div>
                </div>
                <div class="row">
                    <div class="col recent_posts">
                        <h3>Recent Posts</h3>
                        <div class="row">
                            @foreach($data['recent_posts'] as $post)
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-4">
                                            <img src="{{ $post->general_image }}" alt="general image">
                                        </div>
                                        <div class="col-8">
                                            <a href="#">{{ $post->title }}</a>
                                            <p>{{ $post->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col jobs-in-uk"></div>
                        <div class="col jobs-in-australia"></div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col sidebar"></div>
                    </div>
                    <div class="row">
                        <div class="col social-plugin"></div>
                    </div>
                    <div class="row">
                        <div class="col popular-jobs"></div>
                    </div>
                    <div class="row">
                        <div class="col labels"></div>
                    </div>
                    <div class="row">
                        <div class="col side-categories"></div>
                    </div>
                </div>
            </div>
        </div>
    @include('main.include.footer')
@endsection
