<?php

namespace app\module\Admin\controllers;

class WechatController extends CommonController
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
        $admin['avatar'] = empty($admin['avatar']) ? \Yii::$app->homeUrl . 'AmazeUI/img/user04.png' : UPLOAD_DIR . '/avatar' . $admin['avatar'];
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
        $server = $this->getServerInfo();

        \app\controllers\CommonController::dump($server);
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
                $size = round(trim($s_array[1]) / (1024 * 1024 * 1024), 1);
                $freespace = round(trim($fs_array[1]) / (1024 * 1024 * 1024), 1);
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
            $freephymem = ceil($phymem_array[0] / 1024);
            $totalphymem = ceil($phymem_array[1] / 1024);
//            echo "已用物理内存: ". ($totalphymem - $freephymem) ."MB/". $totalphymem . "MB\r\n空闲物理内存: " . $freephymem . "MB\r\n\r\n";

//            $this->dump("内存占用：" . round(($totalphymem - $freephymem) * 100 / $totalphymem, 2) . '%');

            $server['memory'] = array(
                'usedphymem' => $totalphymem - $freephymem,
                'totalphymem' => $totalphymem,
                'percent' => round(($totalphymem - $freephymem) * 100 / $totalphymem, 2),
            );

        //系统类型 linux
        } else {
            $fp = popen('top -b -n 2 | grep -E "^(%Cpu|KiB Mem)"', "r");//获取某一时刻系统cpu和内存使用情况
            $rs = "";
            while (!feof($fp)) {
                $rs .= fread($fp, 1024);
            }
            pclose($fp);
            $sys_info = explode("\n", $rs);

            $cpu_info = explode(",", $sys_info[2]);  //CPU占有量  数组
            $mem_info = explode(",", $sys_info[3]); //内存占有量 数组

            //CPU占有量
            $cpu_usage = trim(trim($cpu_info[0], '%Cpu(s): '), 'us');  //百分比
            $server['CPU'] = $cpu_usage;

            //内存占有量
            $mem_total = trim(trim($mem_info[0], 'KiB Mem: '), 'total');
            $mem_used = trim(trim($mem_info[2], 'used'));

            $server['memory'] = array(
                'usedphymem' => $mem_used,
                'totalphymem' => $mem_total,
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

            //检测时间
            $fp = popen("date +\"%Y-%m-%d %H:%M\"", "r");
            $rs = fread($fp, 1024);
            pclose($fp);
            $uptime = trim($rs);

            $server['time'] = array(
                'uptime' => $uptime,
                'formatTime' => $this->time2second($uptime),
            );

        }

        return $server;
    }

}
