<?php

namespace App\Validator;

use Validator;
use App\Rules\maxWords;
use Illuminate\Support\Facades\Log;

class ProjectValidator
{


    /*#####################################################
    #------------------------------------------------------
    # Function step1validation 
    #-------------------------------------------------------
    #
    # @_SM: 
    #
    #
    #
    #
    #####################################################*/

    function step1validation($data)
    {

        $userData = array(

            // 'providership'                          => $data->providership,
            'start_date'                            => $data->start_date,
            // 'expiration_date'                       => $data->expiration_date,
            // 'description'                           => $data->description,
            // 'course_credit_amount'                  => $data->course_credit_amount,
            // 'accreditation_type_4_ipce'             => $data->accreditation_type_4_ipce,
            // 'moc'                                   => $data->moc,
            'activity_title'                        => $data->activity_title,
            // 'practice_gap'                          => $data->practice_gap,
            // 'knowledge_need'                        => $data->knowledge_need,
            // 'skills_need'                           => $data->skills_need,
            // 'performance_need'                      => $data->performance_need,
            // 'activity_designed'                     => $data->activity_designed,
            // 'activity_matches'                      => $data->activity_matches,
            // 'educational_format'                    => $data->educational_format,
            // 'target_audience'                       => $data->target_audience,
            // 'other_competencies'                    => $data->other_competencies,
            // 'enable_needs'                          => $data->enable_needs
        );

        $rules = array(

            // 'description'                           =>  'required|max:250',
            // 'course_credit_amount'                  =>  'required',
            // 'providership'                          =>  'required',
            'start_date'                            =>  'required',
            // 'expiration_date'                       =>  'required',
            // 'accreditation_type_4_ipce'             =>  'required',
            // 'moc'                                   =>  'required',
            'activity_title'                        =>  'required|max:255',
            // 'practice_gap'                          =>  ['required', new maxWords(100)],
            // 'activity_designed'                     =>  ['required', new maxWords(50)],
            // 'activity_matches'                      =>  ['required', new maxWords(25)],
            // 'educational_format'                    =>  ['required', new maxWords(25)],
            // 'target_audience'                       => 'required',
            // 'other_competencies'                    => 'max:255',
            // 'enable_needs'                          => 'required'

        );

        if (!empty($data->target_audience) && in_array("Other members", $data->target_audience)) {
            $userData['target_audience_other_reason'] = $data->target_audience_other_reason;
        }

        $messages = [

            // 'providership.required'                    => 'Activity Overview must not be empty.',
            'activity_title.required'                  => 'Activity title must not be empty.',
            // 'description.required'                     => 'Description must not be empty.',
            // 'course_credit_amount.required'            => 'Course Credit Amount must not be empty.',
            // 'accreditation_type_4_ipce.required'       => 'Accreditation Type For IPCE must not be empty.',
            // 'moc.required'                             => 'MOC must not be empty.',
            // 'activity_title.max'                       => 'Activity title may not be greater than 255 characters.',
            // 'other_competencies.max'                   => 'Other competencies may not be greater than 512 characters.',
            // 'practice_gap.required'                    => 'Professional practice gap(s) must not be empty.',
            'start_date.required'                      => 'Start date must not be empty',
            // 'expiration_date.required'                 => 'Expiration date must not be empty',
            // 'educational_format.required'              => 'Educational format must not be empty.',
            // 'activity_matches.required'                => 'Healthcare team’s scope of professional activities must not be empty.',
            // 'activity_designed.required'               => 'Designed to change must not be empty.',
            // 'target_audience.required'                 => 'Target Audience must be selected.',
            // 'enable_needs.required'                    => 'Minimum one is required: either knowledge, skills/strategies or performance need.',

        ];

        // if (!empty($data->target_audience) && in_array("Other members", $data->target_audience)) {
        //     $rules['target_audience_other_reason']             = 'required';
        //     $messages['target_audience_other_reason.required'] = 'Please specify the reason.';
        // }

        // if (!empty($data->enable_needs) && in_array("Knowledge need", $data->enable_needs)) {
        //     $rules['knowledge_need']             =  ['required', new maxWords(50)];
        //     $messages['knowledge_need.required'] = 'Knowledge need must not be empty.';
        // }

        // if (!empty($data->enable_needs) && in_array("Skills/Strategy need", $data->enable_needs)) {
        //     $rules['skills_need']             =  ['required', new maxWords(50)];
        //     $messages['skills_need.required'] = 'Skills need must not be empty.';
        // }

        // if (!empty($data->enable_needs) && in_array("Performance need", $data->enable_needs)) {
        //     $rules['performance_need']             =  ['required', new maxWords(50)];
        //     $messages['performance_need.required'] = 'Performance need must not be empty.';
        // }


        return Validator::make($userData, $rules, $messages);
    }

    /*#####################################################
    #------------------------------------------------------
    # Function step2validation 
    #-------------------------------------------------------
    #
    # @_SM: 
    #
    #
    #
    #
    #####################################################*/

    function step2validation($data)
    {
    }
    /*#####################################################
    #------------------------------------------------------
    # Function step3validation 
    #-------------------------------------------------------
    #
    # @_SM: 
    #
    #
    #
    #
    #####################################################*/
    function step3validation($data)
    {

        $userData = array(

            'activity_title'                        => $data->activity_title,
            // 'jac13'                                 => $data->jac13,
            // 'jac14'                                 => $data->jac14,
            // 'jac17'                                 => $data->jac17,
            // 'jac18'                                 => $data->jac18,
            // 'jac19'                                 => $data->jac19,
            // 'jac24'                                 => $data->jac24,
            // 'jac25'                                 => $data->jac25,
            // 'jac13_description'                     => $data->jac13_description,
            // 'jac14_description'                     => $data->jac14_description,
            // 'jac17_description'                     => $data->jac17_description,
            // 'jac18_description'                     => $data->jac18_description,
            // 'jac19_description'                     => $data->jac19_description,
            // 'jac24_description'                     => $data->jac24_description,
            // 'jac25_description'                     => $data->jac25_description,
            // 'Attachment_1'                          => $data->file('Attachment_1'),
            // 'Attachment_2'                          => $data->file('Attachment_2'),
            // 'Attachment_3'                          => $data->file('Attachment_3'),
            // 'Attachment_4'                          => $data->file('Attachment_4'),
            // 'Attachment_5'                          => $data->file('Attachment_5'),
            // 'Attachment_6'                          => $data->file('Attachment_6'),
            // 'Attachment_7'                          => $data->file('Attachment_7'),
            // 'Attachment_8'                          => $data->file('Attachment_8')
            // 'Attachment_9'                          => $data->file('Attachment_9')
        );

        $rules = array(

            'activity_title'                        =>  'required',
            // 'Attachment_1'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_2'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_3'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_4'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_5'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_6'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_7'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_8'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
            // 'Attachment_9'                          =>  'mimes:pdf,doc,xlsx,xls,docx,jpeg,jpg,png|max:25600|nullable',
        );


        $messages = [
            'activity_title.required'               => 'Activity Title must not be empty.',
            // 'Attachment_1.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_2.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_3.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_4.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_5.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_6.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_7.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_8.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
            // 'Attachment_9.max'                      => 'Maximum file size to upload is 25MB (25600 KB).',
        ];


        // if ($data->jac13 == 1) {
        //     $rules['jac13_description'] = 'required';
        //     $messages['jac13_description.required'] = 'JAC 13 Description must not be empty.';
        // }
        // if ($data->jac14 == 1) {
        //     $rules['jac14_description'] = 'required';
        //     $messages['jac14_description.required'] = 'JAC 14 Description must not be empty.';
        // }
        // if ($data->jac17 == 1) {
        //     $rules['jac17_description'] = 'required';
        //     $messages['jac17_description.required'] = 'JAC 17 Description must not be empty.';
        // }
        // if ($data->jac18 == 1) {
        //     $rules['jac18_description'] = 'required';
        //     $messages['jac18_description.required'] = 'JAC 18 Description must not be empty.';
        // }
        // if ($data->jac19 == 1) {
        //     $rules['jac19_description'] = 'required';
        //     $messages['jac19_description.required'] = 'JAC 19 Description must not be empty.';
        // }
        // if ($data->jac24 == 1) {
        //     $rules['jac24_description'] = 'required';
        //     $messages['jac24_description.required'] = 'JAC 24 Description must not be empty.';
        // }
        // if ($data->jac25 == 1) {
        //     $rules['jac25_description'] = 'required';
        //     $messages['jac25_description.required'] = 'JAC 25 Description must not be empty.';
        // }


        return Validator::make($userData, $rules, $messages);
    }


    /*#####################################################
    #------------------------------------------------------
    # Function updateValidation 
    #-------------------------------------------------------
    #
    # @_SM: 
    #
    #
    #
    #
    #####################################################*/

    function updateValidation($data)
    {

        $userData = array(

            'activity_title'    => $data->activity_title,
            // 'practice_gap'      => $data->practice_gap,
            // 'knowledge_need'    => $data->knowledge_need,
            // 'skills_need'       => $data->knowledge_need,
            // 'performance_need'  => $data->knowledge_need,
            // 'activity_designed' => $data->activity_designed,
            // 'activity_matches'  => $data->activity_matches,
            // 'educational_format' => $data->educational_format,
        );

        $rules = array(
            'activity_title'    =>  'required',
            // 'practice_gap'      =>  new maxWords(100),
            // 'knowledge_need'    =>  new maxWords(50),
            // 'skills_need'       =>  new maxWords(50),
            // 'performance_need'  =>  new maxWords(50),
            // 'activity_designed' =>  new maxWords(50),
            // 'activity_matches'  =>  new maxWords(25),
            // 'educational_format' =>  new maxWords(25),

        );

        $messages = [
            // 'provider_id.required'    => 'Provider ID must not be empty.'            
        ];
    }
}
