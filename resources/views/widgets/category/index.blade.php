@switch($config['template'])
    @case('select')
        @include('widgets.category.template.select')
    @break
    @default
        @include('widgets.category.template.ol')
@endswitch
