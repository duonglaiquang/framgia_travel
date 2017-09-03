$(document).ready(function () {
    $('#logout-1').on('click', function () {
        $('#logout-form').submit();
    });

    $('#pickyDate').datepicker({
        format: "yyyy/mm/dd"
    });

    popup = {
        init: function () {
            $('figure').click(function () {
                popup.open($(this));
            });

            $(document).on('click', '.popup img', function () {
                return false;
            }).on('click', '.popup', function () {
                popup.close();
            })
        },
        open: function ($figure) {
            $('.gallery').addClass('pop');
            $popup = $('<div class="popup" />').appendTo($('body'));
            $fig = $figure.clone().appendTo($('.popup'));
            $bg = $('<div class="bg" />').appendTo($('.popup'));
            $close = $('<div class="close"><svg><use xlink:href="#close"></use></svg></div>').appendTo($fig);
            $shadow = $('<div class="shadow" />').appendTo($fig);
            src = $('img', $fig).attr('src');
            $shadow.css({backgroundImage: 'url(' + src + ')'});
            $bg.css({backgroundImage: 'url(' + src + ')'});
            setTimeout(function () {
                $('.popup').addClass('pop');
            }, 10);
        },
        close: function () {
            $('.gallery, .popup').removeClass('pop');
            setTimeout(function () {
                $('.popup').remove()
            }, 100);
        }
    };
    popup.init();

    $('.abc').click(function () {
        listcard = $(this).parent('.list-card');
        categoryID = listcard.find('.categoryID').val();
        status = listcard.find('.status').val()

        if (categoryID == 1) {
            listcard.find('.hotel').css('display', 'inherit');
        }
        else if (categoryID == 2) {
            listcard.find('.restaurant').css('display', 'inherit');
        }
        else if (categoryID == 3) {
            listcard.find('.activity').css('display', 'inherit');
        }

        if (status == 0) {
            listcard.find('.pending').css('display', 'inherit');
        }
        else if (status == 1) {
            listcard.find('.approved').css('display', 'inherit');
        }
        else if (status == 2) {
            listcard.find('.canceled').css('display', 'inherit');
        }
        else if (status == 3) {
            listcard.find('.modifyed').css('display', 'inherit');
        }

    });
    $('.abc').trigger('click');

    all = 0;
    all1 = 0;
    $('#all,#all1').prop('checked', true);
    $('.item').show();
    $('#hotel,#restaurant,#activity,#pending,#approved,#canceled').attr("disabled", true);

    $('input[type="checkbox"]#all').on('change', function () {
        if (!$(this).is(":checked")) {
            $('#hotel,#restaurant,#activity').attr("disabled", false);
            if (!$('#all1').is(":checked") && !$('#pending').is(":checked") && !$('#approved').is(":checked") && !$('#canceled').is(":checked"))
                $('.item').css('display', 'none');
        }

        else {
            $('#hotel,#restaurant,#activity').attr("disabled", true);
            $('.item').css('display', 'inherit');
        }
    });

    $('input[type="checkbox"]#all1').on('change', function () {
        if (!$(this).is(":checked")) {
            $('#pending,#approved,#canceled').attr("disabled", false);
            if (!$('#all').is(":checked") && !$('#hotel').is(":checked") && !$('#restaurant').is(":checked") && !$('#activity').is(":checked"))
                $('.item').css('display', 'none');
        }

        else {
            $('#pending,#approved,#canceled').attr("disabled", true);
            $('.item').css('display', 'inherit');
        }
    });

    $('input[type="checkbox"]#hotel').on('change', function () {
        if ($(this).is(":checked")) {
            all++;
            if (all > 0) {
                $('#all').attr("disabled", true);
            }

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 1) {
                    item.css('display', 'inherit');
                }
            });
            $('.abcd').trigger('click');

            $('input[type="checkbox"]#pending').on('change', function () {
                if ($(this).is(":checked")) {
                    all1++;
                    if (all1 > 0) {
                        $('#all1').attr("disabled", true);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        status = listcard.find('.status').val();
                        if (categoryID != 1 || status != 0) {
                            item.css('display', 'none');
                        }
                    });
                    $('.abcd').trigger('click');
                }

                else {
                    all1--;
                    if (all1 == 0) {
                        $('#all1').attr("disabled", false);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        if (categoryID == 1) {
                            item.css('display', 'inherit');
                        }
                    });
                    $('.abcd').trigger('click');
                }
            });

            $('input[type="checkbox"]#approved').on('change', function () {
                if ($(this).is(":checked")) {
                    all1++;
                    if (all1 > 0) {
                        $('#all1').attr("disabled", true);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        status = listcard.find('.status').val();
                        if (categoryID != 1 || status != 1) {
                            item.css('display', 'none');
                        }
                    });
                    $('.abcd').trigger('click');
                }

                else {
                    all1--;
                    if (all1 == 0) {
                        $('#all1').attr("disabled", false);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        if (categoryID == 1) {
                            item.css('display', 'inherit');
                        }
                    });
                    $('.abcd').trigger('click');
                }
            });

            $('input[type="checkbox"]#canceled').on('change', function () {
                if ($(this).is(":checked")) {
                    all1++;
                    if (all1 > 0) {
                        $('#all1').attr("disabled", true);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        status = listcard.find('.status').val();
                        if (categoryID != 1 || status != 2) {
                            item.css('display', 'none');
                        }
                    });
                    $('.abcd').trigger('click');
                }

                else {
                    all1--;
                    if (all1 == 0) {
                        $('#all1').attr("disabled", false);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        if (categoryID == 1) {
                            item.css('display', 'inherit');
                        }
                    });
                    $('.abcd').trigger('click');
                }
            });

            $('input[type="checkbox"]#all1').on('change', function () {
                if ($(this).is(":checked")) {
                    all1++;
                    if (all1 > 0) {
                        $('#all1').attr("disabled", true);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        status = listcard.find('.status').val();
                        if (categoryID != 1 || status != 0) {
                            item.css('display', 'none');
                        }
                    });
                    $('.abcd').trigger('click');
                }

                else{
                    all1--;
                    if (all1 == 0) {
                        $('#all1').attr("disabled", false);
                    }

                    $('.abcd').click(function () {
                        listcard = $(this).parent('.list-card');
                        item = $(listcard).parent('.item');
                        categoryID = listcard.find('.categoryID').val();
                        if (categoryID == 1) {
                            item.css('display', 'inherit');
                        }
                    });
                    $('.abcd').trigger('click');
                }
            });
        }

        else {
            all--;
            if (all == 0) {
                $('#all').attr("disabled", false);
            }
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 1) {
                    item.css('display', 'none');
                }
            });
            $('.abcd').trigger('click');
        }
    });

    $('input[type="checkbox"]#restaurant').on('change', function () {
        if ($(this).is(":checked")) {
            all++;
            if (all > 0) {
                $('#all').attr("disabled", true);
            }

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 2) {
                    item.css('display', 'inherit');
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            all--;
            if (all == 0) {
                $('#all').attr("disabled", false);
            }
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 2) {
                    item.css('display', 'none');
                }
            });
            $('.abcd').trigger('click');
        }
    });

    $('input[type="checkbox"]#activity').on('change', function () {
        if ($(this).is(":checked")) {
            all++;
            if (all > 0) {
                $('#all').attr("disabled", true);
            }

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 3) {
                    item.css('display', 'inherit');
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            all--;
            if (all == 0) {
                $('#all').attr("disabled", true);
            }
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 3) {
                    item.css('display', 'none');
                }
            });
            $('.abcd').trigger('click');
        }
    });

    $('input[type="checkbox"]#pending').on('change', function () {
        if ($(this).is(":checked")) {
            all1++;
            if (all1 > 0) {
                $('#all1').attr("disabled", true);
            }

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                status = listcard.find('.status').val();
                if (status == 0) {
                    item.css('display', 'inherit');
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            all1--;
            if (all1 == 0) {
                $('#all1').attr("disabled", false);
            }
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                status = listcard.find('.status').val();
                if (status == 0) {
                    item.css('display', 'none');
                }
            });
            $('.abcd').trigger('click');
        }
    });

    $('input[type="checkbox"]#approved').on('change', function () {
        if ($(this).is(":checked")) {
            all1++;
            if (all1 > 0) {
                $('#all1').attr("disabled", true);
            }

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                status = listcard.find('.status').val();
                if (status == 1) {
                    item.css('display', 'inherit');
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            all1--;
            if (all1 == 0) {
                $('#all1').attr("disabled", false);
            }
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                status = listcard.find('.status').val();
                if (status == 1) {
                    item.css('display', 'none');
                }
            });
            $('.abcd').trigger('click');
        }
    });

    $('input[type="checkbox"]#canceled').on('change', function () {
        if ($(this).is(":checked")) {
            all1++;
            if (all1 > 0) {
                $('#all1').attr("disabled", true);
            }

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                status = listcard.find('.status').val();
                if (status == 2) {
                    item.css('display', 'inherit');
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            all1--;
            if (all1 == 0) {
                $('#all1').attr("disabled", false);
            }
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                status = listcard.find('.status').val();
                if (status == 2) {
                    item.css('display', 'none');
                }
            });
            $('.abcd').trigger('click');
        }
    });
});
