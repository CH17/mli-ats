<?php

namespace App\Formatter;

use App\FileUploader\FileUploader;

class ActivityFormatter
{

    function format($data)
    {
        $project_code = "P" . date('y') . rand(100, 999);

        $commercial_supporters = null;
        $has_loa = false;

        if (!empty($data->commercial_supporters)) {

            foreach ($data->commercial_supporters as $key => $value) {
                $commercial_supporters[$key]['name'] = isset($value['name']) ? $value['name'] : null;
                $commercial_supporters[$key]['grant_id'] = isset($value['grant_id']) ? $value['grant_id'] : null;
                $commercial_supporters[$key]['amount'] = isset($value['amount']) ? $value['amount'] : null;
                $commercial_supporters[$key]['in_kind'] = isset($value['in_kind']) ? $value['in_kind'] : 0;
                $support_attachment_7 = $data->file('support_attachment_7_' . $key);

                if (isset($support_attachment_7)) {
                    $file_uploader = new FileUploader();
                    $attachment_7 = $file_uploader->uploadFile7($support_attachment_7, $project_code);
                    $commercial_supporters[$key]['support_attachment_7'] = $attachment_7;
                    $has_loa = true;
                } else {
                    $commercial_supporters[$key]['support_attachment_7'] = null;
                }
            }

            $commercial_supporters = json_encode($commercial_supporters);
        }




        $formated_data = [
            'project_info' => [
                'project_code'                          => !empty($data->project_code) ? $data->project_code : $project_code,
                'activity_id'                           => !empty($data->project_code) ? $data->project_code . '-01' : $project_code . '-01',
                'activity_url'                          => $data->activity_url,
                'status_id'                             => 2,
                'moc'                                   => $data->moc,
                'doa_or_ed_notes'                       => $data->doa_or_ed_notes,
                'jp_cr_code'                            => $data->jp_cr_code,
                'accreditation_type_4_ipce'             => $data->accreditation_type_4_ipce,
                'jp_id'                                 => $data->jp_id,
                'jp_id_2'                               => $data->jp_id_2,
                'jp_id_3'                               => $data->jp_id_3,
                'has_jp_2'                              => $data->has_jp_2,
                'has_jp_3'                              => $data->has_jp_3,
                'activity_title'                        => $data->activity_title,
                'start_date'                            => date('Y-m-d', strtotime(today())),
                'expiration_date'                       => date('Y-m-d', strtotime(today())),
                'providership'                          => $data->providership,
                'moc'                                   => $data->moc,
                'has_commercial_support'                => $data->has_commercial_support,
                'has_loa'                               => $has_loa,
                'has_ilna'                              => $data->ilna_coding,
                'ilna_total'                            => $data->ilna_total_points,
                'ilna_points'                           => $data->ilna_points
            ],
            'project_meta' => [
                'commercial_supporters'                 => !empty($commercial_supporters) ? $commercial_supporters : null,
            ],
        ];

        if (!empty($data->target_audience) && in_array("Other members", $data->target_audience)) {
            $formated_data['target_audience_other_reason'] = !empty($data->target_audience_other_reason) ? $data->target_audience_other_reason : Null;
        }

        if (!empty($data->providership) && $data->providership == "Direct") {
            $formated_data['providership'] = $data->providership;
            $formated_data['jp_id'] = null;
        }

        if (empty($data->has_jp_2)) {
            $formated_data['jp_id_2'] = null;
        }

        if (empty($data->has_jp_3)) {
            $formated_data['jp_id_3'] = null;
        }

        return $formated_data;
    }
}
