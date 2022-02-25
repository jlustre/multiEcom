<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('routegroup')->nullable();
            $table->enum('type',['A', 'S', 'U'])->default('A');
            $table->string('iconclass')->nullable();
            $table->boolean('isActive')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
        
        // MainMenu
        // DB::table('menus')->insert([
        //     'id' => 0,
        //     'parent_id' => 0,
        //     'name' => 'Dummy',
        //     'created_at' => now(),
        //     'deleted_at' => now(),
        // ]);

        DB::table('menus')->insert([
            'name' => 'Tables',
            'isActive' => 1,
            'iconclass' => 'nav-icon far fas fa-database',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Mails',
            'isActive' => 1,
            'iconclass' => 'nav-icon far fa-envelope',
            'created_at' => now(),
        ]);
        
        DB::table('menus')->insert([
            // 'id' => 3,
            'name' => 'Reports',
            'isActive' => 1,
            'iconclass' => 'nav-icon fas fas fa-file-alt',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            // 'id' => 4,
            'name' => 'Pages',
            'isActive' => 1,
            'iconclass' => 'nav-icon fas fas fa-copy',
            'created_at' => now(),
        ]);

        // --------------- Sub Menus -----------------//

        DB::table('menus')->insert([
            'name' => 'Users',
            'parent_id' => 1,
            'url' => 'admin.user.index',
            'routegroup' => 'user',
            'iconclass' => 'nav-icon fas fa-users',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Categories',
            'parent_id' => 1,
            'url' => 'admin.category.index',
            'routegroup' => 'category',
            'iconclass' => 'nav-icon fas fa-boxes',
            'created_at' => now(),
        ]);

         DB::table('menus')->insert([
            'name' => 'Products',
            'parent_id' => 1,
            'url' => 'admin.product.index',
            'routegroup' => 'product',
            'iconclass' => 'nav-icon fas fa-shopping-bag',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Brands',
            'parent_id' => 1,
            'url' => 'admin.brand.index',
            'routegroup' => 'brand',
            'iconclass' => 'nav-icon fab fa-bootstrap',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Menus',
            'parent_id' => 1,
            'url' => 'admin.menu.index',
            'routegroup' => 'menu',
            'iconclass' => 'nav-icon fas fa-clipboard-list',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Inbox',
            'parent_id' => 2,
            'url' => '',
            'iconclass' => 'nav-icon far fa-envelope',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Compose',
            'parent_id' => 2,
            'iconclass' => 'nav-icon far fa-envelope',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Report1',
            'parent_id' => 3,
            'iconclass' => 'nav-icon fas fa-file-alt',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Report2',
            'parent_id' => 3,
            'iconclass' => 'nav-icon fas fa-file-alt',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'About Us',
            'parent_id' => 4,
            'iconclass' => 'nav-icon fas fa-address-card',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Privacy Policy',
            'parent_id' => 4,
            'iconclass' => 'nav-icon fas fa-file',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Contact Us',
            'parent_id' => 4,
            'iconclass' => 'nav-icon fas fa-file',
            'created_at' => now(),
        ]);

        DB::table('menus')->insert([
            'name' => 'Return Policy',
            'parent_id' => 4,
            'iconclass' => 'nav-icon fas fa-file',
            'created_at' => now(),
        ]);


       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
