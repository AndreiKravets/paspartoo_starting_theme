jQuery(document).ready(function ($) {

$('.valid_checkbox input').addClass('magic-checkbox');


    $('select').each(function(){
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.click(function(e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function(){
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.click(function(e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).click(function() {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });


    if ($('div').hasClass('gform_confirmation_wrapper')) {
        $('.submit_perent').css('display', 'block');
        $(".submit_popup_form").animate({top: "30vh"}, 100);
        setTimeout(function () {
            $(".submit_popup_form").animate({top: "-100vh"}, 100);
            $('.submit_perent').css('display', 'none');
        }, 4000);
    };

    $('.submit_popup_con').click(function () {
        $(".submit_popup_form").animate({top: "-100vh"}, 500, function () {
            $('.submit_perent').css('display', 'none')
        });
    });
    $('.submit_popup_form button').click(function () {
        $(".submit_popup_form").animate({top: "-100vh"}, 500, function () {
            $('.submit_perent').css('display', 'none')
        });
    });
    $(window).on("click keydown", function (e) {
        if (e.key === "Escape") {
            $(".submit_popup_form").animate({top: "-100vh"}, 500, function () {
                $('.submit_perent').css('display', 'none')
            });

        }
    });


    $('.gform_button').prop('disabled', true);
    $('.gform_footer').append('<div class="help_block">Please fill the form</div>');
    $('.gform_footer').addClass('help_form');
    $(".gform_button").wrap('<div class="btn_hover"> </div>');
    // $(".gform_confirmation_message").html("<h3>Thank you for your message!</h3> <p>It has been sent to our customer care center. We will respond as soon as possible.</p>")


    $('.valid_email > .ginput_container').addClass('error_f');
        var mail_format = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var mail_error = 'Please enter a valid e-mail address';

    $('.valid_name > .ginput_container').addClass('error_f');
        var name_format = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
        var name_error = 'Please enter a valid name';

    $('.valid_company > .ginput_container').addClass('error_f');
        var last_name_format = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
        var last_name_error = 'Please enter a valid company name';

    $('.valid_phone  > .ginput_container').addClass('error_f');
        var phone_format = /^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/;
        var phone_error = 'Please enter a valid phone number';

    $('.valid_message  > .ginput_container').addClass('error_f');
        var message_format = /^[.\w\n\r ]{10,}$/;
        var message_error = 'Please enter more than 10 characters';

    $('.valid_1  > .ginput_container').addClass('error_f');
        var valid_1_format = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
        var valid_1_error = 'custom 1 error';

    $('.valid_2  > .ginput_container').addClass('error_f');
        var valid_2_format = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
        var valid_2_error = 'custom 2 error';

    $('.valid_3  > .ginput_container').addClass('error_f');
        var valid_3_format = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
        var valid_3_error = 'custom 3 error';

    $('.valid_4  > .ginput_container').addClass('error_f');
        var valid_4_format = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
        var valid_4_error = 'custom 4 error';

    $('.valid_5  > .ginput_container').addClass('error_f');
        var valid_5_format = /^[\w'\-,.][^0-9_!¡?÷?¿/\\+=@#$%ˆ&*(){}|~<>;:[\]]{2,}$/;
        var valid_5_error = 'custom 5 error';


    $('.valid_i_agree > .ginput_container').addClass('error_f');



    $("form[id^='gform_']").on('mouseenter', function () {

        var this_id = this.id;

        $('#' + this_id + ' .valid_message  > .ginput_container').keyup(function () {
             if ($('#' + this_id + ' .valid_message  > .ginput_container textarea').val().match(message_format)) {
                $('#' + this_id + ' .valid_message  > .ginput_container').find($('#' + this_id + '_error_mess')).css('display', 'none');
                $('#' + this_id + ' .valid_message  > .ginput_container').removeClass('error_f');
                }
             else {
                if ($('#' + this_id + '_error_mess').length) {
                    $('#' + this_id + ' .valid_message  > .ginput_container').find($('#' + this_id + '_error_mess')).css('display', 'block');
                    $('#' + this_id + ' .valid_message  > .ginput_container').addClass('error_f');
                    }
                else {
                    $('#' + this_id + ' .valid_message  > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_mess">' + message_error + '</div>');
                     }
                }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_email > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_email > .ginput_container > input').val().match(mail_format)) {
                $('#' + this_id + ' .valid_email > .ginput_container').find($('#' + this_id + '_error_em')).css('display', 'none');
                $('#' + this_id + ' .valid_email > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_em').length) {
                    $('#' + this_id + ' .valid_email > .ginput_container').find($('#' + this_id + '_error_em')).css('display', 'block');
                    $('#' + this_id + ' .valid_email > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_email > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_em">' + mail_error + '</div>');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_name > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_name > .ginput_container input').val().match(name_format)) {
                $('#' + this_id + ' .valid_name > .ginput_container').find($('#' + this_id + '_error_name')).css('display', 'none');
                $('#' + this_id + ' .valid_name > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_name').length) {
                    $('#' + this_id + ' .valid_name > .ginput_container').find($('#' + this_id + '_error_name')).css('display', 'block');
                    $('#' + this_id + ' .valid_name > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_name > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_name">'+ name_error +'</div>');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_company > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_company > .ginput_container input').val().match(last_name_format)) {
                $('#' + this_id + ' .valid_company > .ginput_container').find($('#' + this_id + '_error_last_name')).css('display', 'none');
                $('#' + this_id + ' .valid_company > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_last_name').length) {
                    $('#' + this_id + ' .valid_company > .ginput_container').find($('#' + this_id + '_error_last_name')).css('display', 'block');
                    $('#' + this_id + ' .valid_company > .ginput_container').addClass('error_f');
                }
                else {

                    $('#' + this_id + ' .valid_company > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_last_name">'+ last_name_error +'</div>');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_phone  > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_phone  > .ginput_container > input').val().match(phone_format)) {
                $('#' + this_id + ' .valid_phone  > .ginput_container').find($('#' + this_id + '_error_ph')).css('display', 'none');
                $('#' + this_id + ' .valid_phone  > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_ph').length) {
                    $('#' + this_id + ' .valid_phone  > .ginput_container').find($('#' + this_id + '_error_ph')).css('display', 'block');
                    $('#' + this_id + ' .valid_phone  > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_phone  > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_ph">'+ phone_error +'</div>');
                    $('#' + this_id + ' .valid_phone  > .ginput_container').addClass('error_f');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_1  > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_1  > .ginput_container > input').val().match(valid_1_format)) {
                $('#' + this_id + ' .valid_1  > .ginput_container').find($('#' + this_id + '_error_valid_1')).css('display', 'none');
                $('#' + this_id + ' .valid_1  > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_valid_1').length) {
                    $('#' + this_id + ' .valid_1  > .ginput_container').find($('#' + this_id + '_error_valid_1')).css('display', 'block');
                    $('#' + this_id + ' .valid_1  > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_1  > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_valid_1">'+ valid_1_error +'</div>');
                    $('#' + this_id + ' .valid_1  > .ginput_container').addClass('error_f');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_2  > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_2  > .ginput_container > input').val().match(valid_2_format)) {
                $('#' + this_id + ' .valid_2  > .ginput_container').find($('#' + this_id + '_error_valid_2')).css('display', 'none');
                $('#' + this_id + ' .valid_2  > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_valid_2').length) {
                    $('#' + this_id + ' .valid_2  > .ginput_container').find($('#' + this_id + '_error_valid_2')).css('display', 'block');
                    $('#' + this_id + ' .valid_2  > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_2  > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_valid_1">'+ valid_2_error +'</div>');
                    $('#' + this_id + ' .valid_2  > .ginput_container').addClass('error_f');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_3  > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_3  > .ginput_container > input').val().match(valid_3_format)) {
                $('#' + this_id + ' .valid_3  > .ginput_container').find($('#' + this_id + '_error_valid_3')).css('display', 'none');
                $('#' + this_id + ' .valid_3  > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_valid_3').length) {
                    $('#' + this_id + ' .valid_3  > .ginput_container').find($('#' + this_id + '_error_valid_3')).css('display', 'block');
                    $('#' + this_id + ' .valid_3  > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_3  > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_valid_3">'+ valid_3_error +'</div>');
                    $('#' + this_id + ' .valid_3  > .ginput_container').addClass('error_f');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_4  > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_4  > .ginput_container > input').val().match(valid_4_format)) {
                $('#' + this_id + ' .valid_4  > .ginput_container').find($('#' + this_id + '_error_valid_4')).css('display', 'none');
                $('#' + this_id + ' .valid_4  > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_valid_4').length) {
                    $('#' + this_id + ' .valid_4  > .ginput_container').find($('#' + this_id + '_error_valid_4')).css('display', 'block');
                    $('#' + this_id + ' .valid_4  > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_4  > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_valid_4">'+ valid_4_error +'</div>');
                    $('#' + this_id + ' .valid_4  > .ginput_container').addClass('error_f');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_5  > .ginput_container').on('input', function () {
            if ($('#' + this_id + ' .valid_5  > .ginput_container > input').val().match(valid_5_format)) {
                $('#' + this_id + ' .valid_5  > .ginput_container').find($('#' + this_id + '_error_valid_5')).css('display', 'none');
                $('#' + this_id + ' .valid_5  > .ginput_container').removeClass('error_f');
            }
            else {
                if ($('#' + this_id + '_error_valid_5').length) {
                    $('#' + this_id + ' .valid_5  > .ginput_container').find($('#' + this_id + '_error_valid_5')).css('display', 'block');
                    $('#' + this_id + ' .valid_5  > .ginput_container').addClass('error_f');
                }
                else {
                    $('#' + this_id + ' .valid_5  > .ginput_container').append('<div class="gfield_description validation_message" id="' + this_id + '_error_valid_5">'+ valid_5_error +'</div>');
                    $('#' + this_id + ' .valid_5  > .ginput_container').addClass('error_f');
                }
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .valid_i_agree input').on('change', function () {
            if ($('#' + this_id + ' .valid_i_agree input').prop('checked')) {
                $('#' + this_id + ' .valid_i_agree .ginput_container_checkbox').removeClass('error_f');
            } else {
                $('#' + this_id + ' .valid_i_agree .ginput_container_checkbox').addClass('error_f');
            }
        });
        $('#' + this_id + ' .valid_i_agree input').on('change', function () {
            if ($('#' + this_id + ' .error_f').length) {
                $('#' + this_id + ' .gform_button').prop('disabled', true);
            } else {
                $('.gform_footer').removeClass('help_form');
                $('#' + this_id + ' .gform_button').prop('disabled', false);
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $('#' + this_id + ' .ginput_container').keyup(function () {
            if ($('#' + this_id + ' .error_f').length) {
                $('#' + this_id + ' .gform_button').prop('disabled', true);
            } else {
                $('#' + this_id + ' .gform_footer').removeClass('help_form');
                $('#' + this_id + ' .gform_button').prop('disabled', false);
            }
        });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        // $('#' + this_id + ' .btn_hover').hover(function () {
        //     $('#' + this_id + ' .help_block').addClass('help_block_active');
        // });

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    });


});
