@extends('adminlte.master')

@section('content')
<section class="content">

    <!-- Default box -->
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{$count}} Question</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                    <!-- <form action="/pertanyaan/cari" method="GET"> -->
                        <input type="text" name="cari" class="form-control float-right" placeholder="Search" old="{{ old('cari') }}">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    <!-- </form> -->
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>
                                Judul
                            </th>
                            <th>
                                Pertanyaan
                            </th>
                            <th>
                                Created
                            </th>
                            <th>
                                Update
                            </th>
                            <th class="text-center">
                                Status
                            </th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pertanyaan as $p)
                        <tr>
                            <td>{{$p->judul}}</td>
                            <td>{{$p->isi}}</td>
                            <td>{{$p->created_at}}</td>
                            <td>{{$p->updated_at}}</td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="#">
                                    <i class="fas fa-folder">
                                    </i>
                                    View
                                </a>
                                <a class="btn btn-info btn-sm" href="#">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="#">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
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
    <!-- /.card -->

</section>
@endsection
