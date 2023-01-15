<?php

namespace App\Formatter;

class ActivityParticipantFormatter
{

    function format($data, $project_id)
    {
        $originalDate = "2010-03-21";
        $newDate = date("d-m-Y", strtotime($originalDate));

        $formated_data = [
            'project_id'                                          => $project_id,   
            'cr_code'                                             => !empty($data['cr_code']) ? $data['cr_code'] : null,
            'date_of_participation'                               => !empty($data['date_of_participation']) ? date("Y-m-d", strtotime($data['date_of_participation'])) : null,
            'credit_issued'                                       => !empty($data['credit_issued']) ? $data['credit_issued'] : null,
            'first_name'                                          => !empty($data['fname']) ? $data['fname'] : null,
            'last_name'                                           => !empty($data['lname']) ? $data['lname'] : null,
            'degree'                                              => !empty($data['degree']) ? $data['degree'] : null,
            'profession'                                          => !empty($data['profession']) ? $data['profession'] : null,
            'specialty'                                           => !empty($data['specialty']) ? $data['specialty'] : null,
            'city'                                                => !empty($data['city']) ? $data['city'] : null,
            'state'                                               => !empty($data['state']) ? $data['state'] : null,
            'zip'                                                 => !empty($data['zip']) ? $data['zip'] : null,
            'country'                                             => !empty($data['country']) ? $data['country'] : null,
            'credit_claimed'                                      => !empty($data['credit_claimed']) ? $data['credit_claimed'] : null,
            'dob'                                                 => !empty($data['dob']) ? $data['dob'] : null,
            'certboard'                                           => !empty($data['certboard']) ? $data['certboard'] : null,
            'part_moc_board_id'                                   => !empty($data['part_moc_board_id']) ? $data['part_moc_board_id'] : null,
            'license_number'                                      => !empty($data['license_number']) ? $data['license_number'] : null,
            'nabp_eprofile'                                       => !empty($data['nabp_eprofile']) ? $data['nabp_eprofile'] : null,
            'npi'                                                 => !empty($data['npi']) ? $data['npi'] : null,
            
        ];

        return $formated_data;
    }
}
