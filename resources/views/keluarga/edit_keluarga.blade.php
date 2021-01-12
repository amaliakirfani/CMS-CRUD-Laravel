@extends('layouts.master')
@section('content')
<div class="container">
    <form action="/keluarga/update" method="POST">
    {{csrf_field ()}}
    
    <div class="form-group">
        <label for="exampleInputPassword1">ID Status Keluarga</label>
        <input value={{$Keluarga->id_status_keluarga}} type="text" name="id_status_keluarga" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Keterangan</label>
        <input value={{$Keluarga->keterangan}} type="text" name="keterangan" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Tunjangan Keluarga</label>
        <input value={{$Keluarga->tunjangan_keluarga}} type="text" name="tunjangan_keluarga" class="form-control" id="exampleInputPassword1">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop