@extends('layouts.master')
@section('content')
<div class="container">
    <form action="/karyawan/update" method="POST">
    {{csrf_field ()}}
    
    {{-- <div class="form-group">
        <label for="exampleInputPassword1"></label>
        <input value={{$Karyawan->NIK}} type="hidden" name="id" class="form-control" id="exampleInputPassword1">
    </div> --}}
    
    <div class="form-group">
        <label for="exampleInputPassword1">NIK</label>
        <input value={{$Karyawan->NIK}} type="text" name="NIK" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Nama Karyawan</label>
        <input value={{$Karyawan->nama_karyawan}} type="text" name="nama_karyawan" class="form-control" id="exampleInputPassword1">
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">ID Status Keluarga</label>
        <select name="id_status_keluarga" class="form-control">
            <option>--pilih--</option>
                @foreach ($Keluarga as $item)
              <option value="{{$item->id_status_keluarga}}">{{$item->id_status_keluarga}}</option>
                @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop