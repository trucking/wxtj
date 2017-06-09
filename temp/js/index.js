/**
 * Created by Administrator on 16-10-21.
 */
$(".title").click(function(){
    $(this).parent().siblings(".content").toggle();
});
/*
* ������Һ��js������һ�����
* */
$("#search").button().click(function(){
    $datepicker = $("#datepicker").val();
    $url = './ajax/searchList.php';

    if($datepicker == ''){
        $("#result").text("��ѡ������").show();
        return false;
    }else{
        $.post(
            $url,
            {'date':$datepicker},
            function(data){

                $("#list").html("");
                $("#list").append(
                    '<tr>' +
                        '<th>���</th>' +
                        '<th>���浥��</th>' +
                        '<th>����/����</th>' +
                        '<th>��������</th>' +
                        '<th>��������</th>' +
                        '<th>ί�е�λ</th>' +
                        '<th>ί��ʱ��</th>' +
                        '<th>����Ԥ��</th>' +
                        '<th>�깤����</th>' +
                        '<th>�������</th>' +
                        '<th>��ͬ����</th>' +
                        '<th>������</th>' +
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

//������������ʱ������
$("#datepicker").datepicker(
    {dateFormat: 'yy-mm'}
);
//������ǰ��js���ɵı��ҳ��
$(".finishTimeInput").live('click',function(){
    $(this).datepicker();
});


