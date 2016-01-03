<?php

namespace Acacha\AdminLTETemplateLaravel\Console;

use Illuminate\Console\Command;
use Acacha\AdminLTETemplateLaravel\Facades\AdminLTE;

/**
 * Class AdminLTE
 * @package Acacha\AdminLTETemplateLaravel\Console
 */
class AdminLTE extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'adminlte-laravel:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Acacha AdminLTE Template into fresh laravel project';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->installHomeController();
        $this->installAuthController();
        $this->installPublicAssets();
        $this->installViews();
        $this->installResourceAssets();
    }

    /**
     * Install Home Controller
     */
    private function installHomeController()
    {
        $this->install(AdminLTE::homeController());
    }

    /**
     * Install Auth controller
     */
    private function installAuthController()
    {
        $this->install(AdminLTE::authController());
    }

    /**
     * Install public assets
     */
    private function installPublicAssets()
    {
        $this->install(AdminLTE::publicAssets());
    }

    /**
     * Install views
     */
    private function installViews()
    {
        $this->install(AdminLTE::views());
    }

    /**
     * Install resource assets
     */
    private function installResourceAssets()
    {
        $this->install(AdminLTE::resourceAssets());
    }


    /**
     * Install files from array
     * @param $files
     */
    private function install($files)
    {
        foreach ($files as $fileSrc => $fileDst) {
            copy($fileSrc, $fileDst);
        }
    }


}