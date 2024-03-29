@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <div class="mt-5">
            <div class="col-md-8 m-lg-5">

                @include('alerts')

                <div class="card">
                    <div class="card-header">
                        <span class="fw-bold">{{ $ticket->title }}</span>
                        @if($ticket->isClosed())
                            <span class="btn btn-danger float-right btn-sm">Closed</span>
                        @else
                            <a class="btn btn-danger float-right btn-sm"
                               href="{{ route('ticket.close', $ticket) }}">Close</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{ $ticket->text }}</p>
                        @if($ticket->hasFile())
                            <a href="{{ $ticket->file() }}">Download Attach</a>
                        @endif
                    </div>
                    <div class="card-footer text-muted">
                        {{ $ticket->created_at->diffForHumans() }} by {{ $ticket->user->name }}
                    </div>
                </div>
            </div>

            @foreach($ticket->replies as $reply)
                <div class="col-md-8 mt-5 m-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">{{ $reply->text }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $reply->created_at->diffForHumans() }} by {{ $reply->repliable->name }}
                        </div>
                    </div>
                </div>
            @endforeach

            @if(!$ticket->isClosed())
                <div class="col-md-8 m-lg-5">
                    <form class="mt-5" action="{{ route('reply.create', $ticket) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <textarea name='text' class="form-control" placeholder="Reply message ..."
                                      id="exampleFormControlTextarea1" rows="6"></textarea>
                        </div>
                        <button class="mt-4 btn btn-primary">Send</button>
                    </form>
                </div>
            @endif

        </div>

    </div>

@endsection


