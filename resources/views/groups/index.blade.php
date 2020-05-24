@extends('app')

@section('title', 'チャットトップ')

@section('content')
  @include('shared/header')
  <div class="chat-wrapper">
    @include('shared/chat_side')
  </div>

@endsection