@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
        <form action="{{ url('items/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="item_name">Title</label>
                <input type="text" name="item_name" class="form-control" value="{{$item->item_name}}">
            </div>
            <!--/ item_name -->
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$item->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection