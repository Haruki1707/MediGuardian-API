<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicines = [
            ['name' => 'Aspirin'],
            ['name' => 'Ibuprofen'],
            ['name' => 'Paracetamol (Acetaminophen)'],
            ['name' => 'Lisinopril'],
            ['name' => 'Simvastatin'],
            ['name' => 'Metformin'],
            ['name' => 'Omeprazole'],
            ['name' => 'Levothyroxine'],
            ['name' => 'Amoxicillin'],
            ['name' => 'Ciprofloxacin'],
            ['name' => 'Fluoxetine'],
            ['name' => 'Losartan'],
            ['name' => 'Atorvastatin'],
            ['name' => 'Metoprolol'],
            ['name' => 'Prednisone'],
            ['name' => 'Warfarin'],
            ['name' => 'Diazepam'],
            ['name' => 'Furosemide'],
            ['name' => 'Hydrochlorothiazide'],
            ['name' => 'Naproxen'],
            ['name' => 'Cetirizine'],
            ['name' => 'Albuterol'],
            ['name' => 'Dextromethorphan'],
            ['name' => 'Nexium'],
            ['name' => 'Zolpidem'],
            ['name' => 'Venlafaxine'],
            ['name' => 'Mirtazapine'],
            ['name' => 'Gabapentin'],
            ['name' => 'Ranitidine'],
            ['name' => 'Amlodipine'],
            ['name' => 'Celecoxib'],
            ['name' => 'Clonazepam'],
            ['name' => 'Doxycycline'],
            ['name' => 'Escitalopram'],
            ['name' => 'Folic Acid'],
            ['name' => 'Hydroxyzine'],
            ['name' => 'Jantoven'],
            ['name' => 'Ketoconazole'],
            ['name' => 'Lorazepam'],
            ['name' => 'Meloxicam'],
            ['name' => 'Nortriptyline'],
            ['name' => 'Oxycodone'],
            ['name' => 'Pantoprazole'],
            ['name' => 'Quetiapine'],
            ['name' => 'Risperidone'],
            ['name' => 'Sertraline'],
            ['name' => 'Trazodone'],
            ['name' => 'Ursodiol'],
            ['name' => 'Vitamin D'],
            ['name' => 'Warfarin'],
            ['name' => 'Xanax'],
            ['name' => 'Yaz'],
            ['name' => 'Zyrtec'],
            ['name' => 'Metformin'],
        ];

        Medicine::insert($medicines);
    }
}
