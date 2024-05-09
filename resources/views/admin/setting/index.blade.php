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
                  <div class="card my-1 p-2">
                    <div class="card-body d-flex justify-content-around pb-0 pt-4">
                        <p class="text-lg text-muted w-100 px-1"> Setting Value
                          <input type="text" name="setting_key" class="form-control" placeholder="Setting Key">
                        </p>
                        <p class="text-lg text-muted w-100 px-1">Setting value : 
                          <input type="text" name="setting_value" class="form-control" placeholder="Setting Value">
                        </p>                      
                    </div>
                    <button class="btn btn-success btn-sm w-50 mx-auto mt-0 mb-2 px-2" type="submit">
                      {{__('admin.create')}}
                    </button>
                  </div>
                </form>
                <br>
                <hr>
                @forelse ($admin_settings as $setting)
                    <div class="card my-1 p-2">
                      <div class="card-body d-flex justify-content-around pb-0 pt-4">
                          <p class="text-lg  w-100 px-1"> Setting Key :  {{$setting->setting_key}}
                          </p>
                          <p class="text-lg  w-100 px-1">Setting value : {{$setting->setting_value}}
                          </p>                      
                      </div>
                      <a href="{{route('admin.deleteAdminSetting',['id'=>$setting->id])}}" 
                        class="mx-auto mt-0 mb-2 px-2 w-50">
                        <button class="btn btn-danger btn-sm w-100 ">
                          {{__('admin.delete')}}
                        </button>
                      </a>
                    </div>
                    {{-- <div class="card my-1">
                      <div class="card-body ">
                        <div class="d-flex">
                          <p>Setting key : {{$setting->setting_key}}</p>
                        </div>
                        <div class="d-flex">
                          <p>Setting value : {{$setting->setting_value}}</p>
                        </div>
                        <a href="{{route('admin.deleteAdminSetting',['id'=>$setting->id])}}">
                          <button class="btn btn-danger btn-sm w-50 mx-auto">
                            {{__('admin.delete')}}
                          </button>
                        </a>
                      </div>
                      
                    </div> --}}
                @empty
                    <h4 class="alert">There is no setting.</h4>
                @endforelse
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
