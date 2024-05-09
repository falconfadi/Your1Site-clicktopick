{{--Form Inputs--}}
<x-text :name="'name'" :required="false" :locale="$locale" :oldValue="$entity ?? null" :required="true"></x-text>
<x-rich-text-box :name="'description'" :locale="$locale" :oldValue="$entity ?? null"></x-rich-text-box>

    @if($locale == 'en')
        <x-text :name="'sku'" :required="false"  :locale="''" :required="true" :oldValue="$entity ?? null"></x-text>
        <x-number :name="'price'" decimal="true" :locale="''" :required="true"  :oldValue="$entity ?? null"></x-number>
        <x-number :name="'capital_price'" decimal="true" :locale="''" :required="true"  :oldValue="$entity ?? null"></x-number>
        <x-number :name="'price_before_discount'" decimal="true" :locale="''" :required="true"  :oldValue="$entity ?? null"></x-number>
        <x-number :name="'sort_order'" decimal="false" :required="false" :required="true" :oldValue="$entity ?? null"></x-number>
        <x-number :name="'quantity'" decimal="false" :required="false" :oldValue="$entity ?? null"></x-number>
        <x-select displayName="name" :name="'category'" :locale="$locale" :required="true" :options="getSubCategories()" :oldValue="$entity->category ?? null"  ></x-select>
{{--        <div id="attributes" data-url="{{route('admin.getCategoryAttributes')}}" data-product="{{ isset($entity) ? $entity->id : 0}}">--}}
{{--            @if($entity && $entity->attributes->isNotEmpty())--}}
{{--                @forelse($entity->attributes as $attribute)--}}
{{--                    {{ renderAttributeInput($attribute, $attribute->pivot->value) }}--}}
{{--                @empty--}}
{{--                    attributes--}}
{{--                @endforelse--}}
{{--            @endif--}}
{{--        </div>--}}
        <x-radio :name="'status'" :choices="getStatusVariables()" :oldValue="$entity ?? null"></x-radio>

        <x-image-dropify  :name="'featured_image'" :required="true" :oldValue="$entity ?? null"></x-image-dropify>
        <x-image-dropify  :name="'images'" :required="true" :multiple="true" :oldValue="$entity ?? null"></x-image-dropify>


        <x-slot name="richTextBoxScript"></x-slot>
        <x-slot name="colorScript"></x-slot>
    @endif
{{--End Form Inputs--}}
