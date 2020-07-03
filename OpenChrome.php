<?php

require_once('vendor/autoload.php');

use Applitools\RectangleSize;
use Applitools\Selenium\Eyes;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\WebDriverCapabilityType;
use Facebook\WebDriver\WebDriverBy;

class GetPage
{

    protected $webDriver;
    protected $process;
    protected $timeTest = 0;

    public function demo()
    {
        while(true){
            sleep($this->timeTest);
            $capabilities = array(WebDriverCapabilityType::BROWSER_NAME => 'chrome');
            $this->webDriver = RemoteWebDriver::create('http://localhost:4444/wd/hub', $capabilities);

            $this->webDriver->get("https://www.twitch.tv/hastad");
            sleep(10);
            try{
                $player = $this->webDriver->findElement(WebDriverBy::cssSelector(".video-player__default-player.video-player__inactive"));
                exec('"C:\Program Files (x86)\Google\Chrome\Application\chrome_proxy.exe"  --profile-directory="Profile 1" --app-id=bijknljimbjbojihdkmdccfgmaifdhkh');
                exec('"C:\Program Files\Mozilla Firefox\firefox.exe" -url https://www.twitch.tv/yetz');
                $this->timeTest = 60*60;
            }catch(Exception $e){
                try{
                    exec("taskkill /F /IM chrome.exe /T");
                    exec("taskkill /F /IM firefox.exe /T");
                }catch(Exception $ex){}
                $this->timeTest = 15;
            }finally{
                try{
                    $this->webDriver->close();
                }catch(Exception $exx){}
            }
        }
    }
}
$gP = new GetPage();
$gP->demo();
