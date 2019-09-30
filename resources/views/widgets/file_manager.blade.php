
{{------------------------------

    File Manager widget view

------------------------------}}

<div class='img-preview'>
    <img
        id='{{ $config['preview'] }}'
        src='{{ !empty($config['value']) ? asset($config['value']) : asset('backend/images/nophoto.png') }}'
    />
</div>
<div class='input-group' data-upload='{{ $config['data-upload'] }}' data-input='{{ $config['name'] }}' data-preview='{{ $config['preview'] }}'>
    <input
        type='text'
        id='{{ $config['name'] }}'
        name='{{ $config['name'] }}'
        value='{{ $config['value'] }}'
        data-rule-required='{{ $config['data-rule-required'] }}'
        data-msg-required='{{ $config['data-msg-required'] }}'
        class='form-control'
        readonly
    />
    <span class='input-group-append'>
        <button type='button' class='btn btn-primary btn-rounded input-group-text'>
            <i class='fa fa-picture-o'></i> {{ $config['browse'] }}
        </button>
    </span>
</div>

@if (!empty($config['data-rule-required']) && $config['data-rule-required'] == 'true')
    <label id='{{ $config['name'] }}-error' class='error' for='{{ $config['name'] }}'></label>
@endif
