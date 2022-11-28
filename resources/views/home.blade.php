@extends('layout')

@section('title', 'Main page')

@section('content')
    <h1>Home Page</h1>
    @isset($_SESSION['success'])
        <div class="alert alert-info" role="alert">
            {{   $_SESSION['success']  }}
        </div>
        @php
            unset($_SESSION['success']);
        @endphp
    @endisset
    <table class="table table-bordered table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">Number</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Thumb</th>
            <th scope="col">address</th>
            <th scope="col">About Company</th>
            <th scope="col">Related Company</th>
            <th scope="col">Contacts</th>
            <th scope="col">Updated_at</th>
        </tr>
        </thead>
        <tbody>
        @php($index = 1)
        @foreach($companies as $post)
            <tr>
                <th scope="row">{{ $index++ }}</th>
                <td>{{ $post->title_company }}</td>
                <td>{!! $post->content !!}</td>
                <td><img width="250px" height="auto" src="{{ URL::asset('public'.$post->thumbnail) }}" alt=""></td>
                <td><a target="_blank" href="{{ $post->adr_url }}">{{ $post->adr_title }}</a></td>
                <td>{!! $post->about_company !!}</td>
                <td>{!! $post->related_companies !!}</td>
                <td>{{$post->contacts_phone}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{ $companies->links() }}
    </div>
@endsection
