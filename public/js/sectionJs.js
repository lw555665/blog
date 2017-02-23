/**
 * Created by Administrator on 2017/2/8.
 */
var obj;
var objImg;
$(function () {
    $(".btn-danger").click(function () {
        var id = $(this).attr('id');
        deleteAlert(id);
    });
    editplate();

    $('#headpic1').click(function () {
        $('#headpic').attr('src','/admin/images/jiahao.jpg');
        $('#headpic').trigger('click');
        document.myForm.attributes["action"].value  = "/plate";
        $('#plateid1').val('');
        $('.plate_info').show();
        $('.text-coutent').show();
    });

    getPicClick();
})
function editplate()
{
    $('.edit').each(function(){
        $(this).click(function(){
            var id = $(this).attr('data-id');
            var h4 = $(this).parents('.media-main').find('.name212').html();
            var p = $(this).parents('.media-main').find('.name213').html();
            $('.sectionName').attr('placeholder',h4);
            $('.describe').attr('placeholder',p);
            $('#plateid').attr('value',id);
            obj = $(this);
        });
    });
}

function getPicClick() {
    $('.headpic2').click(function () {
        objImg = $(this).find(".plate_img");
        var img = $(this).find(".plate_img").attr('src');
        var id = $(this).parent().find('.edit').attr('data-id');
        $('#headpic').attr('src',img);
        $('#headpic').trigger('click');
        document.myForm.attributes["action"].value  = "/updatepic";
        $('#plateid1').val(id);
        $('.plate_info').hide();
        $('.text-coutent').hide();
    });
}

function uploadHtml(data) {
    $('#order'+data.order).remove();
    switch (data.type) {
        case '1' : var plateType = '(金融)';break;
        case '2' : var plateType = '(投资)';break;
    }

    var html = '<div class="col-sm-6" id="section'+data.id+'">';
        html += '<div class="panel">';
        html += '<div class="panel-body">';
        html += '<div class="media-main" style="background-color: #FFFFFF;">';
        html += '<a class="pull-left headpic2"  target="_blank">';
        html += '<img class="thumb-lg bx-s plate_img" src="'+data.img+'" alt="" style="width: 146%;">';
        html += '</a>';
        html += '<div class="pull-right btn-group-sm">';
        html += '<button class="btn btn-success btn-xs edit" data-id="'+data.id+'" style="border-radius:7px;"; data-toggle="modal" data-target="#custom-width-modal">';
        html += '编辑';
        html += '</button>';
        html += '<button id="'+data.id+'" data-ip="" style="border-radius:7px;margin-left: 4px" data-count="organization" class="btn btn-danger btn-xs">';
        html += '移除';
        html += '</button>';
        html += '</div>';
        html += '<div class="info text-center">';
        html += '<span class="name212">'+data.name+'</span>';
        html += ' <span class="types">'+plateType+'</span>';
        html += '<p style="padding: 0 8px" class="name213">'+data.describe+'</p>';
        html += '</div>';
        html += '</div>';
        html += '<div class="clearfix"></div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
    $('#data').prepend(html);
    varDeleteClick(data.id);
    editplate();
    getPicClick();
}
function deleteAlert(id) {
    swal({
            title: "你确定要这样做?",
            text: "你这样做将不再显示该板块",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "是的, 立即执行!",
            cancelButtonText: "不了, 放弃执行",
            closeOnConfirm: true,
            closeOnCancel: true
        },
        function(isConfirm){
            if (isConfirm) {
                deleteSection(id);
            }
        });
}
function deleteSection(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:'/plate/'+id,
        type:'DELETE',
        beforeSend:function () {
            $(".loading").fadeIn();
        },
        success:function (data) {
            $(".loading").fadeOut();
            if(data.StatusCode == '200'){
                swal("成功移除!", '该板块将不在显示', "success");
                $('#section'+id).remove();
                updateOrderOption(data.ResultData);
            } else {
                swal("移除失败!", data.ResultData, "error");
            }
        },
        error:function () {
            $(".loading").fadeOut();
            swal("移除失败!", '500：服务器错误！', "error");
        }

    })
}
function updateOrderOption(data) {
    var html = '';
    for (var order in data) {
        html += '<option value="'+order+'">'+data[order]+'</option>'
    }
    $('#orderOption').html(html);
    $('#orders').html(html);
    $('#orders').prepend('<option value="0">请选择</option>');
}
function varDeleteClick(id) {
    $('#'+id).click(function () {
            var id = $(this).attr('id');
            deleteAlert(id);
    })
}
// 提交修改信息 异步
$('#saveinfo').on('click', function () {
    //获取id
    var id = $('#plateid').val();
    var sectionName = $('.sectionName').val();
    var describe = $('.describe').val();
    var type = $("#type").val();
    var order = $('#orders').val();
    var _token = $("input[name='_token']").val();
    if (sectionName == '' && describe == '' && type == '0' && order == '0') {
        swal('未做修改');
        return;
    }
    // 异步修改
    $.ajax({
        method:'put',
        type: "POST",
        url: "/plate/"+ id +"",
        dataType: 'json',
        data: {id: id, sectionName: sectionName, describe: describe, type: type, order: order, '_token': _token},
        success: function (data) {
            if (data['StatusCode'] == 200){
                swal("模块修改成功!", '该板块已被修改', "success");
                getAllInfo(data['ResultData']);
            } else {
                swal("模块修改失败!", '该板块修改失败', "error");
            }
        },
    });
});
function getAllInfo(data)
{
    updateOrderOption(data.order);

    if (data.name){
       obj.parents('.panel').find('.name212').html(data.name);
    }

    if (data.type){
       var Type;
       switch(data.type){
           case '1':
               Type = '(金融)';break;
           case '2':
               Type = '(投资)';break;
       }
       obj.parents('.panel').find('.types').html(Type);
    }

    if (data.describe){
        obj.parents('.panel').find('p').html(data.describe);
    }
    clearInput();
}
function clearInput()
{
    $('.describe').val('');
    $('.sectionName').val('');
    $('#type').val('0');
    $('#orders').val('0');
}
function uploadPic(data)
{
    objImg.attr('src',data.img);
}


