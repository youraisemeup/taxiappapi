@extends('layouts.admin')

@if(isset($name))
  @section('title', tr('edit_service_type'))
@else
  @section('title', tr('add_service_type'))
@endif


@section('content-header', tr('service_types'))

@section('breadcrumb')
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i>Home</a></li>
    <li><a href="{{route('admin.service.types')}}"><i class="fa fa-user"></i> {{tr('service_types')}}</a></li>
    <li class="active">{{tr('service_types')}}</li>
@endsection

@section('content')

@include('notification.notify')

<div class="row">

  <div class="col-md-12">

      <div class="box box-info">

          <div class="box-header">
            @if(isset($name))
            {{ tr('edit_service') }}
            @else
              {{ tr('create_service') }}
            @endif
          </div>
          <div class="panel-heading border">

          </div>

          <form class="form-horizontal bordered-group" action="{{route('admin.add.service.process')}}" method="POST" enctype="multipart/form-data" role="form">
            <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('service_name') }}</label>
              <div class="col-sm-8">
                <input placeholder="Eg: Sedan" type="text" name="service_name" value="{{ isset($service->name) ? $service->name : '' }}" required class="form-control">
              </div>
            </div>
           <!--  <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('provider_name') }}</label>
              <div class="col-sm-8">
                <input placeholder="Eg: Driver" type="text" name="provider_name" value="{{ isset($service->provider_name) ? $service->provider_name : '' }}" required class="form-control">
              </div>
            </div> -->
            <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('number_seats') }}</label>
              <div class="col-sm-8">
                <input placeholder="Eg: 4" type="text" name="number_seat" value="{{ isset($service->number_seat) ? $service->number_seat : '' }}" required class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('minimum_fare') }}</label>
              <div class="col-sm-8">
                <input placeholder="Eg: 50" type="text" name="min_fare" value="{{ isset($service->min_fare) ? $service->min_fare : '' }}" required class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('price_per_min') }}</label>
              <div class="col-sm-8">
                <input placeholder="Eg: 10" type="text" name="price_per_min" value="{{ isset($service->price_per_min) ? $service->price_per_min : '' }}" required class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('price_per_unit_distance') }}</label>
              <div class="col-sm-8">
                <input placeholder="Eg: 5" type="text" name="price_per_unit_distance" value="{{ isset($service->price_per_unit_distance) ? $service->price_per_unit_distance : '' }}" required class="form-control">
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('distance_unit') }}</label>
              <div class="col-sm-8">
              <select name="distance_unit" value="" required class="form-control">
              <option value="">{{ tr('select') }}</option>
              <option value="miles">miles</option>
              <option value="kms">kms</option>
              </select>
                <!-- <input placeholder="Eg: kms or miles" type="text" name="distance_unit" value="{{ isset($service->distance_unit) ? $service->distance_unit : '' }}" required class="form-control"> -->
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label">{{ tr('picture') }}</label>
              <div class="col-sm-8">
              @if(isset($service->picture))
              <img style="height: 90px; margin-bottom: 15px; border-radius:2em;" src="{{$service->picture}}">
              @endif
                <input name="picture" type="file">
                <p class="help-block">{{ tr('upload_message') }}</p>
              </div>
            </div>
            
             <div class="checkbox add_service_type_checkbox">
                  <label class="col-sm-2">
                    <input name="is_default" @if(isset($service)) @if($service->status ==1) checked  @else  @endif @endif  value="1"  type="checkbox">{{ tr('set_default') }}</label>
              </div>
            <input type="hidden" name="id" value="@if(isset($service)) {{$service->id}} @endif" />

            <div class="box-footer">
                <button type="reset" class="btn btn-danger">{{tr('cancel')}}</button>
                <button type="submit" class="btn btn-success pull-right">{{tr('submit')}}</button>
            </div>

          </form>

      </div>

  </div>

</div>


@endsection
