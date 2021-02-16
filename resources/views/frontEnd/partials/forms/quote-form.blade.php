<?php
/**
 */
?>
@push('styles')
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/jquery-ui/jquery-ui.min.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/jquery-ui/jquery-ui.theme.min.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/select2/css/select2.min.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/dropzone/basic.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/vendor/dropzone/dropzone.css') }} "/>
    <link rel="stylesheet" href="{{ URL::to('assets/frontEnd/css/extensions.min.css')}}">
@endpush


<!-- HTML-modal activation-->
<div id="sendingDataModal" class="modal fade" data-toggle="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Window Title -->
            
            <!-- Modal Contents -->
            <div class="modal-body" style="text-align:center;">
                <h3>Please wait...</h3>
                <img src="{{ URL::to('assets/frontEnd/img/pleasewait.gif')}}">
            </div>
            <!-- modal window delay -->
        
        </div>
    </div>
</div>

<div class="form-panel">
    
    
    
    <section class="panel-bt panel-bt-primary panel form-wizard" id="w4">
        
        
        <header class="panel-heading align-center">
            <h1 class="panel-title"><strong>{{$UniversalTranslationHelper->translateText('quote_form_title')}}</strong></h1>
        </header>
        <div class="panel-body">
            <div></div>
            <div class="wizard-progress wizard-progress-lg wizard-progress-mt">
                <div class="steps-progress">
                    <div class="progress-indicator"></div>
                </div>
                <ul class="wizard-steps">
                    <li class="active">
                        <a href="#w4-project_info" data-toggle="tab"><span>1</span></a>
                    </li>
                    <li>
                        <a href="#w4-choose_lang" data-toggle="tab"><span>2</span></a>
                    </li>
                    <li>
                        <a href="#w4-upload_file" data-toggle="tab"><span>3</span></a>
                    </li>
                    <li>
                        <a href="#w4-contact_info" data-toggle="tab"><span>4</span></a>
                    </li>
                </ul>
            </div>
            
            <!-- Step 1 !-->
            
            <div class="tab-content">
                
                <div id="w4-project_info" class="tab-pane active">
                    <form class='validate-step1'>
                        <div class="tab-pane-header"><h4 class="heading-primary align-center"><strong>{{$UniversalTranslationHelper->translateText('quote_form_project_info_title')}}</strong></h4></div>
                        
                        <div class="form-group">
                            <label class="col-sm-12 control-label align-left" for="w4-trans_type"><strong>{{$UniversalTranslationHelper->translateText('quote_form_trans_type_title')}}</strong><span class="required">*</span></label>
                            <div class="col-md-12">
                                <div class="input-group btn-group">
														<span class="input-group-addon btn-primary">
																<i class="fa fa-briefcase"></i>
														</span>
                                    <select name="translation_type" data-plugin-selectTwo class="form-control populate placeholder send-field" data-plugin-options='{ "placeholder": "{{$UniversalTranslationHelper->translateText('quote_form_trans_type_placeholder')}}", "allowClear": true }' id="w4-trans_type" title="{{$UniversalTranslationHelper->translateText('quote_form_trans_type_required')}}" required>
                                        
                                        @foreach($service_categories_list as $ind=>$service_type)
                                            <option value="{{ $service_type->title }}">{{ $service_type->title }}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label align-left col-sm-12" for="w4-doc_type"><strong>{{$UniversalTranslationHelper->translateText('quote_form_doc_type_title')}}</strong><span class="required">*</span></label>
                            <div class="col-md-12">
                                <div class="input-group btn-group">
														<span class="input-group-addon btn-primary">
																<i class="fa fa-file"></i>
														</span>
                                    <select name="document_type" multiple data-plugin-selectTwo class="form-control populate placeholder send-field" data-plugin-options='{ "placeholder": "{{$UniversalTranslationHelper->translateText('quote_form_doc_type_placeholder')}}", "allowClear": true }' id="w4-doc_type" title="{{$UniversalTranslationHelper->translateText('quote_form_doc_type_required')}}" required>
                                        
                                        @foreach($service_types_list as $ind=>$document_type)
                                            <option value="{{ $document_type->title }}">{{ $document_type->title }}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label align-left col-sm-12" for="w4-certification_type"><strong>{{$UniversalTranslationHelper->translateText('quote_form_cert_type_title')}}</strong><span class="required">*</span></label>
                            <div class="col-md-12">
                                <div class="input-group btn-group">
														<span class="input-group-addon btn-primary">
																<i class="fa fa-certificate"></i>
														</span>
                                    <select  name="certification_type" data-plugin-selectTwo class="form-control populate placeholder send-field" data-plugin-options='{ "placeholder": "{{$UniversalTranslationHelper->translateText('quote_form_cert_type_placeholder')}}", "allowClear": true }' id="w4-cert_type" title="{{$UniversalTranslationHelper->translateText('quote_form_cert_type_required')}}" required>
                                        <option value="None">N/A</option>
                                        <option value="ISO2">ISO2</option>
                                        <option value="ISO3">ISO3</option>
                                        <option value="ISO4">ISO4</option>
                                        <option value="ISO5">ISO5</option>
                                        <option value="ISO6">ISO6</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Step 2 !-->
                
                <div id="w4-choose_lang" class="tab-pane">
                    <form class='validate-step2'>
                        <div class="tab-pane-header"><h4 class="heading-primary align-center"><strong>{{$UniversalTranslationHelper->translateText('quote_form_trans_title')}}</strong></h4></div>
                        <div class="form-group">
                            <label class="control-label align-left col-md-12" for="w4-trans_from"><strong>{{$UniversalTranslationHelper->translateText('quote_form_trans_from_title')}}</strong></label>
                            <div class="col-lg-12">
                                <div class="input-group btn-group">
														<span class="input-group-addon btn-primary">
																<i class="fa fa-comment"></i>
														</span>
                                    <select name="translate_from" data-plugin-selectTwo class="form-control populate placeholder send-field" data-plugin-options='{"allowClear": true"}' id="w4-trans_from" required>
                                        
                                        @foreach($languages as $language)
                                            <option value="{{ $language->name }}">{{ $language->name }}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label align-left col-md-12" for="w4-trans_to"><strong>{{$UniversalTranslationHelper->translateText('quote_form_trans_to_title')}}</strong></label>
                            <div class="col-md-12">
                                <div class="input-group btn-group">
														<span class="input-group-addon btn-primary">
																<i class="fa fa-globe"></i>
														</span>
                                    <select  name="translate_to"  multiple data-plugin-selectTwo class="form-control populate placeholder send-field" data-plugin-options='{"placeholder": "{{$UniversalTranslationHelper->translateText('quote_form_trans_to_placeholder')}}"}' id="w4-trans_to" required>
                                        @foreach($languages as $language)
                                            <option value="{{ $language->name }}">{{ $language->name }}</option>
                                        @endforeach
                                    
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Step 3 !-->
                
                <div id="w4-upload_file" class="tab-pane">
                    
                    <div class="tab-pane-header"><h4 class="heading-primary align-center"><strong>{{$UniversalTranslationHelper->translateText('quote_form_upload_title')}}</strong></h4></div>
                    
                    
                    
                    <div class="form-group">
                        <label class="control-label align-left col-md-12" for="w4-upload"><strong>{{$UniversalTranslationHelper->translateText('quote_form_dz_title')}}</strong> <em>( PDF, .Doc, PPT, .txt)</em> </label>
                        <div class="col-md-12">
                            <form action="/quote/file-upload" class="dropzone" id="filesDropzone">
                                {{ csrf_field() }}
                            </form>
                        
                        </div>
                    </div>
                    <form class='validate-step3'>
                        <div class="form-group">
                            
                            <div class="col-md-12">
                                <div class="input-group">
                                    
                                    <input type="text" value="" style='width:0px;height:0px;border:none;' name="attachment_file" id="attachment_file" class="document-file-group send-field" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="control-label align-left col-md-12" for="attachment_file_url"><strong>{{$UniversalTranslationHelper->translateText('quote_form_fileurl_title')}}</strong> <em>Dropbox, OneDrive, GoogleDrive, etc...</em></label>
                            <div class="col-md-12">
                                <div class="input-group">
															<span class="input-group-addon btn-primary">
																<i class="fa fa-file"></i>
															</span>
                                    <input type="text" name="attachment_file_url"  id="attachment_file_url" placeholder="http://site.com/file" class="form-control uploads document-file-group send-field" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label align-left col-md-12" for="attachment_website_url"><strong>{{$UniversalTranslationHelper->translateText('quote_form_websiteurl_title')}}</strong></label>
                            <div class="col-md-12">
                                <div class="input-group">
															<span class="input-group-addon btn-primary">
																<i class="fa fa-link"></i>
															</span>
                                    <input  type="text"  name="attachment_website_url"   id="attachment_website_url" placeholder="http://site.com" class="form-control uploads document-file-group send-field" >
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Step 4 !-->
                
                <div id="w4-contact_info" class="tab-pane">
                    <form class='validate-step4'>
                        <div class="tab-pane-header"><h4 class="heading-primary align-center"><strong>{{$UniversalTranslationHelper->translateText('quote_form_contact_title')}}</strong></h4></div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
																<span class="input-group-addon btn-primary">
																	<i class="fa fa-user"></i>
																</span>
                                        <input type="text" name="firstname" class="form-control send-field" placeholder="{{$UniversalTranslationHelper->translateText('quote_form_contact_fname_placeholder')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
																<span class="input-group-addon btn-primary">
																	<i class="fa fa-user"></i>
																</span>
                                        <input type="text" name="lastname" class="form-control send-field" placeholder="{{$UniversalTranslationHelper->translateText('quote_form_contact_lname_placeholder')}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
																<span class="input-group-addon btn-primary">
																	<i class="fa fa-envelope"></i>
																</span>
                                        <input type="email" name="email" class="form-control send-field" placeholder="{{$UniversalTranslationHelper->translateText('quote_form_contact_email_placeholder')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
																<span class="input-group-addon btn-primary">
																	<i class="fa fa-phone"></i>
																</span>
                                        <input type="tel" name="phone" class="form-control send-field" placeholder="{{$UniversalTranslationHelper->translateText('quote_form_contact_phone_placeholder')}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
																<span class="input-group-addon btn-primary">
																	<i class="fa fa-building"></i>
																</span>
                                        <input type="text" name="company" class="form-control send-field" placeholder="{{$UniversalTranslationHelper->translateText('quote_form_contact_company_placeholder')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="input-group">
																<span class="input-group-addon btn-primary">
																		<i class="fa fa-link"></i>
																</span>
                                        <input type="url" name="website" class="form-control send-field" placeholder="{{$UniversalTranslationHelper->translateText('quote_form_contact_website_placeholder')}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <textarea name="additional_info" class="form-control send-field" rows="5" placeholder="{{$UniversalTranslationHelper->translateText('quote_form_contact_message_placeholder')}}"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="checkbox-custom mt-lg">
                                    <input type="checkbox" name="terms" id="w4-terms" required>
                                    <label for="w4-terms">{!! $UniversalTranslationHelper->translateText('quote_form_terms') !!}<span class="required">*</span></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            
            </div>
        
        </div>
        <div class="panel-footer">
            <ul class="pager">
                <li class="previous disabled">
                    <a><i class="fa fa-angle-left"></i> {{$UniversalTranslationHelper->translateText('quote_form_nav_prev')}}</a>
                </li>
                <li class="finish hidden pull-right">
                    {!! app('captcha')->render() !!}
                    <a id="finish_button">{{$UniversalTranslationHelper->translateText('quote_form_nav_finish')}}</a>
                </li>
                <li class="next">
                    <a>{{$UniversalTranslationHelper->translateText('quote_form_nav_next')}} <i class="fa fa-angle-right"></i></a>
                </li>
            </ul>
        </div>
    
    </section>

</div>

@push('scripts')
    <script src="{{URL::to('assets/frontEnd/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/bootstrap-multiselect/bootstrap-multiselect.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/jquery-maskedinput/jquery.maskedinput.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/bootstrap-timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/dropzone/min/dropzone.min.js')}}"></script>
    <script>
        var dropzone_uploaded_files = [];

        Dropzone.options.filesDropzone = {
            dictDefaultMessage: '{{$UniversalTranslationHelper->translateText('quote_form_dzmessage')}}',
            init: function() {
                this.on("complete", function(mes) {
                        dropzone_uploaded_files.push(mes.xhr.response);
                        var dropzone_uploaded_files_string = dropzone_uploaded_files.join(',');
                        $('#attachment_file').val(dropzone_uploaded_files_string);
                    }
                );
            }
        };
    </script>
    <!-- Recaptcha -->
    
    <script src="{{URL::to('assets/frontEnd/vendor/bootstrap-confirmation/bootstrap-confirmation.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
    <script src="{{URL::to('assets/frontEnd/vendor/pnotify/pnotify.custom.js')}}"></script>
    <!-- Extends Form -->
    <script src="{{URL::to('assets/frontEnd/js/views/theme.admin.extension.min.js')}}"></script>
    <!-- Form Ajax -->
    <script src="{{url::to('assets/frontEnd/js/quote-ajax.js')}}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>

@endpush