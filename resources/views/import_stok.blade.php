@extends('main')

@section('content')
    
<div class="section-header">
    <h1>Import Stok</h1>
</div>

<div class="row">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlFile1">Input File CSV</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="file-import" required>
        </div>
        <button class="btn btn-primary" type="submit">Import</button>
    </form>
</div>

@endsection