@extends('layouts.login')
@section('content')
<h2>機能を実装していきましょう。</h2>
<!--投稿フォームの設置 -->
<h1>投稿ページ</h1>
<div>
    <form action="/create" method="post">
    @csrf
        <textarea name="post" rows="4" cols="40"placeholder="入力のヒント"></textarea>
        <button class="btn"> 送信 
        </button>
    </form>
</div>

<!-- 投稿一覧-->

<div>
        <h2 class="page-header">投稿一覧</h2>
        <table class='table table-hover'>
            <tr>
                <th>投稿No</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach ($post as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->created_at }}</td>
                @csrf
                <td><button class="btn btn-primary" data-toggle="modal" data-target="#MODAL1"data-post="{{ $post->post }}">編集</button></td>  
                <td><a href="/post/{{$post->id}}/delete">削除</a></td>  
                </tr>
            @endforeach
        </table>
    </div>
    
  <!-- ここからモーダル -->
  
  <div class="modal fade" id="MODAL1" tabindex="-1" role="dialog" aria-labelledby="MODAL1Label">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="MODAL1Label">内容の編集。</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>内容</p>
          <form action="/create" method="post">
    @csrf
    <input type="text" class="form-control" id="postdata">
    </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
          <a href="/post/update" class="btn btn-primary">OK</a> 
        </div><!-- /.modal-footer -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


@endsection
 