@extends('adminlte.master')

@section('header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">

            </div>
            <div class="col-sm-6">

            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection

@section('content')
<section class="content">
    <div class="row">
        <!-- ./col -->
        @foreach($tag as $t)
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tag"></i>
                        {{$t->nama}}
                    </h3>
                </div>
                <!-- /.card-header -->
            </div>
            <!-- /.card -->
        </div>
        <!-- ./col -->
        @endforeach
    </div>
</section>
@endsection
