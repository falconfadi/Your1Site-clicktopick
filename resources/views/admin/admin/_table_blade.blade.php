<!--begin::Advance Table Widget 3-->
<div class="card card-custom gutter-b shadow-lg mt-10">
    <!--begin::Header-->
    <div class="card-header border-0 py-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label font-weight-bolder text-dark">{{ __('admin.all_'.plural($item)) }}</span>
        </h3>
        @can('add '.plural($item))
            <div class="card-toolbar">
                <a href="{{ route('admin.'.plural($item).'.create') }}" class="btn btn-primary font-weight-bolder font-size-sm">
                    <i class="fas fa-plus-circle"></i>{{ __('admin.new_'.$item) }}</a>
            </div>
        @endcan
    </div>
    <!--end::Header-->
    <!--begin::Body-->
    <div class="card-body pt-0 pb-3">
        <!--begin::Table-->
        <div class="table-responsive">
            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                <thead>
                <tr class="text-uppercase">
                    <th style="min-width: 150px" class="pl-7">
                        <span class="text-dark-75">{{ __('admin.'.plural($item)) }}</span>
                    </th>
                    <th class="text-center" style="min-width: 100px">{{ __('admin.username') }}</th>
                    <th class="text-center" style="min-width: 100px">{{ __('admin.email') }}</th>
                    <th class="text-center" style="min-width: 100px">{{ __('admin.status') }}</th>
                    <th class="text-center" style="min-width: 100px">{{ __('admin.roles') }}</th>
                    <th class="text-center" style="min-width: 120px">{{ __('admin.actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @include('admin.'.$item.'._gridFilter')
                @foreach($admins as $key => $admin)
                    <tr>
                        <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 flex-shrink-0 mr-2">
                                    <div class="symbol-label" style="background-image: url({{ $admin->avatar ? storageImage($admin->avatar) : asset('assets/media/svg/icons/General/User.svg') }})"></div>
                                </div>
                                <div>
                                    <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 ml-3 font-size-lg">{{ $admin->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $admin->username }}</span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $admin->email }}</span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg"><span class="label label-lg label-inline label-light-{{ $admin->status ? 'success' : 'danger' }} mr-2">{{ $admin->status ? __('admin.active') : __('admin.inactive') }}</span></span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">
                                    @foreach($admin->roles as $role)
                                     <div>{{ $role->name }}</div>
                                    @endforeach
                            </span>
                        </td>
                        <td class="text-center pr-0">
                            @can('edit '.plural($item))
                                <a href="{{ action('App\Http\Controllers\Admin\\'.toTitle($item).'Controller@edit', ['admin' => $admin]) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-2" data-toggle="tooltip" title="{{ __('admin.edit') }}">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
                                        {{ getSVG('assets/media/svg/icons/Communication/Write.svg') }}
                                    </span>
                                </a>
                            @endcan
                            @can('delete '.plural($item))
                                <a href="javascript:void(0);" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-2 deleteRow" data-toggle="tooltip" title="{{ __('admin.delete') }}">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                    {{ getSVG('assets/media/svg/icons/General/Trash.svg') }}
                                </span>
                                    <form method="post" action="{{ action('App\Http\Controllers\Admin\\'.toTitle($item).'Controller@destroy', ['admin' => $admin]) }}">
                                        @method('DELETE')
                                        @csrf
                                    </form>
                                </a>
                            @endcan
                            <a href="{{ action('App\Http\Controllers\Admin\\'.toTitle($item).'Controller@show', ['admin' => $admin]) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-2" data-toggle="tooltip" title="{{ __('admin.show') }}">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                {{ getSVG('assets/media/svg/icons/Navigation/Arrow-right.svg') }}
                                </span>
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $admins->appends(request()->query())->links() }}
        </div>
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 3-->
