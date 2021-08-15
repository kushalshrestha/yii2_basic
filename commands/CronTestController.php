<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Cron\Cron;
use yii\console\ExitCode;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
// php yii cron-test
class CronTestController extends Controller
{
    
    
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        do {
            $time = "The time is ". date("h:i:ss")."\n";
            $job1 = new \Cron\Job\ShellJob();
            $dir = __DIR__."/../cron_log";
            // die($dir);
            $job1->setCommand("php -r 'echo \"{$time}\";' >> {$dir}/log.txt");
            $job1->setSchedule(new \Cron\Schedule\CrontabSchedule('* * * * *'));

            $resolver = new \Cron\Resolver\ArrayResolver();
            $resolver->addJob($job1);

            $cron = new \Cron\Cron();
            $cron->setExecutor(new \Cron\Executor\Executor());
            $cron->setResolver($resolver);

            $cron->run();

            echo "Task ran at: ".date("Y-m-d H:i:s")."\r\n";
            sleep(15);
        } while(true);
        return ExitCode::OK;
    }
    
}
