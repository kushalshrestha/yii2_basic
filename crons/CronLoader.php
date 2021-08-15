<?php

namespace app\crons;
// php cron.php
class CronLoader
{
    public function __construct()
    {
        $job1 = new \Cron\Job\ShellJob();
        $job1->setCommand('php -r \'echo time()."\r\n";\' / >> ~/cron-yii.log');
        
        $job1->setSchedule(new \Cron\Schedule\CrontabSchedule('* * * * *'));


        $resolver = new \Cron\Resolver\ArrayResolver();
        $resolver->addJob($job1);

        $cron = new \Cron\Cron();
        $cron->setExecutor(new \Cron\Executor\Executor());
        $cron->setResolver($resolver);

        $cron->run();

        die(time()."\r\n");
    }
}