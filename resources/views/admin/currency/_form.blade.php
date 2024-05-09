{{--Form Inputs--}}
    <x-text :name="'name'" :locale="$locale" :oldValue="$entity ?? null" :required="true"></x-text>

    @if($locale == 'en')
        <x-text :name="'code'" :locale="''" :oldValue="$entity ?? null" :required="true"></x-text>
        <x-text :name="'symbol'" :locale="''" :oldValue="$entity ?? null" :required="true"></x-text>
        <x-number :name="'rate'" decimal="true" :oldValue="$entity ?? null" :required="true"></x-number>
        <x-radio :name="'is_active'" :choices="getStatusVariables()" :oldValue="$entity ?? null"></x-radio>
        <x-switch-form :name="'use_api_rate'" :oldValue="$entity ?? null"></x-switch-form>
    @endif

{{--End Form Inputs--}}
