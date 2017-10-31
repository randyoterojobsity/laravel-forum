@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>{{ $thread->title }}</h2>
                        posted: <a href="{{ $thread->creator->path() }}">{{ $thread->creator->name }}</a>
                    </div>
                    <div class="panel-body">{{ $thread->body }}</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h3>List of Replies</h3>
                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
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
        </div>

    </div>
@endsection
