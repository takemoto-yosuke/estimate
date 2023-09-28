
 @extends('layouts.app')
 @section('content')

<div class="card-body"> 
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('downloadData') }}" class="btn btn-secondary">データをダウンロード</a>
            <a href="{{ route('generate-and-download') }}" class="btn btn-secondary">データをダウンロード</a>
        </div>
        <div class="col-md-6">
            <form action="{{ route('uploadData') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="csv_file">
                <button type="submit" class="btn btn-primary">データをアップロード</button>
                             
            </form>
        </div>
    </div>
</div>

@endsection