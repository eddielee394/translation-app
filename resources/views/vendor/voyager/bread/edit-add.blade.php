@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .flat-blue {
            background-color: #62A8EA;
            border-bottom: 0px;
        }

        .panel-title {
            color: #ffffff;
        }

        .panel-heading {
            margin: 10px 0px;
        }

        .panel .mce-panel {
            border-left-color: #fff;
            border-right-color: #fff;
        }

        .panel-footer {
            text-align: center;
        }

        .panel-footer button.save {
            width: 50%;
        }

        .panel .mce-toolbar,
        .panel .mce-statusbar {
            padding-left: 20px;
        }

        .panel .mce-edit-area,
        .panel .mce-edit-area iframe,
        .panel .mce-edit-area iframe html {
            padding: 0 10px;
            min-height: 350px;
        }

        .mce-content-body {
            color: #555;
            font-size: 14px;
        }

        .panel.is-fullscreen .mce-statusbar {
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 200000;
        }

        .panel.is-fullscreen .mce-tinymce {
            height: 100%;
        }

        .panel.is-fullscreen .mce-edit-area,
        .panel.is-fullscreen .mce-edit-area iframe,
        .panel.is-fullscreen .mce-edit-area iframe html {
            height: 100%;
            position: absolute;
            width: 99%;
            overflow-y: scroll;
            overflow-x: hidden;
            min-height: 100%;
        }
    </style>
@stop

@if(isset($dataTypeContent->id))
    @section('page_title','Edit '.$dataType->display_name_singular)
@else
    @section('page_title','Add '.$dataType->display_name_singular)
@endif

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> @if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'New' }}@endif {{ $dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')

    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">

                    <div class="panel-heading">
                        <h3 class="panel-title">@if(isset($dataTypeContent->id)){{ 'Edit' }}@else{{ 'Add New' }}@endif {{ $dataType->display_name_singular }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form"
                          class="form-edit-add"
                          action="@if(isset($dataTypeContent->id)){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->id) }}@elseif($dataType->slug == 'languages'){{ route('voyager.languages.duplicate') }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                          method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                    @if(isset($dataTypeContent->id))
                        {{ method_field("PUT") }}
                    @endif

                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="ut-edit-wrapper">
                                    <div class="ut-edit-top-col col-md-8">
                                        <div id="ut-edit-top" class="ut-edit-top-wrapper">
                                            <!-- Add fields dynamically via JS -->

                                        </div>
                                    </div>
                                    <div class="ut-edit-main-col col-md-8">
                                        <div id="ut-edit-main" class="ut-edit-main-wrapper">
                                            <!-- If we are editing -->
                                            @if(isset($dataTypeContent->id))
												<?php $dataTypeRows = $dataType->editRows; ?>
                                            @else
												<?php $dataTypeRows = $dataType->addRows; ?>
                                            @endif
                                            @foreach($dataTypeRows as $row)

                                                <div id="form-group-{{ strtolower($row->field) }}" class="form-group @if($row->type == 'hidden') hidden @endif">
                                                    <label for="name">{{ $row->display_name }}</label>
                                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                                    {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}

                                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                                    @endforeach
                                                </div>
                                            @endforeach
                                            @if(!isset($dataTypeContent->id))
                                                @if($dataType->slug == 'languages')
                                                    <input type="checkbox" name="duplicate" id="duplicate"> Duplicate all localized content to new locale
                                                        <div hidden class="alert alert-warning alert-dismissible alertDuplicate" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h5><strong>Warning!</strong> Are you sure you want to duplicate all entries from database with the new locale?</h5>
                                                            <h6>This process can take few minutes. Please make sure to backup your database before starting. </h6>
                                                        </div>
                                                @endif
                                            @endif

                                        <!-- Add additional fields dynamically via JS -->
                                        </div>
                                    </div>
                                    <div class="ut-edit-col aside-admin col-md-4">
                                        <div id="ut-edit-details" class="ut-edit-col-wrapper ut-edit-details-wrapper">
                                            <div class="panel-heading flat-blue">
                                                <h3 class="panel-title">Page Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <!-- Add fields dynamically via JS -->

                                            </div>
                                        </div>
                                        <div id="ut-edit-image" class="ut-edit-col-wrapper ut-edit-image-wrapper">
                                            <div class="panel-heading flat-blue">
                                                <h3 class="panel-title">Featured Image</h3>
                                            </div>
                                            <div class="panel-body">
                                                <!-- Add fields dynamically via JS -->

                                            </div>
                                        </div>

                                        <div id="ut-edit-meta" class="ut-edit-col-wrapper ut-edit-meta-wrapper">
                                            <div class="panel-heading flat-blue">
                                                <h3 class="panel-title">SEO Content</h3>
                                            </div>
                                            <div class="panel-body">
                                                <!-- Add fields dynamically via JS -->

                                            </div>
                                        </div>
                                        <div id="ut-edit-other" class="ut-edit-col-wrapper ut-edit-other-wrapper">
                                            <div class="panel-heading flat-blue">
                                                <h3 class="panel-title">Additional Details</h3>
                                            </div>
                                            <div class="panel-body">
                                                <!-- Add fields dynamically via JS -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">Save</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> Are You Sure</h4>
                </div>

                <div class="modal-body">
                    <h4>Are you sure you want to delete '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">Yes, Delete it!
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->

@stop

@section('javascript')
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataTypeContent->getTable() }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });

            //duplicate alert
            $('#duplicate').click(function(){
                if (this.checked) $('.alertDuplicate').removeAttr('hidden');

                else $('.alertDuplicate').attr('hidden', 'hidden');
            });

            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    @if($isModelTranslatable)
        <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
    <script src="{{ voyager_asset('lib/js/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ voyager_asset('js/voyager_tinymce.js') }}"></script>
    <script src="{{ voyager_asset('lib/js/ace/ace.js') }}"></script>
    <script src="{{ voyager_asset('js/voyager_ace_editor.js') }}"></script>
    <script src="{{ voyager_asset('js/slugify.js') }}"></script>
    <script src="{{ asset('assets/backEnd/js/admin-custom.js') }}"></script>
@stop
