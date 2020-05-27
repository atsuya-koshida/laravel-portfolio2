@extends('app')

@section('title', 'チャットグループ編集')

@section('content')
    @include('shared/header')

    <main class="main-wrapper">
      <div class="main-wrapper__inner">
        <div class="main-container">
          <div class="group-section new-group">
            <div class="group-section__title">
              <p>「{{ $group->name }}」を編集</p>
            </div>
            @include('error_card_list')
            <form action="{{ route('group.update', ['group' => $group]) }}" method="POST" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <div class="text-box">
                <label class="text-label">グループ名</label>
                <input name="name" type="text" placeholder="グループ名を入力して下さい" required value="{{ $group->name ?? old('name') }}">
              </div>
              <div class="file-box">
                <p>画像</p>
                <input type="file" name="image">
              </div>
              <p style="width: 90%; margin: 0 auto 10px;">フォロー中のユーザーを追加</p>
              <div class="custom-checkboxes">
                @foreach ($group_users as $group_user)
                @if ($group_user->id !== Auth::user()->id)
                <label>
                  <input type="checkbox" name="users[]" checked value="{{ $group_user->id }}">{{ $group_user->name }}
                </label>
                @endif
                @endforeach
                @foreach ($diff_users as $diff_user)
                <label>
                  <input type="checkbox" name="users[]" value="{{ $diff_user->id }}">{{ $diff_user->name }}
                </label>
                @endforeach
              </div>
              <div class="submit-box">
                <input type="submit" value="更新する" class="main-btn blue">
              </div>
              <form method="POST" action="{{ route('group.destroy', ['group' => $group]) }}">
                @csrf
                @method('DELETE')
                <div class="submit-box">
                  <button type="submit" onclick='return confirm("グループ「{{ $group->name }}」を本当に削除しますか？");' class="main-btn red">グループを削除する</button>
                </div>
              </form>
            </form>
          </div>
        </div>
        @include('shared/sidebar')
      </div>
    </main>
@endsection