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

    $('#hotel,#restaurant,#activity').prop('checked', true);

    $('input[type="checkbox"]#hotel').on('change', function () {
        if ($(this).is(":checked")) {

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 1) {
                    item.show();
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 1) {
                    item.hide();
                }
            });
            $('.abcd').trigger('click');
        }
    });

    $('input[type="checkbox"]#restaurant').on('change', function () {
        if ($(this).is(":checked")) {

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 2) {
                    item.show();
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 2) {
                    item.hide();
                }
            });
            $('.abcd').trigger('click');
        }
    });

    $('input[type="checkbox"]#activity').on('change', function () {
        if ($(this).is(":checked")) {

            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 3) {
                    item.show();
                }
            });
            $('.abcd').trigger('click');
        }

        else {
            $('.abcd').click(function () {
                listcard = $(this).parent('.list-card');
                item = $(listcard).parent('.item');
                categoryID = listcard.find('.categoryID').val();
                if (categoryID == 3) {
                    item.hide();
                }
            });
            $('.abcd').trigger('click');
        }
    });


    $(document).on('click', '#close-preview', function () {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function () {
                $('.image-preview').popover('show');
            },
            function () {
                $('.image-preview').popover('hide');
            }
        );
    });

    $(function () {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function () {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("Browse");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function () {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function (e) {
                $(".image-preview-input-title").text("Change");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });
});


$(document).on('click', '#close-preview', function () {
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
            $('.image-preview').popover('show');
        },
        function () {
            $('.image-preview').popover('hide');
        }
    );
});

$(function () {
    // Create the close button
    var closebtn = $('<button/>', {
        type: "button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class", "close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger: 'manual',
        html: true,
        title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
        content: "There's no image",
        placement: 'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function () {
        $('.image-preview').attr("data-content", "").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $(".upload").hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse");
    });
    // Create the preview image
    $(".image-preview-input input:file").change(function () {
        var img = $('<img/>', {
            id: 'dynamic',
            width: 250,
            height: 200
        });
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".upload").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
        }
        reader.readAsDataURL(file);
    });

});
