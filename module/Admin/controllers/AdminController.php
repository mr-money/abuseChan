<?php

namespace app\module\Admin\controllers;

use app\models\AdminUser;

class AdminController extends CommonController
{
    public function init()
    {
        parent::init();

    }

    /*
     * 检查登录
     * */
    public function beforeAction($action)
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        return parent::beforeAction($action);
    }

    /*
     * 管理后台首页外部框架
     * */
    public function actionIndex()
    {
        $admin = $this->sessionGlobal->get('admin');

        //配置左侧导航栏
        \Yii::$app->view->params['adminMenu'] = CommonController::$adminMenu;;


        //默认头像
        $admin['avatar'] = empty($admin['avatar']) ? \Yii::$app->homeUrl . 'AmazeUI/img/user06.png' : $admin['avatar'];
        $responseData['admin'] = $admin;

        return $this->render('index', $responseData);
    }

    /*
     * 退出登录ajax
     * */
    public function actionLogoutAjax()
    {
        $this->sessionGlobal->set('admin', null);

        $cookie = \Yii::$app->response->cookies;
        $cookie->remove('remember_token');

        $response = array(
            'status' => $this->apiStatus['SUCCESS'],
            'message' => '已退出，请重新登录',
        );

        return json_encode($response);
    }

    /*
    * 管理后台home页
    * */
    public function actionHome()
    {
        $responseData = array();

        return $this->render('home', $responseData);
    }

    /*
     * 获取实时服务器性能
     * */
    public function actionGetCpuAjax()
    {
        $server = $this->getServerInfo();

        $response = array(
            'status' => $this->apiStatus['SUCCESS'],
            'message' => '',
            'data' => $server,

        );

        return json_encode($response);
    }

    public function actionTestAjax()
    {
        $res = $this->getServerInfo();
        \app\controllers\CommonController::dump($res);
        die;
//        $time_info = trim(" 16 days,  1:34");
        $time_info = trim(" 6 min");
//        $time_info = trim(" 1:34");
        if($day = trim(strstr($time_info,'days,',true),'days,')){
            $timeStr = trim(trim(strstr($time_info,'days,'),'days,'));
            $time = explode(':',$timeStr);
        }else if($minue = trim(strstr($time_info,'min',true),'min')){
            $day = 0;
            $time = array(0,$minue);
        }else{
            $day = 0;
            $time = explode(':',$time_info);
        }

        $uptime = (intval($day)*24*60*60)+(intval($time[0])*60*60)+(intval($time[1])*60);

        \app\controllers\CommonController::dump($uptime);
    }

    /**
     * @return array(
     *      time 运行时间
     *      disk 硬盘
     *      CPU
     *      memory 内存
     * )
     */
    public function getServerInfo()
    {
        //接口限制时间30秒
        set_time_limit(30);

        $server = array(); //系统状态信息
        //系统类型 windows
        if (strtolower(substr(PHP_OS, 0, 3)) == 'win') {
            //已运行时长
            $outTime = '';
            exec('wmic os get lastBootUpTime,LocalDateTime', $outTime);
            $datetime_array = explode('.', $outTime[1]);
//            $dt_array = explode(' ', $datetime_array[1]);
            $localtime = substr($datetime_array[1], -14);
//            $boottime = $datetime_array[0];
            $uptime = strtotime($localtime) - strtotime($datetime_array[0]);

//            $this->dump("已运行: " . $formatTime);
            $server['time'] = array(
                'uptime' => $uptime,
                'formatTime' => $this->time2second($uptime),
            );


            //硬盘用量
            $outDisk = '';
            exec('wmic logicaldisk get FreeSpace,size /format:list', $outDisk);
            $hd = '';
            foreach ($outDisk as $vaule) {
                $hd .= $vaule . ' ';;
            }
            $hd_array = explode('   ', trim($hd));
            $key = 'CDEFGHIJKLMNOPQRSTUVWXYZ';
            $diskUsed = 0; //已用空间
            $diskSum = 0; //总空间
            $diskFree = 0; //可用空间
            foreach ($hd_array as $k => $v) {
                $s_array = explode('Size=', $v);
                $fs_array = explode('FreeSpace=', $s_array[0]);
                $size = round(floatval(trim($s_array[1])) / (1024 * 1024 * 1024), 1);
                $freespace = round(floatval(trim($fs_array[1])) / (1024 * 1024 * 1024), 1);
                $drive = $key[$k];

//                echo $drive . "盘,\r\n已用空间: " . ($size - $freespace) . "GB/" . $size . "GB\r\n可用空间: " . $freespace . "GB\r\n\r\n";

                $diskUsed += ($size - $freespace);
                $diskSum += $size;
                $diskFree += $freespace;

            }
//            $this->dump("硬盘占用比例：" . round($diskUsed * 100 / $diskSum, 2) . '%');
            $server['disk'] = array(
                'diskUsed' => sprintf('%.1f', $diskUsed),
                'diskSum' => sprintf('%.1f', $diskSum),
                'diskFree' => sprintf('%.1f', $diskFree),
                'percent' => round($diskUsed * 100 / $diskSum, 2),
            );

            //获取cpu使用率
            $path = \Yii::$app->basePath . "\\cpu_usage.vbs";
            $content = <<<ETO
On Error Resume Next
Set objProc = GetObject("winmgmts:\\\\.\\root\cimv2:win32_processor='cpu0'")
WScript.Echo(objProc.LoadPercentage)
ETO;
            if (!file_exists($path)) {
                file_put_contents($path, $content);
            }

            exec("cscript -nologo $path", $usage);

            try {
                $CPU = $usage[0];
            } catch (Exception $e) {
                // 处理异常
                $server['CPU'] = 0;
            }

            $server['CPU'] = $CPU;


            //物理内存
            $out = '';
            exec('wmic os get TotalVisibleMemorySize,FreePhysicalMemory', $out);
            //多个空格转为一个空格
            $phymem = preg_replace("/\s(?=\s)/", "\\1", $out[1]);
            $phymem_array = explode(' ', $phymem);
            //print_r($phymem_array);
            $freephymem = ceil(floatval($phymem_array[0]) / 1024);
            $totalphymem = ceil(floatval($phymem_array[1]) / 1024);
//            echo "已用物理内存: ". ($totalphymem - $freephymem) ."MB/". $totalphymem . "MB\r\n空闲物理内存: " . $freephymem . "MB\r\n\r\n";

//            $this->dump("内存占用：" . round(($totalphymem - $freephymem) * 100 / $totalphymem, 2) . '%');

            $server['memory'] = array(
                'usedphymem' => $totalphymem - $freephymem,
                'totalphymem' => $totalphymem,
                'percent' => round(($totalphymem - $freephymem) * 100 / $totalphymem, 2),
            );

            //系统类型 linux
        } else {
            $fp = popen('top -b -n 2 | grep -E "^(%Cpu|KiB Mem|top)"', "r");//获取某一时刻系统cpu和内存使用情况
            $rs = "";

            while (!feof($fp)) {
                $rs .= fread($fp, 1024);
            }
            pclose($fp);
            $sys_info = explode("\n", $rs); //系统信息

            $top_info = explode(",",$sys_info[3]); //系统运行时间 数组
            $cpu_info = explode(",", $sys_info[4]);  //CPU占有量  数组
            $mem_info = explode(",", $sys_info[5]); //内存占有量 数组

            //系统运行时间
            $time_info = trim(trim(strstr($top_info[0],'up'),'up'));

            //test
//            $top_info[0] = 'top - 17:00:46 up 7 days';
//            $top_info[1] = '  49';

            //运行时间超过1天
            if($day = trim(strstr($time_info,'days',true),'days')){
                $time = explode(':',trim($top_info[1]));

                //超过一天，不到一小时
                if(count($time) == 1){
                    $time = array(0,$time[0]);
                }

                //运行时间不到1小时
            }else if($minue = trim(strstr($time_info,'min',true),'min')){
                $day = 0;
                $time = array(0,$minue);

                //运行时间在1小时到1天之间
            }else{
                $day = 0;
                $time = explode(':',$time_info);

                //不到一小时
                if(count($time) == 1){
                    $time = array(0,$time[0]);
                }
            }

            $uptime = (floatval($day)*24*60*60)+(floatval($time[0])*60*60)+(floatval($time[1])*60);

            $server['time'] = array(
                'uptime' => $uptime,
                'formatTime' => $this->time2second($uptime),
            );

            //CPU占有量
            $cpu_usage = trim(trim($cpu_info[0], '%Cpu(s): '), 'us');  //百分比
            $server['CPU'] = $cpu_usage;

            //内存占有量
            $mem_total = trim(trim($mem_info[0], 'KiB Mem: '), 'total');
            $mem_used = trim(trim($mem_info[2], 'used'));

            $server['memory'] = array(
                'usedphymem' => ceil(floatval($mem_used) / 1024),
                'totalphymem' => ceil(floatval($mem_total) / 1024),
                'percent' => round(100 * intval($mem_used) / intval($mem_total), 2),  //百分比
            );

            /*硬盘使用率*/
            $fp = popen('df -lh | grep -E "^(/)"', "r");
            $rs = fread($fp, 1024);
            pclose($fp);
            $rs = preg_replace("/\s{2,}/", ' ', $rs);  //把多个空格换成 “_”
            $hd = explode(" ", $rs);
            $hd_size = trim($hd[1], 'G'); //磁盘总空间 单位G
            $hd_used = trim($hd[2], 'G'); //磁盘已用空间 单位G
            $hd_avail = trim($hd[3], 'G'); //磁盘可用空间 单位G
            $hd_usage = trim($hd[4], '%'); //挂载点 百分比

            $server['disk'] = array(
                'diskUsed' => sprintf('%.1f', $hd_used),
                'diskSum' => sprintf('%.1f', $hd_size),
                'diskFree' => sprintf('%.1f', $hd_avail),
                'percent' => $hd_usage,
            );

        }

        return $server;
    }

    /**
     * 微信菜单编辑
     */
    public function actionMenu()
    {
        $responseData = array();

        return $this->render('menu', $responseData);
    }

    /**
     * 账号信息
     */
    public function actionAdminUser()
    {
        $responseData = array();
        //通过session查询数据库用户信息
        $admin = $this->sessionGlobal->get('admin');

        $where['id'] = $admin['id'];
        $adminUser = AdminUser::find($where)->asArray()->one();

        $responseData['admin'] = $adminUser;
        return $this->render('adminUser', $responseData);
    }


    /**
     * 保存管理员信息
     * @param nickname 昵称
     * @param telphone 手机号
     * @param realname 真实姓名
     * @param avatar 头像 base64
     * @param backup 备注
     * @return array
     */
    public function actionSaveAdminAjax()
    {
        $post = \Yii::$app->request->post();

        $adminId = $this->sessionGlobal->get('admin')['id'];
        $where['id'] = $adminId;

        $data = array(
            'nickname' => htmlspecialchars($post['nickname']),
            'telphone' => htmlspecialchars($post['telphone']),
            'realname' => htmlspecialchars($post['realname']),
            'avatar' => $post['avatar'], // 头像 base64
            'backup' => htmlspecialchars($post['backup']),
            'updated_at' => date("Y-m-d H:i:s",time()),
        );

        $res = AdminUser::updateAll($data,$where);

        //修改失败
        if(!$res){
            return json_encode(array(
                'status' => $this->apiStatus['ERROR'],
                'message' => '网络异常，修改失败',
            ));
        }

        //修改成功
        $response = array(
            'status' => $this->apiStatus['SUCCESS'],
            'message' => '修改成功',
        );

        //session更新 
        $admin = AdminUser::find($where)->asArray()->one();
        $this->sessionGlobal->set('admin',$admin);

        $response['data'] = $admin;
        return json_encode($response);
    }
}
