@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ $thread->title }}</h2>
                        posted: <a href="{{ $thread->creator->path() }}">{{ $thread->creator->name }}</a>
                    </div>
                    <div class="panel-body">{{ $thread->body }}</div>
                </div>

                <hr>
                <h3>List of Replies</h3>

                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach
                {{ $replies->links() }}

                @if(auth()->check())
                    <h4>Create a reply</h4>
                    <form method="POST" action="{{ $thread->path().'/replies' }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea placeholder="Have something to say?"
                                      rows="5" name="body" id="body"
                                      class="form-control">
                            </textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </form>
                @else
                    <p>Please <a href="{{ route('login') }}">log in</a> to participate in this discussion.</p>
                @endif
            </div>

            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            This Thread was published {{ $thread->created_at->diffForHumans() }} <br>
                            by <a href="{{ $thread->creator->path() }}">{{ $thread->creator->name }}</a> <br>
                            and curretly
                            has {{ $thread->replies_count }} {{ str_plural('comment',$thread->replies_count) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
