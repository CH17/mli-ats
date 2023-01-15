$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });

    /**
     * Tooltips demo
     *
     * */
    $(".tooltip-suggestion").tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    });

    /****************************
    ## Drag And Drop AudienceTable Table row
    *****************************/
    $("#AudienceTable").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#AudienceTable tr").length;

            $("#AudienceTable tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url + "/admin/audience-types",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop AudienceTableEdit Table row 
    *****************************/
    $("#AudienceTableEdit").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#AudienceTableEdit tr").length;

            var audience_id = $(this).attr("audience_id");

            $("#AudienceTableEdit tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url +
                        "/admin/audience-types/" +
                        audience_id +
                        "/edit",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop CreditTypeTable Table row
    *****************************/
    $("#CreditTypeTable").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#CreditTypeTable tr").length;

            $("#CreditTypeTable tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url + "/admin/credit-types",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop CreditTypeTableEdit Table row 
    *****************************/
    $("#CreditTypeTableEdit").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#CreditTypeTableEdit tr").length;

            var credit_type_id = $(this).attr("credit_type_id");

            $("#CreditTypeTableEdit tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url +
                        "/admin/credit-types/" +
                        credit_type_id +
                        "/edit",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });
    /****************************
    ## Drag And Drop MOCBoardTable Table row
    *****************************/
    $("#MOCBoardTable").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#MOCBoardTable tr").length;

            $("#MOCBoardTable tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url + "/admin/moc-boards",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop MOCBoardTableEdit Table row 
    *****************************/
    $("#MOCBoardTableEdit").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#MOCBoardTableEdit tr").length;

            var moc_board_id = $(this).attr("moc_board_id");

            $("#MOCBoardTableEdit tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url +
                        "/admin/moc-boards/" +
                        moc_board_id +
                        "/edit",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop MocCreditTable Table row
    *****************************/
    $("#MocCreditTable").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#MocCreditTable tr").length;

            $("#MocCreditTable tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url + "/admin/moc-credit-types",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop MocCreditTableEdit Table row 
    *****************************/
    $("#MocCreditTableEdit").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#MocCreditTableEdit tr").length;

            var moc_credit_id = $(this).attr("moc_credit_id");

            $("#MocCreditTableEdit tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url +
                        "/admin/moc-credit-types/" +
                        moc_credit_id +
                        "/edit",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop MocPractice Table row
    *****************************/
    $("#MocPractice").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#MocPractice tr").length;

            $("#MocPractice tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url + "/admin/moc-practices",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
    });

    /****************************
    ## Drag And Drop MocPracticeEdit Table row 
    *****************************/
    $("#MocPracticeEdit").sortable({
        update: function (e, ui) {
            var counter = 0;

            var item_length = $("#MocPracticeEdit tr").length;

            var moc_practice_id = $(this).attr("moc_practice_id");

            $("#MocPracticeEdit tr").each(function () {
                var item_id = $(this).attr("item_id");

                counter = counter + 1;

                $.ajax({
                    type: "GET",
                    url: base_url +
                        "/admin/moc-practices/" +
                        moc_practice_id +
                        "/edit",
                    data: {
                        counter: counter,
                        item_id: item_id
                    },
                    success: function (data) {
                        if (counter == item_length) {
                            window.location.reload();
                        }
                    }
                });
            });
        }
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


    /****************************
       Add Providership Value
    ******************************/

    $("#AddProvidership").change(function () {
        var providership = $(this).val();
        if (providership == "Direct") {
            $(".JP").addClass("d-none");
            $("#AddJPContacts").addClass("d-none");
        }

        if (providership == "Joint") {
            $(".JP").removeClass("d-none");
            $("#AddJPContacts").removeClass("d-none");
        }
    });

    /***********************
        JP Contact Value
    ***********************/

    $("#AddJointProvider").change(function () {
        var jp_id = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/activity/get/jp-contact",
            data: {
                jp_id: jp_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#AddJPContacts").html(result.jp_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /****************************
       Joint Provider 2 Value
    ******************************/


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

    /****************************
       Joint Provider 3 Value
    ******************************/


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

    /****************************
       Edit Joint Provider 2 Value
    ******************************/


    $(".has_jp_2_edit").change(function () {
        var has_jp_2 = $(this).val();

        if (has_jp_2 == 0) {
            $(".EditJP2").addClass("d-none");
            $("#EditJPContacts2").addClass("d-none");
            $("#JP_CR_Code_2").addClass("d-none");
        }

        if (has_jp_2 == 1) {
            $(".EditJP2").removeClass("d-none");
            $("#EditJPContacts2").removeClass("d-none");
            $("#JP_CR_Code_2").removeClass("d-none");
        }
    });


    /****************************
       Edit Joint Provider 3 Value
    ******************************/


    $(".has_jp_3_edit").change(function () {
        var has_jp_3 = $(this).val();

        if (has_jp_3 == 0) {
            $(".EditJP3").addClass("d-none");
            $("#EditJPContacts3").addClass("d-none");
            $("#JP_CR_Code_3").addClass("d-none");
        }

        if (has_jp_3 == 1) {
            $(".EditJP3").removeClass("d-none");
            $("#EditJPContacts3").removeClass("d-none");
            $("#JP_CR_Code_3").removeClass("d-none");
        }
    });

    /***********************
        JP Contact Value 2
    ***********************/

    $("#AddJointProvider2").change(function () {
        var jp_id_2 = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/activity/get/jp-contact-2",
            data: {
                jp_id_2: jp_id_2
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#AddJPContacts2").html(result.jp_contacts_2_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /***********************
        JP Contact Value 3
    ***********************/

    $("#AddJointProvider3").change(function () {
        var jp_id_3 = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/activity/get/jp-contact-3",
            data: {
                jp_id_3: jp_id_3
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#AddJPContacts3").html(result.jp_contacts_3_view);
                $(".chosen-select").chosen();
            }
        });
    });


    /*******************************
      EP Contact
     ********************************/
    $(".has_ep_1_edit").on('change', function () {

        var has_ep_1 = $(this).val();

        if (has_ep_1 == 0) {
            $(".EditEP1").addClass("d-none");
            $("#EditEPContacts1").addClass("d-none");
            $("#EP_CR_Code_1").addClass("d-none");
        }

        if (has_ep_1 == 1) {
            $(".EditEP1").removeClass("d-none");
            $("#EditEPContacts1").removeClass("d-none");
            $("#EP_CR_Code_1").removeClass("d-none");
        }
    });

    /***********************
        EP Contact Value 1
    ***********************/

    $("#EditEducationalPartner1").on('change', function () {

        var ep_id = $(this).val();

        $(".ajax_loading").fadeIn();

        $.ajax({
            type: "GET",
            url: base_url + "/activity/get/ep-contact",
            data: {
                ep_id: ep_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#EditEPContacts1").html(result.ep_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /*******************************
  EP Contact -2
 ********************************/
    $(".has_ep_2_edit").on('change', function () {

        var has_ep_2 = $(this).val();

        if (has_ep_2 == 0) {
            $(".EditEP2").addClass("d-none");
            $("#EditEPContacts2").addClass("d-none");
            $("#EP_CR_Code_2").addClass("d-none");
        }

        if (has_ep_2 == 1) {
            $(".EditEP2").removeClass("d-none");
            $("#EditEPContacts2").removeClass("d-none");
            $("#EP_CR_Code_2").removeClass("d-none");
        }
    });

    /***********************
    EP Contact Value 2
***********************/

    $("#EditEducationalPartner2").on('change', function () {

        var ep_id_2 = $(this).val();

        $(".ajax_loading").fadeIn();

        $.ajax({
            type: "GET",
            url: base_url + "/activity/get/ep-contact-2",
            data: {
                ep_id: ep_id_2
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#EditEPContacts2").html(result.ep_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /***********************
       Get MOC Boards
    ***********************/

    $(".EditMOC").click(function () {
        if ($(this).is(":checked")) {
            var moc = $(this).val();
            if (moc == 1) {
                $("#EditMocBoards").removeClass("d-none");
                $("#MocView").removeClass("d-none");
            } else {
                $("#EditMocBoards").addClass("d-none");
                $("#MocView").addClass("d-none");
            }
        }
    });


    /***********************
       Show ILNA Views
    ***********************/

    $(".EditILNACoding").click(function () {
        if ($(this).is(":checked")) {
            var moc = $(this).val();
            if (moc == 1) {
                $("#EditIlnaCodeItems").removeClass("d-none");
            } else {
                $("#EditIlnaCodeItems").addClass("d-none");
            }
        }
    });

    /***********************
      JAC13 Additional Info
   ***********************/

    $(".EditJAC13").click(function () {
        if ($(this).is(":checked")) {
            var jac13 = $(this).val();
            if (jac13 == 1) {
                $("#JAC13_extra").removeClass("d-none");
            } else {
                $("#JAC13_extra").addClass("d-none");
            }
        }
    });

    /***********************
      JAC14 Additional Info
   ***********************/

    $(".EditJAC14").click(function () {
        if ($(this).is(":checked")) {
            var jac13 = $(this).val();
            if (jac13 == 1) {
                $("#JAC14_extra").removeClass("d-none");
            } else {
                $("#JAC14_extra").addClass("d-none");
            }
        }
    });


    /***********************
       Get MOC Value
    ***********************/

    $(".edit_moc_boards").click(function () {
        if ($(this).is(":checked")) {
            var project_id = $(this).attr("project_id");
            var moc_board = $(this).val();
            $(".ajax_loading").fadeIn();
            $.ajax({
                type: "GET",
                url: base_url + "/get/moc/edit",
                data: {
                    moc_board: moc_board,
                    project_id: project_id
                },
                success: function (result) {
                    $(".ajax_loading").fadeOut();
                    $("#MocView").append(result.moc_view);
                }
            });
        } else {
            var moc_board = $(this).val();
            $("#edit-moc-board-" + moc_board).remove();
        }
    });

    /***********************
       Providership Value
    ***********************/

    $("#Providership").change(function () {
        var providership = $(this).val();

        if (providership == "Direct") {
            $(".JP").addClass("d-none");
            $("#EditJPContacts").addClass("d-none");
            $("#JP_CR_Code").addClass("d-none");
        }

        if (providership == "Joint") {
            $(".JP").removeClass("d-none");
            $("#EditJPContacts").removeClass("d-none");
            $("#JP_CR_Code").removeClass("d-none");
        }
    });

    /***********************
       JP Contact Value
    ***********************/

    $("#EditJointProvider").change(function () {
        var project_id = $(this).attr("project_id");

        var jp_id = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/get/jp-contact/edit",
            data: {
                jp_id: jp_id,
                project_id: project_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#EditJPContacts").html(result.jp_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /***********************
       JP Contact 2 Value
    ***********************/

    $("#EditJointProvider2").change(function () {
        var project_id = $(this).attr("project_id");

        var jp_id_2 = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/get/jp-contact-2/edit",
            data: {
                jp_id_2: jp_id_2,
                project_id: project_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#EditJPContacts2").html(result.jp2_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });

    /***********************
       JP Contact 3 Value
    ***********************/

    $("#EditJointProvider3").change(function () {
        var project_id = $(this).attr("project_id");

        var jp_id_3 = $(this).val();
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/get/jp-contact-3/edit",
            data: {
                jp_id_3: jp_id_3,
                project_id: project_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#EditJPContacts3").html(result.jp3_contacts_view);
                $(".chosen-select").chosen();
            }
        });
    });



    /******************************
           MLI Value
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
           MLI Value
    *******************************/

    $(document).on("change", ".isNonMliSelected", function () {
        $(this).val(this.checked ? "1" : "0");
        var credit_type_id = $(this).attr("credit_type");
        if ($(this).is(":checked")) {
            $(".nonMliText-" + credit_type_id).addClass("d-none");
        } else {
            $(".nonMliText-" + credit_type_id).removeClass("d-none");
        }
    });

    /******************************
        Select Activity
    *******************************/

    $(document).on("change", ".isSelectedActivity", function () {
        var project_id = $(this).val();
        $(".ajax_loading").fadeIn();
        if (project_id) {
            $.ajax({
                type: "GET",
                url: base_url + "/activity/view",
                data: {
                    project_id: project_id
                },
                success: function (result) {
                    $(".ajax_loading").fadeOut();
                    $("#Activity-Details").html(result.activity_view);
                    $("#ImportCsv").html(result.import_csv);
                }
            });
        } else {
            $(".ajax_loading").fadeOut();
            $("#activity-content").remove();
            $("#import-csv-form").remove();
        }
    });

    /***********************************
        Select Activity For Participant
    *************************************/

    $(document).on("change", ".isSelectedActivityForPar", function () {
        var project_id = $(this).val();
        $(".ajax_loading").fadeIn();
        if (project_id) {
            $.ajax({
                type: "GET",
                url: base_url + "/activity-participant/view",
                data: {
                    project_id: project_id
                },
                success: function (result) {
                    $(".ajax_loading").fadeOut();
                    $("#Activity-Participant-Details").html(
                        result.activity_view
                    );
                    $("#ImportCsvActPar").html(result.import_csv);
                }
            });
        } else {
            $(".ajax_loading").fadeOut();
            $("#activity-participant-content").remove();
            $("#act-par-import-csv-form").remove();
        }
    });

    /**
     * Multiple file Upload for Related Documents
     */

    $(".related_documents .btn-primary").click(function () {
        var html = $(".related_documents .clone").html();
        $(".related_documents .increment").after(html);
    });

    $("body").on("click", ".related_documents .btn-danger", function () {
        $(this)
            .parents(".related_documents .control-group")
            .remove();
    });

    $("#related_documents_form").submit(function (event) {
        event.preventDefault();

        var Form_Data = new FormData(this);
        $(".ajax_loading").fadeIn();

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
                        html: true,
                        title: "",
                        text: "Successfully Updated",
                        type: "success",
                        closeOnConfirm: false
                    },
                        function () {
                            location.reload(true);
                        }
                    );
                }
            }
        });
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

    /****************************
       Datepicker jQurey
     *****************************/

    $('.datepicker').datepicker({
        format: "mm/dd/yyyy",
    });

    /*****************************
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
                 <option value="Chair/Planner/Presenter">Chair/Planner/Presenter</option>
                 <option value="Co-Chair/Planner/Presenter">Co-Chair/Planner/Presenter</option>
                 <option value="Planner/Presenter">Planner/Presenter</option>
                 <option value="Planner/Presenter (Fellow)">Planner/Presenter (Fellow)</option>
                 <option value="Planner/Presenter (Student)">Planner/Presenter (Student)</option>
                 <option value="Planner/Presenter (Patient Caregiver)">Planner/Presenter (Patient Caregiver)</option>
                 <option value="Presenter">Presenter</option>
                 <option value="Nurse Planner">Nurse Planner</option>
                 <option value="Pharmacist Planner">Pharmacist Planner</option>
                 <option value="Planner">Planner</option>
                 <option value="Content/Peer Reviewer">Content/Peer Reviewer</option>
                 <option value="other">other</option>
            </select>
            <br>
            <input id="specify-role_in_activity-${rowCount}" class="form-control d-none" type="text" name="controll_individuals[${rowCount}][role_in_activity]" value="">
        </td>
        <td>
            <select class="form-control" name="controll_individuals[${rowCount}][commercial_interest]">                                  
                <option value="None">None</option>
                <option value="See Attachment 2B">See Attachment 2B</option>                                              
            </select>
        </td>
        <td>        
            <select class="form-control" name="controll_individuals[${rowCount}][nature_of_relationship]">                                 
                <option value="N/A">N/A</option>
                <option value="See Attachment 2B">See Attachment 2B</option>                                              
            </select>
        </td>
        <td></td>
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
                '][amount]"> </td><td> <div class="checkbox checkbox-primary mt-6"> <input class="form-check-input" type="checkbox"  name="commercial_supporters[' +
                rowCount +
                '][in_kind]" value="1"> <label class="form-check-label"></label> </div></td>' +
                '<td><div class="checkbox checkbox-primary mt-6"><input class="form-check-input" type="checkbox" value="1" name="commercial_supporters[' +
                rowCount +
                '][fe_loa]"><label class="form-check-label"></label></div></td>' +
                "<td></td>" +
                '</tr>'
        );
    });

    /******************************
    ## Add Commercial Activity 
    ## More Fields append
    ******************************/
    $(document).on("click", "#addMoreCommercialActivity", function () {
        var rowCount = $("#AddCommercialActivity tr").length;
        $("#AddCommercialActivity tbody").append(
            '<tr> <td><input class="form-control" type="text"  name="commercial_supporters[' +
            rowCount +
            '][name]" ></td> <td> <input type="text" class="form-control" name="commercial_supporters[' +
            rowCount +
            '][grant_id]"> </td><td> <input type="text" class="form-control" name="commercial_supporters[' +
            rowCount +
            '][amount]"> </td><td> <div class="checkbox checkbox-primary"> <input class="form-check-input" type="checkbox"  name="commercial_supporters[' +
            rowCount +
            '][in_kind]" value="1"> <label class="form-check-label"></label> </div></td><td><div class="input-group custom-file mt-8"><input type="file" class="custom-file-input" id="support_attachment_7_ ' +
            rowCount +
            '" name="support_attachment_7_' +
            rowCount +
            '"> </div></td>></label></td></tr>'
        );
    });

    /**
     * Other Disclosures specify
     */

    $(".other-role_in_activity").change(function () {
        var count = $(this).attr('count');
        var role_in_activity = $("#other-role_in_activity-" + count).val();
        if (role_in_activity == 'other') {
            $("#specify-role_in_activity-" + count).removeClass("d-none");
            $("#specify-role_in_activity-" + count).fadeIn();
        } else {
            $("#specify-role_in_activity-" + count).val(role_in_activity);
            $("#specify-role_in_activity-" + count).fadeOut();
        }
    });

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

    $(document).on(
        "change",
        '.UploadAttachment7.custom-file input[type="file"]',
        function (e) {
            var fileName = e.target.files[0].name;
            $(this)
                .parent()
                .prev()
                .prev()
                .children()
                .html(fileName);
        }
    );

    /*
     * Add New Activity
     */
    $("#AddActivity").submit(function (event) {
        event.preventDefault();

        var Form_Data = new FormData(this);
        $(".ajax_loading").fadeIn();

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
                        html: true,
                        title: "",
                        text: result.message,
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
    });

    /*
     * Update project
     */
    $("#eForm").submit(function (event) {
        event.preventDefault();

        var Form_Data = new FormData(this);
        $(".ajax_loading").fadeIn();

        console.log(Form_Data);
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: Form_Data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                console.log(result);

                $(".ajax_loading").fadeOut();
                if (result.success) {
                    swal({
                        html: true,
                        title: "",
                        text: "Successfully Updated",
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
    });


    /*
     * Upload Project Files
     */
    $("#eFormUpload").on('submit', function (event) {
        event.preventDefault();

        var Form_Data = new FormData(this);
        $(".ajax_loading").fadeIn();
        
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: Form_Data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {                
                console.log(result);
                $(".ajax_loading").fadeOut();
                $('#uploadModal').modal('hide')
                if (result.success) {
                    swal({
                        html: true,
                        title: "",
                        text: "Successfully Updated",
                        type: "success",
                        closeOnConfirm: false
                    },
                        function () {
                            location.reload(true);
                        }
                    );
                } else {
                   // errorMessages(result.errors);
                    return false;
                }
            }
        });
    });

    /*
     * Update project notes
     */
    $("#updateNotes").submit(function (event) {
        event.preventDefault();

        var Form_Data = new FormData(this);
        $(".ajax_loading").fadeIn();

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
                        html: true,
                        title: "",
                        text: "Successfully Updated",
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
    });

    /*
     * Add User
     */
    $("#add-user").submit(function (event) {
        event.preventDefault();
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
                        html: true,
                        title: "",
                        text: result.message,
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
    });

    /*
     * Update User
     */
    $("#update_user_data").submit(function (event) {
        event.preventDefault();
        $(".ajax_loading").fadeIn();
        var formData = new FormData(this);
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".ajax_loading").fadeOut();

                if (result.success) {
                    swal({
                        html: true,
                        title: "",
                        text: result.message,
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
    });

    /*
     * Send Message
     */

    $("#send-message").keypress(function (e) {
        if (e.which == 13) {
            event.preventDefault();
            $(".ajax_loading").fadeIn();
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (result) {
                    $(".ajax_loading").fadeOut();
                    if (result.success) {
                        location.reload(true);
                    } else {
                        errorMessages(result.errors);
                        return false;
                    }
                }
            });
        }
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

    /**
     * clear expiration date
     */

    $("#activity_type").on("change", function () {
        if (
            this.value == "Course" ||
            this.value == "Regularly Scheduled Series"
        ) {
            $("#expiration_date").val("");
        }
    });

    /**
     * Other member specify
     */

    $("#other_members").change(function () {
        if (this.checked) {
            $(".specify").removeClass("d-none");
            $(".specify").fadeIn();
        } else {
            $(".specify").fadeOut();
        }
    });
});

/*
 * Update User
 */
$("#update-password").submit(function (event) {
    event.preventDefault();

    $(".ajax_loading").fadeIn();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (result) {
            $(".ajax_loading").fadeOut();
            if (result.success) {
                swal({
                    html: true,
                    title: "",
                    text: result.message,
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
});

/*
 * Update User Password
 */
$("#update-user-password").submit(function (event) {
    event.preventDefault();

    $(".ajax_loading").fadeIn();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (result) {
            $(".ajax_loading").fadeOut();
            if (result.success) {
                swal({
                    html: true,
                    title: "",
                    text: result.message,
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
});

/*
 * Update status
 */
$("#change-status").submit(function (event) {
    event.preventDefault();

    $(".ajax_loading").fadeIn();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (result) {
            $(".ajax_loading").fadeOut();
            if (result.success) {
                swal({
                    html: true,
                    title: "",
                    text: result.message,
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
});

/*
 * Force status update
 */
$("#force-status-change").submit(function (event) {
    event.preventDefault();

    $(".ajax_loading").fadeIn();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (result) {
            $(".ajax_loading").fadeOut();
            if (result.success) {
                swal({
                    html: true,
                    title: "",
                    text: result.message,
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
            $(errorDiv).addClass("required");
            $(errorDiv)
                .parent()
                .addClass("has-error");
            $(errorDiv)
                .empty()
                .append(value);
            $(errorDiv).fadeIn();
        });
    }
}

/**
 * Delete
 */

// $('.deleteConfirmation').on('click', function (e) {
//     e.preventDefault();

//     swal({
//         title: "Are you sure?",
//         text: "Do you want to delete this item!",
//         type: "warning",
//         showCancelButton: true,
//         confirmButtonClass: "btn-danger",
//         confirmButtonText: "Yes, delete it!",
//         cancelButtonText: "No, cancel!",
//         closeOnConfirm: true,
//         closeOnCancel: true
//     },
//         function (isConfirm) {
//             if (isConfirm) {
//                 $("#" + form_id).submit();
//             }
//         }
//     );
//     return false;
// });

function deleteConfirmation(form_id) {
   

    console.log(form_id);
    
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this item!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        closeOnConfirm: true,
        closeOnCancel: true
    },
        function (isConfirm) {
            if (isConfirm) {
                $("#" + form_id).submit();
            }
        }
    );

    return false;
}

/**
 * Change Activity status
 */

function changeStatus(form_id) {
    swal({
        title: "",
        type: "warning",
        text: `<div class="statusConfirmation text-left">           
            <label>I attest that the attachments for the Activity
                Evidence, Joint Provider
                Statements, Commercial Support(if applicable), and the JAC with Commendation criteria have been
                reviewed and are approved.</label>
            </div>`,
        html: true,
        showCancelButton: true,
        confirmButtonClass: "ml-8 mb-10 btn-primary",
        cancelButtonClass: "mb-10 btn-default",
        confirmButtonText: "Confirm!",
        closeOnConfirm: false,
        closeOnCancel: true
    },
        function (isConfirm) {
            if (isConfirm) {
                $("#" + form_id).submit();
            }
        }
    );

    return false;
}

/******************************
       Read Notification
*******************************/

function readNotification(notification_id) {
    $(".ajax_loading").fadeIn();
    $.ajax({
        type: "POST",
        url: base_url + "/admin/notifications/read",
        data: {
            notification_id: notification_id
        },
        success: function (result) {
            $(".ajax_loading").fadeOut();
            if (result.success == true) {
                swal({
                    html: true,
                    title: "",
                    text: "Successfully marked as read",
                    type: "success",
                    closeOnConfirm: false
                },
                    function () {
                        window.location.reload(true);
                    }
                );
            }
        }
    });
    return false;
}
/******************************
       Remove Attachment 7
*******************************/

function removeAttachment7(counter) {
    $("#com_support_" + counter).remove();
}

/******************************
    Remove Evidence Attachment
*******************************/

function RemoveAttactmentEVD(attachment, count) {
   
   $("#RemoveAttactmentEVD-" + attachment + "-" + count).val(count);
}

/******************************
  Remove Disclosures Attachment
*******************************/

function RemoveAttactmentDIS(count) {
    $("#RemoveAttactmentDIS-" + count).val(count);
}

/******************************
  Remove  Grant Related Documents
*******************************/

function removeRelDocuments(count) {
    $("#removeRelDocs-" + count).val(count);
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

function drop(event, boxType, project_id) {
    event.preventDefault();
    var data = event.dataTransfer.getData("Text");
    var credit_type_id = data;

    if (boxType == 'MLI') {
        $("#BoxHR" + credit_type_id).removeClass('d-none');
    } else {
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
            url: base_url + "/accreditation-type/edit",
            data: {
                credit_type_id: credit_type_id,
                project_id: project_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#editAccreditationType-" + credit_type_id).html(
                    result.accreditation_type_view
                );
                $("#editLevelText-" + credit_type_id).html(
                    result.level_text_view
                );
                $("#editPharmacologyAmount-" + credit_type_id).html(
                    result.pharmacology_amount_view
                );
                $("#editCriteria-" + credit_type_id).html(
                    result.criteria_view
                );
            }
        });
    } else {
        $(".ajax_loading").fadeOut();
        $("#editAccreditationTypeData-" + credit_type_id).remove();
        $("#editLevelTextData-" + credit_type_id).remove();
        $("#editPharmacologyData-" + credit_type_id).remove();
        $("#editCriteriaData-" + credit_type_id).remove();
    }

    if (boxType == 'NonMLI') {
        $(".ajax_loading").fadeIn();
        $.ajax({
            type: "GET",
            url: base_url + "/accreditation-type-non-mli/edit",
            data: {
                credit_type_id: credit_type_id,
                project_id: project_id
            },
            success: function (result) {
                $(".ajax_loading").fadeOut();
                $("#editAccreditationTypeNonMli-" + credit_type_id).html(
                    result.accreditation_type_non_mli_view
                );
                $("#editLevelTextNonMli-" + credit_type_id).html(
                    result.level_text_non_mli_view
                );
                $("#editPharmacologyAmountNonMli-" + credit_type_id).html(
                    result.pharmacology_amount_non_mli_view
                );
                $("#editCriteriaNonMli-" + credit_type_id).html(
                    result.criteria_non_mli_view
                );
                $("#editAccreditorNonMli-" + credit_type_id).html(
                    result.accreditor_non_mli_view
                );
            }
        });
    } else {
        $(".ajax_loading").fadeOut();
        $("#editAccreditationTypeNonMliData-" + credit_type_id).remove();
        $("#editLevelTextNonMliData-" + credit_type_id).remove();
        $("#editPharmacologyNonMliData-" + credit_type_id).remove();
        $("#editCriteriaNonMliData-" + credit_type_id).remove();
        $("#editAccreditorNonMliData-" + credit_type_id).remove();
    }
}


function removeControlIndividual(count, project_id) {

    $(".ajax_loading").fadeIn();
    $.ajax({
        type: "GET",
        url: base_url + "/project/remove-individual",
        data: {
            count: count,
            project_id: project_id
        },
        success: function (result) {

            $(".ajax_loading").fadeOut();
            window.location.reload(true);
        }
    });
}

$(".btn_upload_modal").on('click', function () {
    let type = $(this).data('type');
    let update = $(this).data('update');
    let text = '';
    text = `<input type="file" name="attachments[${type}]" class="form-control">`;
    
    if (update) {
         text += `<input type="hidden" name="update" value='${update}'>`;
    }
    $('#uploadModalBody').html(text);
    $("#uploadModalTitle").html(
        `Upload File - ${type.charAt(0).toUpperCase() + type.slice(1)}`
    );
    $('#uploadModal').modal('show')    
})


$(".review_modal").on('click', function () {
    var id = $(this).data('file');
    var status = $(this).data('status');
    var title = $(this).data('name');
    var text = '';
    text += `<div class="form-check form-group mr-8">
                    <input class="form-check-input" type="radio" name="status" id="status1" value="not-reviewed" ${(status == 'not-reviewed') ? 'checked': '' }>
                    <label class="form-check-label" for="status1">Not Reviewed</label>
                </div>`;
    
     text += `<div class="form-check form-group ml-12 mr-8">
                    <input class="form-check-input" type="radio" name="status" id="status2" value="need-modification" ${(status == 'need-modification') ? 'checked': '' }>
                    <label class="form-check-label" for="status2">Need Modification</label>
                </div>`;
    
     text += `<div class="form-check form-group ml-12">
                    <input class="form-check-input" type="radio" name="status" id="status3" value="confirmed" ${(status == 'confirmed') ? 'checked': '' }>
                    <label class="form-check-label" for="status3">Confirmed</label>
                </div>`;
    
     text += `<div class="form-group mt-10 ">
                <label for="comment">Comment</label><br>
                <textarea id="comment" class="form-control" name="comment" cols="60" rows="3"></textarea>
            </div>`;
    
    text += `<input type='hidden' name='file_no' value='${id}'/>`;
    
    $('#reviewModalBody').html(text);
   $("#reviewModalTitle").html(`Review:  ${title}`);
    $('#reviewModal').modal('show')    
})



    /*
     * Upload Project Files
     */
    $("#eFormReview").on('submit', function (event) {
        event.preventDefault();

        var Form_Data = new FormData(this);
        $(".ajax_loading").fadeIn();
        
        $.ajax({
            url: $(this).attr("action"),
            type: "POST",
            data: Form_Data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                
                $(".ajax_loading").fadeOut();
                $('#reviewModal').modal('hide')
                if (result.success) {
                    swal({
                        html: true,
                        title: "",
                        text: "Successfully Updated",
                        type: "success",
                        closeOnConfirm: false
                    },
                        function () {
                            location.reload(true);
                        }
                    );
                } else {
                   // errorMessages(result.errors);
                     location.reload(true);
                    return false;
                }
            }
        });
    });
