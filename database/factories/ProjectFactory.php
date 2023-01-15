<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'activity_id'        => "P" . date('y') . $faker->numberBetween(100, 999),
        'status_id'          => $faker->numberBetween(1,9),
        'project_code'       => $faker->randomNumber($nbDigits = 8),    
        'activity_title'     => $faker->sentence,
        'start_date'         => $faker->date($format = 'Y-m-d'),
        'expiration_date'    => $faker->date($format = 'Y-m-d'),
        'activity_type'      => $faker->randomElement(['Course', 'Regularly Scheduled Series', 'Internet Live Course', 'Enduring Material', 'Internet Activity Enduring Material', 'Journal-based CME', 'Manuscript Review', 'Test Item Writing', 'Committee Learning', 'Performance Improvement', 'Internet Searching and Learning', 'Learning from Teaching']),
        'providership'       => $faker->randomElement(['Direct', 'Join']),
        'has_commercial_support'   => $faker->randomElement(['Yes', 'No']),
        'target_audience'    => json_encode(['Nurses', 'Physicians']),
        'practice_gaps'      => $faker->paragraph,
        'knowledge_need'     => $faker->paragraph,
        'skills_need'        => $faker->paragraph,
        'performance_need'   => $faker->paragraph,
        'activity_designed'  => $faker->paragraph,       
        'educational_format' => $faker->paragraph,
        'medicine_institutes'       => json_encode(['Work in interdisciplinary teams', 'Apply quality improvement']),
        'collaborative_practices'   => json_encode(['Values/Ethics for Interprofessional Practice', 'Interorofessional Communucation']),
        'acgme_abms_competencies'   => json_encode(['Patient Care and Procedural Skills', 'Professionalism']),
        'other_competencies'        => $faker->sentence,
        'controll_individuals'      => json_encode(
            [
                [
                    'name_of_individual'    => $faker->name,
                    'role_in_activity'      => $faker->catchPhrase,
                    'commercial_interest'   => $faker->company,
                    'nature_of_relationship' => $faker->jobTitle
                ],
                [
                    'name_of_individual'    => $faker->name,
                    'role_in_activity'      => $faker->catchPhrase,
                    'commercial_interest'   => $faker->company,
                    'nature_of_relationship' => $faker->jobTitle
                ]
            ]
        ),
        'commercial_supporters' => json_encode(array(
            [
                'name'      => $faker->company,
                'amount'    => $faker->randomNumber(2),
                'in_king'   => $faker->randomElement([Null, 1])
            ],
            [
                'name'      => $faker->company,
                'amount'    => $faker->randomNumber(2),
                'in_king'   => $faker->randomElement([Null, 1])

            ]
        )),
        'attachments' => json_encode(array(
            ['file_name' => $faker->imageUrl($width = 640, $height = 480), 'file_type' => 'image/jpeg'],
            ['file_name' => $faker->imageUrl($width = 640, $height = 480), 'file_type' => 'image/jpeg'],
            ['file_name' => $faker->imageUrl($width = 640, $height = 480), 'file_type' => 'image/jpeg'],
            ['file_name' => $faker->imageUrl($width = 640, $height = 480), 'file_type' => 'image/jpeg'],

        )),
        'support_attachments' => json_encode(array(
            ['file_name' => $faker->imageUrl($width = 640, $height = 480), 'file_type' => 'image/jpeg'],
            ['file_name' => $faker->imageUrl($width = 640, $height = 480), 'file_type' => 'image/jpeg'],
        )),
    ];
});
