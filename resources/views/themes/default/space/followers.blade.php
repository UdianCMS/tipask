@extends('theme::layout.space')

@section('seo')
    <title>他的粉丝 - {{ Setting()->get('website_name') }}</title>
    <meta name="description" content="tipask问答系统交流平台" />
    <meta name="keywords" content="问答系统,PHP问答系统,Tipask问答系统 " />
@endsection

@section('space_content')
    <h2 class="h4">{{ $followers->total() }}  条记录</h2>
    <div class="stream-following border-top">
        <ul class="list-unstyled stream-following-list">
            @foreach($followers as $follower)
            <li>
                <div class="row">
                    <div class="col-md-10">
                        <img class="avatar-32" src="{{ route('website.image.avatar',['avatar_name'=>$follower->user_id.'_middle'])}}" />
                    <div>
                    <a href="{{ route('auth.space.index',['user_id'=>$follower->user_id]) }}">{{ $follower->user->name }}</a> @if($follower->user->title) <span class="text-muted ml-5">- php程序员</span> @endif
                    <div class="stream-following-followed">{{ $follower->supports }}赞同 / {{ $follower->followers }}关注 / {{ $follower->answers }}回答</div>
                    </div>
                </div>
                <div class="col-md-2 text-right">
                    @if(Auth()->check() && Auth()->user()->isFollowed(get_class(Auth()->user()),$follower->user_id))
                        <button type="button" class="btn btn-default btn-xs followerUser active" data-source_type = "user" data-source_id = "{{ $follower->user_id }}"  data-show_num="false"  data-toggle="tooltip" data-placement="left" title="" data-original-title="关注后将获得更新提醒">已关注</button>
                    @else
                        <button type="button" class="btn btn-default followerUser btn-xs" data-source_type = "user" data-source_id = "{{ $follower->user_id }}"  data-show_num="false" data-toggle="tooltip" data-placement="left" title="" data-original-title="关注后将获得更新提醒">关注</button>
                    @endif
                </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>

@endsection


