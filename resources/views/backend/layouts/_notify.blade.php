{{-----------------

    View blade error notification

-----------------}}

@if (Request::route()->getName() != 'admin.login' && Session::has('errors'))

    <script type="text/javascript">
        $(document).ready(function() {
           'use strict';
           $.notify('{{ Session::get('errors')->first() }}', 'error');
        });
    </script>

@endif


{{-----------------

    View blade success notification

-----------------}}

@if (Session::has('success'))

    <script type="text/javascript">
        $(document).ready(function() {
            'use strict';
            $.notify('{{ Session::get('success') }}', 'success');
        });
    </script>

@endif

