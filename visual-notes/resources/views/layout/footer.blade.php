</div>


<script> var BASE_URL = '{{ url("/") }}'; </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    @foreach (getGlobalAssets('js') as $path)
        {!! sprintf('<script src="%s" data-navigate-once></script>', asset($path)) !!}
    @endforeach
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used by this page)-->
    @foreach (getVendors('js') as $path)
        {!! sprintf('<script src="%s" data-navigate-once></script>', asset($path)) !!}
    @endforeach
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(optional)-->
    @foreach (getCustomJs() as $path)
        {!! sprintf('<script src="%s" data-navigate-once></script>', asset($path)) !!}
    @endforeach
    <!--end::Custom Javascript-->
    @stack('scripts')
</body>

</html>
