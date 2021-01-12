@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

            <br>
          <!-- Button Tambah Status Keluarga -->
          <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Tambah Status Keluarga
            </a>
          </p>
        
              @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
              @endif
          <!-- Button Tambah Status Keluarga -->

            <div class="card">
                  <!-- Start Form Status Keluarga-->
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="/keluarga/tambah" method="POST">
                          {{csrf_field ()}}
                
                          <div class="form-group">
                            <label for="exampleInputPassword1">ID Status Keluarga</label>
                            <input type="text" name="id_status_keluarga" class="form-control" id="exampleInputPassword1" placeholder="Input id status keluarga">
                          </div>
      
                          <div class="form-group">
                            <label for="exampleInputPassword1">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputPassword1" placeholder="Input keterangan">
                          </div>
      
                          <div class="form-group">
                            <label for="exampleInputPassword1">Tunjangan Keluarga</label>
                            <input type="text" name="tunjangan_keluarga" class="form-control" id="exampleInputPassword1" placeholder="Input tunjangan keluarga">
                          </div>
      
                        <!-- /.card-body -->
      
                        <div class="card-footer">
                          <button type="submit" class="btn-add btn btn-primary" >Submit</button>
                        </div> 
                
                        </form>
                    </div>
                </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>ID Status Keluarga</th>
                          <th>Keterangan</th>
                          <th>Tunjangan Keluarga</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php $no = 1; @endphp
                      @foreach ($Keluarga as $item)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{$item->id_status_keluarga}}</td>
                          <td>{{$item->keterangan}}</td>
                          <td>{{$item->tunjangan_keluarga}}</td>
                          <td>
                            <a href="/keluarga/hapus/{{$item->id_status_keluarga}}">
                              <button class="btn btn-danger">Hapus</button></a>
                      
                            <a href="/keluarga/edit/{{$item->id_status_keluarga}}">
                              <button class="btn btn-warning">Edit</button></a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
              </div>
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @stop
