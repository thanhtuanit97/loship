$.ajaxSetup({ 
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {

    //add category
    $('#addcategory').click(function (e) { 
        e.preventDefault();
        var c_name            = $('.c_name').val();
        var c_icon            = $('.c_icon').val();
        var c_title_seo       = $('.c_title_seo').val();
        var c_description_seo = $('.c_description_seo').val();
        // alert(c_icon);
        $.ajax({
            type: "post",
            url: "admin/categories/create",
            data: {
                c_name : c_name,
                c_icon : c_icon,
                c_title_seo : c_title_seo,
                c_description_seo : c_description_seo
            },
            success: function (result) {
                console.log(result);
                toastr.success(result.success, 'Thông Báo', {timeOut: 7000});
				// $('#addcate').modal('hide'); 
				location.reload();
            },
            error: function(error) {
                    console.log(error);
                    console.log(error.responseText);
                    // console.log(responseText.errors.name);
            }
        });
    });


    //editcategory
    $('.editcate').click(function (e) { 
        e.preventDefault();
        var id = $(this).data('id');
        // alert(id);
        $.ajax({
            type: "get",
            url: "admin/categories/edit/"+id,
            dataType: "json",
            success: function (result) {
                console.log(result);
                $('.c_name').val(result.c_name);
                $('.c_icon').val(result.c_icon);
                $('.c_description_seo').val(result.c_description_seo);
                $('.c_title_seo').val(result.c_title_seo);
                $('.title').text(result.c_name);
                $('#updatecate').attr('data-id',id);
                
            }
        });
    });

    //update category
    $('#updatecate').click(function (e) { 
        e.preventDefault();
        var id                = $(this).data('id');
        var c_name            = $('#c_name').val();
        var c_icon            = $('#c_icon').val();
        var c_title_seo       = $('#c_title_seo').val();
        var c_description_seo = $('#c_description_seo').val();
        $.ajax({
            type: "put",
            url: "admin/categories/update/"+id,
            data: {
                c_name : c_name,
                c_icon : c_icon,
                c_title_seo : c_title_seo,
                c_description_seo : c_description_seo
            },
            dataType: "json",
            success: function (result) {
                console.log(result);
                toastr.success(result.success, 'Thông Báo', {timeOut: 7000});
				location.reload(); 
            }
        });
    });
    // delete category

    $('.delete').click(function (e) {  
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('title');
        $('.title').text(name);
        // alert(name);
		$('.deletecate').click(function(event) {
			/* Act on the event */
			$.ajax({
				url: 'admin/categories/delete/'+id,
				type: 'delete',
				dataType: 'json',
				success : function(result)
				{
					toastr.success(result.success, 'Thông Báo', {timeOut: 7000});
					location.reload();
				}
				
			});
			
		});
    });

    //delete product
     $('.delete').click(function (e) {  
        e.preventDefault();
        var id = $(this).data('id');
        var name = $(this).data('title');
        $('.title').text(name);
        // alert(name);
        $('.deletepro').click(function(event) {
            /* Act on the event */
            $.ajax({
                url: 'admin/products/delete/'+id,
                type: 'delete',
                dataType: 'json',
                success : function(result)
                {
                    location.reload();
                    toastr.success(result.success, 'Thông Báo', {timeOut: 7000});
                }
                
            });
            
        });
    });

     //xoa bai viet
     $('.delete').click(function (e) {  
        e.preventDefault();
        var id = $(this).data('id');
        $('.deletearticle').click(function(event) {
            /* Act on the event */
            $.ajax({
                url: 'admin/articles/delete/'+id,
                type: 'delete',
                dataType: 'json',
                success : function(result)
                {
                    location.reload();
                    toastr.success(result.success, 'Thông Báo', {timeOut: 7000});
                }
                
            });
            
        });
    });
     //lọc bài viết theo trạng thái
     $('#fillterArticle').on('change', function (event) {
          event.preventDefault();
          console.log(event);
          var option = event.target.value;
          // alert(option);
          $.get('admin/articles/fillterArticel/'+option, function(data) {
                $('#getArticle').html(data);
            })
     });

     //chọn hình thức giảm giá
     $('#applyType').on('change', function(event){
        event.preventDefault();
        var option= event.target.value;
        console.log(option);
        // alert(value)
        if(option==0){
             $.get('admin/coupons/applyType/'+option, function(data) {
                $('#demo1').html(data);
            })
        } else if( option == 1){
             $.get('admin/coupons/applyType1/'+option, function(data) {
                $('#demo1').html(data);
            })
         } 
     });

     //xóa mx giảm giá
     $('.delete').click(function(event) {
         /* Act on the event */
         event.preventDefault();
         var id = $(this).data('id');
        $('.deletecoupon').click(function(event) {
            /* Act on the event */
            $.ajax({
                url: 'admin/coupons/delete/'+id,
                type: 'delete',
                dataType: 'json',
                success : function(result)
                {
                    location.reload();
                    toastr.success(result.success, 'Thông Báo', {timeOut: 7000});
                }
                
            });
        });
     });

     //lọc dơn hàng theo trạng thái.
     $('#FillterOrder').on('change', function(e){
        e.preventDefault();
        var option = e.target.value;
        console.log(option);
        $.get('/admin/orders/fillterOrder/'+option, function(data) {
            // dd(data);
            $('.viewOrder').html(data);
        })
     });

    //xử lý đơn hàng 
    $('#xlydonhang').on('click', function(event) {
    console.log('test');
    event.preventDefault();
    var status = $(this).val();
    console.log(status);
    var orderId= $(this).attr('data-id');
    console.log(orderId);
    if(status !== null) {
        $.ajax({
            'url' : '/admin/orders/xu-ly-don-hang/'+orderId+'/process',
            'type' : 'POST',
            'data' : {
                'status' : status
            },
            success : function(data){
                toastr.success(data.success, 'Thông Báo', {timeOut: 5000});
                location.reload();
            },
            error : function() {
                alert('error');
            }
    })
    // $('.breadcrumb__step a ').addClass('breadcrumb__step--active');
    }
    /* Act on the event */
    });


    //xoa danh gia san pham
    $('.delete').click(function(event) {
        /* Act on the event */
        event.preventDefault();
        var id = $(this).data('id');
        $('.deleterating').click(function(event) {
            /* Act on the event */
            $.ajax({
                url: '/admin/ratings/delete/'+ id,
                type: 'delete',
                dataType: 'json',
                success : function(data){
                    toastr.success(data.success, 'Thông Báo', {timeOut: 5000});
                    location.reload();
                }
               
            })
            
            
        });
    });



    //Jquery tìm kiếm
      $('#myInput').on('keyup', function(event) { //khi gõ chữ trong ô input
        event.preventDefault();
        /* Act on the event */
        var tukhoa = $(this).val().toLowerCase(); // lấy kí tự đó về và chuyển ang dạng chữ thường
        $('#myTable tr').filter(function() { //lọc giá trị nơi bảng trực tiếp tại tbody và tr
         $(this).toggle($(this).text().toLowerCase().indexOf(tukhoa) > -1); //tìm kiems gia tri phù hợp trong bảng
        });
      });   

});


