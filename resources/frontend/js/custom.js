$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    /*
    ## Wizer Form Steps 
    ******************************/
    //$("#wizard").steps();

    $("#eForm").steps({
        bodyTag: "fieldset",
        enableCancelButton: false,
        onStepChanging: function (event, currentIndex, newIndex) {
            var move = false;
            if (currentIndex == 0) {
                var formData = $("#eForm").serialize();

                $.ajax({
                    type: "POST",
                    url: base_url + "/validate/step1",
                    data: formData,
                    async: false,
                    success: function (data) {
                        if (data.success) {
                            move = data.success;
                            return true;
                        } else {
                            errorMessages(data.errors);
                            return false;
                        }

                        return true;
                    }
                });
            } else {
                move = true;
            }

            return move;
        },
        saveState: true,
        onStepChanged: function (event, currentIndex, priorIndex) {
            if (currentIndex == 2) {
                $("body #eForm.wizard-big .actions ul li:last-child a").css(
                    "pointer-events",
                    "auto"
                );
                $("body #eForm.wizard-big .actions ul li:last-child a").css(
                    "background",
                    "#1AB394"
                );
                $("body #eForm.wizard-big .actions ul li:last-child a").css(
                    "color",
                    "#ffffff"
                );
            }

            $(".error_message").fadeOut();
        },
        onFinished: function (event, currentIndex) {
            var form = $(this);

            $(".ajax_loading").fadeIn();
            var Form_Data = new FormData(this);

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: Form_Data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    $(".ajax_loading").fadeOut();
                    if (result.success) {
                        swal({
                            title: "",
                            text: "The project has successfully added.",
                            type: "success",
                            closeOnConfirm: false
                        },
                            function () {
                                location.reload(true);
                            }
                        );
                    } else {
                        errorMessages(result.errors);
                        return false;
                    }
                }
            });
        }
    });

    /*
    ## Datepicker jQurey
    ******************************/
    var start = new Date();

    var end = new Date(new Date().setYear(start.getFullYear() + 1));

    $("#fromDate")
        .datepicker({
            format: "mm/dd/yyyy",
            startDate: start,
            // endDate: end,
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        })
        .on("changeDate", function () {
            $("#toDate").datepicker("setStartDate", new Date($(this).val()));
        });

    $("#toDate")
        .datepicker({
            format: "mm/dd/yyyy",
            startDate: start,
            // endDate: end,
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        })
        .on("changeDate", function () {
            $("#fromDate").datepicker("setEndDate", new Date($(this).val()));
        });

    /*
    ## Chosen Selectpicker
    ## Select Option Script
    *****************************/
    var config = {
        ".chosen-select": {},
        ".chosen-select-deselect": {
            allow_single_deselect: true
        },
        ".chosen-select-no-single": {
            disable_search_threshold: 10
        },
        ".chosen-select-no-results": {
            no_results_text: "Oops, nothing found!"
        },
        ".chosen-select-width": {
            width: "95%"
        }
    };
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    /*****************************
    ## Individuals Activity 
    ## More Fields append
    ******************************/
    $(document).on("click", "#moreIndividualsActivity", function () {
        var rowCount = $("#individualsActivity tr").length - 2;
        $("#individualsActivity tbody").append(
            `<tr class="control_individuals">
        <td><input class="form-control expandable" type="text" name="controll_individuals[${rowCount}][name_of_individual]" value=""></td>
        <td>                                           
            <select id="other-role_in_activity-${rowCount}" class="form-control" name="controll_individuals[${rowCount}][role_in_activity]">                                  
                <option value="">(Select One)</option> 
                <option value="Chair/Course Director">Chair/Course Director</option>
                <option value="Faculty">Faculty</option>
                <option value="Content/Peer Reviewer">Content/Peer Reviewer</option>
                <option value="Nurse Planner">Nurse Planner</option>
                <option value="Pharmacist Planner">Pharmacist Planner</option>
                <option value="Planning Committee">Planning Committee</option>
                <option value="Planner">Planner</option>
                <option value="Faculty/Planner">Faculty/Planner</option>
                <option value="other">other</option>
            </select>
            <br>
            <input id="specify-role_in_activity-${rowCount}" class="form-control d-none" type="text" name="controll_individuals[${rowCount}][role_in_activity]" value="">
        </td>
        <td>
            <select class="form-control" name="controll_individuals[${rowCount}][commercial_interest]">                                  
                <option value="None">None</option>
                <option value="See Attachment B">See Attachment B</option>                                              
            </select>
        </td>
        <td>        
            <select class="form-control" name="controll_individuals[${rowCount}][nature_of_relationship]">                                 
                <option value="N/A">N/A</option>
                <option value="See Attachment B">See Attachment B</option>                                              
            </select>
        </td>
        <td><input class="form-control" type="text" name="controll_individuals[${rowCount}][mechanisms]" value=""></td>
        </tr>`
        );

        $("#other-role_in_activity-" + rowCount).change(function () {
            var role_in_activity = $(this).val();
            if (role_in_activity == 'other') {
                $("#specify-role_in_activity-" + rowCount).removeClass("d-none");
                $("#specify-role_in_activity-" + rowCount).fadeIn();
            } else {
                $("#specify-role_in_activity-" + rowCount).val(role_in_activity);
                $("#specify-role_in_activity-" + rowCount).fadeOut();
            }
        });
    });

    /******************************
    ## Commercial Activity 
    ## More Fields append
    ******************************/
    $(document).on("click", "#moreCommercialActivity", function () {
        var rowCount = $("#commercialActivity tr").length;
        $("#commercialActivity tbody").append(
            '<tr> <td><input class="form-control" type="text"  name="commercial_supporters[' +
            rowCount +
            '][name]" ></td> <td> <input type="text" class="form-control" name="commercial_supporters[' +
            rowCount +
            '][grant_id]"> </td><td> <input type="text" class="form-control" name="commercial_supporters[' +
            rowCount +
            '][amount]"> </td><td> <div class="checkbox checkbox-primary mt-8"> <input class="form-check-input" type="checkbox"  name="commercial_supporters[' +
            rowCount +
            '][in_kind]" value="1">   <label class="form-check-label"></label> </div>  </td>' +
            '<td> <div class="input-group custom-file"> <input type="file" class="custom-file-input" id="support_attachment_7_' +
            rowCount +
            '" name="support_attachment_7_' +
            rowCount +
            '"> ' +
            '<span class="img_text">No File Selected</span>' +
            ' <label class="custom-file-label" for="support_attachment_7_' +
            rowCount +
            '"></label> </div> </td>' +
            "  </tr>"
        );
    });

    /**
     * Other Disclosures specify
     */

    $("#other-role_in_activity-1").change(function () {
        var role_in_activity = $(this).val();
        if (role_in_activity == 'other') {
            $("#specify-role_in_activity-1").removeClass("d-none");
            $("#specify-role_in_activity-1").fadeIn();
        } else {
            $("#specify-role_in_activity-1").val(role_in_activity);
            $("#specify-role_in_activity-1").fadeOut();
        }
    });

    $(document).on("change", '.custom-file input[type="file"]', function (e) {
        var fileName = e.target.files[0].name;
        $(this)
            .next()
            .html(fileName);
    });

    /**
     * Multiple file Upload for disclosure
     */

    $(".dis_attachments .btn-primary").click(function () {
        var html = $(".dis_attachments .clone").html();
        $(".dis_attachments .increment").after(html);
    });

    $("body").on("click", ".dis_attachments .btn-danger", function () {
        $(this)
            .parents(".dis_attachments .control-group")
            .remove();
    });

    /**
     * Multiple file Upload attachment1
     */

    $(".attachment1 .btn-primary").click(function () {
        var html = $(".attachment1 .clone").html();
        $(".attachment1 .increment").after(html);
    });

    $("body").on("click", ".attachment1 .btn-danger", function () {
        $(this)
            .parents(".attachment1 .control-group")
            .remove();
    });

    /**
     * Multiple file Upload attachment2
     */

    $(".attachment2 .btn-primary").click(function () {
        var html = $(".attachment2 .clone").html();
        $(".attachment2 .increment").after(html);
    });

    $("body").on("click", ".attachment2 .btn-danger", function () {
        $(this)
            .parents(".attachment2 .control-group")
            .remove();
    });

    /**
     * Multiple file Upload attachment3
     */

    $(".attachment3 .btn-primary").click(function () {
        var html = $(".attachment3 .clone").html();
        $(".attachment3 .increment").after(html);
    });

    $("body").on("click", ".attachment3 .btn-danger", function () {
        $(this)
            .parents(".attachment3 .control-group")
            .remove();
    });

    /**
     * Multiple file Upload attachment4
     */

    $(".attachment4 .btn-primary").click(function () {
        var html = $(".attachment4 .clone").html();
        $(".attachment4 .increment").after(html);
    });

    $("body").on("click", ".attachment4 .btn-danger", function () {
        $(this)
            .parents(".attachment4 .control-group")
            .remove();
    });

    /**
     * Multiple file Upload attachment6
     */

    $(".attachment6 .btn-primary").click(function () {
        var html = $(".attachment6 .clone").html();
        $(".attachment6 .increment").after(html);
    });

    $("body").on("click", ".attachment6 .btn-danger", function () {
        $(this)
            .parents(".attachment6 .control-group")
            .remove();
    });

    /**
     * Multiple file Upload attachment8
     */

    $(".attachment8 .btn-primary").click(function () {
        var html = $(".attachment8 .clone").html();
        $(".attachment8 .increment").after(html);
    });

    $("body").on("click", ".attachment8 .btn-danger", function () {
        $(this)
            .parents(".attachment8 .control-group")
            .remove();
    });

    /**
     * Multiple file Upload attachment9
     */

    $(".attachment9 .btn-primary").click(function () {
        var html = $(".attachment9 .clone").html();
        $(".attachment9 .increment").after(html);
    });

    $("body").on("click", ".attachment9 .btn-danger", function () {
        $(this)
            .parents(".attachment9 .control-group")
            .remove();
    });

    /**
     * on focus remove error message
     */
    var input_text = $(".form-group input");

    var input_textarea = $(".form-group textarea");

    $(input_text).on("mousedown", function () {
        $(this)
            .parent()
            .removeClass("has-error");
        $(this)
            .next(".error_message")
            .empty();
        $(this)
            .next()
            .removeClass("required");
    });

    $(input_textarea).on("mousedown", function () {
        $(this)
            .parent()
            .removeClass("has-error");
        $(this)
            .next()
            .empty();
        $(this)
            .next()
            .removeClass("required");
    });

    $(".input-group .custom-file-input").on("change", function () {
        $(this)
            .parent()
            .parent()
            .removeClass("has-error");
    });

    $("#activity_type").on("change", function () {
        if (
            this.value == "Course" ||
            this.value == "Regularly Scheduled Series"
        ) {
            $("#expiration_date").val("");
        }
    });

    $("#other_members").change(function () {
        if (this.checked) {
            $(".specify").removeClass("d-none");
            $(".specify").fadeIn();
        } else {
            $(".specify").fadeOut();
        }
    });

    /**
     *  educational need activate/deactivate
     */
    $("#enable_knowledge_need").change(function () {
        if (this.checked) {
            $("#knowledge_need").removeAttr("disabled");
        } else {
            $("#knowledge_need").attr("disabled", "true");
        }
        $(this)
            .parent()
            .parent()
            .removeClass("has-error");
    });

    $("#enable_skills_need").change(function () {
        if (this.checked) {
            $("#skills_need").removeAttr("disabled");
        } else {
            $("#skills_need").attr("disabled", "true");
        }
        $(this)
            .parent()
            .parent()
            .removeClass("has-error");
    });

    $("#enable_performance_need").change(function () {
        if (this.checked) {
            $("#performance_need").removeAttr("disabled");
        } else {
            $("#performance_need").attr("disabled", "true");
        }
        $(this)
            .parent()
            .parent()
            .removeClass("has-error");
    });

    /***********************
       Get MOC Boards
    ***********************/

    $(".moc").click(function () {
        if ($(this).is(":checked")) {
            var moc = $(this).val();
            if (moc == 1) {
                $("#MocBoards").removeClass("d-none");
                $("#MocView").removeClass("d-none");
            } else {
                $("#MocBoards").addClass("d-none");
                $("#MocView").addClass("d-none");
            }
        }
    });

    /***********************
       Get MOC Value
    ***********************/

    $(".moc_boards").click(function () {
        if ($(this).is(":checked")) {
            var moc_board = $(this).val();
            $(".ajax_loading").fadeIn();
            $.ajax({
                type: "GET",
                url: base_url + "/get/moc",
                data: {
                    moc_board: moc_board
                },
                success: function (result) {
                    $(".ajax_loading").fadeOut();
                    $("#MocView").append(result.moc_view);
                }
            });
        } else {
            var moc_board = $(this).val();

            $("#moc-board-" + moc_board).remove();
        }
    });

    /***********************
       Providership Value
    ***********************/

    $("#Providership").change(function () {
        var providership = $(this).val();

        if (providership == "Direct") {
            $(".JP").addClass("d-none");
            $("#JPContacts").addClass("d-none");
        }

        if (providership == "Joint") {
            $(".JP").removeClass("d-none");
            $("#JPContacts").removeClass("d-none");
        }
    });

    /***********************
       Joint Provider 2 Value
    ***********************/

    $(".has_jp_2").change(function () {
        var has_jp_2 = $(this).val();

        if (has_jp_2 == 0) {
            $(".JP2").addClass("d-none");
            $("#AddJPContacts2").addClass("d-none");
        }

        if (has_jp_2 == 1) {
            $(".JP2").removeClass("d-none");
            $("#AddJPContacts2").removeClass("d-none");
        }
    });

    /***********************
       Joint Provider 2 Value
    ***********************/

    $(".has_jp_2").change(function () {
        var has_jp_2 = $(this).val();

        if (has_jp_2 == 0) {
            $(".JP2").addClass("d-none");
            $("#AddJPContacts2").addClass("d-none");
        }

        if (has_jp_2 == 1) {
            $(".JP2").removeClass("d-none");
            $("#AddJPContacts2").removeClass("d-none");
        }
    });

    /***********************
       Joint Provider 3 Value
    ***********************/

    $(".has_jp_3").change(function () {
        var has_jp_3 = $(this).val();

        if (has_jp_3 == 0) {
            $(".JP3").addClass("d-none");
            $("#AddJPContacts3").addClass("d-none");
        }

        if (has_jp_3 == 1) {
            $(".JP3").removeClass("d-none");
            $("#AddJPContacts3").removeClass("d-none");
        }
    });

    /***********************
       JP Contact Value
    ***********************/

    $("#JointProvider").change(function () {
        var jp_id = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/get/jp-contact",
            data: {
                jp_id: jp_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#JPContacts").html(result.jp_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /***********************
       JP 2 Contact Value
    ***********************/

    $("#JointProvider2").change(function () {
        var jp_id_2 = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/get/jp-contact-2",
            data: {
                jp_id_2: jp_id_2
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#AddJPContacts2").html(result.jp2_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });


    /***********************
       JP 3 Contact Value
    ***********************/

    $("#JointProvider3").change(function () {
        var jp_id_3 = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/get/jp-contact-3",
            data: {
                jp_id_3: jp_id_3
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#AddJPContacts3").html(result.jp3_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /******************************
       Accreditation Type Value
    *******************************/

    $(document).on("change", ".isMliSelected", function () {
        $(this).val(this.checked ? "1" : "0");
        var credit_type_id = $(this).attr("credit_type");
        if ($(this).is(":checked")) {
            $(".mliText-" + credit_type_id).addClass("d-none");
        } else {
            $(".mliText-" + credit_type_id).removeClass("d-none");
        }
    });


    /******************************
       Accreditation Type Non-MLI Value
    *******************************/

    $(document).on("change", ".isNonMliSelected", function () {
        $(this).val(this.checked ? "1" : "0");
        var credit_type_id = $(this).attr("credit_type");
        if ($(this).is(":checked")) {
            $(".NonMliText-" + credit_type_id).addClass("d-none");
        } else {
            $(".NonMliText-" + credit_type_id).removeClass("d-none");
        }
    });
});

/**
 * error message
 */

function errorMessages(errors) {
    $(".error_message").empty();
    $(".error_message").removeClass("required");
    if (errors) {
        $.each(errors, function (index, value) {
            var errorDiv = ".error_" + index;
            var errorMessages = ".error_message_" + index;

            $(errorMessages).addClass("required");
            $(errorDiv)
                .parent()
                .addClass("has-error");
            $(errorMessages)
                .empty()
                .append(value);
            $(errorMessages).fadeIn();
        });
    }
}

/**
 * accreditation type drag and drop
 */

function dragStart(event) {
    event.dataTransfer.setData("Text", event.target.id);
}

function allowDrop(event) {
    event.preventDefault();
}

function drop(event, boxType) {
    event.preventDefault();
    var data = event.dataTransfer.getData("Text");
    // event.target.appendChild(document.getElementById(data));     

    var credit_type_id = data;

    if (boxType == 'MLI') {
        $("#BoxHR" + credit_type_id).removeClass('d-none');
    }  else {
        $("#BoxHR" + credit_type_id).addClass('d-none');
    }

    if (boxType == 'NonMLI') {
        $("#BoxHRNonMli" + credit_type_id).removeClass('d-none');
    } else {
        $("#BoxHRNonMli" + credit_type_id).addClass('d-none');
    }

    if (boxType == 'MLI') {
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/accreditation-type/details",
            data: {
                credit_type_id: credit_type_id,
                type: boxType,
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#accreditationType-" + credit_type_id).html(
                    result.accreditation_type_view
                );
                $("#levelText-" + credit_type_id).html(
                    result.level_text_view
                );
                $("#pharmacologyAmount-" + credit_type_id).html(
                    result.pharmacology_amount_view
                );
                $("#criteria-" + credit_type_id).html(result.criteria_view);
            }
        });
    } else {
        $(".ajax_loading").fadeOut();
        $("#accreditationTypeData-" + credit_type_id).remove();
        $("#levelTextData-" + credit_type_id).remove();
        $("#pharmacologyData-" + credit_type_id).remove();
        $("#criteriaData-" + credit_type_id).remove();
    }

    if (boxType == 'NonMLI') {
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/accreditation-type-non-mli/details",
            data: {
                credit_type_id: credit_type_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#accreditationTypeNonMli-" + credit_type_id).html(
                    result.accreditation_type_non_mli_view
                );
                $("#levelTextNonMli-" + credit_type_id).html(
                    result.level_text_non_mli_view
                );
                $("#pharmacologyAmountNonMli-" + credit_type_id).html(
                    result.pharmacology_amount_non_mli_view
                );
                $("#criteriaNonMli-" + credit_type_id).html(result.criteria__non_mli_view);
            }
        });
    } else {
        $(".ajax_loading").fadeOut();
        $("#accreditationTypeNonMliData-" + credit_type_id).remove();
        $("#levelTextNonMliData-" + credit_type_id).remove();
        $("#pharmacologyAmountNonMliData-" + credit_type_id).remove();
        $("#criteriaNonMliData-" + credit_type_id).remove();
    }
}