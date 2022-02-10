@extends('admin::layouts.master')
@section('page_title', 'Sở TNMT')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12 mt-2">
                @include('admin::dashboard.can_bo')
            </div>
        </div>
    </section>
@endsection
