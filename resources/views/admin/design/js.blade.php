
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header p-2">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body p-3">
          Are You Sure ? Do you want to delete this ?
        </div>
        <div class="modal-footer p-1">
          <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
          <a href="#" class="btn btn-danger btn-sm">Delete</a>
        </div>
      </div>
    </div>
  </div>



<script src="{{asset('public/admin/asset/js/jquery.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/popper.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/datatables.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('public/admin/asset/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/bootstrap-multitabs/multitabs.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/jquery.cookie.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/index.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/notify.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/notify.js')}}"></script>
<script src="{{asset('public/admin/asset/js/sortable.js')}}"></script>
<script src="{{asset('public/admin/asset/js/main.min.js')}}"></script>
<script src="{{asset('public/admin/asset/js/tagify.js')}}"></script>
<script src="{{asset('public/admin/asset/js/colorpicker.js')}}"></script>


@if (Session::has('success'))
<script>
    $.notify('{{Session::get('success')}}','success')
</script>
@endif

@if (Session::has('error'))
<script>
    $.notify('{{Session::get('error')}}','error')
</script>
@endif

@if($errors->any())
<script>
    @foreach ($errors->all() as $error)
      $.notify('{{$error}}','error')
    @endforeach
</script>
@endif


<script>


$(window).on('load',function(){
    $('.loader_image').fadeOut(500);
})


// Financial Js
$(document).on('change','.check_type_amount',function(){
    if($(this).is(':checked')){
    $('.check_type_amount').prop('checked',false);
     $(this).prop('checked',true);
      if($(this).attr('name') == 'credit'){
        $('.invoice_check').removeClass('d-none');
        $('#show_financial_form').removeClass('d-none');
      }else{
        $('.invoice_check').addClass('d-none');
        $('#show_financial_form').addClass('d-none');
      }
    }else{
        $(this).prop('checked',true);
    }
})


  $(document).on('input','#amount_plus',function(){
    let balance = parseInt($(this).attr('balance'));
    let nowUp   = parseInt($(this).val());
    let total   = balance + nowUp;
    $('.up_final_balance').html(total);
  })


  $(document).on('input','#amount_mius',function(){
    let balance = parseInt($(this).attr('balance'));
    let nowUp   = parseInt($(this).val());
    let total   = balance - nowUp;
    $('.down_final_balance').html(total)
  })


  $(document).on('change','#generate_invoice',function(){
    bothSystem();
  })

  $(document).on('change','#amount_paid',function(){
    bothSystem();
  })


  function bothSystem(){
      let generate_invoice = 0;
      let amount_paid = 0;
      let type = null;

      $('.check_type_amount').each(function(){
        if($(this).is(':checked')){
          type = $(this).attr('name');
        }
      })


      if($('#generate_invoice').is(':checked')){
        generate_invoice = 1;
      }
      if($('#amount_paid').is(':checked')){
        amount_paid = 1;
      }
      $.get('{{route('admin.financial.load')}}',{generate_invoice:generate_invoice,amount_paid:amount_paid, type:type },function(data){
        $('#show_financial_form').html(data);
      })
  }


  $(document).on('click','#is_phone_verify',function(){

      let status = $(this).attr('data');
      let clinet_id = $(this).attr('data-user');
      let $this = $(this);
      $.get('{{route('admin.client.phone.verify')}}',{status:status,clinet_id:clinet_id  },function(data){
        if(data.status == 1){
          $this.removeClass('text-danger').addClass('text-success').text('Verified').attr('data',1);
        }else{
          $this.removeClass('text-success').addClass('text-danger').text('Unverified').attr('data',0);
        }
      })
  })

  // Overview js End

  $(document).on('click','.addToMenu',function(){
        let $this = $(this);
        let title = $this.data('title');
        let keyword = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
        let dropdown = $this.data('dropdown');
        let href = $this.data('href');
        let target = $this.data('target');

        $('#section-list').append(`
            <div class="card mb-0 mt-2 mx-2 draggable-item">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mb-1 mt-0">${title}</h5>
                            <input type="hidden" name="${keyword}[title]" value="${title}">
                            <input type="hidden" name="${keyword}[dropdown]" value="${dropdown}">
                            <input type="hidden" name="${keyword}[href]" value="${href}">
                            <input type="hidden" name="${keyword}[target]" value="${target}">
                        </div>
                        <i class="remove-menu fa fa-trash-alt"></i>
                    </div>
                </div>
            </div>
        `);

    });

    $(document).on('click','#custom-submit',function(){
        let title = $('#title').val();
        let href = $('#url').val();
        if(/^(http|https|ftp):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/i.test(href)){
            href = href;
            $('.show__url__validation').hide();
        } else {
            $('.show__url__validation').show();
            return true;
        }

        if(title != ''){
            let keyword = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-');
            let dropdown = 'no';

            let target = $('#target').val();

            $('#section-list').append(`
                <div class="card mb-0 mt-2 mx-2 draggable-item">
                    <div class="card-body">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="mb-1 mt-0">${title}</h5>
                                <input type="hidden" name="${keyword}[title]" value="${title}">
                                <input type="hidden" name="${keyword}[dropdown]" value="${dropdown}">
                                <input type="hidden" name="${keyword}[href]" value="${href}">
                                <input type="hidden" name="${keyword}[target]" value="${target}">
                            </div>
                            <i class="remove-menu fa fa-trash-alt"></i>
                        </div>
                    </div>
                </div>
            `);
        }

    });


    $(document).on('click','.remove-menu',function(){
        $(this).parent().parent().parent().remove();

    });

    // Sorting Section
    if( $('#section-list').length > 0 ){
        var el = document.getElementById('section-list');
        Sortable.create(el, {
        animation: 100,
        group: 'list-1',
        draggable: '.draggable-item',
        handle: '.draggable-item',
        sort: true,
        filter: '.sortable-disabled',
        chosenClass: 'active'
        });
    }


    $('.edit').on('click',function(){
        var modal = $('#editModal');
        var data = $(this).data('info')
        modal.find('input[name=id]').val(data.id)
        modal.find('select[name=type]').val(data.type)
        modal.find('input[name=label]').val(data.label)
        modal.find('select[name=required]').val(data.required)
        modal.modal('show');
    })


    $(document).on('click','.status_verify',function(){
       var status = confirm('Are you sure you want to change status?');
        if(status){
            return true;
        }else{
            return false;
        }
    })

    // confirm delete
    $(document).on('click','.delete',function(){
       var status = confirm('Are you sure you want to delete it?');
       var route = $(this).data('href')
        if(status){
            $.get(route,'',
            function (res) {
                if(res.error) $.notify(res.error,'error')
                else {
                    $.notify(res.success,'success')

                    $("#table").load(location.href + " #table");
                }
            }
        );
        }else{
            return false;
        }
    })

    //kyc
    $(document).on('change','.kyc_type',function(){
       var status = confirm('Are you sure you want to change kyc type?');
        if(status){
            $.get('{{route('admin.kyc.type')}}',{kyc_type:$(this).val()},
            function (res) {
                if(res.error) $.notify(res.error,'error')
                else {
                    $.notify(res.success,'success')

                }
            }
        );
        }else{
            return false;
        }
    })


    //country
    $('.c_status').on('click', function(e){
        var route = $(this).data('url');
        var status = $(this).data('status');
        var status_text;
        if(status == 1) status_text = '@lang("Are you sure to deactive this country?")';
        else status_text = '@lang("Are you sure to active this country?")';
        $('#statusModal').find('.msg').text(status_text);
        $('#statusModal').find('form').attr('action', route);
        $('#statusModal').modal('show');
    });


        //seo
      $('input[name=meta_tag]').tagify();

      function imageShow(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                  $(input).parents('.form-group').find('.imageShow').attr('src',e.target.result)
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
      $(".imageUpload").on('change', function () {
          imageShow(this);
      });

      //role
      var elements = $('.elements');
        $(document).on('input','.search',function(){
            var search = $(this).val().toUpperCase();
            var match = elements.filter(function (idx, elem) {
                return $(elem).text().trim().toUpperCase().indexOf(search) >= 0 ? elem : null;
            }).sort();
            var content = $('.custom-data');
            if (match.length == 0) {
                content.html('<div class="col-md-12 text-center"><h6>@lang('No permission found!')</h6></div>');
            }else{
                content.html(match);
            }
        });

        $('.check-all').on('change',function () {
            if($(this).is(':checked')){
                $.each($(".permission"), function (i, element) {
                    $(element).attr('checked',true);
                });
            }
            else{
                $.each($(".permission"), function (i, element) {
                    $(element).attr('checked',false);
                });
            }
        })

        //staff
        $('.add').on('click',function () {
            $('#addModal').find('.append').children().remove()
            $('#addModal').find('form')[0].reset();
        })
        $('.details').on('click',function () {
            $('#addModal').find('.modal-title').text("@lang('Edit staff')")
            $('#addModal').find('input[name=name]').val($(this).data('staff').name)
            $('#addModal').find('input[name=email]').val($(this).data('staff').email)
            $('#addModal').find('input[name=password]').attr('required',false)
            $('#addModal').find('input[name=password_confirmation]').attr('required',false)
            $('#addModal').find('select[name=role]').val($(this).data('staff').role)

            $('#addModal').find('.append').html(`
                <div class="form-group">
                    <label>@lang('Status')</label>
                    <select name="status" class="form-control">
                        <option value="1">@lang('Active')</option>
                        <option value="2">@lang('Banned')</option>
                    </select>
                </div>
            `)
            $(document).find('select[name=status]').val($(this).data('staff').status)
            $('#addModal').find('form').attr('action',$(this).data('route'))
            $('#addModal').modal('show')
        })

        //language
        $('.update').on('change', function () {
            var url = "{{route('update-status.language')}}"
            var val = $(this).val()
            var data = {
               id:val,
               _token:"{{csrf_token()}}"
            }
            $(this).attr('disabled',true)
            $.post(url,data,function(response) {
               if(response.error){
                 $.notify(response.error,'error')
                  return false;
               }
               $(document).find('.cswitch input[type=checkbox]').each(function() {
                  if ($(this).is(":checked")) {
                     $(this).attr('checked',false)
                     $(this).attr('disabled',false)
                  }
               });
               $.notify(response.success,'success')
            })

         });

         $('.remove').on('click',function () {
            $('#removeModal').find('input[name=id]').val($(this).data('id'))
            $('#removeModal').modal('show')
         })

            var elements = $('.elements');
            $(document).on('input','.search',function(){
                var search = $(this).val().toUpperCase();
                var match = elements.filter(function (idx, elem) {
                    return $(elem).text().trim().toUpperCase().indexOf(search) >= 0 ? elem : null;
                }).sort();
                var content = $('.custom-data');
                if (match.length == 0) {
                    content.html(`<tr><td colspan="100%" class="text-center">@lang('Data Not Found')</td></tr>`);
                }else{
                    content.html(match);
                }
            });

            $(document).on('click','.edit',function () {
                const modal = $('#translate')
                modal.find('.modal-title').text("@lang('Edit Translation')")
                modal.find('input[name=key]').val($(this).data('key'))
                modal.find('textarea[name=value]').val($(this).data('value'))
                modal.find('form').attr('action',$(this).data('route'))
                modal.modal('show')
            })

            $(document).on('click','.remove',function () {
                const modal = $('#remove')
                modal.find('input[name=key]').val($(this).data('key'))
                modal.modal('show')
            })
            $('.add').on('click',function () {
                $('#translate').find('form')[0].reset();
                $('#translate').find('.modal-title').text("@lang('Add New Translation')")
            })

            //product image type

            $('.img_type').on('change',function () {
                if($(this).val() == 1){
                    $('.img_in').html(`<input type="file" name="thumbnail" value="" class="form-control">`)
                }else{
                    $('.img_in').html(`<input type="text" name="thumbnail" value="" class="form-control">`)
                }
            })

            $(document).on('change','#delivery_time_type',function(){
                let value = $(this).val();
                if(value == 'instant'){
                    $('#delivery_time').addClass('d-none');
                    $('#delivery_time input').val(0);
                }else{
                    $('#delivery_time').removeClass('d-none');
                }
            })



            //color
            $('.cp').colorpicker({
             format: 'auto'
            });


</script>
