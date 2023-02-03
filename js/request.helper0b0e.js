$(document)
    .ready(function () {
        $('button[type=submit].use-ajax-submit-form-expand-content-view').click(function (evt) {
            evt.preventDefault();
            var $button = $(this);
            var $form = $button.closest("form");
            var valData = $form.serialize();
            var pathUrl = $form.attr('action');

            $.post(pathUrl, valData, function (data) {
                var contentView = $(".content-view");
                if (contentView !== undefined && contentView.hasClass("col-lg-7")) {
                    contentView.removeClass("col-lg-7").addClass("col-lg-12");
                    var contentViewUrl = contentView.data("url");

                    $.get(contentViewUrl, function (list) {
                        contentView.html(list);
                        loadTable();
                        showRemoveLoading();

                    })
                        .fail(function (xhr, textStatus, errorThrown) {
                            displayServerMessage("Error", xhr.responseText);
                        });
                }
                $('.form-view').replaceWith(getEmptyFormContainer());
                displayServerMessage("Success", data);

                showRemoveLoading();
                //loadTable();
            }).fail(function (xhr, textStatus, errorThrown) {

                displayServerMessage("Error", xhr.responseText);
            });
            showRemoveLoading();
        });

        $('button[type=submit].use-ajax-submit-form-replace-content-view').click(function (evt) {
            evt.preventDefault();
            var $button = $(this);
            var $form = $button.closest("form");
            var valData = $form.serialize();
            var pathUrl = $form.attr('action');

            $.post(pathUrl, valData, function (data) {
                var contentView = $(".content-view");
                if (contentView !== undefined && contentView.hasClass("col-lg-7")) {
                    contentView.removeClass("col-lg-7").addClass("col-lg-12");
                }

                $('.replace-content-view').replaceWith(data);

                showRemoveLoading();
                loadTable();
                attachDateRange();
            }).fail(function (xhr, textStatus, errorThrown) {

                displayServerMessage("Error", xhr.responseText);
            });
            showRemoveLoading();
        });

        $('a.use-ajax-replace-content-view-child').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);
            var contentView = $(".content-view-child");

            $.get($a.attr('href'), function (data) {
                contentView.replaceWith($(data));
                loadTable();
                showRemoveLoading();
            }).fail(function (xhr, textStatus, errorThrown) {
                displayServerMessage("Error", xhr.responseText);
                showRemoveLoading();
            });
            showRemoveLoading();
        });

        $('a.use-ajax-cancel-form-expand-content-view').click(function (evt) {
            evt.preventDefault();
            showRemoveLoading();

            var contentView = $(".content-view");
            var formView = $(".form-view");

            if (contentView !== undefined && contentView.hasClass("col-lg-7")) {
                contentView.removeClass("col-lg-7").addClass("col-lg-12");
                contentView.removeClass("hidden");
            }

            if (formView !== undefined) {
                formView.replaceWith('<div class="form-view col-lg-5"></div>');
            }

            showRemoveLoading();
        });

        $('a.use-ajax-display-form').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);

            $.get($a.attr('href'),
                function (data) {

                    var contentView = $(".content-view");

                    //adjust content-view
                    if (contentView !== undefined && contentView.hasClass("col-lg-12")) {
                        contentView.removeClass("col-lg-12").addClass("col-lg-7");
                    }

                    var formView = $('.form-view');
                    if (!formView.hasClass("col-lg-5")) {
                        formView.addClass("col-lg-5");
                    }
                    $('.form-view').replaceWith($(data));
                    resetSelect();
                    showRemoveLoading();
                    loadTableReinitialized();
                    attachDateRange();
                    setTime();
                })
                .fail(function (xhr, textStatus, errorThrown) {
                    displayServerMessage("Error", xhr.responseText);
                });
            $.datepicker.initialized = false;
            showRemoveLoading();
        });

        $('a.use-ajax-display-form-hide-content-view').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);

            $.get($a.attr('href'),
                function (data) {

                    var contentView = $(".content-view");

                    //adjust content-view
                    if (contentView !== undefined && contentView.hasClass("col-lg-12")) {
                        contentView.removeClass("col-lg-12").addClass("col-lg-7");
                        contentView.addClass("hidden");
                    }

                    var formView = $('.form-view');
                    if (!formView.hasClass("col-lg-12")) {
                        formView.addClass("col-lg-12");
                    }
                    $('.form-view').replaceWith($(data));
                    resetSelect();
                    showRemoveLoading();

                })
                .fail(function (xhr, textStatus, errorThrown) {
                    displayServerMessage("Error", xhr.responseText);
                });
            $.datepicker.initialized = false;
            showRemoveLoading();
        });

        $('a.use-ajax-display-dialog').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);

            $.get($a.attr('href'),
                function (data) {

                    displayServerMessage("Successful", data);
                    showRemoveLoading();
                })
                .fail(function (xhr, textStatus, errorThrown) {
                    displayServerMessage("Error", xhr.responseText);
                });
            $.datepicker.initialized = false;
            showRemoveLoading();
        });

        $('a.use-ajax-delete-tr').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);
            $.get($a.attr('href'), function (data) {
                $a.closest('tr').remove();
                showRemoveLoading();
                //ReloadTable();
                displayServerMessage("Success", data);
            }).fail(function (xhr, textStatus, errorThrown) {
                displayServerMessage("Error", xhr.responseText);
            });
            showRemoveLoading();
        });

        $('a.use-ajax-replace-tr').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);
            $.get($a.attr('href'), function (data) {
                $a.parents('tr').replaceWith($(data));
                showRemoveLoading();
                //loadTable();
                //displayServerMessage("Success", data);
            }).fail(function (xhr, textStatus, errorThrown) {
                displayServerMessage("Error", xhr.responseText);
            });
            showRemoveLoading();
        });

        $('a.use-ajax-replace-tr-update-content-view').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);
            $.get($a.attr('href'), function (data) {
                $a.parents('tr').replaceWith($(data));
                var contentView = $(".content-view");
                if (contentView !== undefined && contentView.hasClass("col-lg-7")) {
                    var contentViewUrl = contentView.data("url");

                    $.get(contentViewUrl, function (list) {
                        contentView.html(list);
                        loadTable();
                        showRemoveLoading();

                    })
                        .fail(function (xhr, textStatus, errorThrown) {
                            displayServerMessage("Error", xhr.responseText);
                        });
                }
                showRemoveLoading();
                //loadTable();
                //displayServerMessage("Success", data);
            }).fail(function (xhr, textStatus, errorThrown) {
                displayServerMessage("Error", xhr.responseText);
            });
            showRemoveLoading();
        });

        $('a.use-ajax-replace-div').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);
            $.get($a.attr('href'), function (data) {
                $a.parents('.replace-div').replaceWith($(data));
                //showRemoveLoading();
                //loadTable();
                //displayServerMessage("Success", data);
            }).fail(function (xhr, textStatus, errorThrown) {
                displayServerMessage("Error", xhr.responseText);
            });
            //showRemoveLoading();
        });

        $('a.use-ajax-replace-this').click(function (evt) {
            evt.preventDefault();
            var $a = $(this);
            $.get($a.attr('href'), function (data) {
                $('.replace-this').replaceWith($(data));
                $("body").getNiceScroll().resize();
            }).fail(function (xhr, textStatus, errorThrown) {
                displayServerMessage("Error", xhr.responseText);
            });
            //showRemoveLoading();
        });

        //$("button[type=submit].use-ajax-submit-form-replace-form").click(function (event) {
        //    var $button = $(this);
        //    var $form = $button.closest("form");
        //    var valData = $form.serialize();
        //    var pathUrl = $form.attr('action');

        //    $.post(pathUrl, valData, function (data) {
        //        $('.replace-form').replaceWith(getEmptyFormContainer());
        //        //displayServerMessage("Success", data);

        //        //showRemoveLoading();
        //        //loadTable();
        //    }).fail(function (xhr, textStatus, errorThrown) {

        //        //displayServerMessage("Error", xhr.responseText);
        //    });
        //});

    });
