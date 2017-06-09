{<include file="head.tpl">}
<div class="search">
    <div>
        <p>
            <span class = "dataTitle">日期：</span>
            <span><input type="text" id="datepicker"></span>
            <span><button id="search" value="查询"">查询</button></span>
        </p>
    </div>
    <div class="result" id="result"></div>
</div>
<div class="list">
    <div class="titlebar"  id="enableSup">
        <div class="title">外委维修项目统计表</div>
    </div>
    <div class="content">

        <table class="rwtxList" id="list">
            <tr>
                <th>编号</th>
                <th>报告单号</th>
                <th>车间/部门</th>
                <th>报告名称</th>
                <th>申请日期</th>
                <th>委托单位</th>
                <th>委托时间</th>
                <th>费用预估</th>
                <th>完工日期</th>
                <th>验收情况</th>
                <th>合同费用</th>
                <th>负责人</th>
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
