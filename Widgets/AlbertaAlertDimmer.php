<?php
namespace App\Widgets;
use App\Worker;
use Arrilot\Widgets\AbstractWidget;
use TCG\Voyager\Facades\Voyager;
class AlbertaAlertDimmer extends AbstractWidget
{
    protected $alerts = [];
    public function run()
    {
        $this->alerts = $this->getAlerts();
        $string = "Alberta Alert";
        if($this->alerts){
          $count = sizeof($this->alerts->entry);
          $string = ($count == 1) ? $string : $string."s";
          if($count > 0){
            $icon = "voyager-exclamation";
            $image = "https://i.ytimg.com/vi/_DIgtbW4nFM/maxresdefault.jpg";
          }else{
            $icon = "voyager-smile";
            $image = "storage/hRqFREfjjzdg7vrJWtos9ZgkLUB40PyuGm6UAMOY.jpeg";
          }
        }
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => $icon,
            'title'  => "{$count} {$string}",
            'text'   => $this->displayAlerts(),
            'button' => [
                'text' => 'Check Alert Status',
                'link' => "https://www.emergencyalert.alberta.ca",
                'target'=> "_blank",
            ],
            'image' => $image,
        ]));
    }

    public function displayAlerts()
    {
      $html = '<ul  class=class="list-group list-group">';
      foreach($this->alerts->entry as $alert){
        $html .= '<li class="list-group-item list-group-item-danger">
          '.$alert->title.'
          <marquee behavior="scroll" direction="left">'.
          str_replace(array("\r", "\n", "<br>"), '', nl2br($alert->summary))
          .'</marquee>
        </li>';
      }
      $html .="</ul>";
      return $html;
    }

    public function getAlerts()
    {
      $data = @file_get_contents(
        "https://www.emergencyalert.alberta.ca/aea/feed.atom");
      if (!empty($data)) {
        $xml = simplexml_load_string($data);
        if($xml){
          return $xml;
        }
      }
      return False;
    }

    public function shouldBeDisplayed()
    {
        return True;
    }
}
