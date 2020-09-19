
@extends('layouts.app')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h3>Post</h3>
                        <p>{{ $post->title }}</p>
                    </div>
<hr>
                    <div class="card-body">
                        <h3>Comments</h3>

                        @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->id }}</td>
                                <td>{{ $comment->comment }}</td>
                                <br><hr>
                            </tr>
                        @endforeach

                    </div>

                    <div class="card-body">
                        <h5>Leave a comment</h5>
                        <form method="post" action="{{ route('comment.add') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="comment" class="form-control" />
                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
