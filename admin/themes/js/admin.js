(function($){
  $(document).ready(function() {
   
   $("#preview").sortable({
      items: ".sortable-item",
      update: function(event, ui) {
         var result = $(this).sortable('toArray');
         $(".sortable_item_list").val(result);
      }
   });
   //Active
   $(".view_active").click(function(){
      var act_pa        = $(this);
      var act_element   = $(this).find(".view_active_a");
      var act_link      = act_element.attr("link");
      var act_record_id = act_element.attr("record_id");
      var act_feilds    = act_element.attr("feilds");
      var act_val       = act_element.attr("val");
      $(act_pa).html('<img src="/admin/themes/imgs/indicator.gif" width="16" height="16" />');
      $.post( act_link,{record_id : act_record_id,feilds : act_feilds, val : act_val, link : act_link}, function( data ) {         
         $(act_pa).html( data );
      });
      return false;
   });
   
    if($('.ex-modal-click').length > 0) {
      $(this).ex_modal();
    }

    if($('.ex-modal-upload-click').length > 0) {
      $(this).ex_media_upload_ajax();
    }

    //$(this).ex_editor();
    $(this).ex_media_element_plus_upload();  
   
    //$('.datepicker').datepicker({format: "dd/mm/yyyy"});
    $('.date_time_picker').datetimepicker({format:"DD/MM/YYYY HH:mm:ss"});
    $('.date_time_picker2').datetimepicker({format:"YYYY-MM-DD HH:mm:ss"});
    $('.datepicker').datetimepicker({format:"DD-MM-YYYY"});
    $('.timepicker').datetimepicker({format:"HH:mm:ss"});
    $('.timepicker2').datetimepicker({format:"HH:mm"});
    var ex_height_left = $('.main-sidebar').height();
    var ex_height_right = $('.content-wrapper').height();
    if(ex_height_left > ex_height_right) {
        $('.content-wrapper').css({'min-height': ex_height_left});
    }
  });



  $.fn.ex_media_upload_ajax = function() {
    var ex_wrapp = $('body').find('.ex-modal-wrapper-upload');
    var upload_url = $('.ex-media-upload-ajax').html();
    var find_url = $('.ex-media-find-ajax').html();
    var find_ajax_data = new FormData();
    var data_json = '';
    var upload_media_data = '';

    $('body').on('click','.ex-modal-upload-click',function(event){
      var upload_warrap = $(this).closest('.ex-upload-ajax-default');
      upload_warrap.addClass('ex-modal-active');
      ex_wrapp.find('.ex-modal-upload-apply').show();
      ex_wrapp.show();
      event.preventDefault();
    });

    $('.ex-modal-upload-cancel').click(function(event){
      $('body').find('.ex-modal-active').removeClass('ex-modal-active');
      ex_wrapp.find('.ex-modal-upload-apply').show();
      ex_wrapp.hide();
      event.preventDefault();
    });

    $('.ex-modal-upload-apply').click(function(event){
      var href = $('body').find('.ex-modal-active').attr('data-href');
      var ex_file = $('body').find('.media_upload_ajax_file').prop('files');
      var ex_title = $('body').find('.media_upload_ajax_title').val();
      var ex_cat_parent = $('body').find('.media_upload_ajax_cat_parent').val();
      var ex_media_wrap_active = $('body').find('.ex-modal-active');
      var data_json = '';
      upload_media_data = new FormData();
      upload_media_data.append("media_upload_ajax_file", ex_file[0]);//You can append as many data as you want. Check mozilla docs for this
      upload_media_data.append("media_upload_ajax_title", ex_title);//You can append as many data as you want. Check mozilla docs for this
      upload_media_data.append("media_upload_ajax_cat_parent", ex_cat_parent);//You can append as many data as you want. Check mozilla docs for this
      //console.log(upload_ajax_data);
      $.ajax({
        data: upload_media_data,
        type: "POST",
        processData: false,
        contentType: false,
        url: upload_url,
        beforeSend: function() {
          ex_wrapp.find('.ex-modal-upload-apply').hide();
          ex_wrapp.find('.ex-upload-waiting').html('').addClass('ex-load-bar');
        },
        success: function(data_return) {
          console.log(data_return);
          if(data_return != 'null') {
            data_json = jQuery.parseJSON(data_return);
            ex_media_wrap_active.find('.ex-upload-ajax-img').html('<img src="'+data_json.thumbnail+'">');
            ex_media_wrap_active.find('.ex-upload-ajax-text').html('<p>'+data_json.name+'</p>');
            ex_media_wrap_active.find('.ex-upload-ajax-default-input').val(data_json.fid);
          }
          ex_wrapp.find('.ex-load-bar').removeClass('ex-load-bar');
          ex_wrapp.find('.ex-modal-upload-apply').show();
          ex_wrapp.hide();
        }
      });

      $('body').find('.ex-modal-active').removeClass('ex-modal-active');
      event.preventDefault();
    });

    $('body').on('click', '.ex-upload-ajax-remove', function(event){
      var ex_remove = $(this).closest('.ex-upload-ajax-default');
      ex_remove.remove();
      event.preventDefault();
    });

    $('.media-find-submit-ajax').click(function(event){
      var upload_fid = $('body').find('.media_find_ajax_fid').val();

      find_ajax_data.append("media_find_ajax_fid", upload_fid);//You can append as many data as you want. Check mozilla docs for this
      $.ajax({
        data: find_ajax_data,
        type: "POST",
        url: find_url,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function() {
          ex_wrapp.find('.ex-modal-finder-apply').hide();
          $('body').find('.media_find_image_preview_ajax').html('').addClass('ex-load-bar');
          $('body').find('.ex-modal-finder-apply').hide();
        },
        success: function(data_return) {
          if(data_return != "null") {
            data_json = jQuery.parseJSON(data_return);
            $('body').find('.media_find_image_preview_ajax').html('<img src="'+data_json.thumbnail+'">');
            $('body').find('.media_find_ajax_fid').attr('data-finder',data_return);
            $('body').find('.ex-modal-finder-apply').show();
            $('body').find('.ex-load-bar').removeClass('ex-load-bar');
          } else {
            $('body').find('.media_find_image_preview_ajax').html('<p style="color: darkred;margin-top: 10px;">Ảnh éo tồn tại nhé :D</p>');
            $('body').find('.media_find_ajax_fid').attr('data-finder', '');
            $('body').find('.ex-modal-finder-apply').hide();
            $('body').find('.ex-load-bar').removeClass('ex-load-bar');
          }
        }
      });
      event.preventDefault();
    });

    $('.ex-modal-finder-apply').click(function(event) {
      var ex_media_wrap_active = $('body').find('.ex-modal-active');
      var ex_data_finder = $('body').find('.media_find_ajax_fid').attr('data-finder');
      if(ex_data_finder.length != 0) {
        //console.log(ex_data_finder);
        data_json = jQuery.parseJSON(ex_data_finder);
        ex_media_wrap_active.find('.ex-upload-ajax-img').html('<img src="'+data_json.thumbnail+'">');
        ex_media_wrap_active.find('.ex-upload-ajax-text').html('<p>'+data_json.name+'</p>');
        ex_media_wrap_active.find('.ex-upload-ajax-default-input').val(data_json.fid);
        ex_media_wrap_active.removeClass('ex-modal-active');
        ex_wrapp.hide();
        //console.log(data_json);
      }
      event.preventDefault();
    });
  }

  $.fn.ex_media_element_plus_upload = function() {
    if($('.ex-media-upload-add-click').length >0) {
      var slider_form = $('body').find('.ex-upload-ajax-default-form');
      var ex_time = Date.now();
      $('.ex-media-upload-add-click').click(function(event){
        var ex_parent = $(this).closest('.ex-slider-warrap');
        ex_time = Date.now();
        slider_form.find('.ex-upload-ajax-default-input').attr('name','media-file-'+ex_time);
        ex_parent.append(slider_form.html());
        event.preventDefault();
      });
    }
  };

  $.fn.ex_editor = function() {
    var wm_form = $('body').find('.wm-form-editor');
    var upload_url = $('.ex-media-upload-ajax').html();
    var wm_input_class = '';
    var wm_content = '';

    $('.form-ex-check-data').click(function(event) {
      var ex_check_input =  $('*[data-ex-check-editor-value="0"]');
      var ex_content = '';
      var ex_check_id = '';
      var ex_this = '';
      var ex_next = '';
      $.each(ex_check_input, function(index, row){
        ex_this = $(this);
        //ex_check_id = ex_this.attr('id');
        ex_next = ex_this.next().next();
        ex_content = $(ex_next).find('.note-editable').html();
        ex_content = JSON.stringify(ex_content);
        //console.log(ex_content);
        ex_this.val(ex_content)
        ex_this.attr('data-ex-check-editor-value',1);
      });
      ex_check_input =  $('*[data-ex-check-editor-value="0"]');
      if(ex_check_input.length == 0) {
        $('.form-ex-check-data').hide();
        $('.form-ex-submit-data').show();
      }

    });

    $('.wm-editor').summernote({
      height: 300,                 // set editor height
      focus: true,                 // set focus to editable area after initializing summernote
      onImageUpload: function(files, editor, welEditable) {
        //console.log(files);
        sendFile(files[0], editor, welEditable);
      },
      onChange: function(contents, editable) {
        //console.log(editable);
        //wm_content = JSON.stringify(contents);
        wm_input_class = editable.context.id;
        wm_form.find('#'+wm_input_class).attr('data-ex-check-editor-value','0');
        $('.form-ex-check-data').show();
        $('.form-ex-submit-data').hide();
      }
    });

    function sendFile(file, editor, welEditable) {
      data = new FormData();
      data.append("media_upload_ajax_file", file);//You can append as many data as you want. Check mozilla docs for this
      data.append("media_upload_ajax_cat_parent", 0);//You can append as many data as you want. Check mozilla docs for this
      data.append("media_upload_ajax_title", 'Không có tiêu đề');//You can append as many data as you want. Check mozilla docs for this
      //console.log(data);
      $.ajax({
        data: data,
        type: "POST",
        url: upload_url,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data_return) {
          console.log(data_return);
          if(data_return != 'null') {
            data_json = jQuery.parseJSON(data_return);
            //console.log(data_json);
            editor.insertImage(welEditable, data_json.url);
          }
        }
      });
    }

  };

  $.fn.ex_modal = function() {
    var ex_wrapp = $('body').find('.ex-modal-wrapper');
    $('.ex-modal-click').click(function(event){
     
      var title_popup = $(this).attr('data-title');
      var ex_modal      = $(this).attr('data-modal');
      if(ex_modal == undefined) ex_modal = 'modal-warning';
      $(this).addClass('ex-modal-active');
      ex_wrapp.find('.ex-modal-msg').html('<p>'+title_popup+'</p>');
      ex_wrapp.show();
      event.preventDefault();
      ex_wrapp.find('.modal').addClass(ex_modal);
    });

    $('.ex-modal-cancel').click(function(event){
      $('body').find('.ex-modal-active').removeClass('ex-modal-active');
      ex_wrapp.hide();
      event.preventDefault();
    });

    $('.ex-modal-apply').click(function(event){
      var href = $('body').find('.ex-modal-active').attr('data-href');
      $('body').removeClass('ex-modal-active');
      ex_wrapp.hide();
      //console.log(href);
      window.location.replace(href);
      event.preventDefault();
    });
  }


})(jQuery)



function show_popup(){   
   $(".popup").show();
   $("#overlay_for_popup").show();
}
function hide_popup(){
   $(".popup").hide();
   $("#overlay_for_popup").hide();
}
function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}

//Fucntion 
function addCommas(nStr){
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
    x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
}


function adm_select_all(sl2_obj,sl2_url,sl2_val,sl2_arr,limit,name_item){
   $(sl2_obj).val(sl2_val).select2({
      multiple: true,
      isTemp: false,
      placeholder: "Please enter keyword",
      tokenSeparators: [','],
      createSearchChoice: function (term, data) {
         //return { id: '_TEMP_', text: term + ' (new tag)', isTemp: true };
      },
      ajax:{
        url: sl2_url,
        dataType: "json",
        type: "POST",
        data: function (term, page) {
            return {
              key_word: term,
            };
        },
        results: function (data, page) {
            lastResults = data.results;
            return {
              results: data
            };
            
        }
      },
      initSelection: function (element, callback) {
         var data = sl2_arr
         callback(data);
     },
     // Some nice improvements:        
     maximumSelectionSize: limit,
     //    // override message for max tags
     formatSelectionTooBig: function (limit) {
         return "Chỉ nhập tối đa " + limit + ' ' + name_item;
     }
   });
}