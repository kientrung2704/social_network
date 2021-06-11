@extends('layouts.app')

@section('content')
<div>
    {{-- <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Chat app</div>

                <div class="card-body" id="app">
                    
                </div>
            </div>
        </div>
    </div> --}}
    <chat-app :user="{{ auth()->user() }}"></chat-app>
</div>
@endsection
