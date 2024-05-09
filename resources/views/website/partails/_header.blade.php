@include('website.partails._header._top-header')

  @if(isset($sliders))
      @include('website.partails._header._middle-header')

  @else
      @include('website.partails._header._middle-header2')

  @endif

