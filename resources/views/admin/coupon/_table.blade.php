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
            <table class="table table-checkable table-head-custom table-head-bg table-borderless table-vertical-center">
                @include('admin.'.$item.'._gridFilter')
                <thead>

                <tr class="text-uppercase">
                    <th style="min-width: 150px" class="pl-7">
                        <span class="text-dark-75">{{ __('admin.'.plural($item)) }}</span>
                    </th>
                    <th class="text-center" style="min-width: 120px">{{ __('coupon.code') }}</th>
                    <th class="text-center" style="min-width: 120px">{{ __('coupon.coupon_value') }}</th>
                    <th class="text-center" style="min-width: 120px">{{ __('coupon.start_date') }}</th>
                    <th class="text-center" style="min-width: 120px">{{ __('coupon.end_date') }}</th>
                    <th class="text-center" style="min-width: 120px">{{ __('coupon.min_amount') }}</th>
                    <th class="text-center" style="min-width: 120px">{{ __('coupon.max_amount') }}</th>
                    <th class="text-center" style="min-width: 120px"></th>
                </tr>
                </thead>
                <tbody>


                @forelse($coupons as $key => $row)
                    <tr>
                        <td class="pl-0 py-8">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-50 flex-shrink-0 mr-2">
                                        <i class="fa fa-caret-right" style="color: #F64E60;"></i>
                                </div>
                                <div>
                                    <a href="#" class="text-center text-dark-75 font-weight-bolder text-hover-primary mb-1 ml-3 font-size-lg">{{ $row->name }}</a>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row->code }}</span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row->coupon_value }}</span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row->start_date }}</span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row->end_date }}</span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row->min_amount }}</span>
                        </td>
                        <td>
                            <span class="text-center text-dark-75 font-weight-bolder d-block font-size-lg">{{ $row->max_amount }}</span>
                        </td>
                        <td class="text-center pr-0">

                            @can('edit '.plural($item))
                            <a href="{{ action('App\Http\Controllers\Admin\\'.toTitle($item).'Controller@edit', ['coupon' => $row]) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-2" data-toggle="tooltip" title="{{__('admin.edit')}}">
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
                                <form method="post" action="{{ action('App\Http\Controllers\Admin\\'.toTitle($item).'Controller@destroy', ['coupon' => $row]) }}">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </a>
                            @endcan
                            <a href="{{ action('App\Http\Controllers\Admin\\'.toTitle($item).'Controller@show', ['coupon' => $row]) }}" class="btn btn-icon btn-light btn-hover-primary btn-sm" data-toggle="tooltip" title="{{ __('admin.show') }}">
                                <span class="svg-icon svg-icon-md svg-icon-primary">
                                    {{ getSVG('assets/media/svg/icons/Navigation/Arrow-right.svg') }}
                                </span>
                            </a>

                        </td>
                    </tr>
                @empty
                    <tr class=""><td class="text-center"> no records yet </td></tr>
                @endforelse
                </tbody>
            </table>
            {{ $coupons->appends(request()->query())->links() }}
        <!--end::Table-->
    </div>
    <!--end::Body-->
</div>
<!--end::Advance Table Widget 3-->
