@extends('layouts.app')

@section('title', $post['title'])

@section('content')
@if ($post['is_new'])
    <div>heloo this is if statment</div>
@elseif (!$post['is_new'])
    <div>this post is old ! </div>
@endif

@unless ($post['is_new'])
    <div> it is an old pos ... using unless</div>
@endunless

<h1>{{ $post['title'] }}</h1>
<p>{{ $post['content'] }}</p>

@isset($post['has_comments'])
    <div>The post has some comments ..using isset</div>
@endisset


@endsection