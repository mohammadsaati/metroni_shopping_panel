<?php
namespace App\Classes\Theme;


use App\Classes\Theme\Metronic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Menu
{
    private array $items = [];

    private string $data_kt_menu_trigger = "click";

    private string $top_item_class = "menu-item menu-accordion";

    private string $top_item_link_class = "menu-item";

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function BuildAsideMenu()
    {
        foreach ($this->items as $item)
        {
           $this->create_single_item(item: $item);
        }
    }

    private function create_single_item($item)
    {
//        dd(Metronic::getSVG($item["icon"] , "svg-icon-light"));
        $block = $this->chooseItemClass($item);

        $block .="<span class='menu-link' dir='rtl'>
                     <span class='menu-icon'>". getIcon(name: $item["icon"] , class: 'fs-3') ."</span>".
					"<span class='menu-title'>".$item['title']."</span>".
					"<span class='menu-arrow'></span>
				</span>";



        $block .= $this->checkSubMenu($item);

        $block .="</div>";


        echo $block;
    }

    private function chooseItemClass($item) : string
    {
        if (isset($item["submenu"]))
            return "<div data-kt-menu-trigger='$this->data_kt_menu_trigger' class='$this->top_item_class'>";

        return "<div class='$this->top_item_link_class'>";
    }

    private function singleLinkedMenu($item)
    {
        return "<span class='menu-link' dir='rtl'>
                     <span class='menu-icon'><i class='". $item["icon"]." text-light mr-5'></i></span>".
            "<a href=''> <span class='menu-title'>".$item['title']."</span></a>".
            "</span>";
    }


    private function checkSubMenu($item) : string
    {
        if (!isset($item["submenu"]))
            return "";

        return '<div class="menu-sub menu-sub-accordion" dir="rtl">
                    <div class="menu-item">
						<!--begin:Menu link-->
						'
                        .$this->showSubItems(sub_items: $item["submenu"]).
						'<!--end:Menu link-->
					</div>
                </div>';
    }

    private function showSubItems($sub_items)
    {
        $block = "";
        foreach ($sub_items as $sub_item)
        {
            $block .= '<a class="menu-link" href="'. url($sub_item['page']) .'">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
							<span class="menu-title">'.$sub_item["title"].'</span>'.
						'</a>';
        }

        return $block;
    }


}
