@extends('app')

@section('title', 'チャット画面')

@section('content')
<div class="wrapper">
  @include('shared/header')
  <div class="chat-wrapper">
    <div class="chat-side show">
      <div class="chat-side__nav">
        <p>{{ Auth::user()->name }}</p>
        <div>
          <a href="{{ route('group.create') }}" class="circle-btn circle-btn-blue"><i class="fas fa-plus"></i></a>
        </div>
      </div>
      <div class="groups">
        @foreach ($groups as $group_item)
        <div class="group">
          <div style="padding-top: 10px;">
            <a href="{{ route('group.show', ['group' => $group_item]) }}">
              <p class="group__name">{{ mb_strimwidth($group_item->name, 0, 15, "...", 'UTF-8') }}</p>
            </a>
          </div>
          <div class="group__image">
            @if ($group_item->image !== null)
            <img src="/storage/images/{{ $group_item->image }}" alt="noimage">
            @else
            <img src="/images/noimageblack.png" alt="noimage">
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
    
    <div class="chat-main">
      <div class="chat-header">
        <div class="chat-header__left">
          <p class="group-name">{{ $group->name }}</p>
          <p class="group-member">
            メンバー：
          @foreach($group->users->sortBy('id') as $user)
          <a href="{{ route('user.show', ['user' => $user]) }}">{{ $user->name }}</a>
          @endforeach
          </p>
          </div>
        <div class="chat-header__right">
          <a href="{{ route('group.edit', ['group' => $group]) }}" class="main-btn blue small">編集</a>
        </div>
      </div>
      <div class="chat-messages">
        @foreach ($messages as $message)
        @if ($message->user_id !== Auth::user()->id)
        <div class="message">
        @else
        <div class="message green">
        @endif
          <div class="message__image">
            @if ($message->user->image !== null)
            <img src="/storage/images/{{ $message->user->image }}" alt="noimage">
            @else
            <img src="/images/noimageblack.png" alt="noimage">
            @endif
          </div>
          <div>
            <div class="message__info">
              <p class="user-name">{{ $message->user->name }}</p>
              <p class="send-time">{{ $message->created_at->format('Y/m/d H:i') }}</p>
            </div>
            <div class="message__desc">{{ $message->text }}</div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="chat-form-box">

        <form action="{{ route('message.store', ['group' => $group]) }}" method="POST" class="chat-form">
          @csrf
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="group_id" value="{{ $group->id }}">
          <input type="text" name="text" required class="chat-message" placeholder="メッセージを入力して下さい">
          <input type="submit" value="送信する" class="main-btn blue chat">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection