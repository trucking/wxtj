{<include file="head.tpl">}
<div class="search">
    <div>
        <p>
            <span class = "dataTitle">���ڣ�</span>
            <span><input type="text" id="datepicker"></span>
            <span><button id="search" value="��ѯ"">��ѯ</button></span>
        </p>
    </div>
    <div class="result" id="result"></div>
</div>
<div class="list">
    <div class="titlebar"  id="enableSup">
        <div class="title">��ίά����Ŀͳ�Ʊ�</div>
    </div>
    <div class="content">

        <table class="rwtxList" id="list">
            <tr>
                <th>���</th>
                <th>���浥��</th>
                <th>����/����</th>
                <th>��������</th>
                <th>��������</th>
                <th>ί�е�λ</th>
                <th>ί��ʱ��</th>
                <th>����Ԥ��</th>
                <th>�깤����</th>
                <th>�������</th>
                <th>��ͬ����</th>
                <th>������</th>
            </tr>
            {<foreach $content as $item >}
            <tr>
                <td>{<$item['runId']>}</td>
                <td>{<$item['reportNo']>}</td>
                <td>{<$item['department']>}</td>
                <td style="width:200px">{<$item['reportName']>}</td>
                <td>{<$item['applicationTime']>}</td>
                <td>{<$item['client']>}</td>
                <td>{<$item['delegateTime']>}</td>
                <td>{<$item['estimateConst']>}</td>
                <td></td>
                <td></td>
                <td></td>
                <td>{<$item['chargePerson']>}</td>
            </tr>
            {</foreach>}
        </table>

    </div>
</div>

</div>
<script src="./temp/js/index.js"></script>
</body>
</html>
