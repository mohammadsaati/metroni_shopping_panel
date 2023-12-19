<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteBtn extends Component
{
    public array $config = [];
    /**
     * Create a new component instance.
     */
    public function __construct(array $config)
    {
        $this->setConfiguration();
        $this->config = array_merge($this->config , $config);
        $this->setDataAfterConfiguration();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-btn');
    }

    private function setConfiguration()
    {
        $this->config["item"] = [];
        $this->config["ajax_type"] = "DELETE";
        $this->config["deleting_item"] = "";
        $this->config["ajax_url_name"] = "";
        $this->config["route_bindings"] = [];
        $this->config["data"] = ["_token" => csrf_token()];
        $this->config["alert_title"] = trans("panel.status_delete_title");
    }

    private function setDataAfterConfiguration()
    {
        $this->config["extra"] = [
            "id"      =>  $this->config["item"]->id ?? "",
        ];
        $this->config["data"] = array_merge( $this->config["data"] , $this->config["ajax_data"] ?? []);
        $original_url = $this->config['ajax_url_name'];
        $this->config["url"] = count($this->config["route_bindings"]) == 0 ? route( "$original_url", $this->config["item"]) : route( "$original_url", $this->config["route_bindings"]);
    }

}
