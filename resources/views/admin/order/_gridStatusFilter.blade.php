{{--Gird Filters--}}

<form action="{{ route('admin.'.plural($item).'.index') }}" method="GET">
	<div class="mb-7">
		<div class="row align-items-center">
			<div class="col-lg-9 col-xl-8">
				<div class="row align-items-center">
                    <div class="col-md-4">
                        <div class="row align-items-center">
                            <label class="col-md-3 col-form-label text-center p-0">{{__($item.'.from_date')}}</label>
                            <div class="col-md-9 p-0">
                                <input class="form-control form-control-lg form-control-solid"
                                       name="from_date"
                                       value="{{request()->query('from_date')}}"
                                       type="date" id="kt_datatable_search_from_date"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row align-items-center">
                            <label class="col-md-3 col-form-label text-center p-0">{{__($item.'.to_date')}}</label>
                            <div class="col-md-9 p-0 pr-2">
                                <input class="form-control form-control-lg form-control-solid"
                                       name="to_date"
                                       value="{{request()->query('to_date')}}"
                                       type="date" id="kt_datatable_search_to_date"/>
                            </div>
                        </div>
                    </div>

				</div>
			</div>

            <div class="float-right text-right col-lg-3 mt-5 mt-lg-0">
                <a style="white-space: nowrap;" href="{{ route('admin.'.plural($item).'.index') }}" class="btn btn-light-primary px-6 font-weight-bold">{{ __('admin.reset') }}</a>
            </div>

		</div>
	</div>
</form>
{{--End Gird Filters--}}
