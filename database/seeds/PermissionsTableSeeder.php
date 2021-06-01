<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;
use Caffeinated\Shinobi\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
          'name'    => 'Admin',
          'slug'    => 'admin',
          'special' => 'all-access',
        ]);

        //Permisos para Usuarios (Solo 4 porque crear no hace falta)
        Permission::create([
          'name'         =>'Navegar usuarios',
          'slug'         =>'users.index',
          'description'  =>'Lista y navega todos los usuarios del sistema',
        ]);
        Permission::create([
          'name'         =>'Ver detalle de usuario',
          'slug'         =>'users.show',
          'description'  =>'Ver en detalle cada usuario del sistema',
        ]);
        Permission::create([
          'name'         =>'Edición de usuarios',
          'slug'         =>'users.edit',
          'description'  =>'Editar cualquier dato de un usuario del sistema',
        ]);
        Permission::create([
          'name'         =>'Eliminar usuarios',
          'slug'         =>'users.destroy',
          'description'  =>'Eliminar cualquier usuario del sistema',
        ]);


        //Los 5 Permisos necesarios para Roles
        Permission::create([
          'name'         =>'Navegar roles',
          'slug'         =>'roles.index',
          'description'  =>'Lista y navega todos los roles del sistema',
        ]);
        Permission::create([
          'name'         =>'Ver detalle de rol',
          'slug'         =>'roles.show',
          'description'  =>'Ver en detalle cada rol del sistema',
        ]);
        Permission::create([
          'name'         =>'Creación de roles',
          'slug'         =>'roles.create',
          'description'  =>'Crear los datos de un rol del sistema',
        ]);
        Permission::create([
          'name'         =>'Edición de roles',
          'slug'         =>'roles.edit',
          'description'  =>'Editar cualquier dato de un rol del sistema',
        ]);
        Permission::create([
          'name'         =>'Eliminar rol',
          'slug'         =>'roles.destroy',
          'description'  =>'Eliminar cualquier rol del sistema',
        ]);


        //Los 5 Permisos necesarios para Products
        //Permission::create([
          //'name'         =>'Navegar productos',
          //'slug'         =>'products.index',
          //'description'  =>'Lista y navega todos los productos del sistema',
        //]);
        //Permission::create([
          //'name'         =>'Ver detalle de producto',
          //'slug'         =>'products.show',
          //'description'  =>'Ver en detalle cada producto del sistema',
        //]);
        //Permission::create([
          //'name'         =>'Creación de productos',
          //'slug'         =>'products.create',
          //'description'  =>'Crear los datos de un producto del sistema',
        //]);
        //Permission::create([
          //'name'         =>'Edición de productos',
          //'slug'         =>'products.edit',
          //'description'  =>'Editar cualquier dato de un producto del sistema',
        //]);
        //Permission::create([
          //'name'         =>'Eliminar producto',
          //'slug'         =>'products.destroy',
          //'description'  =>'Eliminar cualquier producto del sistema',
        //]);


        //Los 5 Permisos necesarios para Estudiantes
        Permission::create([
          'name'         =>'Navegar estudiantes',
          'slug'         =>'estudiantes.index',
          'description'  =>'Lista y navega todos los estudiantes del sistema',
        ]);
        Permission::create([
          'name'         =>'Ver detalle de estudiante',
          'slug'         =>'estudiantes.show',
          'description'  =>'Ver en detalle cada estudiante del sistema',
        ]);
        Permission::create([
          'name'         =>'Creación de estudiantes',
          'slug'         =>'estudiantes.create',
          'description'  =>'Crear los datos de un estudiante del sistema',
        ]);
        Permission::create([
          'name'         =>'Edición de estudiantes',
          'slug'         =>'estudiantes.edit',
          'description'  =>'Editar cualquier dato de un estudiante del sistema',
        ]);
        Permission::create([
          'name'         =>'Eliminar estudiante',
          'slug'         =>'estudiantes.destroy',
          'description'  =>'Eliminar cualquier estudiante del sistema',
        ]);


        //Los 5 Permisos necesarios para Instructors
        Permission::create([
          'name'         =>'Navegar instructores',
          'slug'         =>'instructors.index',
          'description'  =>'Lista y navega todos los instructores del sistema',
        ]);
        Permission::create([
          'name'         =>'Ver detalle de instructor',
          'slug'         =>'instructors.show',
          'description'  =>'Ver en detalle cada instructor del sistema',
        ]);
        Permission::create([
          'name'         =>'Creación de instructores',
          'slug'         =>'instructors.create',
          'description'  =>'Crear los datos de un instructor del sistema',
        ]);
        Permission::create([
          'name'         =>'Edición de instructores',
          'slug'         =>'instructors.edit',
          'description'  =>'Editar cualquier dato de un instructor del sistema',
        ]);
        Permission::create([
          'name'         =>'Eliminar instructor',
          'slug'         =>'instructors.destroy',
          'description'  =>'Eliminar cualquier instructor del sistema',
        ]);


        //Los 5 Permisos necesarios para Compras
        Permission::create([
          'name'         =>'Navegar horas compradas',
          'slug'         =>'compras.index',
          'description'  =>'Lista y navega todas las horas compradas en el sistema',
        ]);
        Permission::create([
          'name'         =>'Ver detalle de horas compradas',
          'slug'         =>'compras.show',
          'description'  =>'Ver en detalle cada hora comprada en el sistema',
        ]);
        Permission::create([
          'name'         =>'Creación de horas compradas',
          'slug'         =>'compras.create',
          'description'  =>'Crear los datos de una hora comprada en el sistema',
        ]);
        Permission::create([
          'name'         =>'Edición de horas compradas',
          'slug'         =>'compras.edit',
          'description'  =>'Editar cualquier dato de una hora en el sistema',
        ]);
        Permission::create([
          'name'         =>'Eliminar horas compradas',
          'slug'         =>'compras.destroy',
          'description'  =>'Eliminar cualquier hora en el sistema',
        ]);

        //Los 5 Permisos necesarios para Vuelos
        Permission::create([
          'name'         =>'Navegar vuelos realizados',
          'slug'         =>'vuelos.index',
          'description'  =>'Lista y navega todos los vuelos realizados en el sistema',
        ]);
        Permission::create([
          'name'         =>'Ver detalle de vuelos realizados',
          'slug'         =>'vuelos.show',
          'description'  =>'Ver en detalle cada vuelo realizado en el sistema',
        ]);
        Permission::create([
          'name'         =>'Creación de vuelo realizado',
          'slug'         =>'vuelos.create',
          'description'  =>'Crear los datos de un vuelo realizado en el sistema',
        ]);
        Permission::create([
          'name'         =>'Edición de vuelo realizado',
          'slug'         =>'vuelos.edit',
          'description'  =>'Editar cualquier dato de un vuelo realizado en el sistema',
        ]);
        Permission::create([
          'name'         =>'Eliminar vuelo realizado',
          'slug'         =>'vuelos.destroy',
          'description'  =>'Eliminar cualquier vuelo realizado en el sistema',
        ]);



        //1 permiso necesarios para horascontrol (cartelera)
        Permission::create([
          'name'         =>'Navegar las horas por piloto (cartelera)',
          'slug'         =>'horascontrol.index',
          'description'  =>'Lista y navega todas las horas de vuelo de los pilotos del sistema',
        ]);
    }
}
