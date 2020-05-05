@extends('adminlte::page')
@section('css')
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@stop

@section('title', 'Dashboard')
@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>3</h3>
        <p>Contratos</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-bookmarks-outline"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>53<sup style="font-size: 20px">%</sup></h3>
        <p>RDO aprovado</p>
      </div>
      <div class="icon">
        <i class="ion ion-ios-checkmark-outline"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações<i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3>47<sup style="font-size: 20px">%</sup></h3>
        <p>RDO Pendentes</p>
      </div>
      <div class="icon">
        <i class="ion ion-android-alarm-clock"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações<i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>65</h3>

        <p>Itens SEM saldo</p>
      </div>
      <div class="icon">
        <i class="ion ion-alert-circled"></i>
      </div>
      <a href="#" class="small-box-footer">Mais informações<i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

</div> <!-- /.row -->

@stop