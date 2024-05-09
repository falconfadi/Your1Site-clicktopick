<div class="grid-item {{$item->name}} " >
    <article class="post post-mask overlay-zoom br-sm mx-2" style=" border-radius: 50%;">
        <figure class="post-media">
            <a href="{{route('user.product-main-category',$item->slug)}}">

                <img onerror="this.src='{{asset('web/images/no-image.jpg')}}';"
                     src="{{storageImage($item->image)}}"
                     style="height:280px;width: 200px" alt="blog">
            </a>
        </figure>
        <div class="post-details">
            <div class="post-details-visible">
                <div class="post-cats">
                    <a href="{{route('user.product-main-category',$item->slug)}}">
                        {{$item->name}}</a>
                </div>
            </div>
        </div>
    </article>
</div>
