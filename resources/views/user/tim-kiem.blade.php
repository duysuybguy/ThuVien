@extends("user.layouts.app")
@section("title")
    <title>Tìm kiếm</title>
@endsection
@section("content")
    <div class="content" style="padding-top: 120px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row blog-grid-row">
                        <div class="col-12">
                            <h2>Kết quả tìm kiếm cho từ khóa <span
                                    style="color: blue">{{ app('request')->input('key') }}</span></h2>
                        </div>
                        @if(isset($list_tai_lieu)&&count($list_tai_lieu))

                            @foreach($list_tai_lieu as $tl)
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                                    <div class="blog grid-blog">
                                        <div class="blog-image">
                                            <a href="{{route('user.chiTietTaiLieu').'?postId='.$tl->id}}">
                                                <img class="img-fluid"
                                                     src="{{$tl->hinh_anh?$tl->hinh_anh:'assets/img/blog/blog-01.jpg'}}"
                                                     alt="Hình ảnh tài liệu">
                                                @if($tl->trang_thai!=1)
                                                    <div class="hetHan text-center" style="height: 100%;top:0">
                                                        <h2 style="color: red; margin-top: 55%; font-size: 3rem">Tạm
                                                            hết</h2>
                                                    </div>
                                                @endif
                                            </a>
                                        </div>
                                        <div class="blog-content">
                                            <ul class="entry-meta meta-item">
                                                <li>
                                                    <div class="post-author">
                                                        <div class="hien-1-dong">
                                                            <span>{{$tl->tac_gia}}</span></div>
                                                    </div>
                                                </li>
                                                <li>{{$tl->created_at}}</li>
                                            </ul>
                                            <h3 class="blog-title"><a
                                                    href="{{route('user.chiTietTaiLieu').'?postId='.$tl->id}}">{{$tl->ten_tai_lieu}}</a>
                                            </h3>
                                            {{--                                            <p class="mb-0">{{$tl->mo_ta}}</p>--}}
                                        </div>
                                    </div>
                                    <!-- /Blog Post -->
                                </div>
                            @endforeach

                            <div class="mt-2">
                                {{ $list_tai_lieu->appends(request()->query())->onEachSide(1)->links() }}
                            </div>
                        @else
                            <div class="text-center">
                                <h2 style="color: red">Không có kết quả phù hợp</h2>
                            </div>
                        @endif

                    </div>
                </div>
                <!-- Blog Sidebar -->
                @include('user.layouts.menu-right')
                <!-- /Blog Sidebar -->
            </div>
        </div>
    </div>
    @include('user.layouts.tai-lieu-lien-quan')
@endsection
@section("js_location")
@endsection
