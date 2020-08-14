@extends('adminlte.master')

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
