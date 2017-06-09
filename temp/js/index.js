/**
 * Created by Administrator on 16-10-21.
 */
$(".title").click(function(){
    $(this).parent().siblings(".content").toggle();
});
/*
* 点击查找后的js，返回一个表格。
* */
$("#search").button().click(function(){
    $datepicker = $("#datepicker").val();
    $url = './ajax/searchList.php';

    if($datepicker == ''){
        $("#result").text("请选择日期").show();
        return false;
    }else{
        $.post(
            $url,
            {'date':$datepicker},
            function(data){

                $("#list").html("");
                $("#list").append(
                    '<tr>' +
                        '<th>编号</th>' +
                        '<th>报告单号</th>' +
                        '<th>车间/部门</th>' +
                        '<th>报告名称</th>' +
                        '<th>申请日期</th>' +
                        '<th>委托单位</th>' +
                        '<th>委托时间</th>' +
                        '<th>费用预估</th>' +
                        '<th>完工日期</th>' +
                        '<th>验收情况</th>' +
                        '<th>合同费用</th>' +
                        '<th>负责人</th>' +
                    '</tr>'
                );
                for(p in data)
                {
                    $("#list").append(
                        '<tr>' +
                            '<td>'+data[p]['runId']+'</td>' +
                            '<td>'+data[p]['reportNo']+'</td>' +
                            '<td>'+data[p]['department']+'</td>' +
                            '<td style="width:200px">'+data[p]['reportName']+'</td>' +
                            '<td>'+data[p]['applicationTime']+'</td>' +
                            '<td>'+data[p]['client']+'</td>' +
                            '<td>'+data[p]['estimateConst']+'</td>' +
                            '<td>'+data[p]['delegateTime']+'</td>' +
                            '<td id="test" attr="'+ p +'">' +
                                '<input type="text" name="finishTime" class="finishTimeInput" value="">' +
                            '</td>' +
                            '<td></td>' +
                            '<td></td>' +
                            '<td>'+data[p]['chargePerson']+'</td>' +
                        '</tr>'
                    );
                }
            }
        );
    }
});

//这个是搜索框的时间框调用
$("#datepicker").datepicker(
    {dateFormat: 'yy-mm'}
);
//绑定了由前面js生成的表格页面
$(".finishTimeInput").live('click',function(){
    $(this).datepicker();
});


