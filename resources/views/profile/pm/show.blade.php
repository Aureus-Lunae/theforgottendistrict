@extends('layouts.reverse')

@section('content')
<div class="pm_container">

  <h1 class="content_title">{{$pm->title}}</h1>
  <div>
  <div class="users">
    <div class="from">{{ $pm->sender->name }}</div>
    <div class="to">to: {{ $pm->receiver->name }}</div>
  </div>

  <div class="date">
    {{ date('j M Y, H:i:s', strtotime($pm->created_at)) }}
  </div>


  <h2 class="msgtitle">{{$pm->title}}</h2>
  <div class="markdown msg">
    @markdown($pm->msg)


    </div>
  </div>
</div>

<div class="pm_side_container">
  <h1 class="content_title"><i class="fas fa-inbox"></i>Menu</h1>
  <div class="links">
    <a href="/dashboard/pm/create"><i class="fas fa-at"></i> New PM</a>
    <a href="/dashboard/pm"><i class="fas fa-inbox"></i> Incoming</a>
    <a href="/dashboard/pm/outbox"><i class="fas fa-paper-plane"></i> Sent</a>
  </div>
</div>

@endsection