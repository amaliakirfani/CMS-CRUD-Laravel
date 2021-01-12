@extends('layouts.master')

    <!-- Main content -->
    @section('content')
    <section class="content">

      <div class="container-fluid">

        <div class="row">

          <div class="col-12">

            <br>
          <!-- Button Tambah Karyawan -->
          <p>
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Tambah Karyawan
            </a>
          </p>
        
              @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
              @endif
          <!-- Button Tambah Karyawan -->

            <div class="card">
                  <!-- Start Modal Add Student-->
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <form action="/karyawan/tambah" method="POST">
                          {{csrf_field ()}}
                
                          <div class="form-group">
                            <label for="exampleInputPassword1">NIK</label>
                            <input type="text" name="NIK" class="form-control" id="exampleInputPassword1" placeholder="Input NIK">
                          </div>
      
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nama Karyawan</label>
                            <input type="text" name="nama_karyawan" class="form-control" id="exampleInputPassword1" placeholder="Input nama karyawan">
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
                          <th>NIK</th>
                          <th>Nama Karyawan</th>
                          <th>ID Status Keluarga</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @php $no = 1; @endphp
                      @foreach ($Karyawan as $item)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td>{{$item->NIK}}</td>
                          <td>{{$item->nama_karyawan}}</td>
                          <td>{{$item->id_status_keluarga}}</td>
                          <td>
                            <a href="/karyawan/hapus/{{$item->NIK}}">
                              <button class="btn btn-danger">Hapus</button></a>
                      
                            <a href="/karyawan/edit/{{$item->NIK}}">
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
    @stop
    <!-- /.content -->

