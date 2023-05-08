var eti_retry_count = 0;

function eti_process_response(response) { //strip out any unexpected characters and keep only the json portion related to this plugin.
    var new_response = ""; //empty string by default
    var bracket_start = response.indexOf('{"success"');

    if (bracket_start !== -1) {
        new_response = response.substring(bracket_start);
        new_response = JSON.parse(new_response);
    } else {
        console.log('No valid JSON in the reply. Retrying');
    }

    return new_response;
}

function eti_ajax_complete(status) {
    if (typeof status !== "undefined") {
        var eti_complete_url = sitepresser_obj.api_url + "&eti_ajax_action=import-" + status;

        jQuery.get(eti_complete_url, function (response) {
            var response_json = eti_process_response(response);

            jQuery(".eti_import_feedback").addClass(status);

            if (response_json.success === true) {
                jQuery(".eti_import_complete").html(response_json.feedback_html);

                if (status === "complete") {
                    jQuery(document).trigger("eti_import_complete");
                } else {
                    jQuery(document).trigger("eti_import_failed");
                }

            } else {
                jQuery(".eti_import_complete").html("Something went wrong!");
            }

            jQuery(".eti_import_summary").slideDown();
            window.scrollTo(0, 0);
        });
    }
}

function eti_send_action_request(action, extra, class_name, placeholder_name, next_func) {
    if (typeof eti_ajax_queue !== "undefined") {

        if (typeof extra === "undefined") {
            var extra = "";
        } else {
            extra = '&' + extra;
        }

        jQuery(".eti_import_feedback").append("<div class='" + class_name + "'><span class='item_name'>" + placeholder_name + "</span><span class='eti_status'><img src='" + sitepresser_obj.ajax_loader_url + "' /></span><div class='eti_logs'></div></div>");

        jQuery.ajax(sitepresser_obj.api_url + "&activate-multi=sp&eti_ajax_action=" + action + extra, {
            timeout: 30000,
            fail: function (jqXHR, textStatus, errorThrown) {
                jQuery(".eti_import_feedback ." + class_name + " .eti_status").addClass("failed").html("<span class='dashicons dashicons-dismiss'></span>");
                eti_ajax_complete("failed");
            },
            error: function (request, textStatus, errorThrown) {
                var log_toggle = "";
                var log_html = "";

                if (textStatus == "timeout") {
                    //this is a retry action. If the page redirects via ajax then we will not process it and send the same request again
                    if (eti_retry_count < 3) {
                        eti_retry_count++;

                        var log_text = "<h3>Oh no! Something went wrong...</h3><p>No response received from the server. Normally due to a timeout (where an import takes more than 30 or so seconds to run). Would you like to retry the same file or to move onto the next one (not recommended as ths may result in missing files on your new site)?</p>";
                        var retry_label = ' ' + eti_retry_count;

                        log_toggle = "<a onclick=\"jQuery('.eti_import_feedback ." + class_name + " .eti_logs').slideToggle();\"><span class='re'>0</span><span class='am'>1</span><span class='gr'>0</span><span class='dashicons dashicons-arrow-down-alt2'></span></a>";

                        if (action === 'import-media-items' || action === 'import-media-item') {
                            log_text += "<p>As this is a media import, what might have happened is a time out due to image resizing. You can disable image resizing for this import using the button below. If you use this option we recommend using a plugin like \"Regenerate Thumbnails\" once the import completes.</p>";
                            log_text += "<a class='eti_button' onclick='jQuery(\".eti_import_feedback ." + class_name + " .eti_logs\").slideUp(); jQuery(\".eti_import_feedback ." + class_name + " .eti_logs .eti_button\").remove(); eti_send_action_request(\"" + action + "\", (\"" + extra + "\" + \"&eti_skip_thumbs=1\"), \"" + class_name + "\" + \"R\" + \"" + eti_retry_count + "\", \"" + placeholder_name + "\" + \"" + retry_label + "\", \"" + next_func + "\")'>Retry (Disable thumbnails)</a>";
                        }

                        log_text += "<a class='eti_button' onclick='jQuery(\".eti_import_feedback ." + class_name + " .eti_logs\").slideUp(); jQuery(\".eti_import_feedback ." + class_name + " .eti_logs .eti_button\").remove(); eti_send_action_request(\"" + action + "\", \"" + extra + "\", \"" + class_name + "\" + \"R\" + \"" + eti_retry_count + "\", \"" + placeholder_name + "\" + \"" + retry_label + "\", \"" + next_func + "\")'>Retry Step</a>";

                        if (typeof next_func !== "undefined") {
                            var eti_progress_width = Math.ceil((next_func / eti_ajax_queue.length) * 100) + "%";
                            jQuery(".eti_current_progress span").text(eti_progress_width);
                            jQuery(".eti_current_progress").css("width", eti_progress_width);

                            if (typeof eti_ajax_queue[next_func] === "undefined") {
                                log_text += "<a class='eti_button' style=\"float: right;\" onclick='jQuery(\".eti_import_feedback ." + class_name + " .eti_logs\").slideUp(); jQuery(\".eti_import_feedback ." + class_name + " .eti_logs .eti_button\").remove(); eti_ajax_complete(\"complete\")'>Skip Step</a>";
                            } else {
                                log_text += "<a class='eti_button' style=\"float: right;\" onclick='jQuery(\".eti_import_feedback ." + class_name + " .eti_logs\").slideUp(); jQuery(\".eti_import_feedback ." + class_name + " .eti_logs .eti_button\").remove(); " + eti_ajax_queue[next_func] + "()'>Skip Step</a>";
                            }
                        }

                        log_html = "<div class='eti_log_item severity_med'>" + log_text + "</div>";

                        jQuery(".eti_import_feedback ." + class_name + " .eti_logs").html(log_html).slideDown();
                        jQuery(".eti_import_feedback ." + class_name + " .eti_status").addClass("failed").html(log_toggle + "<span class='dashicons dashicons-bell'></span>");
                    }
                } else {
                    jQuery(".eti_import_feedback ." + class_name + " .eti_status").addClass("failed").html("<span class='dashicons dashicons-dismiss'></span>");
                    eti_ajax_complete("failed");
                }
            },
            success: function (response, textStatus, jqXHR) {
                var response_json = eti_process_response(response);
                var log_toggle = "";
                var log_html = "";

                if (typeof (response_json) === "object") {
                    var eti_green = 0;
                    var eti_amber = 0;
                    var eti_red = 0;

                    if (response_json.log.length > 0) {
                        response_json.log.forEach(function (item) {
                            switch (item.severity) {
                                case "high":
                                    eti_red++;
                                    break;
                                case "med":
                                    eti_amber++;
                                    break;
                                case "low":
                                    eti_green++;
                                    break;
                            }

                            log_html += "<div class='eti_log_item severity_" + item.severity + "'>" + item.msg + "</div>";
                        });

                        jQuery(".eti_import_feedback ." + class_name + " .eti_logs").html(log_html);
                    }

                    log_toggle = "<a onclick=\"jQuery('.eti_import_feedback ." + class_name + " .eti_logs').slideToggle();\"><span class='re'>" + eti_red + "</span><span class='am'>" + eti_amber + "</span><span class='gr'>" + eti_green + "</span><span class='dashicons dashicons-arrow-down-alt2'></span></a>";

                    if (response_json.success === true) {
                        jQuery(".eti_import_feedback ." + class_name + " .eti_status").addClass("complete").html(log_toggle + "<span class='dashicons dashicons-yes-alt'></span>");

                        if (typeof next_func !== "undefined") {
                            var eti_progress_width = Math.ceil((next_func / eti_ajax_queue.length) * 100) + "%";
                            jQuery(".eti_current_progress span").text(eti_progress_width);
                            jQuery(".eti_current_progress").css("width", eti_progress_width);

                            if (typeof eti_ajax_queue[next_func] === "undefined") {
                                eti_ajax_complete("complete");
                            } else {
                                eti_ajax_queue[next_func]();
                            }
                        }
                    } else {
                        jQuery(".eti_import_feedback ." + class_name + " .eti_status").addClass("failed").html(log_toggle + "<span class='dashicons dashicons-dismiss'></span>");
                        eti_ajax_failed("failed");
                    }
                } else {
                    //this is a retry action. If the page redirects via ajax then we will not process it and send the same request again
                    if (eti_retry_count < 3) {
                        eti_retry_count++;
                        eti_send_action_request(action, extra, class_name, placeholder_name + ' ' + eti_retry_count, next_func);
                    } else {
                        jQuery(".eti_import_feedback ." + class_name + " .eti_status").addClass("failed").html(log_toggle + "<span class='dashicons dashicons-dismiss'></span>");
                        eti_ajax_failed("failed");
                    }
                }
            }
        });
    }
}
