@switch($config['template'])
    @case('select')

    @break
    @default
        @include('widgets.category.template.ol')
@endswitch
