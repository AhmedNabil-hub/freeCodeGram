@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-3 p-5">
      <img src="{{ $user->profile->profileImage() }}" alt="" class="rounded-circle w-100">
    </div>

    <div class="col-9 pt-5">
      <div class="d-flex justify-content-between align-items-baseline">
        <div class="d-flex align-items-center pb-2">
          <h1 class="mr-4">{{ $user->username }}</h1>
          @if($user->id != $loggedUser->id)
          <follow-button user-id="{{ $user->id }}" follows="{{$follows}}"></follow-button>
          @endif
        </div>
        @can('update', $user->profile)
        <a href="/p/create">Add New Post</a>
        @endcan
      </div>
      @can('update', $user->profile)
      <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
      @endcan
      <div class="d-flex pt-2">
        <div class="pr-5"><strong>{{ $postsCount }}</strong> posts</div>
        <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
        <div class="pr-5"><strong>{{ $followingsCount }}</strong> following</div>
      </div>
      <div class="font-weight-bold pt-4">{{ $user->profile->title }}</div>
      <div>{{ $user->profile->description }}</div>
      <div><a href="https://www.freecodecamp.org" target="_blank">{{ $user->profile->url }}</a></div>
    </div>
  </div>

  <div class="row pt-5">
    @foreach($user->posts as $post)
    <div class="col-4 pb-4">
      <a href="/p/{{ $post->id }}">
        <img src="/storage/{{ $post->image }}" alt="" class="w-100">
      </a>
    </div>
    @endforeach
  </div>
</div>
@endsection
