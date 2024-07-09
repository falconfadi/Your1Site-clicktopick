<x-master title="{{ __('admin.'.plural($item)) }}">
  <x-breadcrumb :item="$item"></x-breadcrumb>
  <div class="d-flex flex-column-fluid">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  @include('admin.layouts.panels._alerts')
              </div>
              <div class="col-xl-12">
                <form action="{{route('admin.addAdminSetting')}}" method="POST">
                  @csrf
                  <div class="card p-1">
                    <div class="card-heder m-2 p-2">
                        <h3 class="text-lg {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">{{__('front.new')}}</h3>
                    </div>
                    <div class="card-body {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">
                        <div class="row">
                            <div class="col-5 px-1">
                                <label>{{__('front.key')}}</label>
                                <input type="text" name="setting_key" class="form-control" required placeholder="{{__('front.key')}}">
                            </div>
                            <div class="col-5 px-1">
                                <label>{{__('front.value')}}</label>
                                <input type="text" name="setting_value" class="form-control" required placeholder="{{__('front.value')}}">
                            </div>                     
                            <div class="col-2 px-1">
                                <label>{{__('admin.create')}}</label>
                                <button class="btn btn-success btn-sm form-control" type="submit">
                                  <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                  </div>
                </form>
                <br>
                <div class="card p-2">
                    <div class="card-heder px-1">
                        <h3 class="text-lg {{app()->getLocale() == 'ar' ? 'text-right' : 'text-left'}}">{{__('front.settings')}}</h3>
                    </div>
                    <div class="card-body row px-1 py-2 m-0">
                        @forelse ($admin_settings as $setting)
                            <div class="col-sm-12 col-md-5 border rounded-lg my-1 mx-auto" style=" 
                                @if(app()->getLocale() == 'ar')
                                    direction:rtl !important;
                                    text-align: justify;
                                @endif ">
                                <div class="d-flex justify-content-between pb-0 pt-1">
                                    <form method="post" action="{{route('admin.editAdminSetting',['id'=>$setting->id])}}" 
                                        id="setting_{{$setting->id}}_form" class="w-100">
                                        <lable class="text-lg w-100 px-1 m-0 my-1">
                                           {{ucfirst($setting->setting_key)}} 
                                        </lable>
                                        @csrf
                                        <input name="{{$setting->setting_key}}" value="{{$setting->setting_value}}" class="form-control form-control-md">
                                    </form>
                                    <div>
                                        <lable class="text-lg px-1 my-1">
                                            Options
                                        </lable>
                                        <div class="d-flex align-items-center">
                                        <a href="#" class="mx-auto mt-0 mb-2 px-2">
                                            <button class="btn btn-success btn-sm" type="submit" form="setting_{{$setting->id}}_form">
                                                <i class="fa fa-sm fa-edit p-0"></i>
                                            </button>
                                        </a>
                                        <a href="{{route('admin.deleteAdminSetting',['id'=>$setting->id])}}" 
                                        class="mx-auto mt-0 mb-2 px-2">
                                            <button class="btn btn-danger btn-sm" type="button">
                                                <i class="fa fa-sm fa-trash p-0"></i>
                                            </button>
                                        </a>
                                    </div>
                                    </div>
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
