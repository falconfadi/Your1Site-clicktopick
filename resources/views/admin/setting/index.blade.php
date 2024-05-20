<x-master title="{{ __('admin.'.plural($item)) }}">
  {{-- @section('style')
      @if(View::exists('admin.'.$item.'._styles'))
          @include('admin.'.$item.'._styles')
      @endif
  @endsection --}}
  <x-breadcrumb :item="$item"></x-breadcrumb>
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
      <!--begin::Container-->
      <div class="container">
          <!--begin::Dashboard-->
          <!--begin::Row-->
          <div class="row">
              <div class="col-xl-12">
                <form action="{{route('admin.addAdminSetting')}}" method="POST">
                  @csrf
                  <div class="card p-1">
                    <div class="card-heder m-2 p-2">
                        <h3 class="text-lg {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">{{__('front.new')}}</h3>
                    </div>
                    <div class="card-body d-flex justify-content-around p-2 {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">
                        <div class="w-50 mx-1">
                            <label>{{__('front.key')}}</label>
                            <input type="text" name="setting_key" class="form-control" placeholder="{{__('front.key')}}">
                        </div>
                        <div class="w-50 mx-1">
                            <label>{{__('front.value')}}</label>
                            <input type="text" name="setting_value" class="form-control" placeholder="{{__('front.value')}}">
                        </div>                     
                        <div class="w-25 mx-1">
                            <label>{{__('admin.create')}}</label>
                            <br>
                            <button class="btn btn-success w-100" type="submit">
                              <i class="fa fa-plus"></i> 
                              {{__('admin.create')}}
                            </button>
                        </div>
                    </div>
                  </div>
                </form>
                <br>
                <div class="card">
                    <div class="card-heder m-2 p-2">
                        <h3 class="text-lg {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">{{__('front.settings')}}</h3>
                    </div>
                    <div class="card-body row d-flex justify-content-around p-1 m-0">
                        @forelse ($admin_settings as $setting)
                            <div class="card col-3 col-offset-1 my-2" style=" 
                                @if(app()->getLocale() == 'ar')
                                    direction:rtl !important;
                                    text-align: justify;
                                @endif "
                                >
                                <div class="d-flex justify-content-between pb-0 pt-1">
                                    <p class="text-lg w-100 px-1 m-0"> 
                                        {{__('front.key')}} :  {{__('front.'.$setting->setting_key)}}
                                        <!--{{__('front.key')}} :  {{$setting->setting_key}}-->
                                        <br>
                                        {{__('front.value')}} : {{$setting->setting_value}}
                                    </p>
                                    <a href="{{route('admin.deleteAdminSetting',['id'=>$setting->id])}}" 
                                        class="mx-auto">
                                        <button class="btn btn-danger btn-sm" type="button">
                                            <i class="fa fa-sm fa-trash p-0"></i>
                                        </button>
                                    </a>
                                    <!--<form method="post" action="" id="setting_{{$setting->id}}_form">-->
                                    <!--    <lable class="text-lg w-100 px-1 m-0 my-1">-->
                                    <!--       {{__('front.key')}} :  {{$setting->setting_key}} -->
                                    <!--    </lable>-->
                                    <!--    @csrf-->
                                    <!--    <input name="setting_value" value="{{$setting->setting_value}}" class="form-control my-2">-->
                                    <!--</form>-->
                                    <!--<div class="d-flex align-items-center">-->
                                    <!--    <a href="#" class="mx-auto mt-0 mb-2 px-2">-->
                                    <!--        <button class="btn btn-success btn-sm" type="submit" form="setting_{{$setting->id}}_form">-->
                                    <!--            <i class="fa fa-edit p-0"></i>-->
                                    <!--        </button>-->
                                    <!--    </a>-->
                                    <!--    <a href="{{route('admin.deleteAdminSetting',['id'=>$setting->id])}}" -->
                                    <!--    class="mx-auto mt-0 mb-2 px-2">-->
                                    <!--        <button class="btn btn-danger btn-sm" type="button">-->
                                    <!--            <i class="fa fa-trash p-0"></i>-->
                                    <!--        </button>-->
                                    <!--    </a>-->
                                    <!--</div>-->
                                </div>
                            </div>
                        @empty
                            <h4 class="alert">{{__('front.Nothing found')}}</h4>
                        @endforelse
                    </div>
                </div>
                
              </div>
          </div>
          <!--end::Row-->
          <!--begin::Row-->
      </div>
      <!--end::Container-->
  </div>
  <!--end::Entry-->

  <x-slot name="footer"></x-slot>
  {{-- @section('scripts')
      @if(View::exists('admin.'.$item.'._scripts'))
          @include('admin.'.$item.'._scripts')
      @endif
  @endsection --}}
</x-master>
