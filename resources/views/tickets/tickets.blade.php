@extends('layouts.app')

@section('content')
    <div class="justify-content-center">
        <div class="mt-5">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>User</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>
                            <a href="{{ route('ticket.show', $ticket) }}">
                                {{ $ticket->title }}
                            </a>
                        </td>
                        <td>{{ $ticket->user->name }}</td>
                        <td>{{ $ticket->priority }}</td>
                        <td>{{ $ticket->status }}</td>
                        <td>{{ $ticket->created_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
