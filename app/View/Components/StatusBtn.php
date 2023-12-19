<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusBtn extends Component
{

    public $config;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($config)
    {
        $this->setConfig();
        $this->config = array_merge($this->config , $config);
        $this->setDataAfterConfiguration();

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.status-btn');
    }

    public function good()
    {
        return redirect()->back();
    }
    public function setConfig()
    {
        $this->config["status_field"] = "status";
        $this->config["item"] = [];
        $this->config["ajax_type"] = "POST";
        $this->config["ajax_url_name"] = "";
        $this->config["changeBG"] = true;
        $this->config["ajax_data"] = [];
        $this->config["route_bindings"] = [];
        $this->config["data"] = ["_token" => csrf_token()];

        $this->config["alert_title"] = trans("panel.status_alert_title");

    }

    private function setDataAfterConfiguration()
    {
        $this->config["extra"] = [
            "id"      =>  $this->config["item"]->id ?? "",
            "status"  =>  $this->config["item"][ $this->config["status_field"] ] ?? ""
        ];
        $this->config["data"] = array_merge( $this->config["data"] , $this->config["ajax_data"] );
        $original_url = $this->config['ajax_url_name'];
        $this->config["url"] = count($this->config["route_bindings"]) == 0 ? route( "$original_url", $this->config["item"]) : route( "$original_url", $this->config["route_bindings"]);
    }

}
