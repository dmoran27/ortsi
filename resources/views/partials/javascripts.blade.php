{{-- Dependencies --}}

<script src="{{ url('adminlte/plugins/jQuery') }}/jquery-2.2.3.min.js"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
{{-- AdminLTE --}}
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
{{-- CK Editor --}}
<script src="{{ url('adminlte/plugins/ckeditor') }}/ckeditor.js"></script>

{{-- Vue --}}
<script src="{{ mix('/client/js/manifest.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ mix('/client/js/vendor.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ mix('/client/js/app.js') }}" type="text/javascript" charset="utf-8"></script>

@yield('javascript')
