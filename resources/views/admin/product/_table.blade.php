<!--begin::Advance Table Widget 3-->
<div class="card card-custom gutter-b shadow-lg mt-10">
	<!--begin::Header-->
	<div class="card-header border-0 py-5">
		<h3 class="card-title align-items-start flex-column">
            @if(!isset($mostSell))
                <span class="card-label font-weight-bolder text-dark">{{ __('admin.all_'.plural($item)) }}</span>
            @else
                <span class="card-label font-weight-bolder text-dark">{{ __('admin.most_sell_products') }}</span>
            @endif
		</h3>
        @can('add '.plural($item))
		<div class="card-toolbar">
			<a href="{{ route('admin.'.plural($item).'.create') }}"
                class="btn btn-primary font-weight-bolder font-size-sm">
				<i class="fas fa-plus-circle"></i> 
				{{ __('admin.new_'.$item) }}
			</a>
		</div>
        @endcan
	</div>
	<!--end::Header-->
	<!--begin::Body-->
	<div class="card-body pt-0 pb-3">
		<!--begin::Table-->
		<div class="">
            @include('admin.'.$item.'._gridFilter')
            <div class="datatable datatable-bordered datatable-head-custom"
                 id="kt_datatable" data-locale="{{app()->getLocale()}}" data-url="{{ route('admin.datatables.getProducts') }}">
            </div>
		</div>
		<!--end::Table-->
	</div>
	<!--end::Body-->
</div>
<!--end::Advance Table Widget 3-->
