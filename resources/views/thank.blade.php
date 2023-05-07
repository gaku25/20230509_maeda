@extends('layouts_app.app')

@section('title')
    <div class="title_thank">
        <P class=thank_title>ご意見いただきありがとうございました。</p>
    </div>
@endsection

@section('content')
    <div class="thank">
        <form action="/" method="get" class="content">
            @csrf
                <input type="submit" class="content_btn-sub" value="トップページ">
        </form>
    </div>
@endsection
