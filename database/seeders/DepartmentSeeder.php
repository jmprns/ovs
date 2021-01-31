<?php

namespace Database\Seeders;

use App\Models\Block;
use App\Models\Department;
use App\Models\YearLevel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = array();
        $years = array();
        $blocks = array();
        $file = file_get_contents(base_path('database/seeds/departments.json'));
        $departments = collect(json_decode($file, true));
        $now = Carbon::now()->toDateTimeString();

        $year_id = 1;

        foreach($departments as $i => $department){

            array_push($depts, [
                'name' => $department['name'],
                'created_at' => $now,
                'updated_at' => $now
            ]);


            foreach($department['years'] as $j => $year){

                array_push($years, [
                    'name' => $year['name'],
                    'department_id' => $i+1,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);


                foreach($year['blocks'] as $k => $block){
                    array_push($blocks, [
                        'name' => $block['name'],
                        'year_id' => $year_id,
                        'created_at' => $now,
                        'updated_at' => $now
                    ]);
                }

                $year_id++;
            }
        }

        Department::insert($depts);
        YearLevel::insert($years);
        Block::insert($blocks);

    }
}
