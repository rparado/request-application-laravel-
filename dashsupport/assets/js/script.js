(function($) {

	'use strict';

	$(function() {
		if($('#users-table').length > 0) {
			$("#users-table").dataTable({
				//"order": [[ 3, "ASC" ]],
				"pageLength" : 5,
				"lengthMenu" : [5, 10, 15, 20],
				"bDestroy" : true,
				"bSort" : false,
				//"sPaginationType" : "full_numbers",
				"iDisplayLength" : 5,
				"bLengthChange" : true,
				"columnDefs": [{
					"targets":7,
					"orderable": false
				}]
			});
		}
		if($('#department-table').length > 0) {
			$("#department-table").dataTable({
				//"order": [[ 3, "ASC" ]],
				"pageLength" : 5,
				"lengthMenu" : [5, 10, 15, 20],
				"bDestroy" : true,
				"bSort" : false,
				//"sPaginationType" : "full_numbers",
				"iDisplayLength" : 5,
				"bLengthChange" : true,
				"columnDefs": [{
					"targets": 3,
					"orderable": false
				}]
			});
		}
		if($('#service-table').length > 0) {
			$("#service-table").dataTable({
				//"order": [[ 3, "ASC" ]],
				"pageLength" : 5,
				"lengthMenu" : [5, 10, 15, 20],
				"bDestroy" : true,
				"bSort" : false,
				//"sPaginationType" : "full_numbers",
				"iDisplayLength" : 5,
				"bLengthChange" : true,
				"columnDefs": [{
					"targets": 4,
					"orderable": false
				}]
			});
		}
		if($('#client-request-table').length > 0) {
			$('#client-request-table').dataTable({
				//"order": [[ 3, "ASC" ]],
				"pageLength" : 5,
				"lengthMenu" : [5, 10, 15, 20],
				"bDestroy" : true,
				"bSort" : false,
				//"sPaginationType" : "full_numbers",
				"iDisplayLength" : 5,
				"bLengthChange" : true
			});
		}
		if($('#support-table').length > 0) {
			$('#support-table').dataTable({
				//"order": [[ 3, "ASC" ]],
				"pageLength" : 5,
				"lengthMenu" : [5, 10, 15, 20],
				"bDestroy" : true,
				"bSort" : false,
				//"sPaginationType" : "full_numbers",
				"iDisplayLength" : 5,
				"bLengthChange" : true
			});
		}
		if($('.dataTables_wrapper input[type="search"]').length > 0) {
			$('.dataTables_wrapper input[type="search"]').addClass('form-control input-sm');
		}
		if($("#due_date").length > 0) {
			var dateToday = new Date();
			var dates = $("#due_date").datepicker({
				//showOn: "both",
				dateFormat: 'yy-mm-dd',
				//buttonImage: "/asset/images/calendar.png",
				buttonImageOnly: false,
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 1,
				minDate: dateToday,
				onSelect: function(selectedDate) {
		        var option = this.id == "due_date" ? "minDate" : "maxDate",
		            instance = $(this).data("datepicker"),
		            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat, selectedDate, instance.settings);
		        dates.not(this).datepicker("option", option, date)
			}
			});
		}
		
		
		
			
		if($('#service_item_id').length > 0) {
			$('#service_item_id').on('change', function(){
				var id = $(this).val();
				$.ajaxSetup({
				  headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				  }
				});
				$.ajax({
						method: 'GET',
						url: '/dashsupport/client/request/index/' + id,
						//data: {'id' : id},
						crossOrigin: true,
						//headers: {'X-Requested-With': 'XMLHttpRequest'},
						success: function(response){
							$.each($.parseJSON(response), function(key, value){
								//console.log('value', value);
								if(value.id == id) {
									$("#rate").val(value.rate);
									$('#select-department').find('option:selected').prop('selected',false);
									$('#select-department').find('option[value="'+ value.dept_id +'"]').prop('selected',true);
								}
							})
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(JSON.stringify(jqXHR));
							console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					}
				});

			})

		}
		
		if($('#service_item_id, #update-request-form .update-select-service').length > 0) {
			$('#service_item_id, #update-request-form .update-select-service').on('change', function(){
				var id = $(this).val();
				$.ajaxSetup({
				  headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
				  }
				});
				$.ajax({
						method: 'GET',
						url: '/dashsupport/client/request/index/' + id,
						//data: {'id' : id},
						crossOrigin: true,
						//headers: {'X-Requested-With': 'XMLHttpRequest'},
						success: function(response){
							$.each($.parseJSON(response), function(key, value){
								//console.log('value', value);
								if(value.id == id) {
									$("#rate, #update-request-form .update-rate-field").val(value.rate);
									$('#select-department, #update-request-form .update-department-field').find('option:selected').prop('selected',false);
									$('#select-department, #update-request-form .update-department-field').find('option[value="'+ value.dept_id +'"]').prop('selected',true);
								}
							})
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log(JSON.stringify(jqXHR));
							console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
					}
				});

			})

		}
		
		
		
		if($('.desc-field').length > 0) {
			$('.desc-field').summernote({
				height: 200,                 // set editor height
				minHeight: null,             // set minimum height of editor
				maxHeight: null,             // set maximum height of editor
				focus: true,
				enterHtml: '',
				shortcuts: false
			});
		}
		
		//flot
		var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [data1, data2], {
			series: {
				lines: {
					show: false,
					fill: true
				},
				splines: {
					show: true,
					tension: 0.4,
					lineWidth: 1,
					fill: 0.4
				},
				points: {
					radius: 0,
					show: true
				},
			shadowSize: 2
			},
			grid: {
				verticalLines: true,
				hoverable: true,
				clickable: true,
				tickColor: "#d5d5d5",
				borderWidth: 1,
				color: '#fff'
			},
			colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
			xaxis: {
				tickColor: "rgba(51, 51, 51, 0.06)",
				mode: "time",
				tickSize: [1, "day"],
				//tickLength: 10,
				axisLabel: "Date",
				axisLabelUseCanvas: true,
				axisLabelFontSizePixels: 12,
				axisLabelFontFamily: 'Verdana, Arial',
				axisLabelPadding: 10
			},
			yaxis: {
				ticks: 8,
				tickColor: "rgba(51, 51, 51, 0.06)",
			},
			tooltip: false
		});

		function gd(year, month, day) {
			return new Date(year, month - 1, day).getTime();
		}
		
		
		
	});

})(jQuery);


var CURRENT_URL = window.location.href.split('?')[0],
    $BODY = $('body'),
    $MENU_TOGGLE = $('#menu_toggle'),
    $SIDEBAR_MENU = $('#sidebar-menu'),
    $SIDEBAR_FOOTER = $('.sidebar-footer'),
    $LEFT_COL = $('.left_col'),
    $RIGHT_COL = $('.right_col'),
    $NAV_MENU = $('.nav_menu'),
    $FOOTER = $('footer');

// Sidebar
$(document).ready(function() {
    // TODO: This is some kind of easy fix, maybe we can improve this
    var setContentHeight = function () {
        // reset height
        $RIGHT_COL.css('min-height', $(window).height());

        var bodyHeight = $BODY.outerHeight(),
            footerHeight = $BODY.hasClass('footer_fixed') ? 0 : $FOOTER.height(),
            leftColHeight = $LEFT_COL.eq(1).height() + $SIDEBAR_FOOTER.height(),
            contentHeight = bodyHeight < leftColHeight ? leftColHeight : bodyHeight;

        // normalize content
        contentHeight -= $NAV_MENU.height() + footerHeight;

        $RIGHT_COL.css('min-height', contentHeight);
    };

    $SIDEBAR_MENU.find('a').on('click', function(ev) {
        var $li = $(this).parent();

        if ($li.is('.active')) {
            $li.removeClass('active active-sm');
            $('ul:first', $li).slideUp(function() {
                setContentHeight();
            });
        } else {
            // prevent closing menu if we are on child menu
            if (!$li.parent().is('.child_menu')) {
                $SIDEBAR_MENU.find('li').removeClass('active active-sm');
                $SIDEBAR_MENU.find('li ul').slideUp();
            }
            
            $li.addClass('active');

            $('ul:first', $li).slideDown(function() {
                setContentHeight();
            });
        }
    });

    // toggle small or large menu
    $MENU_TOGGLE.on('click', function() {
        if ($BODY.hasClass('nav-md')) {
            $SIDEBAR_MENU.find('li.active ul').hide();
            $SIDEBAR_MENU.find('li.active').addClass('active-sm').removeClass('active');
        } else {
            $SIDEBAR_MENU.find('li.active-sm ul').show();
            $SIDEBAR_MENU.find('li.active-sm').addClass('active').removeClass('active-sm');
        }

        $BODY.toggleClass('nav-md nav-sm');

        setContentHeight();
    });

    // check active menu
    $SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('current-page');

    $SIDEBAR_MENU.find('a').filter(function () {
        return this.href == CURRENT_URL;
    }).parent('li').addClass('current-page').parents('ul').slideDown(function() {
        setContentHeight();
    }).parent().addClass('active');

    // recompute content when resizing
    $(window).smartresize(function(){  
        setContentHeight();
    });

    setContentHeight();

    // fixed sidebar
    if ($.fn.mCustomScrollbar) {
        $('.menu_fixed').mCustomScrollbar({
            autoHideScrollbar: true,
            theme: 'minimal',
            mouseWheel:{ preventDefault: true }
        });
    }
});
// /Sidebar

// Panel toolbox
$(document).ready(function() {
    $('.collapse-link').on('click', function() {
        var $BOX_PANEL = $(this).closest('.x_panel'),
            $ICON = $(this).find('i'),
            $BOX_CONTENT = $BOX_PANEL.find('.x_content');
        
        // fix for some div with hardcoded fix class
        if ($BOX_PANEL.attr('style')) {
            $BOX_CONTENT.slideToggle(200, function(){
                $BOX_PANEL.removeAttr('style');
            });
        } else {
            $BOX_CONTENT.slideToggle(200); 
            $BOX_PANEL.css('height', 'auto');  
        }

        $ICON.toggleClass('fa-chevron-up fa-chevron-down');
    });

    $('.close-link').click(function () {
        var $BOX_PANEL = $(this).closest('.x_panel');

        $BOX_PANEL.remove();
    });
});
// /Panel toolbox


// Progressbar
if ($(".progress .progress-bar")[0]) {
    $('.progress .progress-bar').progressbar();
}
// /Progressbar

// Switchery
$(document).ready(function() {
    if ($(".js-switch")[0]) {
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function (html) {
            var switchery = new Switchery(html, {
                color: '#26B99A'
            });
        });
    }
});
// /Switchery

// iCheck
$(document).ready(function() {
    if ($("input.flat")[0]) {
        $(document).ready(function () {
            $('input.flat').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });
        });
    }
});
// /iCheck

// Table
$('table input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('table input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});

var checkState = '';

$('.bulk_action input').on('ifChecked', function () {
    checkState = '';
    $(this).parent().parent().parent().addClass('selected');
    countChecked();
});
$('.bulk_action input').on('ifUnchecked', function () {
    checkState = '';
    $(this).parent().parent().parent().removeClass('selected');
    countChecked();
});
$('.bulk_action input#check-all').on('ifChecked', function () {
    checkState = 'all';
    countChecked();
});
$('.bulk_action input#check-all').on('ifUnchecked', function () {
    checkState = 'none';
    countChecked();
});

function countChecked() {
    if (checkState === 'all') {
        $(".bulk_action input[name='table_records']").iCheck('check');
    }
    if (checkState === 'none') {
        $(".bulk_action input[name='table_records']").iCheck('uncheck');
    }

    var checkCount = $(".bulk_action input[name='table_records']:checked").length;

    if (checkCount) {
        $('.column-title').hide();
        $('.bulk-actions').show();
        $('.action-cnt').html(checkCount + ' Records Selected');
    } else {
        $('.column-title').show();
        $('.bulk-actions').hide();
    }
}

// Accordion
$(document).ready(function() {
    $(".expand").on("click", function () {
        $(this).next().slideToggle(200);
        $expand = $(this).find(">:first-child");

        if ($expand.text() == "+") {
            $expand.text("-");
        } else {
            $expand.text("+");
        }
    });
});

// NProgress
if (typeof NProgress != 'undefined') {
    $(document).ready(function () {
        NProgress.start();
    });

    $(window).load(function () {
        NProgress.done();
    });
}
/**
 * Resize function without multiple trigger
 * 
 * Usage:
 * $(window).smartresize(function(){  
 *     // code here
 * });
 */
(function($,sr){
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
      var timeout;

        return function debounced () {
            var obj = this, args = arguments;
            function delayed () {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null; 
            }

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100); 
        };
    };

    // smartresize 
    jQuery.fn[sr] = function(fn){  return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr); };

})(jQuery,'smartresize');