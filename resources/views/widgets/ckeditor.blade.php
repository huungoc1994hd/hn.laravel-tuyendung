{{------------------------------

    Ckeditor widget view

------------------------------}}

<textarea id='{{ $config['name'] }}' name='{{ $config['name'] }}' class='form-control'>{{ e($config['content']) }}</textarea>


<script type='text/javascript'>
    config = {};
    config.entities_latin = '{{ $config['entities-latin'] }}';
    config.language = '{{ $config['language'] }}';
    config.uiColor = '{{ $config['color'] }}';
    config.height = '{{ $config['height'] }}';
    config.filebrowserBrowseUrl = '{{ url('laravel-filemanager?type=file') }}';
    config.filebrowserImageBrowseUrl = '{{ url('laravel-filemanager?type=image') }}';

    @switch( $config['type'] )
        @case( 'basic' )
            config.toolbarGroups = [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'tools', groups: [ 'tools' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                '/',
                { name: 'styles', groups: [ 'styles' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ];

            config.removeButtons = 'Save,NewPage,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Find,Replace,SelectAll,Scayt,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,CopyFormatting,RemoveFormat,Indent,Outdent,Blockquote,BidiLtr,BidiRtl,Language,Anchor,Image,Flash,Table,HorizontalRule,Smiley,SpecialChar,PageBreak,Styles,BGColor,ShowBlocks,About,CreateDiv';

            @if ($config['view-source'] == false)
                config.removeButtons += ',Source';
            @endif
        @break

        @case( 'standard' )
            config.toolbarGroups = [
                { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                { name: 'forms', groups: [ 'forms' ] },
                { name: 'links', groups: [ 'links' ] },
                { name: 'insert', groups: [ 'insert' ] },
                { name: 'tools', groups: [ 'tools' ] },
                '/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'colors', groups: [ 'colors' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                { name: 'styles', groups: [ 'styles' ] },
                '/',
                { name: 'others', groups: [ 'others' ] },
                { name: 'about', groups: [ 'about' ] }
            ];

            config.removeButtons = 'Print,Templates,Cut,Copy,Paste,PasteText,Find,Replace,SelectAll,Form,Checkbox,Radio,TextField,Textarea,Button,Select,ImageButton,HiddenField,CopyFormatting,RemoveFormat,BidiLtr,BidiRtl,Language,Flash,Smiley,PageBreak,Iframe,BGColor,ShowBlocks,About,Save,NewPage,PasteFromWord';

            @if ($config['view-source'] == false)
                config.removeButtons += ',Source';
            @endif
        @break
    @endswitch

    CKEDITOR.replace('{{ $config['name'] }}', config);
</script>
