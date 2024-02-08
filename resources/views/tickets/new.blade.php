@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">

            @include('alerts')

            <form action="{{ route('ticket.create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="row mb-3">
                    <label for="department">Department</label>
                    <select class="form-control" id="department" name="department">
                        <option value="0">Support</option>
                        <option value="1">Tech</option>
                        <option value="2">Financial</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label for="priority">Priority</label>
                    <select class="form-control" id="priority" name="priority">
                        <option value="0">Low</option>
                        <option value="1">Mid</option>
                        <option value="2">High</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label for="text">Text</label>
                    <textarea class="form-control" id="text" rows="6" name="text"></textarea>
                </div>
                <div class="row mb-3">
                    <label for="">Attach</label>
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
