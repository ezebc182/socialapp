@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card mb-3 border-0 bg-light shadow-sm">
                    <status-form></status-form>
                </div>
                <statuses-list></statuses-list>
            </div>
        </div>
@endsection