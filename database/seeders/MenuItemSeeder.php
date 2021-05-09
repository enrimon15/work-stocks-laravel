<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->createGuestMenuItems();
        $this->createSubscriberMenuItems();
        $this->createCompanyMenuItems();

    }

    private function createGuestMenuItems() {
        $menu = Menu::where('name', 'guest')->firstOrFail();


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("home"),
            'url' => '/',
            'route' => null,
        ]);

        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("offers"),
            'url' => 'jobs',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 2,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("subscribers"),
            'url' => 'subscribers',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 3,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("companies"),
            'url' => 'aziende',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 4,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("blog"),
            'url' => 'blog',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 5,
            ])->save();
        }
    }

    private function createSubscriberMenuItems() {
        $menu = Menu::where('name', 'user')->firstOrFail();


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("home"),
            'url' => '/',
            'route' => null,
        ]);

        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("offers"),
            'url' => 'jobs',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 2,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("companies"),
            'url' => 'aziende',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 4,
            ])->save();
        }

    }

    private function createCompanyMenuItems() {
        $menu = Menu::where('name', 'company')->firstOrFail();


        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("home"),
            'url' => '/',
            'route' => null,
        ]);

        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("offers"),
            'url' => 'jobs',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 2,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => __("subscribers"),
            'url' => 'subscribers',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-boat',
                'color' => null,
                'parent_id' => null,
                'order' => 3,
            ])->save();
        }


    }
}
