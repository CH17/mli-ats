<?php

namespace App\Formatter;

use Notification;
use App\FileUploader\FileUploader;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProjectMessage;
use App\FileUploader\ProjectFileUploader;


class ProjectFormatter
{

    function format($data)
    {
        $activity_id = "P" . date('y') . rand(100, 999);

        $project_data = new ProjectFileUploader();
        $files = $project_data->uploadFiles($data, $activity_id);

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
                    $attachment_7 = $file_uploader->uploadFile7($support_attachment_7, $activity_id);
                    $commercial_supporters[$key]['support_attachment_7'] = $attachment_7;
                    $has_loa = true;
                } else {
                    $commercial_supporters[$key]['support_attachment_7'] = null;
                }
            }

            $commercial_supporters = json_encode($commercial_supporters);
        }

        $knowledge = $data->knowledge;
        $practice_and_care_approaches = $data->practice_and_care_approaches;
        $practice_and_care_essentials = $data->practice_and_care_essentials;
        $personal_and_profesional_development = $data->personal_and_profesional_development;

        $cape_competencies = [
            'knowledge' => !empty($knowledge) ? $knowledge : null,
            'practice_and_care_approaches' => !empty($practice_and_care_approaches) ? $practice_and_care_approaches : null,
            'practice_and_care_essentials' => !empty($practice_and_care_essentials) ? $practice_and_care_essentials : null,
            'personal_and_profesional_development' => !empty($personal_and_profesional_development) ? $personal_and_profesional_development : null,
        ];

        $formated_data = [

            'project_info' => [
                'activity_id'                           => $activity_id,
                'activity_url'                          => $data->activity_url,
                'status_id'                             => 1,
                'description'                           => $data->description,
                'course_credit_amount'                  => $data->course_credit_amount,
                'accreditation_type_4_ipce'             => $data->accreditation_type_4_ipce,
                'moc'                                   => $data->moc,
                'ol3_knowledge'                         => !empty($data->ol3_knowledge) ? $data->ol3_knowledge : 0,
                'ol4_competence'                        => !empty($data->ol4_competence) ? $data->ol4_competence : 0,
                'ol5_performance'                       => !empty($data->ol5_performance) ? $data->ol5_performance : 0,
                'ol6_patient_outcomes'                  => !empty($data->ol6_patient_outcomes) ? $data->ol6_patient_outcomes : 0,
                'ol7_community_health'                  => !empty($data->ol7_community_health) ? $data->ol7_community_health : 0,
                'notes'                                 => $data->notes,
                'doa_or_ed_notes'                       => $data->doa_or_ed_notes,
                'ta_keywords'                           => $data->ta_keywords,
                'jac13'                                 => $data->jac13,
                'jac14'                                 => $data->jac14,
                'jac17'                                 => $data->jac17,
                'jac18'                                 => $data->jac18,
                'jac19'                                 => $data->jac19,
                'jac23'                                 => $data->jac23,
                'jac24'                                 => $data->jac24,
                'jac25'                                 => $data->jac25,
                'jp_id'                                 => $data->jp_id,
                'jp_id_2'                               => $data->jp_id_2,
                'jp_id_3'                               => $data->jp_id_3,
                'has_jp_2'                              => $data->has_jp_2,
                'has_jp_3'                              => $data->has_jp_3,
                'activity_title'                        => $data->activity_title,
                'start_date'                            => date('Y-m-d', strtotime($data->start_date)),
                'expiration_date'                       => !empty($data->expiration_date) ? date('Y-m-d', strtotime($data->expiration_date)) : null,
                'activity_type'                         => $data->activity_type,
                'providership'                          => $data->providership,
                'has_commercial_support'                => $data->has_commercial_support,
                'has_loa'                               => $has_loa,
            ],

            'project_meta' => [
                'jac13_patient_planner'                 => $data->jac13_patient_planner,
                'jac13_patient_presenter'               => $data->jac13_patient_presenter,
                'jac13_mechanism'                       => $data->jac13_mechanism,

                'jac14_patient_planner'                 => $data->jac14_patient_planner,
                'jac14_patient_presenter'               => $data->jac14_patient_presenter,
                'jac14_mechanism'                       => $data->jac14_mechanism,

                'jac13_description'                     => $data->jac13_description,
                'jac14_description'                     => $data->jac14_description,
                'jac17_description'                     => $data->jac17_description,
                'jac18_description'                     => $data->jac18_description,
                'jac19_description'                     => $data->jac19_description,
                'jac23_description'                     => $data->jac23_description,
                'jac24_description'                     => $data->jac24_description,
                'jac25_description'                     => $data->jac25_description,

                'practice_gaps'                         => $data->practice_gap,
                'knowledge_need'                        => $data->knowledge_need,
                'skills_need'                           => $data->skills_need,
                'performance_need'                      => $data->performance_need,
                'activity_designed'                     => $data->activity_designed,
                'learning_objectives'                   => $data->learning_objectives,
                'ensure_activity'                       => $data->ensure_activity,
                'educational_format'                    => $data->educational_format,
                'planned_strategies'                    => $data->planned_strategies,
                'barriers_strategies'                   => !empty($data->barriers_strategies) ? json_encode($data->barriers_strategies) : null,
                'barriers_strategies_other'             => $data->barriers_strategies_other,
                'medicine_institutes'                   => !empty($data->medicine_institutes) ? json_encode($data->medicine_institutes) : null,
                'collaborative_practices'               => !empty($data->collaborative_practices) ? json_encode($data->collaborative_practices) : null,
                'acgme_abms_competencies'               => !empty($data->acgme_abms_competencies) ? json_encode($data->acgme_abms_competencies) : null,
                'cape_competencies'                     => json_encode($cape_competencies),
                'national_quality_strategy'             => !empty($data->national_quality_strategy) ? json_encode($data->national_quality_strategy) : null,
                'other_competencies'                    => $data->other_competencies,
                'controll_individuals'                  => !empty($data->controll_individuals) ? json_encode($data->controll_individuals) : null,
                'commercial_supporters'                 => !empty($commercial_supporters) ? $commercial_supporters : null,

                'attachments'                           => !empty($files['attachment']) ? json_encode($files['attachment']) : null,
                'support_attachments'                   => !empty($files['support_attachment']) ? json_encode($files['support_attachment']) : null,
                'dis_attachments'                       => !empty($files['dis_attachments']) ? json_encode($files['dis_attachments']) : null,
            ],

        ];

        if (!empty($data->target_audience) && in_array("Other members", $data->target_audience)) {
            $formated_data['project_info']['target_audience_other_reason'] = !empty($data->target_audience_other_reason) ? $data->target_audience_other_reason : null;
        }

        if (!empty($data->providership) && $data->providership == "Direct") {
            $formated_data['project_info']['providership'] = $data->providership;
            $formated_data['project_info']['jp_id'] = null;
        }

        if (empty($data->has_jp_2)) {
            $formated_data['project_info']['jp_id_2'] = null;
        }

        if (empty($data->has_jp_3)) {
            $formated_data['project_info']['jp_id_3'] = null;
        }

        if ($data->hasFile('Attachment_4')) {
            $formated_data['project_info']['has_attachment_4'] = 1;
        }

        if ($data->hasFile('Attachment_6')) {
            $formated_data['project_info']['has_attachment_6'] = 1;
        }

        return $formated_data;
    }


    function updateFormat($data, $project)
    {
        $knowledge = $data->knowledge;
        $practice_and_care_approaches = $data->practice_and_care_approaches;
        $practice_and_care_essentials = $data->practice_and_care_essentials;
        $personal_and_profesional_development = $data->personal_and_profesional_development;

        $cape_competencies = [
            'knowledge' => !empty($knowledge) ? $knowledge : null,
            'practice_and_care_approaches' => !empty($practice_and_care_approaches) ? $practice_and_care_approaches : null,
            'practice_and_care_essentials' => !empty($practice_and_care_essentials) ? $practice_and_care_essentials : null,
            'personal_and_profesional_development' => !empty($personal_and_profesional_development) ? $personal_and_profesional_development : null,
        ];

        $ilna_points = json_encode($data->ilna_item);

        $formated_data = [

            'project_info' => [
                'project_code'                          => $data->project_code,
                'activity_id'                           => $data->activity_id,
                'activity_url'                          => $data->activity_url,
                'description'                           => $data->description,
                'course_credit_amount'                  => $data->course_credit_amount,
                'accreditation_type_4_ipce'             => $data->accreditation_type_4_ipce,
                'moc'                                   => $data->moc,
                'ol3_knowledge'                         => !empty($data->ol3_knowledge) ? $data->ol3_knowledge : 0,
                'ol4_competence'                        => !empty($data->ol4_competence) ? $data->ol4_competence : 0,
                'ol5_performance'                       => !empty($data->ol5_performance) ? $data->ol5_performance : 0,
                'ol6_patient_outcomes'                  => !empty($data->ol6_patient_outcomes) ? $data->ol6_patient_outcomes : 0,
                'ol7_community_health'                  => !empty($data->ol7_community_health) ? $data->ol7_community_health : 0,
                'ta_keywords'                           => $data->ta_keywords,

                'jp_id'                                 => $data->jp_id,
                'jp_id_2'                               => $data->jp_id_2,
                'jp_id_3'                               => $data->jp_id_3,
                'has_jp_2'                              => $data->has_jp_2,
                'has_jp_3'                              => $data->has_jp_3,
                'jp_cr_code'                            => $data->jp_cr_code,
                'jp_cr_code_2'                          => $data->jp_cr_code_2,
                'jp_cr_code_3'                          => $data->jp_cr_code_3,

                'has_ep_1'                              => $data->has_ep_1,
                'ep_id_1'                               => $data->ep_id_1,
                'ep_cr_code_1'                          => $data->ep_cr_code_1,

                'has_ep_2'                              => $data->has_ep_2,
                'ep_id_2'                               => $data->ep_id_2,
                'ep_cr_code_2'                          => $data->ep_cr_code_2,

                'is_collaborating_org'                  => $data->is_collaborating_org,
                'collaborating_org_name'                => $data->collaborating_org_name,
                'activity_title'                        => $data->activity_title,
                'start_date'                            => date('Y-m-d', strtotime($data->start_date)),
                'expiration_date'                       => !empty($data->expiration_date) ? date('Y-m-d', strtotime($data->expiration_date)) : null,
                'activity_type'                         => $data->activity_type,
                'providership'                          => $data->providership,
                'message'                               => $data->message,
                'has_ilna'                              => $data->ilna_coding,
                'ilna_total'                            => $data->ilna_total_points,
                'ilna_points'                           => $ilna_points
            ],
            'project_meta' => [
                'medicine_institutes'       => !empty($data->medicine_institutes) ? json_encode($data->medicine_institutes) : Null,
                'collaborative_practices'   => !empty($data->collaborative_practices) ? json_encode($data->collaborative_practices) : Null,
                'acgme_abms_competencies'   => !empty($data->acgme_abms_competencies) ? json_encode($data->acgme_abms_competencies) : Null,
                'cape_competencies'         => json_encode($cape_competencies),
                'national_quality_strategy' => !empty($data->national_quality_strategy) ? json_encode($data->national_quality_strategy) : null,
                'other_competencies'        => $data->other_competencies,

                'practice_gaps'             => $data->practice_gap,
                'knowledge_need'            => $data->knowledge_need,
                'skills_need'               => $data->skills_need,
                'performance_need'          => $data->performance_need,
                'activity_designed'         => $data->activity_designed,
                'learning_objectives'       => $data->learning_objectives,
                'ensure_activity'           => $data->ensure_activity,
                'educational_format'        => $data->educational_format,
                'planned_strategies'        => $data->planned_strategies,
                'barriers_strategies'       => !empty($data->barriers_strategies) ? json_encode($data->barriers_strategies) : Null,
                'barriers_strategies_other' => $data->barriers_strategies_other,
            ],

        ];

        if (!empty($data->target_audience) && in_array("Other members", $data->target_audience)) {
            $formated_data['project_meta']['target_audience_other_reason'] = !empty($data->target_audience_other_reason) ? $data->target_audience_other_reason : Null;
        }

        if (!empty($data->providership) && $data->providership == "Direct") {
            $formated_data['project_info']['providership'] = $data->providership;
            $formated_data['project_info']['jp_id'] = null;
            $formated_data['project_info']['jp_cr_code'] = null;
        }

        if (empty($data->has_jp_2)) {
            $formated_data['project_info']['jp_id_2'] = null;
            $formated_data['project_info']['jp_cr_code_2'] = null;
        }

        if (empty($data->has_jp_3)) {
            $formated_data['project_info']['jp_id_3'] = null;
            $formated_data['project_info']['jp_cr_code_3'] = null;
        }


        return $formated_data;
    }

    public function jacFormat($data)
    {
        $formated_data = [];
        $formated_data = [

            'project_info' => [
                'jac13'                                 => $data->jac13,
                'jac14'                                 => $data->jac14,
                'jac16'                                 => $data->jac16,
                'jac17'                                 => $data->jac17,
                'jac18'                                 => $data->jac18,
                'jac19'                                 => $data->jac19,
                'jac20'                                 => $data->jac20,
                'jac21'                                 => $data->jac21,
                'jac22'                                 => $data->jac22,
                'jac23'                                 => $data->jac23,
                'jac24'                                 => $data->jac24,
                'jac25'                                 => $data->jac25,
            ],
            'project_meta' => [
                'jac13_description'                     => $data->jac13_description,
                'jac14_description'                     => $data->jac14_description,
                'jac16_description'                     => $data->jac16_description,
                'jac17_description'                     => $data->jac17_description,
                'jac18_description'                     => $data->jac18_description,
                'jac19_description'                     => $data->jac19_description,
                'jac20_description'                     => $data->jac20_description,
                'jac21_description'                     => $data->jac21_description,
                'jac22_description'                     => $data->jac22_description,
                'jac23_description'                     => $data->jac23_description,
                'jac24_description'                     => $data->jac24_description,
                'jac25_description'                     => $data->jac25_description,

                'jac13_patient_planner'                 => $data->jac13_patient_planner,
                'jac13_patient_presenter'               => $data->jac13_patient_presenter,
                'jac13_mechanism'                       => $data->jac13_mechanism,

                'jac14_patient_planner'                 => $data->jac14_patient_planner,
                'jac14_patient_presenter'               => $data->jac14_patient_presenter,
                'jac14_mechanism'                       => $data->jac14_mechanism,
            ],

        ];

        return $formated_data;
    }

    public function supportFormat($data)
    {
        $formated_data = [];


        $commercial_supporters = null;       

        if (!empty($data->commercial_supporters)) {

            $index = 0; 
            foreach ($data->commercial_supporters as $key => $value) {                
               
                if(isset($value['name'])){
                    $index++;
                    $commercial_supporters[$index]['name'] = isset($value['name']) ? $value['name'] : null;
                    $commercial_supporters[$index]['grant_id'] = isset($value['grant_id']) ? $value['grant_id'] : null;
                    $commercial_supporters[$index]['amount'] = isset($value['amount']) ? $value['amount'] : null;
                    $commercial_supporters[$index]['in_kind'] = isset($value['in_kind']) ? $value['in_kind'] : 0;
                    $commercial_supporters[$index]['fe_loa'] = isset($value['fe_loa']) ? $value['fe_loa'] : 0;
               }            
            }            
        }

        $formated_data['project_info']['has_commercial_support'] = $data->has_commercial_support;
                
        $formated_data['project_meta']['commercial_supporters'] = ($commercial_supporters) ? json_encode($commercial_supporters): null;
        
        return $formated_data;
    }

    public function disclosuresFormat($data, $project)
    {

        $formated_data['project_meta']['controll_individuals'] = !empty($data->controll_individuals) ? json_encode($data->controll_individuals) : Null;

        return $formated_data;
    }
}
