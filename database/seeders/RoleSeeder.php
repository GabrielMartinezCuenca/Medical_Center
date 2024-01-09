<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create([
            'name' => 'administrador',
        ]);
        $role2 = Role::create([
            'name' => 'medico',
        ]);
        $role3 = Role::create([
            'name' => 'paciente',
        ]);
        //Home
        Permission::create(["name" => 'home.requests', 'description'=>'Acceso a Sistema Web para pacientes'])->syncRoles([$role3]);
        Permission::create(["name" => 'home.requestsCreate', 'description'=>'Crear cita desde pagina web'])->syncRoles([$role3]);
        Permission::create(["name" => 'home.requestShow', 'description'=>'Ver cita desde pagina web'])->syncRoles([$role3]);
        Permission::create(["name" => 'home.requestHistory', 'description'=>'Ver historial de citas desde pagina web'])->syncRoles([$role3]);
        Permission::create(["name" => 'home.patients', 'description'=>'Ver pacientes desde pagina web'])->syncRoles([$role3]);
        Permission::create(["name" => 'home.patientscreate', 'description'=>'Crear paciente desde pagina web'])->syncRoles([$role3]);
        Permission::create(["name" => 'home.patientsShow', 'description'=>'Ver y actualizar paciente desde pagina web'])->syncRoles([$role3]);
        Permission::create(["name" => 'home.patientDestroy', 'description'=>'Eliminar paciente desde pagina web'])->syncRoles([$role3]);

        //Dashboard
        Permission::create(["name" => 'admin', 'description'=>'Ver panel de administración'])->syncRoles([$role, $role2]);
        Permission::create(["name"=>'dashboard.index', 'description'=>'ver Dashboard'])->syncRoles([$role, $role2]);
        Permission::create(["name"=>'dashboard.statistics', 'description'=>'ver Estadisticas en dashboard'])->syncRoles([$role, $role2]);

        //Citas medicas
        Permission::create(["name" => 'appointment.index', 'description'=>'Ver solicitudes de citas médicas'])->syncRoles([$role]);
        Permission::create(["name" => 'appointment.create', 'description'=>'Crear solicitud de cita médica'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'appointment.show', 'description'=>'Ver solicitud de cita médica'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'appointment.destroy', 'description'=>'Cancelar solicitud de cita médica'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'appointment.statusChange', 'description'=>'Aprobar solicitud de cita médica'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'appointmentConfirmed', 'description'=>'Ver citas confirmadas'])->syncRoles([$role]);
        Permission::create(["name" => 'appointment.prescription', 'description'=>'Atender cita médica'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'appointment.cancelAppointment', 'description'=>'Cancelar cita médica'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'appointment.history', 'description'=>'Ver historial de citas médicas'])->syncRoles([$role]);
        Permission::create(["name" => 'appointment.canceled', 'description'=>'Ver historial de citas médicas canceladas'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'prescription.store', 'description'=>'Crear receta médica'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'prescription.view', 'description'=>'Ver receta médica'])->syncRoles([$role, $role2]);
        Permission::create(['name'=> 'pdfGenerate', 'description'=>'Generar receta médica en PDF'])->syncRoles([$role,$role2]);

        //Pacientes
        Permission::create(["name" => 'patient.index', 'description'=>'Ver lista de pacientes'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'patient.create', 'description'=>'Crear nuevo paciente'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'patient.edit', 'description'=>'Editar información de paciente'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'patient.destroy', 'description'=>'Eliminar paciente'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'patient.patientCreateAppointment', 'description'=>'Crear paciente desde formulario de solicitud'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'patient.changeInformation', 'description'=>'Actualizar información del paciente en cita'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'patient.changeInformationP', 'description'=>'Actualizar información del paciente en receta médica'])->syncRoles([$role, $role2]);

        //Doctor
        Permission::create(["name" => 'doctor.index', 'description'=>'Ver lista de doctores'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'doctor.create', 'description'=>'Crear nuevo doctor'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'doctor.edit', 'description'=>'Actualizar información de doctor'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'doctor.destroy', 'description'=>'Eliminar doctor'])->syncRoles([$role, $role2]);
        Permission::create(["name" => 'doctor.dashboard', 'description'=>'Ver citas medicas para el doctor'])->syncRoles([$role, $role2]);

         //Especiality
         Permission::create(["name" => 'especiality.index', 'description'=>'Ver lista de especialidades'])->syncRoles([$role, $role2]);
         Permission::create(["name" => 'especiality.create', 'description'=>'Crear nueva especialidad'])->syncRoles([$role, $role2]);
         Permission::create(["name" => 'especiality.edit', 'description'=>'Actualizar información de especialidad'])->syncRoles([$role, $role2]);
         Permission::create(["name" => 'especiality.destroy', 'description'=>'Eliminar especialidad'])->syncRoles([$role, $role2]);

         //Consultorios
         Permission::create(["name" => 'consulting-room.index', 'description'=>'Ver lista de consultorios'])->syncRoles([$role, $role2]);
         Permission::create(["name" => 'consulting-room.create', 'description'=>'Crear nuevo consultorio'])->syncRoles([$role, $role2]);
         Permission::create(["name" => 'consulting-room.edit', 'description'=>'Actualizar información de consultorio'])->syncRoles([$role, $role2]);
         Permission::create(["name" => 'consulting-room.destroy', 'description'=>'Eliminar consultorios'])->syncRoles([$role, $role2]);

         //Usuarios
         Permission::create(["name" => 'user.index', 'description'=>'Ver lista de usuarios'])->syncRoles([$role]);
         Permission::create(["name" => 'user.edit', 'description'=>'Editar información de usuario'])->syncRoles([$role]);

         //Roles
         Permission::create(["name" => 'role.index', 'description'=>'Ver lista de roles'])->syncRoles([$role]);
         Permission::create(["name" => 'role.create', 'description'=>'Crear nuevo rol'])->syncRoles([$role]);
         Permission::create(["name" => 'role.edit', 'description'=>'Editar rol'])->syncRoles([$role]);
         Permission::create(["name" => 'role.destroy', 'description'=>'Eliminar rol'])->syncRoles([$role]);


       //  Permission::create(['name'=> 'profile.edit', 'description'=>'Crear cita desde pagina web'])->syncRoles([$role,$role2]);
        // Permission::create(['name'=> 'profile.update', 'description'=>'Crear cita desde pagina web'])->syncRoles([$role,$role2]);
        // Permission::create(['name'=> 'profile.destroy', 'description'=>'Crear cita desde pagina web'])->syncRoles([$role,$role2]);
         //Permission::create(['name'=> 'admin.index', 'description'=>'Crear cita desde pagina web'])->syncRoles([$role,$role2]);

        // Permission::create(['name'=> 'user.generatePassword', 'description'=>'Crear cita desde pagina web'])->syncRoles([$role,$role2]);
        // Permission::create(['name'=> 'user.changePassword', 'description'=>'Crear cita desde pagina web'])->syncRoles([$role,$role2]);


        }
}
