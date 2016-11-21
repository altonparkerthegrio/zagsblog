<div class="eltd-tabs-content">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="import">
            <div class="eltd-tab-content">
                <h2 class="eltd-page-title"><?php esc_html_e('Import', 'newsroom'); ?></h2>
                <form method="post" class="eltd_ajax_form eltd-import-page-holder">
                    <div class="eltd-page-form">
                        <div class="eltd-page-form-section-holder">
                            <h3 class="eltd-page-section-title"><?php esc_html_e('Import Demo Content', 'newsroom'); ?></h3>
                            <div class="eltd-page-form-section">
                                <div class="eltd-field-desc">
                                    <h4><?php esc_html_e('Import', 'newsroom'); ?></h4>

                                    <p><?php esc_html_e('Choose demo content you want to import', 'newsroom'); ?></p>
                                </div>
                                <!-- close div.eltd-field-desc -->

                                <div class="eltd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_example" id="import_example" class="form-control eltd-form-element dependence">
                                                    <option value="newsroom"><?php esc_html_e('Newsroom', 'newsroom'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.eltd-section-content -->

                            </div>

                            <div class="eltd-page-form-section">


                                <div class="eltd-field-desc">
                                    <h4><?php esc_html_e('Import Type', 'newsroom'); ?></h4>

                                    <p><?php esc_html_e('Enabling this option will switch to a Side Position (default is Top Position)', 'newsroom'); ?></p>
                                </div>
                                <!-- close div.eltd-field-desc -->


                                <div class="eltd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <select name="import_option" id="import_option" class="form-control eltd-form-element">
                                                    <option value=""><?php esc_html_e('Please Select', 'newsroom'); ?></option>
                                                    <option value="complete_content"><?php esc_html_e('All', 'newsroom'); ?></option>
                                                    <option value="content"><?php esc_html_e('Content', 'newsroom'); ?></option>
                                                    <option value="widgets"><?php esc_html_e('Widgets', 'newsroom'); ?></option>
                                                    <option value="options"><?php esc_html_e('Options', 'newsroom'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.eltd-section-content -->

                            </div>
                            <div class="eltd-page-form-section">


                                <div class="eltd-field-desc">
                                    <h4><?php esc_html_e('Import attachments', 'newsroom'); ?></h4>

                                    <p><?php esc_html_e('Do you want to import media files?', 'newsroom'); ?></p>
                                </div>
                                <!-- close div.eltd-field-desc -->
                                <div class="eltd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <p class="field switch">
                                                    <label class="cb-enable dependence"><span><?php esc_html_e('Yes', 'newsroom'); ?></span></label>
                                                    <label class="cb-disable selected dependence"><span><?php esc_html_e('No', 'newsroom'); ?></span></label>
                                                    <input type="checkbox" id="import_attachments" class="checkbox" name="import_attachments" value="1">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.eltd-section-content -->
                            </div>
                            <div class="eltd-page-form-section">


                                <div class="eltd-field-desc">
                                    <input type="submit" class="btn btn-primary btn-sm " value="<?php esc_html_e('Import', 'newsroom'); ?>" name="import" id="import_demo_data"/>
                                </div>
                                <!-- close div.eltd-field-desc -->
                                <div class="eltd-section-content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="import_load">
                                                    <span><?php esc_html_e('The import process may take some time. Please be patient.', 'newsroom') ?> </span><br/>
                                                    <div class="eltd-progress-bar-wrapper html5-progress-bar">
                                                        <div class="progress-bar-wrapper">
                                                            <progress id="progressbar" value="0" max="100"></progress>
                                                        </div>
                                                        <div class="progress-value">0%</div>
                                                        <div class="progress-bar-message">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- close div.eltd-section-content -->
                            </div>
                            <div class="eltd-page-form-section eltd-import-button-wrapper">

                                <div class="alert alert-warning">
                                    <strong><?php esc_html_e('Important notes:', 'newsroom') ?></strong>
                                    <ul>
                                        <li><?php esc_html_e('Please note that import process will take time needed to download all attachments from demo web site.', 'newsroom'); ?></li>
                                        <li><?php esc_html_e('If you plan to use shop, please install WooCommerce before you run import.', 'newsroom') ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </form>

            </div><!-- close eltd-tab-content -->
        </div>
    </div>
</div> <!-- close div.eltd-tabs-content -->

<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {
            $(document).on('click', '#import_demo_data', function (e) {
                e.preventDefault();
                if (confirm('Are you sure, you want to import Demo Data now?')) {
                    $('.import_load').css('display', 'block');
                    var progressbar = $('#progressbar');
                    var import_opt = $("#import_option").val();
                    var import_expl = $("#import_example").val();
                    var p = 0;
                    if (import_opt == 'content') {
                        for (var i = 1; i < 10; i++) {
                            var str;
                            if (i < 10) str = 'newsroom_content_0' + i + '.xml';
                            else str = 'newsroom_content_' + i + '.xml';
                            jQuery.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: {
                                    action: 'eltd_dataImport',
                                    xml: str,
                                    example: import_expl,
                                    import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                },
                                success: function (data, textStatus, XMLHttpRequest) {
                                    p += 10;
                                    $('.progress-value').html((p) + '%');
                                    progressbar.val(p);
                                    if (p == 90) {
                                        str = 'newsroom_content_10.xml';
                                        jQuery.ajax({
                                            type: 'POST',
                                            url: ajaxurl,
                                            data: {
                                                action: 'eltd_dataImport',
                                                xml: str,
                                                example: import_expl,
                                                import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                            },
                                            success: function (data, textStatus, XMLHttpRequest) {
                                                p += 10;
                                                $('.progress-value').html((p) + '%');
                                                progressbar.val(p);
                                                $('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                                            },
                                            error: function (MLHttpRequest, textStatus, errorThrown) {
                                            }
                                        });
                                    }
                                },
                                error: function (MLHttpRequest, textStatus, errorThrown) {
                                }
                            });
                        }
                    } else if (import_opt == 'widgets') {
                        jQuery.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: {
                                action: 'eltd_widgetsImport',
                                example: import_expl
                            },
                            success: function (data, textStatus, XMLHttpRequest) {
                                $('.progress-value').html((100) + '%');
                                progressbar.val(100);
                            },
                            error: function (MLHttpRequest, textStatus, errorThrown) {
                            }
                        });
                        $('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                    } else if (import_opt == 'options') {
                        jQuery.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: {
                                action: 'eltd_optionsImport',
                                example: import_expl
                            },
                            success: function (data, textStatus, XMLHttpRequest) {
                                $('.progress-value').html((100) + '%');
                                progressbar.val(100);
                            },
                            error: function (MLHttpRequest, textStatus, errorThrown) {
                            }
                        });
                        $('.progress-bar-message').html('<div class="alert alert-success"><strong>Import is completed</strong></div>');
                    } else if (import_opt == 'complete_content') {
                        for (var i = 1; i < 10; i++) {
                            var str;
                            if (i < 10) str = 'newsroom_content_0' + i + '.xml';
                            else str = 'newsroom_content_' + i + '.xml';
                            jQuery.ajax({
                                type: 'POST',
                                url: ajaxurl,
                                data: {
                                    action: 'eltd_dataImport',
                                    xml: str,
                                    example: import_expl,
                                    import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                },
                                success: function (data, textStatus, XMLHttpRequest) {
                                    p += 10;
                                    $('.progress-value').html((p) + '%');
                                    progressbar.val(p);
                                    if (p == 90) {
                                        str = 'newsroom_content_10.xml';
                                        jQuery.ajax({
                                            type: 'POST',
                                            url: ajaxurl,
                                            data: {
                                                action: 'eltd_dataImport',
                                                xml: str,
                                                example: import_expl,
                                                import_attachments: ($("#import_attachments").is(':checked') ? 1 : 0)
                                            },
                                            success: function (data, textStatus, XMLHttpRequest) {
                                                jQuery.ajax({
                                                    type: 'POST',
                                                    url: ajaxurl,
                                                    data: {
                                                        action: 'eltd_otherImport',
                                                        example: import_expl
                                                    },
                                                    success: function (data, textStatus, XMLHttpRequest) {
                                                        //alert(data);
                                                        $('.progress-value').html((100) + '%');
                                                        progressbar.val(100);
                                                        $('.progress-bar-message').html('<div class="alert alert-success">Import is completed.</div>');
                                                    },
                                                    error: function (MLHttpRequest, textStatus, errorThrown) {
                                                    }
                                                });
                                            },
                                            error: function (MLHttpRequest, textStatus, errorThrown) {
                                            }
                                        });
                                    }
                                },
                                error: function (MLHttpRequest, textStatus, errorThrown) {
                                }
                            });
                        }
                    }
                }
                return false;
            });
        });
    })(jQuery);

</script>