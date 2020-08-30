<div class="v2_bnc_news_page_list">
    <article>
        <ul class="v2_bnc_news_list">
            @foreach($posts as $post)
            <li style="width: 100%;" class="v2_bnc_news_list_item row">
                <div class="v2_bnc_news_list_img col-md-12"><a
                        href="{{ route('portal.post.detail',['slug' => $post->slug]) }}" class="thumbnail_img"
                        title="{{ @$post->title }}"><img
                            src="{{ asset(@$post->thumbnail) }}"
                            alt="{{ @$post->title }}" class="img-responsive"></a></div>
                <div class="v2_bnc_news_list_details col-md-12"><h3><a
                            href="{{ route('portal.post.detail',['slug' => $post->slug]) }}"
                            title="{{ @$post->title }}">{{ @$post->title }}</a></h3>
                    <time class="v2_bnc_create_time"><i class="fa fa-calendar-o"></i> Ngày đăng : {{ @$post->created_at_display }}
                    </time>
                    <div class="v2_bnc_news_list_summary">
                    </div>
                    <div class="v2_bnc_news_list_readmore"><a
                            href="{{ route('portal.post.detail',['slug' => $post->slug]) }}">Đọc thêm...</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </article>
    <div class="clearfix"></div>
    <div class="v2_bnc_pagination">
        <div class="row">
            <div class="col-md-6"><p class="v2_bnc_pagination_title"> Hiển thị từ<strong>1 </strong>
                    đến<strong>10 </strong> trên<strong>13 </strong> bản ghi - Trang số<strong>1 </strong>
                    trên<strong>2 </strong> trang</p></div>
            <div class="v2_bnc_pagination_button text-right col-md-6">
                <ul class="pagination">
                    <li class="disabled"><a> ← </a></li>
                    <li class="disabled"><a>Trước</a></li>
                    <li class="active"><a>1</a></li>
                    <li><a href="/goc-tu-van_p2">2</a></li>
                    <li><a href="/goc-tu-van_p2"> Sau </a></li>
                    <li><a href="/goc-tu-van_p2">→</a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
