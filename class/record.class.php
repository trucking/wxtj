<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 17-5-4
 * Time: 涓婂崍8:45
 */
include_once('database.class.php');
class record
{
    private $flowIdOfReport = 158;//突发维修报告单流程类型号，原突发维修报告flow_id=145
    private $flowIdOfSheet = 157;//外委维修通知单流程类型号
    private $reportNo;
    private $department;
    private $reportName;
    private $applicationTime;

    public function getReport($runId)
    {

        $item       = 'flow_run_data.ITEM_ID,
                        flow_run_data.ITEM_DATA';
        $table      = 'flow_run_data
                        INNER JOIN flow_run
                        ON flow_run_data.RUN_ID = flow_run.RUN_ID';
        $condition  = 'flow_run.FLOW_ID = '.$this->flowIdOfReport.' and
                        flow_run.run_id = '.$runId.' and
                        DEL_FLAG = 0
                        ORDER BY BEGIN_TIME DESC ';
        $result = Database::select($item,$table,$condition);
        //由于流程数据的设计原因，记录值在一个表中，所以只能查出数值对应的ID号进行数值复制
        /*
         * 1    报告单号
         * 2    报告内容（没有单独的名称，暂时取出所有的值）,更改了流程，新流程新增了报告标题
         * 4    打报告的部门
         * 6    申请时间
         * */
        foreach($result as $k=>$v){
            switch ($v['ITEM_ID']){
                case 1 : $this->reportNo        = $v['ITEM_DATA'];break;
                case 2 : $this->reportName      = $v['ITEM_DATA'];break;
                case 4 : $this->department      = $v['ITEM_DATA'];break;
                case 6 : $this->applicationTime = $v['ITEM_DATA'];break;
            }
        }
        $arr = array(
            'runId'=>$runId,
            'reportNo'=>$this->reportNo,
            'reportName'=>$this->reportName,
            'department'=>$this->department,
            'applicationTime'=>$this->applicationTime
        );
        return $arr;
    }

    public function getSheet($reportNo)
    {
        $item       = 'flow_run.run_id';
        $table      = 'flow_run_data
                        INNER JOIN flow_run
                        on flow_run.run_id =flow_run_data.RUN_ID';
        $condition  = 'flow_run_data.ITEM_DATA = \''.$reportNo.'\' and
                        flow_run.FLOW_ID = '.$this->flowIdOfSheet;
        $result     = Database::select($item,$table,$condition);

        $item       = '*';
        $table      = 'flow_run_data';
        $condition  = 'run_id = \''.$result[0]['run_id'].'\'';
        $result     = Database::select($item,$table,$condition);
        /*
           * 1    申请的部门
           * 2    委托单位
           * 3    预估费用
           * 4    施工方接收人
           * 5    委托时间
           * 6    维修用时
           * 7-14 外委维修项目多选开关，选择的已on表示
           * 15   报告单号
           * 16   外委维修内容
           * 17   项目负责人
           * 18   建立日期
           * ...  后边是领导签字和时间
           * */
        //这里$result存在一个问题，就是查不出的情况，查不出的情况下需要更新为空数组。
        if($result){
            foreach($result as $v){
                switch($v['ITEM_ID']){
                    case 2  : $arr['client']         = $v['ITEM_DATA'];break;
                    case 3  : $arr['estimateConst']  = $v['ITEM_DATA'];break;
                    case 5  : $arr['delegateTime']   = $v['ITEM_DATA'];break;
                    case 17 : $arr['chargePerson']   = $v['ITEM_DATA'];break;
                }
            }
        }else{
            $arr['client']          = '';
            $arr['estimateConst']   = '';
            $arr['delegateTime']    = '';
            $arr['chargePerson']    = '';
        }
        return $arr;
    }

    public function getList($date)
    {
        $item       = 'DISTINCT(flow_run.RUN_ID)';
        $table      = 'flow_run
                      inner join flow_run_prcs
                      on flow_run.run_id = flow_run_prcs.run_id';
        $condition  = 'FLOW_ID = '.$this->flowIdOfReport.' and
                      flow_prcs = 5 and
                      DEL_FLAG = 0 and
                      BEGIN_TIME LIKE \''.$date.'%\'
                      ORDER BY begin_time ASC';
        $arr = Database::select($item,$table,$condition);
        $i = 0;
        $result = array();
        foreach ($arr as $v)
        {
            $reportResult   = $this->getReport($v['RUN_ID']);
            $result[$i]     = array_merge($reportResult,$this->getSheet($reportResult['reportNo']));
            $i++;
        }
        return $result;
    }
} 