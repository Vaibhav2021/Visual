@extends('app')
@section('content')
    <div class="page-page">
        <div class="page-heading">
            <h4 class="mb-0 fw-semibold">All My Notes</h4>
            {{-- <div class="btn btn-dark-theme">
                <span class="material-symbols-outlined">
                    add
                </span>
                <span>
                    Create Notes
                </span> --}}
        </div>
        <div class="page-content">
            <div class="d-flex flex-wrap flex-md-nowrap justify-content-between align-items-start gap-40">
                <div class="max-width-1440">
                    <div class="d-flex gap-24 justify-content-between align-items-center w-100">
                        <div class="d-flex gap-24 justify-content-between align-items-center">
                            <div class="search-360">
                                <div class="has-right position-relative">
                                    <input type="text" placeholder="Seach" class="form-control">
                                    <span class="material-symbols-outlined position-absolute search-absolute-btn">
                                        search
                                    </span>
                                </div>
                            </div>
                            <div class="select-tag-240">
                                <select class="js-example-basic-single form-control" name="state">
                                    <option value="AL" selected>Search by tags</option>
                                    <option value="AL">Search by tags</option>
                                    ...
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="btn btn-dark-theme">
                            <span class="material-symbols-outlined">
                                add
                            </span>
                            <span>
                                Create Notes
                            </span>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap flex-md-nowrap gap-24 justify-content-between align-items-center mt-32 w-100">
                        <div class="card card-shadow border-0 bg-white p-4 max-width-510 min-width-340">
                            <div class="d-flex justify-content-start align-items-start flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h5 class="mb-0">Lorem Ipsum porus gypsum tipsum sipam sadsad </h5>
                                    <div
                                        class="box-24 bg-theme d-flex justify-content-center align-items-center rounded p-1">
                                        <span class="material-symbols-outlined ">
                                            more_vert
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <h6 class="mb-0 fs-7 fw-medium">Nov 06, 2023 </h6>
                                    <span
                                        class="badge badge-theme rounded-5px text-color fw-medium fs-7 p-1">Spiritual</span>
                                </div>

                                <div
                                    class="d-flex justify-content-start align-items-center gap-3 mt-2 text-decoration-underline">
                                    <h6 class="mb-0 fs-7 fw-medium">https://youtube.com/in/asdas-asdasdq?asdsadasasdasdsad
                                    </h6>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            02:36
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            05:22
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            07:38
                                        </span>
                                    </span>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <h6 class="mb-0 fs-7 fw-medium text-el">Lorem ipsum dolor sit amet consectetur. At ante
                                        eu ligula auctor magna dignissim amet eu. Morbi elementum tortor facilisi gravida.
                                        Sapien donec metus ultrices id ut eleifend urna. Et at fringilla in elementum quam
                                        adipiscing. Vulputate sollicitudin sed vitae tristique turpis aliquet faucibus
                                        faucibus fringilla. Ante amet integer nullam duis in id.
                                        Amet sed tellus vestibulum gravida. Adipiscing eget ac hendrerit quis mi. Nisl
                                        libero ultrices massa mus in metus risus at rutrum. Aliquet urna ac velit nisl
                                        molestie purus. Ut quam dictumst vivamus blandit proin lacus morbi adipiscing
                                        aliquam.
                                        Dui est vel metus enim nam elementum eget. Consectetur viverra nibh semper quis sit
                                        fames penatibus pharetra. Magna quam vel adipiscing amet vel facilisi cursus mattis
                                        eu. Platea amet leo sollicitudin vivamus. In eget eget vitae ut sed tincidunt velit
                                        nam ut.
                                    </h6>
                                </div>

                                <div class="hr"></div>

                                <div class="d-flex justify-content-between align-items-center gap-3 mt-10 w-100">
                                    <div class="flex user-group">
                                        <img src="{{ asset('assets/images/user-1.png') }}" class="img-fluid box-40"
                                            alt="">
                                        <img src="{{ asset('assets/images/user-2.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                        <img src="{{ asset('assets/images/user-3.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                    </div>


                                    <div class="d-flex gap-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-7 text-color-secondary fw-medium">Comment</span>
                                            <div class="rounded-pill border-0 position-relative">
                                                <div
                                                    class="badge bg-theme d-flex justify-content-center align-items-center rounded-pill box-32 text-color">
                                                    1</div>
                                                <span
                                                    class="position-absolute top--4 start-100 translate-middle badge rounded-pill bg-danger">
                                                    2
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="box-40 bg-theme d-flex justify-content-center align-items-center rounded-circle p-10">
                                            <span class="material-symbols-outlined ">
                                                share
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card card-shadow border-0 bg-white p-4 max-width-510 min-width-340">
                            <div class="d-flex justify-content-start align-items-start flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h5 class="mb-0">Lorem Ipsum porus gypsum tipsum sipam sadsad </h5>
                                    <div
                                        class="box-24 bg-theme d-flex justify-content-center align-items-center rounded p-1">
                                        <span class="material-symbols-outlined ">
                                            more_vert
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <h6 class="mb-0 fs-7 fw-medium">Nov 06, 2023 </h6>
                                    <span class="badge badge-theme rounded-5px text-color fw-medium fs-7 p-1">Family
                                        Life</span>
                                </div>

                                <div
                                    class="d-flex justify-content-start align-items-center gap-3 mt-2 text-decoration-underline">
                                    <h6 class="mb-0 fs-7 fw-medium">https://youtube.com/in/asdas-asdasdq?asdsadasasdasdsad
                                    </h6>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            02:36
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            05:22
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            07:38
                                        </span>
                                    </span>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <h6 class="mb-0 fs-7 fw-medium text-el">Lorem ipsum dolor sit amet consectetur. At ante
                                        eu ligula auctor magna dignissim amet eu. Morbi elementum tortor facilisi gravida.
                                        Sapien donec metus ultrices id ut eleifend urna. Et at fringilla in elementum quam
                                        adipiscing. Vulputate sollicitudin sed vitae tristique turpis aliquet faucibus
                                        faucibus fringilla. Ante amet integer nullam duis in id.
                                        Amet sed tellus vestibulum gravida. Adipiscing eget ac hendrerit quis mi. Nisl
                                        libero ultrices massa mus in metus risus at rutrum. Aliquet urna ac velit nisl
                                        molestie purus. Ut quam dictumst vivamus blandit proin lacus morbi adipiscing
                                        aliquam.
                                        Dui est vel metus enim nam elementum eget. Consectetur viverra nibh semper quis sit
                                        fames penatibus pharetra. Magna quam vel adipiscing amet vel facilisi cursus mattis
                                        eu. Platea amet leo sollicitudin vivamus. In eget eget vitae ut sed tincidunt velit
                                        nam ut.
                                    </h6>
                                </div>

                                <div class="hr"></div>

                                <div class="d-flex justify-content-between align-items-center gap-3 mt-10 w-100">
                                    <div class="flex user-group">
                                        <img src="{{ asset('assets/images/user-1.png') }}" class="img-fluid box-40"
                                            alt="">
                                        <img src="{{ asset('assets/images/user-2.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                        <img src="{{ asset('assets/images/user-3.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                    </div>


                                    <div class="d-flex gap-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-7 text-color-secondary fw-medium">Comment</span>
                                            <div class="rounded-pill border-0 position-relative">
                                                <div
                                                    class="badge bg-theme d-flex justify-content-center align-items-center rounded-pill box-32 text-color">
                                                    1</div>
                                                <span
                                                    class="position-absolute top--4 start-100 translate-middle badge rounded-pill bg-danger">
                                                    2
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="box-40 bg-theme d-flex justify-content-center align-items-center rounded-circle p-10">
                                            <span class="material-symbols-outlined ">
                                                share
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card card-shadow border-0 bg-white p-4 max-width-510 min-width-340">
                            <div class="d-flex justify-content-start align-items-start flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h5 class="mb-0">Lorem Ipsum porus gypsum tipsum sipam sadsad </h5>
                                    <div
                                        class="box-24 bg-theme d-flex justify-content-center align-items-center rounded p-1">
                                        <span class="material-symbols-outlined ">
                                            more_vert
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <h6 class="mb-0 fs-7 fw-medium">Nov 06, 2023 </h6>
                                    <span class="badge badge-theme rounded-5px text-color fw-medium fs-7 p-1">Family
                                        Life</span>
                                </div>

                                <div
                                    class="d-flex justify-content-start align-items-center gap-3 mt-2 text-decoration-underline">
                                    <h6 class="mb-0 fs-7 fw-medium">https://youtube.com/in/asdas-asdasdq?asdsadasasdasdsad
                                    </h6>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            02:36
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            05:22
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            07:38
                                        </span>
                                    </span>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <h6 class="mb-0 fs-7 fw-medium text-el">Lorem ipsum dolor sit amet consectetur. At ante
                                        eu ligula auctor magna dignissim amet eu. Morbi elementum tortor facilisi gravida.
                                        Sapien donec metus ultrices id ut eleifend urna. Et at fringilla in elementum quam
                                        adipiscing. Vulputate sollicitudin sed vitae tristique turpis aliquet faucibus
                                        faucibus fringilla. Ante amet integer nullam duis in id.
                                        Amet sed tellus vestibulum gravida. Adipiscing eget ac hendrerit quis mi. Nisl
                                        libero ultrices massa mus in metus risus at rutrum. Aliquet urna ac velit nisl
                                        molestie purus. Ut quam dictumst vivamus blandit proin lacus morbi adipiscing
                                        aliquam.
                                        Dui est vel metus enim nam elementum eget. Consectetur viverra nibh semper quis sit
                                        fames penatibus pharetra. Magna quam vel adipiscing amet vel facilisi cursus mattis
                                        eu. Platea amet leo sollicitudin vivamus. In eget eget vitae ut sed tincidunt velit
                                        nam ut.
                                    </h6>
                                </div>

                                <div class="hr"></div>

                                <div class="d-flex justify-content-between align-items-center gap-3 mt-10 w-100">
                                    <div class="flex user-group">
                                        <img src="{{ asset('assets/images/user-1.png') }}" class="img-fluid box-40"
                                            alt="">
                                        <img src="{{ asset('assets/images/user-2.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                        <img src="{{ asset('assets/images/user-3.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                    </div>


                                    <div class="d-flex gap-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-7 text-color-secondary fw-medium">Comment</span>
                                            <div class="rounded-pill border-0 position-relative">
                                                <div
                                                    class="badge bg-theme d-flex justify-content-center align-items-center rounded-pill box-32 text-color">
                                                    1</div>
                                                <span
                                                    class="position-absolute top--4 start-100 translate-middle badge rounded-pill bg-danger">
                                                    2
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="box-40 bg-theme d-flex justify-content-center align-items-center rounded-circle p-10">
                                            <span class="material-symbols-outlined ">
                                                share
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-wrap flex-md-nowrap gap-24 justify-content-between align-items-center w-100 mt-4">
                        <div class="card card-shadow border-0 bg-white p-4 max-width-510 min-width-340">
                            <div class="d-flex justify-content-start align-items-start flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h5 class="mb-0">Lorem Ipsum porus gypsum tipsum sipam sadsad </h5>
                                    <div
                                        class="box-24 bg-theme d-flex justify-content-center align-items-center rounded p-1">
                                        <span class="material-symbols-outlined ">
                                            more_vert
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <h6 class="mb-0 fs-7 fw-medium">Nov 06, 2023 </h6>
                                    <span
                                        class="badge badge-theme rounded-5px text-color fw-medium fs-7 p-1">Spiritual</span>
                                </div>

                                <div
                                    class="d-flex justify-content-start align-items-center gap-3 mt-2 text-decoration-underline">
                                    <h6 class="mb-0 fs-7 fw-medium">https://youtube.com/in/asdas-asdasdq?asdsadasasdasdsad
                                    </h6>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            02:36
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            05:22
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            07:38
                                        </span>
                                    </span>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <h6 class="mb-0 fs-7 fw-medium text-el">Lorem ipsum dolor sit amet consectetur. At ante
                                        eu ligula auctor magna dignissim amet eu. Morbi elementum tortor facilisi gravida.
                                        Sapien donec metus ultrices id ut eleifend urna. Et at fringilla in elementum quam
                                        adipiscing. Vulputate sollicitudin sed vitae tristique turpis aliquet faucibus
                                        faucibus fringilla. Ante amet integer nullam duis in id.
                                        Amet sed tellus vestibulum gravida. Adipiscing eget ac hendrerit quis mi. Nisl
                                        libero ultrices massa mus in metus risus at rutrum. Aliquet urna ac velit nisl
                                        molestie purus. Ut quam dictumst vivamus blandit proin lacus morbi adipiscing
                                        aliquam.
                                        Dui est vel metus enim nam elementum eget. Consectetur viverra nibh semper quis sit
                                        fames penatibus pharetra. Magna quam vel adipiscing amet vel facilisi cursus mattis
                                        eu. Platea amet leo sollicitudin vivamus. In eget eget vitae ut sed tincidunt velit
                                        nam ut.
                                    </h6>
                                </div>

                                <div class="hr"></div>

                                <div class="d-flex justify-content-between align-items-center gap-3 mt-10 w-100">
                                    <div class="flex user-group">
                                        <img src="{{ asset('assets/images/user-1.png') }}" class="img-fluid box-40"
                                            alt="">
                                        <img src="{{ asset('assets/images/user-2.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                        <img src="{{ asset('assets/images/user-3.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                    </div>


                                    <div class="d-flex gap-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-7 text-color-secondary fw-medium">Comment</span>
                                            <div class="rounded-pill border-0 position-relative">
                                                <div
                                                    class="badge bg-theme d-flex justify-content-center align-items-center rounded-pill box-32 text-color">
                                                    1</div>
                                                <span
                                                    class="position-absolute top--4 start-100 translate-middle badge rounded-pill bg-danger">
                                                    2
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="box-40 bg-theme d-flex justify-content-center align-items-center rounded-circle p-10">
                                            <span class="material-symbols-outlined ">
                                                share
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card card-shadow border-0 bg-white p-4 max-width-510 min-width-340">
                            <div class="d-flex justify-content-start align-items-start flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h5 class="mb-0">Lorem Ipsum porus gypsum tipsum sipam sadsad </h5>
                                    <div
                                        class="box-24 bg-theme d-flex justify-content-center align-items-center rounded p-1">
                                        <span class="material-symbols-outlined ">
                                            more_vert
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <h6 class="mb-0 fs-7 fw-medium">Nov 06, 2023 </h6>
                                    <span class="badge badge-theme rounded-5px text-color fw-medium fs-7 p-1">Family
                                        Life</span>
                                </div>

                                <div
                                    class="d-flex justify-content-start align-items-center gap-3 mt-2 text-decoration-underline">
                                    <h6 class="mb-0 fs-7 fw-medium">https://youtube.com/in/asdas-asdasdq?asdsadasasdasdsad
                                    </h6>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            02:36
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            05:22
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            07:38
                                        </span>
                                    </span>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <h6 class="mb-0 fs-7 fw-medium text-el">Lorem ipsum dolor sit amet consectetur. At ante
                                        eu ligula auctor magna dignissim amet eu. Morbi elementum tortor facilisi gravida.
                                        Sapien donec metus ultrices id ut eleifend urna. Et at fringilla in elementum quam
                                        adipiscing. Vulputate sollicitudin sed vitae tristique turpis aliquet faucibus
                                        faucibus fringilla. Ante amet integer nullam duis in id.
                                        Amet sed tellus vestibulum gravida. Adipiscing eget ac hendrerit quis mi. Nisl
                                        libero ultrices massa mus in metus risus at rutrum. Aliquet urna ac velit nisl
                                        molestie purus. Ut quam dictumst vivamus blandit proin lacus morbi adipiscing
                                        aliquam.
                                        Dui est vel metus enim nam elementum eget. Consectetur viverra nibh semper quis sit
                                        fames penatibus pharetra. Magna quam vel adipiscing amet vel facilisi cursus mattis
                                        eu. Platea amet leo sollicitudin vivamus. In eget eget vitae ut sed tincidunt velit
                                        nam ut.
                                    </h6>
                                </div>

                                <div class="hr"></div>

                                <div class="d-flex justify-content-between align-items-center gap-3 mt-10 w-100">
                                    <div class="flex user-group">
                                        <img src="{{ asset('assets/images/user-1.png') }}" class="img-fluid box-40"
                                            alt="">
                                        <img src="{{ asset('assets/images/user-2.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                        <img src="{{ asset('assets/images/user-3.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                    </div>


                                    <div class="d-flex gap-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-7 text-color-secondary fw-medium">Comment</span>
                                            <div class="rounded-pill border-0 position-relative">
                                                <div
                                                    class="badge bg-theme d-flex justify-content-center align-items-center rounded-pill box-32 text-color">
                                                    1</div>
                                                <span
                                                    class="position-absolute top--4 start-100 translate-middle badge rounded-pill bg-danger">
                                                    2
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="box-40 bg-theme d-flex justify-content-center align-items-center rounded-circle p-10">
                                            <span class="material-symbols-outlined ">
                                                share
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="card card-shadow border-0 bg-white p-4 max-width-510 min-width-340">
                            <div class="d-flex justify-content-start align-items-start flex-column gap-2">
                                <div class="d-flex justify-content-between align-items-center gap-3">
                                    <h5 class="mb-0">Lorem Ipsum porus gypsum tipsum sipam sadsad </h5>
                                    <div
                                        class="box-24 bg-theme d-flex justify-content-center align-items-center rounded p-1">
                                        <span class="material-symbols-outlined ">
                                            more_vert
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3">
                                    <h6 class="mb-0 fs-7 fw-medium">Nov 06, 2023 </h6>
                                    <span class="badge badge-theme rounded-5px text-color fw-medium fs-7 p-1">Family
                                        Life</span>
                                </div>

                                <div
                                    class="d-flex justify-content-start align-items-center gap-3 mt-2 text-decoration-underline">
                                    <h6 class="mb-0 fs-7 fw-medium">https://youtube.com/in/asdas-asdasdq?asdsadasasdasdsad
                                    </h6>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            02:36
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            05:22
                                        </span>
                                    </span>
                                    <span
                                        class="badge video-timeslap-bg d-flex justify-content-between align-items-center rounded-12 gap-1">
                                        <span class="material-symbols-outlined text-color fs-6">
                                            timelapse
                                        </span>
                                        <span class="text-color">
                                            07:38
                                        </span>
                                    </span>
                                </div>

                                <div class="d-flex justify-content-start align-items-center gap-3 mt-2">
                                    <h6 class="mb-0 fs-7 fw-medium text-el">Lorem ipsum dolor sit amet consectetur. At ante
                                        eu ligula auctor magna dignissim amet eu. Morbi elementum tortor facilisi gravida.
                                        Sapien donec metus ultrices id ut eleifend urna. Et at fringilla in elementum quam
                                        adipiscing. Vulputate sollicitudin sed vitae tristique turpis aliquet faucibus
                                        faucibus fringilla. Ante amet integer nullam duis in id.
                                        Amet sed tellus vestibulum gravida. Adipiscing eget ac hendrerit quis mi. Nisl
                                        libero ultrices massa mus in metus risus at rutrum. Aliquet urna ac velit nisl
                                        molestie purus. Ut quam dictumst vivamus blandit proin lacus morbi adipiscing
                                        aliquam.
                                        Dui est vel metus enim nam elementum eget. Consectetur viverra nibh semper quis sit
                                        fames penatibus pharetra. Magna quam vel adipiscing amet vel facilisi cursus mattis
                                        eu. Platea amet leo sollicitudin vivamus. In eget eget vitae ut sed tincidunt velit
                                        nam ut.
                                    </h6>
                                </div>

                                <div class="hr"></div>

                                <div class="d-flex justify-content-between align-items-center gap-3 mt-10 w-100">
                                    <div class="flex user-group">
                                        <img src="{{ asset('assets/images/user-1.png') }}" class="img-fluid box-40"
                                            alt="">
                                        <img src="{{ asset('assets/images/user-2.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                        <img src="{{ asset('assets/images/user-3.png') }}"
                                            class="img-fluid box-40 user-group-img" alt="">
                                    </div>


                                    <div class="d-flex gap-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="fs-7 text-color-secondary fw-medium">Comment</span>
                                            <div class="rounded-pill border-0 position-relative">
                                                <div
                                                    class="badge bg-theme d-flex justify-content-center align-items-center rounded-pill box-32 text-color">
                                                    1</div>
                                                <span
                                                    class="position-absolute top--4 start-100 translate-middle badge rounded-pill bg-danger">
                                                    2
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="box-40 bg-theme d-flex justify-content-center align-items-center rounded-circle p-10">
                                            <span class="material-symbols-outlined ">
                                                share
                                            </span>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
