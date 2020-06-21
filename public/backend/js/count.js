function countUp(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.count'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp(495);

function countUp2(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.count2'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp2(947);

function countUp3(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.count3'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp3(328);

function countUp4(count)
{
    var div_by = 100,
        speed = Math.round(count / div_by),
        $display = $('.count4'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp4(10328);
// --------------- BILL ------------------
$(document).ready(function()
{
    $(".check_all").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    // $("input[name='check_bill']").click(function(){
    //     arrId.push($(this).val())
    //     console.log(arrId)
    // })
});
// Create array save id
var arrId = new Array();
// GET ID PRODUCT AND SEND TO SERVER
var changeStatus = function(status)
{
    var checkStatus = $("input[name='checkStatus[]']").val();
    if(checkStatus == status)
    {
        alert("Vui lòng chọn mục khác");
    }
    else
    {
        var form = $('form.formBill').serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
          url: "/admin/change-bill/"+status,
          type: "POST",
          data: form,
          success: function(response) 
          {
            $('input:checked').parents('tr').css('display','none');
            $('input:checked').prop('checked',false);
          }
        });
    }
    
}


var checkDelete = function(id){
    var check = confirm('Bạn có muốn xóa?');
    if(check == true)
    {
        $.ajax({
          url: "/admin/delete-product/"+id,
          type: "GET",
          data: id,
          success: function(response) 
          {
            location.reload();
          }
        });
    }
}
// get url 
$(document).ready(function(){
    // url path now
    var urlName = window.location.href;
    var arrElement = $("#nav-accordion").find('.sub a');
    $.each(arrElement, function(key, val){
        if(urlName == $(val).attr("href"))
        {
            $(val).parents('.dcjq-parent-li').children('.dcjq-parent').addClass('active');
            $(val).parents('.sub').css('display','block');
            $(val).parent().addClass('active');
        }
    });
    
});