<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        
        \App\Models\User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            "password" => Hash::make("superadmin")
        ]);

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            "password" => Hash::make("admin")
        ]);

        \App\Models\AcademicYear::insert([
            [
                "id" => "9b610152-27e6-49ee-946b-e328c0bd8638",
                "year" => "2024",
                "semester" => "odd",
                "status" => 1
            ],
            [
                "id" => "9b61023e-2bb2-4438-a6ff-0a3f406bc24b",
                "year" => "2024",
                "semester" => "even",
                "status" => 0
            ]
        ]);

        \App\Models\Building::create([
            "id" => "9a5645d9-a354-4b08-ad12-7719fa57325d",
            "name" => "Student Center"
        ]);

        \App\Models\Room::insert([
            [
                "id" => "9b6103ef-923d-4e45-a611-d65b2c9f12a4",
                "room" => "Room 01",
                "building_id" => "9a5645d9-a354-4b08-ad12-7719fa57325d"
            ],
            [
                "id" => "88081526-cd53-4303-9c93-6588e3474ca2",
                "room" => "Room 02",
                "building_id" => "9a5645d9-a354-4b08-ad12-7719fa57325d"
            ]
        ]);

        \App\Models\Faculty::insert([
            [
                "id" => "9b633735-48e1-49b2-8e66-36e8b5239396",
                "name" => "English"
            ],
            [
                "id" => "a5ddeb11-f671-4174-9d1e-4698a112d8d4",
                "name" => "Software Engineer"
            ]
        ]);

        \App\Models\Lecturer::insert([
            [
                "id" => "9b61028d-2a10-4a45-b5bb-9afa222b3484",
                "nidn" => "2305018",
                "name" => "Iqro Negoro",
                "birth_place" => "Indonesia",
                "birth" => "2005-02-14",
                "address" => "Indonesia",
                "faculty_id" => "a5ddeb11-f671-4174-9d1e-4698a112d8d4",
                "phone" => "08978405369",
                "email" => "iqronegoro0@gmail.com",
                "password" => Hash::make("iqro"),
                "gender" => "Female",
                "photo" => "images/iqro.jpg"
            ],
            [
                "id" => "9b613ed1-268b-4b14-b94a-687873f587b5",
                "nidn" => "2305019",
                "name" => "Irene",
                "birth_place" => "Aegir",
                "birth" => "2005-02-14",
                "address" => "Aegir",
                "faculty_id" => "a5ddeb11-f671-4174-9d1e-4698a112d8d4",
                "phone" => "08978405368",
                "email" => "irene@gmail.com",
                "password" => Hash::make("irene"),
                "gender" => "Female",
                "photo" => "images/irene.jpg"
            ],
            [
                "id" => "6e5746f6-9659-48e9-840b-e431476c66f5",
                "nidn" => "2305069",
                "name" => "Ellen Baker",
                "birth_place" => "Japanese",
                "birth" => "2017-02-14",
                "address" => "Tokyo",
                "faculty_id" => "9b633735-48e1-49b2-8e66-36e8b5239396",
                "phone" => "08912345678",
                "email" => "ellenbaker@gmail.com",
                "password" => Hash::make("ellen"),
                "gender" => "Female",
                "photo" => "images/ellen.jpg"
            ]
        ]);

        \App\Models\Study::insert([
            [
                "id" => "9b6102ba-0eb4-4277-94c3-8dd81ecc59a5",
                "study_code" => "INF001",
                "name" => "Informatics",
                "degree" => "D4",
                "faculty_id" => "a5ddeb11-f671-4174-9d1e-4698a112d8d4",
                "lecturer_id" => "9b61028d-2a10-4a45-b5bb-9afa222b3484"
            ],
            [
                "id" => "a701403d-40af-4d52-830d-d4064349a189",
                "study_code" => "E0001",
                "name" => "English",
                "degree" => "S1",
                "faculty_id" => "9b633735-48e1-49b2-8e66-36e8b5239396",
                "lecturer_id" => "6e5746f6-9659-48e9-840b-e431476c66f5"
            ]
        ]);

        \App\Models\Classes::insert([
            [
                "id" => "9b6103dc-3575-4795-a782-05ad1849dc79",
                "name" => "RPL1A",
                "generation" => "2024",
                "total" => 0,
                "study_id" => "9b6102ba-0eb4-4277-94c3-8dd81ecc59a5",
                "lecturer_id" => "9b61028d-2a10-4a45-b5bb-9afa222b3484"
            ],
            [
                "id" => "cf75058c-1695-4c0d-b652-eedeaa425f25",
                "name" => "E2A",
                "generation" => "2024",
                "total" => 0,
                "study_id" => "a701403d-40af-4d52-830d-d4064349a189",
                "lecturer_id" => "6e5746f6-9659-48e9-840b-e431476c66f5"
            ],
            [
                "id" => "2a72f3c2-08db-41b2-a417-17ad5264dd99",
                "name" => "RPL2A",
                "generation" => "2024",
                "total" => 0,
                "study_id" => "9b6102ba-0eb4-4277-94c3-8dd81ecc59a5",
                "lecturer_id" => "6e5746f6-9659-48e9-840b-e431476c66f5"
            ]
        ]);

        \App\Models\Student::insert([
            [
                "id" => "9b610436-bc50-428b-889c-c6f575974444",
                "name" => "Iqro Negoro",
                "nim" => "2305018",
                "birth_place" => "Indonesia",
                "birth" => "2005-02-14",
                "address" => "Indonesia",
                "phone" => "08978405369",
                "email" => "iqronegoro0@gmail.com",
                "password" => Hash::make("iqro"),
                "gender" => "Male",
                "photo" => "images/iqro.jpg",
                "study_id" => "9b6102ba-0eb4-4277-94c3-8dd81ecc59a5",
                "class_id" => "9b6103dc-3575-4795-a782-05ad1849dc79"
            ],
            [
                "id" => "e04acd27-1493-4528-b631-700c11515d03",
                "name" => "Ellen Baked",
                "nim" => "2305011",
                "birth_place" => "Dutsch",
                "birth" => "2005-02-14",
                "address" => "Dutsch",
                "phone" => "08978405361",
                "email" => "baked@gmail.com",
                "password" => Hash::make("baked"),
                "gender" => "Female",
                "photo" => "images/ellen.jpg",
                "study_id" => "a701403d-40af-4d52-830d-d4064349a189",
                "class_id" => "cf75058c-1695-4c0d-b652-eedeaa425f25"
            ]
        ]);

        \App\Models\Course::insert([
            [
                "id" => "9b6103ba-3cfe-43ff-942e-b97cc5989e1e",
                "code" => "W001",
                "name" => "Weeb Programming",
                "sks" => 3,
                "semester" =>  "even",
                "study_id" => "9b6102ba-0eb4-4277-94c3-8dd81ecc59a5"
            ],
            [
                "id" => "7a6e1cae-ed59-4ba0-b6e2-f1c010889d41",
                "code" => "E001",
                "name" => "English",
                "sks" => 2,
                "semester" =>  "even",
                "study_id" => "a701403d-40af-4d52-830d-d4064349a189"
            ]
        ]);

        \App\Models\Schedule::insert([
            [
                "id" => "9b610ca9-3f16-4973-a43c-0a7a46030f7e",
                "day" => "Monday",
                "time" => "14:20:00",
                "study_id" => "a701403d-40af-4d52-830d-d4064349a189",
                "year_id" => "9b610152-27e6-49ee-946b-e328c0bd8638",
                "class_id" => "9b6103dc-3575-4795-a782-05ad1849dc79",
                "course_id" => "9b6103ba-3cfe-43ff-942e-b97cc5989e1e",
                "lecturer_id" => "9b61028d-2a10-4a45-b5bb-9afa222b3484",
                "room_id" => "9b6103ef-923d-4e45-a611-d65b2c9f12a4"
            ],
            [
                "id" => "613bf957-d618-4b68-a573-9a8c1b8c77b5",
                "day" => "Tuesday",
                "time" => "19:00:00",
                "study_id" => "a701403d-40af-4d52-830d-d4064349a189",
                "year_id" => "9b610152-27e6-49ee-946b-e328c0bd8638",
                "class_id" => "cf75058c-1695-4c0d-b652-eedeaa425f25",
                "course_id" => "7a6e1cae-ed59-4ba0-b6e2-f1c010889d41",
                "lecturer_id" => "6e5746f6-9659-48e9-840b-e431476c66f5",
                "room_id" => "88081526-cd53-4303-9c93-6588e3474ca2"
            ],
        ]);
    }
}
